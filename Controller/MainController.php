<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

require 'Model/Guestbook.php';
require 'Model/Post.php';
require 'View/mainPage.php';

class MainController
{

    public function render()
    {
        $guestBookEntry = new Post($_POST['title'], $_POST['date'], $_POST['name'], $_POST['guestText']);
        $_SESSION["message"] = $guestBookEntry->getContent();
        $_SESSION["name"] = $guestBookEntry->getAuthorName();
        $_SESSION["date"] = $guestBookEntry->getDate();
        $_SESSION["title"] = $guestBookEntry->getTitle();

        $file = 'messages.json';

        $_SESSION["entryArray"] = array('message' => $_SESSION["message"], 'name' => $_SESSION["name"], 'date' => $_SESSION["date"], 'title' => $_SESSION["title"]);


        $encodedArray = json_encode($_SESSION["entryArray"]);

        $jsonArray = $guestBookEntry->fetchPosts();

        var_dump($jsonArray);

        file_put_contents($file, $encodedArray);


    }
}