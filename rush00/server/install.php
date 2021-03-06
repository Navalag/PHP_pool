<?php
/**
 * Created by PhpStorm.
 * User: dkliukin
 * Date: 4/7/18
 * Time: 10:26 AM
 */
$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
if (!$connect = mysqli_connect($servername, $username, $password , $databasename)) {
    $connect = mysqli_connect($servername, $username, $password);
    $base_created = false;
    if ($connect) {
        $createbase = mysqli_query($connect, "CREATE DATABASE foodshop");
        if ($createbase) {
            $databasename = "foodshop";
            $base_created = true;
        } else {
            $base_created = true;
            $databasename = "foodshop";
        }
    } else {
        echo "Fail to connect";
    }
    if ($base_created) {
        $connect = mysqli_connect($servername, $username, $password, $databasename);
        if ($connect) {
            $res = mysqli_query($connect, "CREATE TABLE users 
            (UserID int UNSIGNED AUTO_INCREMENT NOT NULL,
            FirstName varchar(100) NOT NULL,
            Password varchar(100) NOT NULL,
            PhoneNumber varchar(20) NOT NULL UNIQUE,
            AdminStatus int,
            PRIMARY KEY(UserID)
            )");
            if ($res) {
            } else {
                echo "<br/>Table already exists";
            }
            $res = mysqli_query($connect, "CREATE TABLE book 
            (BookID int UNSIGNED AUTO_INCREMENT NOT NULL,
            title varchar(100) NOT NULL,
            img varchar(1000) NOT NULL,
            Price int NOT NULL,
            year int,
            genre varchar(100),
            category varchar(100),
            format varchar(100) NOT NULL,
            authors varchar(1000) NOT NULL,
            publisher varchar(100) NOT NULL,
            isbn varchar(100) NOT NULL UNIQUE,
            PRIMARY KEY(BookID)
            );");
            if ($res) {
            } else {
                echo "<br/>Table already exists";
            }
            $res = mysqli_query($connect, "CREATE TABLE movie 
            (movieID int UNSIGNED AUTO_INCREMENT NOT NULL,
            title varchar(100) NOT NULL,
            img varchar(1000) NOT NULL,
            Price int NOT NULL,
            year int,
            genre varchar(100),
            format varchar(100),
            category varchar(100),
            writers varchar(1000) NOT NULL,
            director varchar(500) NOT NULL,
            stars varchar(1000) NOT NULL,
            PRIMARY KEY(movieID)
            );");
            if ($res) {
            } else {
                echo "<br/>Table already exists";
            }
            $res = mysqli_query($connect, "CREATE TABLE music 
            (musicID int UNSIGNED AUTO_INCREMENT NOT NULL,
            title varchar(100) NOT NULL,
            img varchar(1000) NOT NULL,
            Price int NOT NULL,
            year int,
            genre varchar(100),
            format varchar(100),
            category varchar(100),
            artist varchar(1000) NOT NULL,
            PRIMARY KEY(musicID)
            );");
            if ($res) {
            } else {
                echo "<br/>Table already exists";
            }
            $res = mysqli_query($connect, "CREATE TABLE basket 
            (UserID int UNSIGNED,
            Name varchar(100),
            phone varchar(100),
            category varchar(100),
            ProductID int UNSIGNED
            )");
            if ($res) {

            } else {
                echo "<br/>Table already exists";
            }
            $query = "INSERT INTO movie(movieID, title, img, Price,year , genre, format, category, writers, director, stars)
                    VALUES (1, 'Forrest Gump', 'img/media/forest_gump.jpg', 2000, 1994, 'Drama', 'DVD', 'Movies', 'Winston Groom, Eric Roth', 'Robert Zemeckis', 'Tom Hanks, Rebecca Williams, Sally Field, Michael Conner Humphreys');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO movie(movieID, title, img, Price,year , genre, format, category, writers, director, stars)
                    VALUES (2, 'Office Space', 'img/media/office_space.jpg', 2000, 1999, 'Comedy', 'Blu-ray', 'Movies', 'William Goldman', 'Mike Judge', 'Ron Livingston, Jennifer Aniston, David Herman, Ajay Naidu, Diedrich Bader, Stephen Root');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO movie(movieID, title, img, Price,year , genre, format, category, writers, director, stars)
                    VALUES (3, 'The Princess Bride', 'img/media/princess_bride.jpg', 2000, 1987, 'Comedy', 'DVD', 'Movies', 'William Goldman', 'Rob Reiner', 'Cary Elwes, Mandy Patinkin, Robin Wright, Chris Sarandon, Christopher Guest, Wallace Shawn, André the Giant, Fred Savage,  Peter Falk, Billy Crystal');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO movie(movieID, title, img, Price,year , genre, format, category, writers, director, stars)
                    VALUES (4, 'The Lord of the Rings: The Fellowship of the Ring', 'img/media/lotr.jpg', 2000, 2001, 'Drama', 'Blu-ray', 'Movies', 'J.R.R. Tolkien, Fran Walsh, Philippa Boyens, Peter Jackson', 'Peter Jackson', '	Elijah Wood, Ian McKellen, Viggo Mortensen, Liv Tyler, Sean Astin');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO music(musicID, title, img, Price,year , genre, format, category, artist)
                    VALUES (1, 'Beethoven: Complete Symphonies', 'img/media/beethoven.jpg', 2000, 2012, 'Clasical', 'CD', 'Music', 'Ludwig van Beethoven');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO music(musicID, title, img, Price,year , genre, format, category, artist)
                    VALUES (2, 'Elvis Forever', 'img/media/elvis_presley.jpg', 2000, 2015, 'Rock', 'Vinyl', 'Music', 'Elvis Presley');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO music(musicID, title, img, Price,year , genre, format, category, artist)
                    VALUES (3, 'The Very Thought of You', 'img/media/nat_king_cole.jpg', 2000, 2008, 'Jaz', 'MP3', 'Music', 'Nat King Cole');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO music(musicID, title, img, Price,year , genre, format, category, artist)
                    VALUES (4, 'No Fences', 'img/media/garth_brooks.jpg', 2000, 1990, 'Country', 'Cassette', 'Music', 'Garth Brooks');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO book(BookID, title, img, Price,year , genre, category, authors, publisher, format, isbn)
                    VALUES (1, 'A Design Patterns: Elements of Reusable Object-Oriented Software', 'img/media/design_patterns.jpg', 2000, 1994, 'Tech', 'Books', 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides', 'Prentice Hall', 'Paperback', '978-0201633610');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO book(BookID, title, img, Price,year , genre, category, authors, publisher, format, isbn)
                    VALUES (2, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'img/media/clean_code.jpg', 2000, 2008, 'Tech', 'Books', 'Robert C. Martin', 'Prentice Hall', 'Ebook', '978-0132350884');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO book(BookID, title, img, Price,year , genre, category, authors, publisher, format, isbn)
                    VALUES (3, 'Refactoring: Improving the Design of Existing Code', 'img/media/refactoring.jpg', 2000, 1999, 'Tech', 'Books', 'Martin Fowler, Kent Beck, John Brant, William Opdyke, Don Roberts', 'Addison-Wesley Professional', 'Hardcover', '978-0201485677');";
            mysqli_query($connect, $query);
            $query = "INSERT INTO book(BookID, title, img, Price,year , genre, category, authors, publisher, format, isbn)
                    VALUES (4, 'The Clean Coder: A Code of Conduct for Professional Programmers', 'img/media/clean_coder.jpg', 2000, 2011, 'Tech', 'Books', 'Robert C. Martin', 'Prentice Hall', 'Audio', '007-6092046981');";
            mysqli_query($connect, $query);
            $admpass=hash('sha256',"admin");
            $query = "INSERT INTO users(UserID, FirstName, Password, PhoneNumber, AdminStatus)
                    VALUES (1, 'admin','".$admpass."', 1234, 1);";
            mysqli_query($connect, $query);
        } else {
            echo "Fail to connect";
        }
    }
}
mysqli_close($connect);
?>