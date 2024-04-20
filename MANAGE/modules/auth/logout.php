<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}

if(isLogin()){
    $token = getSession('tokenLogin');
    delete('tokenlogin', "token = '$token'");
    removeSession('tokenLogin');
    redirect('?module=auth&action=login');
}