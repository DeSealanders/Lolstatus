<?php

class TwitterMessage extends Message {

    public function __construct($update) {
        parent::__construct($update);
    }

    public function post() {

        // Load the config for the specified zone
        if(!$config = TwitterConfig::getInstance()->getConfig($this->zone)) {
            Logger::getInstance()->log('TwitterConfig - Unable to get details for zone:' . $this->zone);
        }
        else {
            TweetManager::getInstance()->loadConfig($config);

            // Build the tweet, then send it
            $message = $this->buildTweet();
            TweetManager::getInstance()->tweet($message['tweet'], $message['link']);
        }
    }

    private function buildTweet() {

        // Add an author if available
        if($this->author) {
            $tweet = $this->author . ' - ';
        }
        else {
            $tweet = '';
        }

        // Add the incident message
        $tweet .= $this->stripWhitespaces($this->message);

        // Return array with the tweet and the link attached to it
        return array(
            'tweet' => $tweet,
            'link' => $this->link
        );

    }

    private function stripWhitespaces($string) {
        return preg_replace('/[\s\t\n\r\s]+/', ' ', $string);
    }

} 