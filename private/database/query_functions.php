<?php 

function find_all_image_path($page){

    global $db;

    $sql = "SELECT * FROM imagepath ";
    $sql .= "WHERE page ='" . $page ."'"; 
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function init_page_details($page_url){

    global $db;

    $sql = "SELECT * FROM page_info ";
    $sql .= "WHERE page_url = '" . $page_url . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;

}


?>