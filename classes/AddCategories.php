<?php
    require 'Database.php';
class AddCategories {
    private $CategoryName;
    private $CategoryDescription;

    public function add($CategoryName, $CategoryDescription){
        $this->CategoryName = $CategoryName;
        $this->CategoryDescription = $CategoryDescription;
        // Database Connection
        $init = new Database;

        $sql = "SELECT * FROM categories WHERE category_name = '$CategoryName'";
        $result = $init->conn->query($sql);
        if($result->num_rows > 0){
            header("Location:add_categories.php?action=error");
        }else {
            $sql = "INSERT INTO categories(category_name, category_description) VALUES('$CategoryName','$CategoryDescription')";
            
            if($init->conn->query($sql) == TRUE){
                $last_id = $init->conn->insert_id;
                header("Location:view_categories.php?id=$last_id");
            }else{
                header("Location:add_categories.php?action=error");
            }
        }
    }
}
