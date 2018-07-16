<?php 

 require_once('../initialize.php'); 

 global $db;

if($_SERVER['REQUEST_METHOD'] == 'GET' || ){

    $type = $_GET['path_type'];

    if(isset($type) && !empty($type)){
        if($type == "all"){
            $sql = "SELECT * FROM imagepath WHERE type != 'projects-preview'";
        }else{
            $sql = "SELECT * FROM imagepath WHERE type = '" . $type . "'";
        }
        $result = mysqli_query($db, $sql);
        $index = 1;
        $final_result = array();
        while($result_set = mysqli_fetch_assoc($result)){
            
            $result_set['id'];
            $final_result[$index]['name'] = rdecode($result_set['name']);
            $final_result[$index]['path'] = rdecode($result_set['path']);
            $final_result[$index]['thumb_path'] = rdecode($result_set['thumb_path']);
            $final_result[$index]['type'] = $result_set['type'];
            $final_result[$index]['page'] = $result_set['page'];
            $index ++;
        }
    
        confirm_result_set($result);
    
        mysqli_free_result($result);
    
        db_close($db);
    
         echo json_encode(array("result" =>  $final_result));
    
        return true;
    }else{
        header('Location: http://www.profilesrhf.com/');
    }
}else{
    header('Location: http://www.profilesrhf.com/');
}


 mysqli_free_result($image_path_sets);


?>