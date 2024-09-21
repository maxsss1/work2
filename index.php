<?php

require_once 'class Book.php';
require_once 'class Library.php';

$library = new Library();

echo "Enter the number of books to add: ";
$numBooks = trim(fgets(STDIN));

for ($i = 0; $i < $numBooks; $i++) {
    echo "Enter the book title: ";
    $title = trim(fgets(STDIN));
    echo "Enter the book author: ";
    $author = trim(fgets(STDIN));
    echo "Enter the book publication year: ";
    $publishedYear = trim(fgets(STDIN));
    echo "Enter the book genre: ";
    $genre = trim(fgets(STDIN));

    $book = new Book($title, $author, $publishedYear, $genre);
    $library->addBook($book);
}

echo "All books: \n";
print_r($library->listAllBooks());

echo "Enter the book title to remove: ";
$titleToRemove = trim(fgets(STDIN));
$library->removeBookByTitle($titleToRemove);

echo "\nAfter removing '$titleToRemove': \n";
print_r($library->listAllBooks());

echo "Enter the author to find books: ";
$authorToFind = trim(fgets(STDIN));
$booksByAuthor = $library->findBooksByAuthor($authorToFind);
echo "\nBooks by author $authorToFind: \n";
print_r(array_map(function ($book) {
    return $book->getBookInfo();
}, $booksByAuthor));

?>
