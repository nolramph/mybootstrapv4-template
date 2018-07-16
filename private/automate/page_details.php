<?php 

require '../initialize.php';

$page_info = array(
    array("title" => "HOME",
            "page_name" => "home",
            "page_url" => "/",
            "sub_page_name" => "",
            "sub_page_url" => ""
    ),

    array("title" => "ABOUT US",
    "page_name" => "about us",
    "page_url" => "/aboutus.php",
    "sub_page_name" => "",
    "sub_page_url" => ""
    ),

    array("title" => "PRODUCTS",
    "page_name" => "products",
    "page_url" => "/products.php",
    "sub_page_name" => "",
    "sub_page_url" => ""
    ),

    array("title" => "SERVICES",
    "page_name" => "services",
    "page_url" => "/services.php",
    "sub_page_name" => "",
    "sub_page_url" => ""
    ),

    array("title" => "PROJECTS",
    "page_name" => "projects",
    "page_url" => "/projects.php",
    "sub_page_name" => "",
    "sub_page_url" => ""
    ),

    array("title" => "CONTACT US",
    "page_name" => "contact us",
    "page_url" => "/contactus.php",
    "sub_page_name" => "",
    "sub_page_url" => ""
    ),

    array("title" => "HEALTH AND SAFETY",
    "page_name" => "health and safety",
    "page_url" => "/health-and-safety.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "CORPORATE PROFILE",
    "page_name" => "corporate profile",
    "page_url" => "/corporate-profile.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "CORPORATE GOVERNANCE",
    "page_name" => "corporate governance",
    "page_url" => "/corporate-governance.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "OUR PEOPLE",
    "page_name" => "our people",
    "page_url" => "/our-people.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "DIVERSITY AND INCLUSION",
    "page_name" => "diversity and inclusion",
    "page_url" => "/diversity-inclusion.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "ENVIRONMENT AND ENERGY",
    "page_name" => "environment and energy",
    "page_url" => "/environment-energy.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "CITIZENSHIP IN ACTION",
    "page_name" => "citizenship in action",
    "page_url" => "/citizenship-action.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
    
    array("title" => "PROJECT MANAGEMENT",
    "page_name" => "project management",
    "page_url" => "/project-management.php",
    "sub_page_name" => "about us",
    "sub_page_url" => "aboutus.php"
    ),
);

foreach ($page_info as $page_infos){
    echo $page_infos["title"] . "<br>";
    echo $page_infos["page_name"] . "<br>";
    echo $page_infos["page_url"] . "<br>";
    echo $page_infos["sub_page_name"] . "<br>";
    echo $page_infos["sub_page_url"] . "<br>";

    $sql = "INSERT INTO page_info ";
    $sql .= "(title, page_name, page_url, sub_page_name, sub_page_url) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page_infos["title"] . "',";
    $sql .= "'" . $page_infos["page_name"] . "',";
    $sql .= "'" . $page_infos["page_url"] . "',";
    $sql .= "'" . $page_infos["sub_page_name"] . "',";
    $sql .= "'" . $page_infos["sub_page_url"] . "'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db, $sql);

    if($result){

    }else{
        echo mysqli_error($db);
        db_close($db);
    }
}

echo "Data Successfully Saved!";

?>