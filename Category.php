<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'category')]
class Category
{
    #[ORM\Id]
    #[ORM\Column, ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $value)
    {
        $this->name = $value;
    }
}