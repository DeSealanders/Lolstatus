<?php

class MessageManager {

    private function __construct() {

    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new MessageManager();
        }
        return $instance;
    }

    public function post($messages) {
        if(count($messages) > 0) {
            foreach($messages as $message) {
                $message->post();
            }
        }
        else {
            Logger::getInstance()->log('General: No new messages to post');
        }
    }

    public function createMessages($updates) {
        $messages = array();
        if(count($updates) > 0) {
            foreach($updates as $update) {
                $messages[] = new TwitterMessage($update);
                $messages[] = new FacebookMessage($update);
            }
        }
        return $messages;
    }

    public function createFbMessages($updates) {
        $messages = array();
        if(count($updates) > 0) {
            foreach($updates as $update) {
                $messages[] = new FacebookMessage($update);
            }
        }
        return $messages;
    }

} 