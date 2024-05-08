<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
if(!empty($filterAll['id'])){
    $only_id = $filterAll['id'];
    $orderDetail = getRaw("SELECT * FROM product_cart WHERE id_order = '$only_id'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
  <link rel="stylesheet" href="templates/CSS/Sidebar.css">
  <link rel="stylesheet" href="templates/CSS/Admin.css">
  <link rel="stylesheet" href="templates/CSS/Admin Profile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
  <header style="margin-bottom: 120px;">
    <div class="sidebar-content fixed-top">
        <input type="checkbox" id="checkbox">
        <label for="checkbox">
            <i class="fas fa-bars" id="open"></i>
            <i class="fas fa-times" id="close"></i>
        </label>
        <div class="sidebar">
            <ul>
            <li>
                <a href="?module=admin&action=admin_profile"><ion-icon name="person-circle"></ion-icon> Account</a>
            </li>
            <li>
                <a href="?module=admin&action=manage_product"><ion-icon name="pie-chart"></ion-icon>  Manage</a>
            </li>
            <li>
                <a href="?module=admin&action=manage_business"><ion-icon name="bar-chart"></ion-icon> Business</a>
            </li>
            <li>
                <a href="?module=admin&action=admin_logout"><ion-icon name="log-out-outline"></ion-icon> Log out</a>
            </li>
            </ul>
        </div>
    </div>
    <nav class="navbar fixed-top">
        <div class="row container">
            <div class="col-4"></div>
            <div class="col-6">
               <h2 class="nav-item">Chi tiết đơn hàng</h2> 
            </div>
            <div class="col-2"></div>
        </div>
    </nav>
  </header>
  <?php
    foreach($orderDetail as $item){
        $productID = $item['id_product'];
        $productDetail = oneRaw("SELECT * FROM products WHERE id='$productID'");
        $totalPrice = $productDetail['gia_tien']*$item['so_luong'];
    ?>
  <section class="contentt">
    <div class="container khung">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8" style = "border: 1px solid hsl(0, 0%, 80%); ">
                <div class="container-fuild">
                    
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div><img  class="img-fluid" src="<?php echo $productDetail['anh_san_pham'] ?>"></div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-5" style="font-size: 15px; margin-top: 25px; ">
                        <p>Tên Sản Phẩm: <b><?php echo $productDetail['ten_san_pham']; ?></b></p>
                        <p class="ml-5"> Giá Tiền: <b><?php echo $totalPrice; ?></b></p>
                        <p class="ml-1"> Số Lượng: <b><?php echo $item['so_luong']; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
<?php
}
