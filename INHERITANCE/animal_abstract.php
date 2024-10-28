<?php
abstract class Animal {
    abstract public function eat();
    abstract public function makeSound();
}

class Dog extends Animal {
    public function eat() {
        echo "Dog is eating\n";
    }

    public function makeSound() {
        echo "Dog says: Woof!\n";
    }
}

class Cat extends Animal {
    public function eat() {
        echo "Cat is eating\n";
    }

    public function makeSound() {
        echo "Cat says: Meow!\n";
    }
}

// Example Usage
$dog = new Dog();
$dog->eat();
$dog->makeSound();

$cat = new Cat();
$cat->eat();
$cat->makeSound();
?>
