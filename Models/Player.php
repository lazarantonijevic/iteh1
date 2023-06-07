<?php

class Player
{
    public $id;
    public $teamid;
    public $name;
    public $nationality;
    public $position;
    public $birth;
    public $created_at;

    public function __construct(
        $id,
        $teamid,
        $name,
        $nationality,
        $position,
        $birth,
        $created_at
    ) {
        $this->id = $id;
        $this->teamid = $teamid;
        $this->name = $name;
        $this->nationality = $nationality;
        $this->position = $position;
        $this->birth = $birth;
        $this->created_at = $created_at;
    }
    
}