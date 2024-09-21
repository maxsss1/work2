<?php

require_once 'ggg.php';
require_once 'kkk.php';

$library = new Библиотека();

echo "Введите количество книг для добавления: ";
$numBooks = trim(fgets(STDIN));

for ($i = 0; $i < $numBooks; $i++) {
    echo "Введите название книги: ";
    $title = trim(fgets(STDIN));
    echo "Введите автора книги: ";
    $author = trim(fgets(STDIN));
    echo "Введите год публикации книги: ";
    $publishedYear = trim(fgets(STDIN));
    echo "Введите жанр книги: ";
    $genre = trim(fgets(STDIN));

    $book = new Книга($title, $author, $publishedYear, $genre);
    $library->addBook($book);
}

echo "Все книги: \n";
print_r($library->listAllBooks());

echo "Введите название книги для удаления: ";
$titleToRemove = trim(fgets(STDIN));
$library->removeBookByTitle($titleToRemove);

echo "\nПосле удаления '$titleToRemove': \n";
print_r($library->listAllBooks());

echo "Введите автора для поиска книг: ";
$authorToFind = trim(fgets(STDIN));
$booksByAuthor = $library->findBooksByAuthor($authorToFind);
echo "\nКниги автора $authorToFind: \n";
print_r(array_map(function($book) { return $book->getBookInfo(); }, $booksByAuthor));

?>