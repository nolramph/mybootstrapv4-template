<?php 

    function hsc($string=""){
        return htmlspecialchars($string);
    }

    function uencode($string="") {
        return urlencode($string);
    }

    function rencode($string="") {
    return rawurlencode($string);
    }

    function rdecode($string=""){
        return rawurldecode($string);
    }

    function url_for($script_path) {
        // add the leading '/' if not present
        if($script_path[0] != '/') {
          $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
      }


?>