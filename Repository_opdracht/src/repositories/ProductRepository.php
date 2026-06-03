<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Product;
use PDO;

class ProductRepository
{
    public function __construct(private readonly PDO $pdo) {}

    public function findById(int $id): ?Product
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->hydrate($row) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM products');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($rows as $row) {
            $products[] = $this->hydrate($row);
        }

        return $products;
    }

    public function insert(Product $product): Product
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)'
        );
        $stmt->execute([
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
        ]);

        $id = (int) $this->pdo->lastInsertId();

        return new Product(
            id: $id,
            name: $product->name,
            price: $product->price,
            stock: $product->stock,
        );
    }

    public function update(Product $product): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE products SET name = :name, price = :price, stock = :stock WHERE id = :id'
        );
        $stmt->execute([
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
            'id' => $product->id,
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    private function hydrate(array $row): Product
    {
        return new Product(
            id: (int) $row['id'],
            name: $row['name'],
            price: (float) $row['price'],
            stock: (int) $row['stock'],
        );
    }
}
