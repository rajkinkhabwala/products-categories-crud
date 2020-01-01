<?php
header("refresh:5; url=view_categories.php");
$title = "New Updated Category Added to the Database";
include 'config/config.php';
include 'templates/header.php';
require 'classes/GetCategories.php';
?>
<div class="container">
    <?php
    if (isset($_GET['update_id'])) {
        $id = $_GET['update_id'];
        ?>
        <h2>You just updated a Category - ID: <?php echo $id; ?></h2>
            <button type="button" class="btn btn-success btn-lg" onclick="window.location.href = 'add_categories.php';">Add more categories</button>
        <div class="row">
            <div class="col">
                <?php
                $init = new GetCategories;

                $init->individual($id);
                ?>
            </div>
        </div>
        <p>Redirecting to View All Categories Page in 5 Seconds...</p>
        <?php
        
    } ?>

</div>

<?php
include 'templates/footer.php';
?>