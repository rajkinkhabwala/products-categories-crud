<?php
$title = "Categories";
include 'config/config.php';
include 'templates/header.php';
?>
<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>
        <h2>You just added a new Category - ID: <?php echo $id; ?></h2>
        <button type="button" class="btn btn-success btn-lg" onclick="window.location.href = 'add_categories.php';">Add more categories</button>
        <button type="button" class="btn btn-info btn-lg" onclick="window.location.href = 'view_categories.php';">View all category</button>
        <div class="row">
            <div class="col">
                <?php
                $init = new GetCategories;

                $init->individual($id);
                ?>
            </div>
        </div>
    <?php
    } else {

    ?>
        <h2>Categories - ALL</h2>
        <button type="button" class="btn btn-success btn-lg" onclick="window.location.href = 'add_categories.php';">Add Category</button>
        <div class="row">
            <div class="col">
                <?php
                $init = new GetCategories;

                $init->all();
                ?>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<?php
include 'templates/footer.php';
?>