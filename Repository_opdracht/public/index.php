<?php
// declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Repositories\ProductRepository;
use App\Domain\Product;

$pdo = new PDO('mysql:host=localhost;dbname=userrepo', 'root', 'Robbe2009');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$productRepository = new ProductRepository($pdo);

$pdo->exec(
    "CREATE TABLE IF NOT EXISTS products (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price DECIMAL(8,2) NOT NULL,
        stock INT UNSIGNED NOT NULL DEFAULT 0
    )"
);

$productRepository->insert(new Product(id: 0, name: 'Chocolate', price: 2.99, stock: 15));
$productRepository->insert(new Product(id: 0, name: 'Tea', price: 4.50, stock: 30));

$products = $productRepository->findAll();

if (!empty($products)) {
    $firstProduct = $products[0];
    $productRepository->update(new Product(
        id: $firstProduct->id,
        name: $firstProduct->name,
        price: 3.49,
        stock: 20,
    ));

    if (isset($products[1])) {
        $productRepository->delete($products[1]->id);
    }
}
