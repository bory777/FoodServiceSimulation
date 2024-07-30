<?php

namespace Persons;

class Person {
    protected string $name;
    protected int $age;
    protected string $address;

    public function __construct(string $name, int $age, string $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }
}