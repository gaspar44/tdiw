<?php
class Message {
    private $contents;
    private $title;

    public function __construct($contents,$title)
    {
        $this->contents = $contents;
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContents() {
        return $this->contents;
    }
}

?>