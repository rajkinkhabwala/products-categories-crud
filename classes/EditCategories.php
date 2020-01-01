<?php
    require 'Database.php';
    class EditCategories {
        public $NewCategoryName;
        public $NewCategoryDescription;

        public function edit($id,$NewCategoryName, $NewCategoryDescription){
            $init = new Database;
            $this->NewCategoryName = $NewCategoryName;
            $this->NewCategoryDescription = $NewCategoryDescription;

            $sql = "SELECT * FROM categories WHERE category_name = '$NewCategoryName'";
            $result = $init->conn->query($sql);
            if($result->num_rows > 0 ){
                header("Location:update_category.php?action=error");
            }else {
                $sql = "UPDATE categories SET category_name='$NewCategoryName', category_description ='$NewCategoryDescription' WHERE id = '$id'";
                if($init->conn->query($sql) == TRUE){
                    header("Location:new_update_category.php?update_id=$id");
                }else{
                    header("Location:update_category.php?action=error");
                }
            }
        }
    }
?>