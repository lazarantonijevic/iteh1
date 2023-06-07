<?php

class Team
{
    public $id;
    public $name;
    public $manager;
    public $city;
    public $titles;
    public $founded;
    public $stadium;

    public function __construct(
        $id,
        $name,
        $manager,
        $city,
        $titles,
        $founded,
        $stadium
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->manager = $manager;
        $this->city = $city;
        $this->titles = $titles;
        $this->founded = $founded;
        $this->stadium = $stadium;
    }
}
