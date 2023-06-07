<?php

include('db/db_connect.php');

$query = "SELECT * FROM player ORDER BY name ASC";
$result = mysqli_query($conn, $query);
$players = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($players as $player) : ?>
            <div class="col s12 m6 l4 xl3">
                <div class="card z-depth-0 card-zaobljeno">
                    <img src="img/icon.png" alt="pl" class="card-logo">
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

<?php include('templates/footer.php'); ?>

</html>