<?php
require 'Database.php';
class GetCategories
{
    public $id = array();
    public $categoryname = array();
    public $categorydescription = array();
    public $html;

    public function all()
    {
        $init = new Database;
        $sql = "SELECT * FROM categories";
        // Result
        $result = $init->conn->query($sql);
        if ($result->num_rows > 0) {
?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th scope="col">id</th>
                        <th scope="col">Category name</th>
                        <th scope="col">Category description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <form action="update_categories.php?update_id=<?php echo $row['id'] ?>" method="post">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                </form>
                                <form action="delete_categories.php?id=<?php echo $row['id'] ?>" method="post">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["category_name"] ?></td>
                            <td><?php echo $row["category_description"] ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            <?php
        } else {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Category name</th>
                            <th scope="col">Category description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">no result</th>
                            <td>no result</td>
                            <td>no result</td>
                        </tr>
                    </tbody>
                    <?php
                }
            }


            public function individual($id)
            {

                $init = new Database;

                $sql = "SELECT * FROM categories WHERE id = '$id'";
                $result = $init->conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="jumbotron">
                            <h3 class="display-3"><?php echo $row["category_name"] ?></h3>
                            <p>Category Description : <?php echo $row["category_description"]; ?></p>
                            <p class="lead">
                                <span class="badge badge-primary">id : <?php echo $row["id"] ?></span>
                                <span class="badge badge-primary"><?php if (isset($_GET['update_id'])) { ?>Category updated : <?php echo $row["category_updated"] ?><?php } else { ?>Category created : <?php echo $row["category_created"] ?><?php } ?></span>
                            </p>
                        </div>
        <?php
                    }
                }
            }

            // This is the function i wanted to return 
            public function all_category()
            {
                $init = new Database;
                $sql = "SELECT * FROM categories";
                // Result
                $result = array();
                $result = $init->conn->query($sql);
                return $result;
            }
        }
        ?>