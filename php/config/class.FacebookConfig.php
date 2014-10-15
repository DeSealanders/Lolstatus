<?php

class FacebookConfig {

    private $config;

    private function __construct() {
        $this->config = array(
            'configId' => 'facebook',
            'appId' => 'xxxx',
            'app_secret' => 'xxxx',
            'access_token' => 'xxxx'
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
            $instance = new FacebookConfig();
        }
        return $instance;
    }

    public function getConfig() {
        return $this->config;
    }

} 