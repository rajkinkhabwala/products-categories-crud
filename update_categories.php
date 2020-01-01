<?php
$title = "Update Categories";
include 'templates/header.php';
?>
<!-- Body Main Content -->
<div class="container">
    <?php
    if(isset($_REQUEST["update"])){
        if(isset($_GET["update_id"])){
            $id = $_GET["update_id"];
            ?>
            <h2>Update Category ID: <?php echo $id; ?></h2>
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
                <form action="data_fetch.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="categoryname">Category Name</label>
                        <input type="text" class="form-control" id="newcategoryname" name="newcategoryname" placeholder="Enter a your Updated Category name" required>
                    </div>
                    <div class="form-group">
                        <label for="categorydescription">Category description</label>
                        <textarea class="form-control" id="newcategorydescription" name="newcategorydescription" rows="3" spellcheck="true" placeholder="Please enter your category description." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="updatecategory-submit" name="updatecategories-submit">Submit</button>
                </form>
            </fieldset>
            <?php
        }
    }else{
        header("Location:view_categories.php");
    }
    ?>
           
        </div>
    </div>
</div>
<?php
include 'templates/footer.php';
?>