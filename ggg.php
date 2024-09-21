<?php

class Книга {
    private $title;
    private $author;
    private $publishedYear;
    private $genre;

    public function __construct($title, $author, $publishedYear, $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $publishedYear;
        $this->genre = $genre;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublishedYear() {
        return $this->publishedYear;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPublishedYear($publishedYear) {
        $this->publishedYear = $publishedYear;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getBookInfo() {
        return "Название: " . $this->title . ", Автор: " . $this->author . ", Год публикации: " . $this->publishedYear . ", Жанр: " . $this->genre;
    }
}

?>