<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}

$filterAll = filter();
if(!empty($filterAll['id'])){
    $productID = $filterAll['id'];
    $productDetail = getRows("SELECT * FROM products WHERE id = $productID");
    if($productDetail > 0){
        $deleteUser = delete('products', "id = $productID");
    }
}
redirect('?module=admin&action=manage_product');
