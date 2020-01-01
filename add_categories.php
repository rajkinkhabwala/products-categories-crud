<?php
$title = "Categories";
include 'templates/header.php';
?>
<!-- Body Main Content -->
<div class="container">
    <h2>Add categories</h2>
    <div class="row">
        <div class="col">
            <?php
            if (isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case 'error':
            ?>
                        <div class="alert alert-dismissible alert-danger" id="error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh snap check the values!</strong> try submitting again.
                        </div>
                    <?php
                        break;
                    case 'success':
                    ?>
                        <div class="alert alert-dismissible alert-success" id="success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh Great!</strong> you data has been successfully added.
                        </div>
            <?php
                }
            }
            ?>
            <fieldset>
                <form action="data_fetch.php" method="post">
                    <div class="form-group">
                        <label for="categoryname">Category Name</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="Enter a Category name">
                    </div>
                    <div class="form-group">
                        <label for="categorydescription">Category description</label>
                        <textarea class="form-control" id="categorydescription" name="categorydescription" rows="3" spellcheck="true" placeholder="Please enter your category description."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="addcategories-submit" name="addcategories-submit">Submit</button>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php
include 'templates/footer.php';
?>