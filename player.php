<?php

include('db/db_connect.php');

if (isset($_GET['id'])) {
    $playerid = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM player WHERE id='$playerid'";
    $result = mysqli_query($conn, $query);
    $player = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $query = "SELECT * FROM team WHERE id={$player['teamid']}";
    $result = mysqli_query($conn, $query);
    $team = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

if (isset($_POST['delete'])) {
    $playerid = mysqli_real_escape_string($conn, $_POST['playerid']);
    $teamid = mysqli_real_escape_string($conn, $_POST['teamid']);

    $query = "DELETE FROM player WHERE id = $playerid AND teamid = $teamid";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($player == null) : ?>

    <h1 class="center">There is no such player in database!</h1>
    <div class="center">
        <a href="index.php" class="btn center blue darken-2">Return</a>
    </div>

<?php else : ?>

    <div class="container center">
        <div class="card z-depth-0 radius-card" style="padding-bottom: 30px;">
            <img src="<?php echo $team['img']; ?>" alt="icon" class="icon-card">
            <h3><?php echo $player['name']; ?></h3>
            <h4>Team: <?php echo $team['name']; ?></h4>
            <h5>Position: <?php echo $player['position']; ?></h5>
            <h5>Nationality: <?php echo $player['nationality']; ?></h5>
            <h5>Year of birth: <?php echo $player['birth']; ?></h5>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding-top:20px">
                <input type="hidden" name="playerid" value="<?php echo $playerid; ?>">
                <input type="hidden" name="teamid" value="<?php echo $team['id']; ?>">
                <input type="submit" name="delete" value="delete" class="btn center blue darken-2">
            </form>

        </div>
    </div>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

</html>