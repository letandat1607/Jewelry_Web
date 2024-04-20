<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(isLoginAdmin()){
    $token = getSession('tokenLoginAdmin');
    delete('tokenloginadmin', "token='$token'");
    removeSession('tokenLoginAdmin');
    redirect('?module=admin&action=admin_login');
}