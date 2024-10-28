<?php
interface InterfaceA {
    public function methodA();
}

interface InterfaceB {
    public function methodB();
}

class ClassA implements InterfaceA {
    public function methodA() {
        echo "Method A\n";
    }
}

class ClassB implements InterfaceB {
    public function methodB() {
        echo "Method B\n";
    }
}

class ClassC extends ClassA implements InterfaceB {
    public function methodB() {
        echo "Class C implementing method B\n";
    }
}

// Example Usage
$c = new ClassC();
$c->methodA();
$c->methodB();
?>
