<?php
class FileUpload
{
    public function fileupload($file_controller, $upload_dir, $allowed_types)
    {
        if (!empty(array_filter($_FILES[$file_controller]['name']))) {
            foreach ($_FILES[$file_controller]['name'] as $key => $value) {
                $file_tmp_name = $_FILES[$file_controller]['tmp_name'][$key];
                $file_name = $_FILES[$file_controller]['name'][$key];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $insertValuesSQL = '';

                // Set upload file path 
                $filepath = $upload_dir . $file_name;

                // Check file type is allowed or not 
                if (in_array(strtolower($file_ext), $allowed_types)) {

                    // If file with name already exist then append time in 
                    // front of name of the file to avoid overwriting of file 
                    if (file_exists($filepath)) {
                        $filepath = $upload_dir . time() . $file_name;

                        if (move_uploaded_file($file_tmp_name, $filepath)) {
                            //echo "{$file_name} successfully uploaded <br />";
                            // Image db insert sql
                            $insertValuesSQL .= "'".$file_name."' ,";
                        } else {
                            header("Location:add_products.php?action=error");
                        }
                    } else {

                        if (move_uploaded_file($file_tmp_name, $filepath)) {
                            $insertValuesSQL .= "'".$file_name."',";
                            echo $insertValuesSQL;
                            //echo "{$file_name} successfully uploaded <br />";
                        } else {
                            header("Location:add_products.php?action=error");
                        }
                    }
                } else {

                    // If file extention not valid 
                    header("Location:add_products.php?action=error");
                }
            }
        } else {

            // If no files selected 
            header("Location:add_products.php?action=error");
        }
    }
}
