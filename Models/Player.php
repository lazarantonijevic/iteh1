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
    public function createPlayer()
    {
        $host = 'localhost';
        $user = 'korisnik';
        $password = 'sifra';
        $database = 'premierleague';
        $conn = mysqli_connect($host, $user, $password, $database);

        $query = "INSERT INTO player(teamid, name, nationality, position, birth)
        VALUES('$this->teamid', '$this->name', '$this->nationality', '$this->position',
            '$this->birth')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}