<?php
class Guestbook
{
    private $bigArray = [];

    public function getAllPosts()
    {
        return $this->bigArray;
    }

    public function pushtoBigArray($data)
    {
        array_push($this->bigArray, $data);
    }

}
