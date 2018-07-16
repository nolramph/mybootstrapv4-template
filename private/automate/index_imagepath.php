<?php 

require '../initialize.php';

$index_image_path = array(
    array("path_name" => "ARENCO - Sharjah",
          "path" => "images/projects-preview/01.png",
          "thumb_path" => "images/projects-preview/thumb-01.png",
          "type" => "projects-preview",
          "page" => "index"
    ),

    array("path_name" => "Bank Melli Iran",
    "path" => "images/projects-preview/02.png",
    "thumb_path" => "images/projects-preview/thumb-02.png",
    "type" => "projects-preview",
    "page" => "index"
    ),

    array("path_name" => "Force 10",
    "path" => "images/projects-preview/03.png",
    "thumb_path" => "images/projects-preview/thumb-03.png",
    "type" => "projects-preview",
    "page" => "index"
    ),

    array("path_name" => "G+7",
    "path" => "images/projects-preview/04.png",
    "thumb_path" => "images/projects-preview/thumb-04.png",
    "type" => "projects-preview",
    "page" => "index"
    ),

    array("path_name" => "KM Trading",
    "path" => "images/projects-preview/05.png",
    "thumb_path" => "images/projects-preview/thumb-05.png",
    "type" => "projects-preview",
    "page" => "index"
    ),

    array("path_name" => "Masar Printing",
    "path" => "images/projects-preview/06.png",
    "thumb_path" => "images/projects-preview/thumb-06.png",
    "type" => "projects-preview",
    "page" => "index"
    ),

    array("path_name" => "Shree Traders",
    "path" => "images/projects-preview/07.png",
    "thumb_path" => "images/projects-preview/thumb-07.png",
    "type" => "projects-preview",
    "page" => "index"
    )

);

foreach ($index_image_path as $images_path){

    $mod_path = strtolower($images_path['path']);
    $thumb_mod_path = strtolower($images_path['thumb_path']);

    // echo $images_path["path_name"] . "<br>";
    // echo $images_path["path"] . "<br>";
    // echo $thumb_mod_path . "<br>";
    // echo $images_path["type"] . "<br>";
    // echo $images_path["page"] . "<br>";
    
    
    $sql = "INSERT INTO imagepath ";
    $sql .= "(name, path, thumb_path, type, page) ";
    $sql .= "VALUES (";
    $sql .= "'" .$images_path["path_name"] . "',";
    $sql .= "'" . $mod_path . "',";
    $sql .= "'" . $thumb_mod_path . "',";
    $sql .= "'" . $images_path["type"] . "',";
    $sql .= "'" . $images_path["page"] . "'";
    $sql .= ")";
    // echo $sql;
    $result = mysqli_query($db, $sql);

    if($result){

    }else{
        echo mysqli_error($db);
        db_close($db);
    }
}

echo "Data Successfully Saved!";

?>