<?php
class Human {
    function __construct(public string $name, public int $age) {}

    function introduce() {
        echo "{$this->name}です。{$this->age}歳です。よろしくお願いします。",PHP_EOL;
    }
}
