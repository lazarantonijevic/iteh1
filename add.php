<?php

include('db/db_connect.php');
include('models/Player.php');
include('models/Team.php');

$name = $team = $nationality = $position = $birth = '';

$errors = [
    'name' => '', 'team' => '', 'nationality' => '',
    'position' => '', 'birth' => ''
];

if (isset($_POST['add'])) {

    if (empty($_POST['name'])) {
        $errors['name'] = 'Player name is required!';
    } else {
        $name = $_POST['name'];
    }

    include('ajax/teams.php');
    if (empty($_POST['team'])) {
        $errors['team'] = 'Team is required!';
    } else {
        $team = $_POST['team'];
        if (!in_array($team, $teams)) {
            $errors['team'] = 'No such team exists!';
            $team = '';
        }
    }

    include('ajax/countries.php');
    if (empty($_POST['nationality'])) {
        $errors['nationality'] = 'Nationality is required!';
    } else {
        $nationality = $_POST['nationality'];
        if (!in_array($nationality, $countries)) {
            $errors['nationality'] = 'No such country exists!';
            $nationality = '';
        }
    }

    if (empty($_POST['position'])) {
        $errors['position'] = 'Player position is required!';
    } else {
        $position = $_POST['position'];
    }


    if (empty($_POST['birth'])) {
        $errors['birth'] = 'Birth year is required!';
    } else {
        $yearStr = $_POST['birth'];
        if (strlen($yearStr) != 4 || intval($yearStr) == 1) {
            $errors['birth'] = 'Wrong input for year!';
        } else {
            $year = intval($yearStr);
            if ($year < 1900 || $year > date("Y")) {
                $errors['birth'] = 'Wrong input for year!';
            }
        }
    }

    if (!array_filter($errors)) {
        $teamid = returnTeamId($_POST['team']);
        $name = $_POST['name'];
        $nationality = $_POST['nationality'];
        $position = $_POST['position'];
        $birth = $_POST['birth'];


        $newPlayer = new Player(
            null,
            $teamid,
            $name,
            $nationality,
            $position,
            $birth,
            null
        );
        $newPlayer->createPlayer();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container">
    <h4 class="center">Insert player</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="name">Player name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>

        <label for="team">Team:</label>
        <input type="text" name="team" value="<?php echo htmlspecialchars($team) ?>" onkeyup="suggestTeam(this.value)">
        <div class="red-text"><?php echo $errors['team']; ?></div>
        <p><span id="teamSuggest"></span></p>

        <label for="nationality">Nationality:</label>
        <input type="text" name="nationality" value="<?php echo htmlspecialchars($nationality) ?>" onkeyup="suggestNationality(this.value)">
        <div class="red-text"><?php echo $errors['nationality']; ?></div>
        <p><span id="nationalitySuggest"></span></p>

        <label for="position">Position:</label>
        <input type="text" name="position" value="<?php echo htmlspecialchars($position) ?>" onkeyup="suggestPosition(this.value)">
        <div class="red-text"><?php echo $errors['position']; ?></div>
        <p><span id="positionSuggest"></span></p>

        <label for="birth">Year of birth:</label>
        <input type="text" name="birth" value="<?php echo htmlspecialchars($birth) ?>">
        <div class="red-text"><?php echo $errors['birth']; ?></div>

        <div class="center">
            <input type="submit" name="add" value="Insert a player" class="btn blue darken-2 z-depth-0">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>

<script>
    function suggestTeam(str = "") {
        if (str.length == 0) {
            document.getElementById("teamSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("teamSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/teams.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestNationality(str = "") {
        if (str.length == 0) {
            document.getElementById("nationalitySuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nationalitySuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/countries.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestPosition(str = "") {
        if (str.length == 0) {
            document.getElementById("positionSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("positionSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/positions.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

</html>