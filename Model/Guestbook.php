<?php
declare(strict_types = 1);

class Guestbook
{
    private $writtenMessage;


    /**
     * @return string
     */
    public function getWrittenMessage($text): string
    {
        if (!isset($text)) {
            $this->writtenMessage = "";
        } else {
            $this->writtenMessage = (string)$text;
        }
        return $this->writtenMessage;
    }




}