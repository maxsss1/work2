Гладышев Сергей п33
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

class Библиотека {
    private $books = array();

    public function addBook(Книга $book) {
        $this->books[] = $book;
    }

    public function removeBookByTitle($title) {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() == $title) {
                unset($this->books[$key]);
                break;
            }
        }
    }

    public function findBooksByAuthor($author) {
        $result = array();
        foreach ($this->books as $book) {
            if ($book->getAuthor() == $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    public function listAllBooks() {
        $result = array();
        foreach ($this->books as $book) {
            $result[] = $book->getBookInfo();
        }
        return $result;
    }
}

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