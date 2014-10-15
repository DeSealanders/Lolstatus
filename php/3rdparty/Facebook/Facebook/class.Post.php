<?php

class Post {

    public function __construct($message, $link, $image = false) {
        $this->message = $message;
        $this->link = $link;
        $this->image = $image;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getLink() {
        return $this->link;
    }

    public function getImage() {
        return $this->image;
    }

} 