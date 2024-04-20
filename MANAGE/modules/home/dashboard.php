<h1>Home here</h1>
<?php


if(!isLogin()){
    redirect('?module=auth&action=login');
}
?>