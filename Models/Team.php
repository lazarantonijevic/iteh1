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
function returnTeamId($team)
{
    switch ($team) {
        case 'Arsenal':
            return 1;
            break;
        case 'Manchester City':
            return 2;
            break;
        case 'Newcastle':
            return 3;
            break;
        case 'Tottenham':
            return 4;
            break;
        case 'Manchester United':
            return 5;
            break;
        case 'Liverpool':
            return 6;
            break;
        case 'Brighton':
            return 7;
            break;
        case 'Chelsea':
            return 8;
            break;
        case 'Fulham':
            return 9;
            break;
        case 'Brentford':
            return 10;
            break;
        case 'Crystal Palace':
            return 11;
            break;
        case 'Aston Villa':
            return 12;
            break;
        case 'Leicester City':
            return 13;
            break;
        case 'Bournemouth':
            return 14;
            break;
        case 'Leeds United':
            return 15;
            break;
        case 'West Ham':
            return 16;
            break;
        case 'Everton':
            return 17;
            break;
        case 'Nottingham Forest':
            return 18;
            break;
        case 'Southampton':
            return 19;
            break;
        case 'Wolverhampton':
            return 20;
            break;
    }
}
