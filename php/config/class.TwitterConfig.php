<?php

class TwitterConfig {

    private $euwConfig;
    private $naConfig;

    private function __construct() {
        $this->euwConfig = array(
            'configId' => 'euw',
            'consumerKey' => 'xxxx',
            'consumerSecret' => 'xxxx',
            'accessToken' => 'xxxx',
            'accessTokenSecret' => 'xxxx',
            'screenName' => 'loleuwstatus'
        );
        $this->naConfig = array(
            'configId' => 'na',
            'consumerKey' => 'xxxx',
            'consumerSecret' => 'xxxx',
            'accessToken' => 'xxxx',
            'accessTokenSecret' => 'xxxx',
            'screenName' => 'lolnastatus'
        );
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new TwitterConfig();
        }
        return $instance;
    }

    public function getConfig($zone) {
        if($zone == 'euw') {
            return $this->getEuwConfig();
        }
        else if($zone = 'na') {
            return $this->getNaConfig();
        }
        else {
            Logger::getInstance()->log('Twitterconfig zone not found: ' . $zone);
        }
    }

    private function getEuwConfig() {
        return $this->euwConfig;
    }

    private function getNaConfig() {
        return $this->naConfig;
    }

} 