<?php

class Update {

    private $incidentId;
    private $zone;
    private $updateId;
    private $author;
    private $content;
    private $created_at;
    private $updated_at;

    public function __construct($zone, $incidentId, $update) {
        $this->zone = $zone;
        $this->incidentId = $incidentId;
        $this->updateId = $update->id;
        $this->author = $update->author;
        $this->content = $update->content;
        $this->created_at = date('Y-m-d H:i', strtotime($update->created_at));
        $this->updated_at = date('Y-m-d H:i', strtotime($update->updated_at));
    }

    public function getIncidentId() {
        return $this->incidentId;
    }

    public function getUpdateId() {
        return $this->updateId;
    }

    public function getZone() {
        return $this->zone;
    }

    public function getAuthor() {
        if(strlen($this->author) > 0) {
            return $this->author;
        }
        else {
            return false;
        }
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreateDate() {
        return $this->created_at;
    }

    public function getUpdateDate() {
        return $this->updated_at;
    }

} 