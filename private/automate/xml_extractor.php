<?php 

require '../initialize.php';

global $db;

    $xml=simplexml_load_file("../../content.xml") or die("Error: Cannot create object");
    foreach ($xml->gallery AS $item) {
        echo "Folder: " . $item['Folder'] . "<br><br>";
        foreach($item->image AS $attrib){
        
        $mod_type_name = str_replace(' ', '_', strtolower($item['Name']));
        echo "Name: " . $attrib['Caption'] . "<br>";
        echo "Path: images/" . $mod_type_name ."/". $attrib['Large'] . "<br>";
        echo "Type: " . $mod_type_name . "<br>";
        echo "Page:  Projects <br>";
        if($mod_type_name != "all_photo's"){
            $mod_type_name = str_replace(' ', '_', strtolower($item['Name']));
            $sql = "INSERT INTO imagepath ";
            $sql .= "(name, path, thumb_path, type, page) ";
            $sql .= "VALUES (";
            $sql .= "'" . $attrib['Caption'] . "',";
            $sql .= "'images/projects/" .$mod_type_name."/". $attrib['Large'] . "',";
            $sql .= "'images/projects/" .$mod_type_name."/Compressed/". $attrib['Large'] . "',";
            $sql .= "'" . $mod_type_name . "',";
            $sql .= "'projects'";
            $sql .= ")";
            echo $sql;
            $result = mysqli_query($db, $sql);

            if($result){

            }else{
                echo mysqli_error($db);
                db_close($db);
            }
        }
    }
       
    }
    echo "Data Successfully Saved!";
?>