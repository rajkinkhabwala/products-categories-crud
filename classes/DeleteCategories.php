<?php
    require 'Database.php';

    class DeleteCategories {
        public function deleteindividual($id){
            $init = new Database;

            $sql = "DELETE FROM categories WHERE id = '$id'";
            if($init->conn->query($sql) == TRUE){

            }else {
                echo '0';
            }
        }

        public function delete(){
            $init = new Database;

            $sql = "DELETE FROM categories";
            if($init->conn->query($sql) == TRUE){
                header("Location:add_categories.php");
            }
        }
    }
?>