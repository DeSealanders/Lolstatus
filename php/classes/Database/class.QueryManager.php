<?php

class QueryManager {

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
            $instance = new QueryManager();
        }
        return $instance;
    }

    /*
     *
     * ---------------------- Examples ----------------------
     *
     *
     */

    public function saveEvent(Event $event) {
        $query = "INSERT INTO events (itemid, name, description, location, startDate, endDate, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = array(
            $event->getId(),
            $event->getName(),
            $event->getDescription(),
            $event->getLocation(),
            $event->getStart(),
            $event->getEnd(),
            $event->getUserid()
        );
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

    public function getEventIds() {
        $query = "SELECT itemid FROM events";
        return DatabaseManager::getInstance()->executeQuery($query);
    }

    /*
     *
     * ---------------------- Updates ----------------------
     *
     *
     */

    public function getUpdates() {
        $query = "SELECT * FROM updates";
        return DatabaseManager::getInstance()->executeQuery($query);
    }

    public function saveUpdates($updates) {
        $questionmarks = array();
        for($i = 0; $i < count($updates); $i++) {
            $questionmarks[] = '(?, ?, ?, ?, ?, ?, ?)';
        }
        $questionmarks = implode(',', $questionmarks);
        $query = "INSERT INTO updates (incident_id, update_id, zone, author, content, create_date, update_date) VALUES ";
        $query .= $questionmarks;

        $params = array();
        foreach($updates as $update) {
            array_push($params,
                $update->getIncidentId(),
                $update->getUpdateId(),
                $update->getZone(),
                $update->getAuthor(),
                $update->getContent(),
                $update->getCreateDate(),
                $update->getUpdateDate()
            );
        }
        //var_dump($params, $query);
        //die;
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

} 