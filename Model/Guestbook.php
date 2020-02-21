<?php
class Guestbook
{
    private $bigArray = [];

    public function getAllPosts()
    {
        return $this->bigArray;
    }

    public function pushtoBigArray($whatToPush)
    {
        array_push($this->bigArray, $whatToPush);
    }

}
