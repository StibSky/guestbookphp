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

    public function encodeArray($bigarray) {
        return json_encode($bigarray, JSON_PRETTY_PRINT);


    }

    public function putContents($filename,$encodedarray) {
        file_put_contents($filename, $encodedarray);
    }



}
