<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
if(!empty($filterAll['only_id'])){
    $only_id = $filterAll['only_id'];
    $orderDetail = getRaw("SELECT * FROM product_cart WHERE only_id = '$only_id'");
}
foreach($orderDetail as $item){
    $productID = $item['id_product'];
    $productDetail = oneRaw("SELECT * FROM products WHERE id='$productID'");
    echo $productDetail['ten_san_pham'].'<br>';
    echo $productDetail['gia_tien'].'<br>';
    echo '<img src="'.$productDetail['anh_san_pham'].'" alt="" id="image" width="200" height="200">';
}
?>