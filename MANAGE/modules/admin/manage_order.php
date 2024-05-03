<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
if(!empty($filterAll['id'])){
    $orderID = $filterAll['id'];
    $orderInfo = oneRaw("SELECT * FROM orders WHERE id = $orderID");
    if(!empty($orderInfo)){
        setFlashData('order_info', $orderInfo);
    }
}
setFlashData('old', $filterAll);
$listOrders = getRaw("SELECT * FROM orders");
if(isPost()){
    $filterAll = filter();
    $dataUpdate = [
        'status' => $filterAll['status']
    ];
    $condition = "id= $orderID";
    $updateStatus = update('orders', $dataUpdate, $condition);
    if($updateStatus){
        redirect('?module=admin&action=manage_order&id='.$orderID.'');
    }
}
$old = getFlashData('old');
$orderInfoOld = getFlashData('order_info');
if(!empty($orderInfo)){
    $old = $orderInfoOld;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Order</title>
  <link rel="stylesheet" href="templates/CSS/Sidebar.css?v= <?php echo time(); ?>">
  <link rel="stylesheet" href="templates/CSS/Admin.css?v= <?php echo time(); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="templates/CSS/Manage Order.css?v= <?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="sidebar-content fixed-top">
        <input type="checkbox" id="checkbox">
        <label for="checkbox">
            <i class="fas fa-bars" id="open"></i>
            <i class="fas fa-times" id="close"></i>
        </label>
        <div class="sidebar">
            <ul>
            <li>
                <a href="Admin Profile.html"><ion-icon name="person-circle"></ion-icon> Account</a>
            </li>
            <li>
                <a href="Manage Product.html"><ion-icon name="pie-chart"></ion-icon>  Manage</a>
            </li>
            <li>
                <a href="Revenue Statistics.html"><ion-icon name="bar-chart"></ion-icon> Business</a>
            </li>
            <li>
                <a href="đăng nhập.html"><ion-icon name="log-out-outline"></ion-icon> Log out</a>
            </li>
            </ul>
        </div>
  </div>
    <nav class="navbar fixed-top">
        <div class="row container">
            <div class="col-4"></div>
            <div class="col-6">
               <h2 class="nav-item">Quan ly he thong</h2> 
            </div>
            <div class="col-2"></div>
        </div>
    </nav>
  </header>
  <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-4 product-content">
                <a href="Manage Product.html">Quản lý sản phẩm</a>
            </div>
            <div class="col-4 customer-content">
                <a href="Manage Customer.html">Quản lý khách hàng</a>
            </div>
            <div class="col-4 order-content">
                <a href="Manage Order.html">Quản lý đơn hàng</a>
            </div>
        </div>
        <form method="post">
            <div class="form">
                <?php  
                    if(!empty($orderInfo)){
                        $userID = $orderInfo['user_id'];
                        $userName = oneRaw("SELECT * FROM users WHERE id= $userID");
                ?>
                <div class="mt-3">
                    <p>Khách hàng: <b><?php echo $userName['first_name'].' '.$userName['last_name']; ?></b></p>
                    <p>Địa chỉ: <b><?php echo $orderInfo['customer_address'].', P.'.$orderInfo['ward'].', Quận '.$orderInfo['district'].', '.$orderInfo['province'];?> </b></p>
                    <p>Ngày mua: <b><?php echo $orderInfo['orders_date']; ?></b></p>
                    <p>Tổng tiền: <b><?php echo $orderInfo['total_price']; ?></b></p>

                </div>
                <div class="form-group mt-2">
                    <label for="">Status: </label>
                    <select name="status" id="" class="form-input">
                        <option value="da xac nhan" <?php echo (old('status', $old) == 'da xac nhan' ) ? 'selected'  : false; ?>>Đã xác nhận</option>
                        <option value="chua xac nhan" <?php echo (old('status', $old) == 'chua xac nhan') ?  'selected' : false; ?>>Chưa xác nhận</option>    
                        <option value="da giao thanh cong" <?php echo (old('status', $old) == 'da giao thanh cong') ?  'selected' : false; ?>>Đã giao thành công</option>    
                    </select>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?php echo $orderID ?>"> 
                    <button id="update"  style="display: block;" >Update</button>
                    <a href="?module=admin&action=manage_order" class="btn btn-dark btn-sm mt-2"><i class="fa-solid fa-rotate-right"></i></a>
                </div>
                <?php
                    }
                ?>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Date Buy</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="5%">Edit</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($listOrders)){
                        $count = 0;
                        foreach($listOrders as $item){
                            $count++;
                            $userID = $item['user_id'];
                            $userName = oneRaw("SELECT * FROM users WHERE id= $userID");
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $userName['first_name'].' '.$userName['last_name']; ?></td>
                    <td><?php echo $item['customer_address'].', P.'.$item['ward'].', Quận '.$item['district'].', '.$item['province']; ?></td>
                    <td><?php echo $item['orders_date']; ?></td>
                    <td><?php echo $item['total_price']; ?></td>
                    <td><?php echo $item['status']; ?></td>
                    <td><a href="?module=admin&action=manage_order&id=<?php echo $item['id']; ?>" id="edit" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td>Chi tiết</td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>