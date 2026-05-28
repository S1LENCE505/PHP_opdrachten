<?php
// declare(strict_types=1);

namespace App\domain;

class User
{
public function __construct(
    private readonly int $id,
    private readonly string $username,
    private readonly string $email
) {}
}