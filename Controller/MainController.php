<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



require 'Model/Guestbook.php';
require 'Model/Post.php';
require 'View/mainPage.php';
session_start();

class MainController
{

    public function render()
    {
        $guestBookEntry = new Post($_POST['title'], $_POST['date'], $_POST['name'], $_POST['guestText']);

        $message = $guestBookEntry->getContent();
        $name = $guestBookEntry->getAuthorName();
        $date = $guestBookEntry->getDate();
        $title = $guestBookEntry->getTitle();
        $file = 'messages.json';
        $entryarray = ['message' => $message, 'name' => $name, 'date' => $date, 'title' => $title];


        $guestbook = new Guestbook();
        if (!isset($_SESSION['guestbook'])) {
            $_SESSION['guestbook'] = $guestbook;
        } else {
            $guestbook = $_SESSION['guestbook'];
        }

        $guestbook->pushtoBigArray($entryarray);

        $bigarray = $guestbook->getAllPosts();
       var_dump( $bigarray);

        $encodedArray = json_encode( $guestbook->getAllPosts(), JSON_PRETTY_PRINT);
        file_put_contents($file, $encodedArray);

        $jsonArray = $guestBookEntry->fetchPosts();

        // $newArray[] = $entryarray;
        //   $newarray = json_encode($newArray, JSON_PRETTY_PRINT);


        var_dump($jsonArray);


    }
}