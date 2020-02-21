<?php
declare(strict_types=1);

class Post
{
    private $title;
    private $date;
    private $content;
    private $authorName;
    private $jsonList =[];

    /**
     * Post constructor.
     * @param $title
     * @param $date
     * @param $content
     * @param $authorName
     */
    public function __construct(string $title, $date, string $authorName, string $content)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->authorName = $authorName;
    }

    public function fetchPosts()
    {
        $this->jsonList = json_decode(file_get_contents('messages.json'), true);

        return$this->jsonList;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        if (!isset($this->title)) {
            $this->title = "";
        } else {
            $this->title = (string)$this->title;
        }
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        if (!isset($this->date)) {
            $this->date = "";
        } else {
            $this->date;
        }
        return $this->date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        if (!isset($this->content)) {
            $this->content = "";
        } else {
            $this->content = (string)$this->content;
        }
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        if (!isset($this->authorName)) {
            $this->authorName = "";
        } else {
            $this->authorName = (string)$this->authorName;
        }
        return $this->authorName;
    }


}