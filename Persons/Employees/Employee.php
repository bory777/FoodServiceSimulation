<?php
class Employee extends Person {
    private string $position;

    public function __construct(string $name, int $age, string $address, string $position) {
        parent::__construct($name, $age, $address);
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getPosition(): string {
        return $this->position;
    }

    public function action(string $message): string {
        return "{$this->position} : {$message}";
    }
}