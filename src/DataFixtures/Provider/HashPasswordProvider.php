<?php

namespace App\DataFixtures\Provider;

use App\Entity\Customer;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

readonly class HashPasswordProvider
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function hashPassword(string $plainPassword): string
    {
        return $this->hasher->hashPassword(new Customer(), $plainPassword);
    }
}