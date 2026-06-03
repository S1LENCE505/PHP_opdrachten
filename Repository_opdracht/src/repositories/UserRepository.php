<?php
namespace App\Repositories;

use App\Domain\User;
use PDO;

class UserRepository
{
    public function __construct(private readonly PDO $pdo) {}

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return [
                'user' => $this->hydrate($userData),
                'password' => $userData['password'],
            ];
        }

        return null;
    }

    public function register(string $username, string $email, string $passwordHash): User
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash,
        ]);

        return new User((int) $this->pdo->lastInsertId(), $username, $email);
    }

    private function hydrate(array $row): User
    {
        return new User(
            id: (int) $row['id'],
            username: $row['username'],
            email: $row['email']
        );
    }
}