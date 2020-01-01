<?php
$title = "Delete Categories";
include 'config/config.php';
include 'templates/header.php';
require 'classes/DeleteCategories.php';
?>
<div class="container">
    <?php
    if (isset($_REQUEST['delete'])) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE * FROM categories WHERE id='$id'";
            $init = new DeleteCategories;
            if ($init->deleteindividual($id) == '0') {
    ?>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-danger mb-1" id="delete">
                            <div class="card-header">Error!</div>
                            <div class="card-body">
                                <h4 class="card-title">Might not present in the DB or you are not allowed to delete the categories.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-danger mb-1" id="delete">
                            <div class="card-header">Success!</div>
                            <div class="card-body">
                                <h4 class="card-title">You have deleted the item successfully.</h4>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    } else {
        header("Location:view_categories.php");
    }

    ?>

    <?php
    include 'templates/footer.php';
    ?>