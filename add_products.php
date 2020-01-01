<?php
$title = "Add Products";
include 'config/config.php';
include 'templates/header.php';
require_once 'classes/GetCategories.php';
$init = new GetCategories;
?>
<!-- Body Main Content -->
<div class="container">
    <h2>Add Products</h2>
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
                <form action="data_fetch.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="productname">Product Name</label>
                        <input type="text" class="form-control" id="productname" placeholder="Enter a Product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect2">Example multiple select</label>
                        <?php $init->all_category()->return;
                                
                        ?>
                        <select multiple class="form-control" id="exampleSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productdescription">Product description</label>
                        <textarea class="form-control" id="productdescription" rows="3" spellcheck="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Featured image</label>
                        <input type="file" class="form-control-file" id="featureimage" name="featured[]" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Upload the main image or feature image for the product.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Other image</label>
                        <input type="file" class="form-control-file" id="otherimage" name="others[]" aria-describedby="fileHelp" multiple>
                        <small id="fileHelp" class="form-text text-muted">Upload <span style="color: red">multiple images</span> for the product</small>
                    </div>
                    <button type="submit" class="btn btn-primary" id="addproduct-submit" name="addproducts-submit">Submit</button>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php
include 'templates/footer.php';
?>