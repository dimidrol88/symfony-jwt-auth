<?php

declare(strict_types=1);

namespace App\User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\App\User\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private int $id;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $email;
    /**
     * @var string
     * @ORM\Column(type="string", name="password_hash", nullable=false)
     */
    private string $passwordHash;
    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $name;

    public static function create(string $email, string $passwordHash): self
    {
        $user = new self();

        $user->email = $email;
        $user->passwordHash = $passwordHash;

        return $user;
    }

    public function changeName(?string $name): User
    {
        $this->name = $name;

        return $this;
    }
}