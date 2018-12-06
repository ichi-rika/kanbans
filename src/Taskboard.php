<?php

/**
 * @Entity @Table(name="boards")
 **/
class Taskboard
{
    /**
     * @Id
     * @Column(type="uuid")
     * @GeneratedValue(strategy="UUID")
     **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $createdOn;

    /** @Column(type="datetime") **/
    protected $updatedOn;

    /** @Column(type="string") **/
    protected $boardName;

    public function getId() {
        return $this->id;
    }

    public function getCreatedOn() {
        return $this->createdOn;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    public function setUpdatedOn() {
        $this->updatedOn = new DateTime("now");
    }

    public function getBoardName() {
        return $this->boardName;
    }

    public function setBoardName($boardName) {
        $this->boardName = $boardName;
    }
}
