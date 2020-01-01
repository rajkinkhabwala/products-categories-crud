<?php
    // Add the config file
    include 'config/config.php';
    // Adding Categories Using the Add Category Class

    if(isset($_POST['addcategories-submit'])){
        require 'classes/AddCategories.php';

        $CategoryName = $_POST['categoryname'];
        $CategoryDescription = $_POST['categorydescription'];

        $init = new AddCategories;

        $init->add($CategoryName, $CategoryDescription);
    }
    if(isset($_REQUEST['updatecategories-submit'])){
        require "classes/EditCategories.php";
        $id = $_REQUEST['id'];
        $NewCategoryName = $_REQUEST['newcategoryname'];
        $NewCategoryDescription = $_REQUEST['newcategorydescription'];

        $init = new EditCategories;

        $init->edit($id, $NewCategoryName, $NewCategoryDescription);
    }

    if(isset($_POST['addproducts-submit'])){
        
    }