<?php

class Library
{
    private $books = array();

    public function addBook(book $book)
    {
        $this->books[] = $book;
    }

    public function removeBookByTitle($title)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() == $title) {
                unset($this->books[$key]);
                break;
            }
        }
    }

    public function findBooksByAuthor($author)
    {
        $result = array();
        foreach ($this->books as $book) {
            if ($book->getAuthor() == $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    public function listAllBooks()
    {
        $result = array();
        foreach ($this->books as $book) {
            $result[] = $book->getBookInfo();
        }
        return $result;
    }
}

?>
