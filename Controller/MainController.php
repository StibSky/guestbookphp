<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require 'Model/Guestbook.php';
require 'Model/Post.php';

session_start();

class MainController
{

    public function render()
    {
        if (!isset($_POST['title'])) {
            $_POST['title'] = "FIRST";
        }

        if (!isset($_POST['date'])) {
            $_POST['date'] = date("Y/m/d h:i:sa");
        }
        if (!isset($_POST['name'])) {
            $_POST['name'] = "Coder";
        }
        if (!isset($_POST['guestText'])) {
            $_POST['guestText'] = "this is the standard message";
        }
        $guestBookEntry = new Post($_POST['title'], $_POST['date'], $_POST['name'], $_POST['guestText']);

        $message = $guestBookEntry->getContent();
        $name = $guestBookEntry->getAuthorName();
        $date = date("Y/m/d h:i:sa");
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
        $encodedArray = json_encode($bigarray, JSON_PRETTY_PRINT);
        file_put_contents($file, $encodedArray);
        $jsonArray = $guestBookEntry->fetchPosts();

        while (count($jsonArray) > 20) {
            array_shift($jsonArray);
        }
        require 'View/mainPage.php';
    }
}