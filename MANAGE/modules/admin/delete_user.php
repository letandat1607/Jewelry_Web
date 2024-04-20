<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}

$filterAll = filter();
if(!empty($filterAll['id'])){
    $userID = $filterAll['id'];
    $userDetail = getRows("SELECT * FROM users WHERE id = $userID");
    if($userDetail > 0){
        $deleteToken = delete('tokenlogin', "user_id = $userID");
        if($deleteToken){
            $deleteUser = delete('users', "id = $userID");
        }
    }
}
redirect('?module=admin&action=list_user');