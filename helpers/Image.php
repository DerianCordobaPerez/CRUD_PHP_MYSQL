<?php

class Image
{
    public static function isValid(): bool {
        $action = true;

        if(isset($_POST['submit'])) {
            $image = getimagesize($_FILES['photo']['tmp_name']);
            if(!$image) {
                $action = false;
            }
        }

        if(file_exists('pictures/'.basename($_FILES['photo']['name']))) {
            echo "Error, la iamgen ingresada ya existe";
            $action = false;
        }

        return $action;
    }
}