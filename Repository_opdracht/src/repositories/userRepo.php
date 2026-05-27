<?php
public function __construct(private readonly PDO $pdo$) {}

public function findbyUsername(string $username): ?User
{
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        return new User($userData['id'], $userData['username'], $userData['email']);
    }

    return null;
}