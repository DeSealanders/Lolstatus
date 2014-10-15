<?php


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;


class FacebookManager {

    private $hasConfig;
    private $session;

    private function __construct() {
        $this->hacConfig = false;
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return TweetManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new FacebookManager();
        }
        return $instance;
    }

    public function loadConfig($config) {
        FacebookSession::setDefaultApplication(
            $config['appId'],
            $config['app_secret']
        );
        $this->session = new FacebookSession($config['access_token']);
        $this->hasConfig = true;

    }

    public function post($message, $link, $image = false) {
        if($this->hasConfig) {
            $post = new Post($message, $link, $image);
            if($this->session) {
                if(isLive()) {
                    try {
                        $request = (new FacebookRequest(
                            $this->session, 'POST', '/813062038724116/feed', array(
                                'message'       => $post->getMessage(),
                                'link'          => $post->getLink(),
                                'name'          => 'League of legends service status',
                                'caption'       => 'The official League of Legends status page',
                                'description'   => 'Live service status updates for every region containing information
                                about game, store, forums and website availability and maintenance'
                            )
                        ));
                        $executed = $request->execute();
                        $response = $executed->getGraphObject();
                        Logger::getInstance()->log('Posted with id: ' . $response->getProperty('id'));
                    } catch(FacebookRequestException $e) {
                        Logger::getInstance()->log('Error while facebook posting: ' . $e->getMessage());
                    }
                }
                else {
                    echo '<p>Not sending post: <strong>' . $post->getMessage() .'</strong></p>';
                }
            }
        }
        else {
            Throw new Exception('No facebook config loaded');
        }
    }

    /**
     * Returns wether or not a config has been set
     * @return mixed true if a config is set, false otherwise
     */
    public function hasConfig() {
        return $this->hasConfig;
    }

} 