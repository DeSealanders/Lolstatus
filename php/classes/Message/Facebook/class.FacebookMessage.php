<?php

class FacebookMessage extends Message {

    public function __construct($update) {
        parent::__construct($update);
    }

    public function post() {

        // Load the config for the specified zone
        if(!$config = FacebookConfig::getInstance()->getConfig()) {
            Logger::getInstance()->log('FacebookConfig - Unable to get config');
        }
        else {
            FacebookManager::getInstance()->loadConfig($config);

            // Build the post, then send it
            $message = $this->buildPost();
            FacebookManager::getInstance()->post($message['post'], $message['link'], $message['image']);
        }
    }

    private function buildPost() {
        $post = ucfirst($this->zone) . ' - ';

        // Add an author if available
        if($this->author) {
            $post .= $this->author . ' - ';
        }
        else {
            $post .= '';
        }

        // Add the incident message
        $post .= $this->message;

        $image = false;

        return array(
            'post' => $post,
            'link' => $this->link,
            'image' => $image
        );

    }



} 