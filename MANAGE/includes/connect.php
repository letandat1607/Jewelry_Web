<?php
const _HOST = 'localhost';
const _DB = 'jewelry';
const _USER = 'root';
const _PASS = '';

try{
    if(class_exists('PDO')){
        $dsn = 'mysql:dbname='._DB.';host='._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME utf8', //set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Tạo thông báo ra ngoại lệ khi gặp lỗi
        ];
        $conn = new PDO($dsn, _USER, _PASS);
    }

}catch(Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'loi';
    die();
}