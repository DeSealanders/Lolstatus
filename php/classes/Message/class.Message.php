<?php

class Message {

    protected $zone;
    protected $author;
    protected $message;
    protected $link;

    public function __construct($update) {
        $this->zone = $update->getZone();
        $this->message = $update->getContent();
        $this->author = $update->getAuthor();
        $this->link = 'http://status.leagueoflegends.com' . '/#' . $this->zone;
    }

    /**
     * This method should be overriden by children
     */
    public function post() {

    }

} 