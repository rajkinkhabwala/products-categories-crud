<?php
    require 'Database.php';
    require 'FileUpload.php';
    class AddProducts {
        private $product_name;
        private $categories;
        private $productdescription;
        private $product_price;
        private $file_controller1;
        private $file_controller2;

        public function add($product_name, $categories, $productdescription, $product_price, $file_controller1, $file_controller2, $upload_path1, $upload_path2){
            $this->product_name = $product_name;
            $this->categories = $categories;
            $this->productdescription = $productdescription;
            $this->product_price = $product_price;
            $this->file_controller1 = $file_controller1;
            $this->file_controller2 = $file_controller2;
            $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
            $init_db = new Database;
            $init_fp = new FileUpload;
            $insertValuesSQL = '';

            if(!empty($product_name) && !empty($categories) && !empty($productdescription) && !empty($product_price)){
                $init_fp->fileupload($file_controller1, $upload_path1, $allowed_types);
                if(!empty($insertValuesSQL)){
                    $featuredvalue = trim($insertValuesSQL,',');
                }else{
                    header("Location:add_products.php?action=error");
                }
                $init_fp->fileupload($file_controller2, $upload_path2, $allowed_types);
                if(!empty($insertValuesSQL)){
                    $othervalue = trim($insertValuesSQL,',');
                }else{
                    header("Location:add_products.php?action=error");
                }
               
            }



        }
    }
?>