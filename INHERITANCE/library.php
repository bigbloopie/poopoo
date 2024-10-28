<?php
class Item {
    protected $title;

    public function __construct($title) {
        $this->title = $title;
    }
}

class Book extends Item {
    private $author;
    private $ISBN;

    public function __construct($title, $author, $ISBN) {
        parent::__construct($title);
        $this->author = $author;
        $this->ISBN = $ISBN;
    }
}

class DVD extends Item {
    private $director;
    private $duration;

    public function __construct($title, $director, $duration) {
        parent::__construct($title);
        $this->director = $director;
        $this->duration = $duration;
    }
}

// Example Usage
$book = new Book("1984", "George Orwell", "123456789");
$dvd = new DVD("Inception", "Christopher Nolan", 148);
?>
