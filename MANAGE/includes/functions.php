<?php

use function PHPSTORM_META\type;

if (!defined('_CODE')){
    die('ACCESS DENIED........');
}

function isGet(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        return true;
    }
    else{
        return false;
    }
}

function isPost(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        return true;
    }
    else{
        return false;
    }
}

function filter(){
    $filterArr = [];
    if(isGet()){
        if(!empty($_GET)){
            foreach ($_GET as $key => $value){
                $key = strip_tags($key);
                if(is_array($value)){
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                }
                else{
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    if(isPost()){
        if(!empty($_POST)){
            foreach ($_POST as $key => $value){
                $key = strip_tags($key);
                if(is_array($value)){
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                }
                else{
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
                
            }
        }
    }
    return $filterArr;
}

function getSmg($smg, $type =''){
    echo '<div class="alert alert-'.$type.' ">';
    echo $smg;
    echo '</div>';
}

function redirect($path = 'index.php'){
    header("Location: $path");
    exit;
}

function isLogin(){
    $checkLogin = false;
    if(getSession('tokenLogin')){
        $tokenLogin = getSession('tokenLogin');
    
        $queryToken = oneRaw("SELECT user_id FROM tokenlogin WHERE token = '$tokenLogin'");
        if(!empty($queryToken)){
            $checkLogin = true;
        }else{
            removeSession('tokenLogin');
        }
    }   
    return $checkLogin;
}

function isLoginAdmin(){
    $checkLogin = false;
    if(getSession('tokenLoginAdmin')){
        $tokenLoginAdmin = getSession('tokenLoginAdmin');
    
        $queryToken = oneRaw("SELECT admin_id FROM tokenloginadmin WHERE token = '$tokenLoginAdmin'");
        if(!empty($queryToken)){
            $checkLogin = true;
        }else{
            removeSession('tokenLoginAdmin');
        }
    }   
    return $checkLogin;
}

function old($fileName, $oldData, $default = null){
    return (!empty($oldData[$fileName])) ? $oldData[$fileName] : $default;
}
