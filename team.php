<?php

include('db/db_connect.php');

if (isset($_GET['id'])) {
    $teamid = mysqli_real_escape_string($conn, $_GET['id']);
}

$query = "SELECT * FROM team WHERE id = $teamid";
$result = mysqli_query($conn, $query);
$team = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$query = "SELECT * FROM player WHERE teamid='$teamid'";
$result = mysqli_query($conn, $query);
$players = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($team == null) : ?>

    <h1>There is no team with that ID!</h1>
    <div class="center">
        <a href="index.php" class="btn center blue darken-2">Return</a>
    </div>

<?php else : ?>

    <h1 class="center"><?php echo $team['name']; ?></h1>
    <img class="team-logo" src="<?php echo $team['img']; ?>" alt="">
    <h5 class="center">Founded in <?php echo $team['founded']; ?></h5>
    <h5 class="center">Location: <?php echo $team['city']; ?></h5>
    <h5 class="center">Stadium: <?php echo $team['stadium']; ?></h5>
    <h5 class="center">Number of PL titles: <?php echo $team['titles']; ?></h5>
    <h5 class="center" style="padding-bottom: 100px;">Manager: <?php echo $team['manager']; ?></h5>

    <?php if ($players == null) { ?>

        <h6 class="center">No players in database! </h6>

    <?php } else {; ?>

        <div class="container">
            <h5 class="center">Players in database:</h5>
            <div class="row">
                <?php foreach ($players as $player) : ?>
                    <div class="col s12 m6 l4 xl3">
                        <div class="card z-depth-0 card-zaobljeno">
                            <img src="<?php echo $team['img']; ?>" alt="icon" class="card-logo">
                            <div class="card-content center">
                                <h5><?php echo htmlspecialchars($player['name']); ?></h5>
                            </div>
                            <div class="card-action right-align">
                                <a href="player.php?id=<?php echo $player['id']; ?>" class="blue-text text-darken-2">
                                    More Info
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php }; ?>

<?php endif; ?>


<?php include('templates/footer.php'); ?>

</html>