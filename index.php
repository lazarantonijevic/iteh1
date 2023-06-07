<?php

include('db/db_connect.php');

$query = "SELECT * FROM team ORDER BY name ASC";
$result = mysqli_query($conn, $query);
$teams = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//mysqli_close($conn); proveri da li treba

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>


<div class="row">
    <?php foreach ($teams as $team) : ?>
        <div class="col s12 m6 l4 xl3">
            <div class="card z-depth-0 card-zaobljeno">
                <img src="<?php echo $team['img']; ?>" alt="amblem" class="card-logo">
                <div class="card-content center">
                    <h5><?php echo htmlspecialchars($team['name']); ?></h5>
                </div>
                <div class="card-action right-align radius-card">
                    <a href="team.php?id=<?php echo $team['id']; ?>" class="blue-text text-darken-2">
                        More Info
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php include('templates/footer.php'); ?>

</html>