<?php

class UpdateManager {

    private function __construct() {

    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return UpdateManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new UpdateManager();
        }
        return $instance;
    }

    public function getUpdates($imports) {
        $updates = array();
        foreach($imports as $import) {
            if($import->getData()) {
                $updates = array_merge($updates, $this->createUpdates($import->getData()));
            }
        }
        return $this->getNewUpdates($updates);
    }

    private function createUpdates($data) {
        $zone = $data->slug;
        $updates = array();
        foreach($data->services as $service) {
            foreach($service->incidents as $incident) {
                $incidentId = $incident->id;
                foreach($incident->updates as $update) {
                        $updates[] = new Update($zone, $incidentId, $update);
                }
            }
        }
        return $updates;
    }

    private function getNewUpdates($newUpdates) {
        $oldUpdates = QueryManager::getInstance()->getUpdates();

        if($oldUpdates) {
            $addedUpdates = array();
            foreach($newUpdates as $newUpdate) {
                $duplicate = false;
                foreach($oldUpdates as $oldUpdate) {
                    if($oldUpdate['incident_id'] == $newUpdate->getIncidentId() &&
                        $oldUpdate['update_id'] == $newUpdate->getUpdateId()) {
                        $duplicate = true;
                        //var_dump($oldUpdate['incident_id'], $newUpdate->getIncidentId());
                        //var_dump($oldUpdate['update_id'], $newUpdate->getUpdateId());
                    }
                }
                if(!$duplicate) {
                    $addedUpdates[] = $newUpdate;
                }
            }
        }
        else {
            $addedUpdates = $newUpdates;
        }

        if(count($addedUpdates) > 0) {
            QueryManager::getInstance()->saveUpdates($addedUpdates);
        }
        return $addedUpdates;
    }


} 