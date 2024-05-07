<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
$conditionSearch = '';
if (!empty($filterAll['filter_date']) && !empty($filterAll['filter_date_end'])) {
    $dateFilter = $filterAll['filter_date'];
    $dateFilterEnd = $filterAll['filter_date_end'];

    // Chuyển đổi ngày nhập từ form thành định dạng Y-m-d
    $dateFilter = date("Y-m-d", strtotime($dateFilter));
    $dateFilterEnd = date("Y-m-d", strtotime($dateFilterEnd));

    // Thêm điều kiện lọc từ ngày đến ngày
    $conditionSearch .= " AND DATE(orders_date) BETWEEN '$dateFilter' AND '$dateFilterEnd'";
} elseif (!empty($filterAll['filter_date'])) {
    // Nếu chỉ có ngày bắt đầu được chọn
    $dateFilter = $filterAll['filter_date'];
    $dateFilter = date("Y-m-d", strtotime($dateFilter));
    $conditionSearch .= " AND DATE(orders_date) >= '$dateFilter'";
} elseif (!empty($filterAll['filter_date_end'])) {
    // Nếu chỉ có ngày kết thúc được chọn
    $dateFilterEnd = $filterAll['filter_date_end'];
    $dateFilterEnd = date("Y-m-d", strtotime($dateFilterEnd));
    $conditionSearch .= " AND DATE(orders_date) <= '$dateFilterEnd'";
}

$listOrders = getRaw("SELECT * FROM orders WHERE 1=1 $conditionSearch ORDER BY total_price DESC ");


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
               <h2 class="nav-item">Quan ly he thong</h2> 
            </div>
            <div class="col-2"></div>
        </div>
    </nav>
  </header>
  <section class="content">
        <div class="filter-order">
            <div class="container">
                <ul class="filter-down">
                    <li ><i  id="icon" class="fa-solid fa-filter" style="font-size: 30px;"></i></li>
                        <div class="filter-content " id="filter-content" >
                            <ul>
                            <form action="" method="post">
                                <li class="filter-date">Lọc theo thời gian giao hàng <i class="fa-solid fa-chevron-down"></i>
                                    <input type="text" name="filter_date" placeholder="Nhập thời gian bắt đầu">
                                </li >
                                <li class="filter-date">Lọc theo thời gian giao hàng <i class="fa-solid fa-chevron-down"></i>
                                    <input type="text" name="filter_date_end" placeholder="Nhập thời gian kết thúc">
                                </li >
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>

                            </ul>
                        </div>
                    </li>  
                </ul>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Date Buy</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $toltalPrice = 0;
                    if(!empty($listOrders)){
                        $count = 0;
                        foreach($listOrders as $item){
                            $count++;
                            if($count <= 5){
                                $userID = $item['user_id'];
                                $userName = oneRaw("SELECT * FROM users WHERE id= $userID");
                                $toltalPrice += $item['total_price'];
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $userName['first_name'].' '.$userName['last_name']; ?></td>
                    <td><?php echo $item['customer_address'].', P.'.$item['ward'].', Quận '.$item['district'].', '.$item['province']; ?></td>
                    <td><?php echo $item['orders_date']; ?></td>
                    <td><?php echo $item['total_price']; ?></td>
                    <td><?php echo $item['status']; ?></td>
                    <td><a href="?module=admin&action=order_detail&id=<?php echo $item['id']; ?>">Chi tiết đơn hàng</a></td>
                </tr>
                <?php
                            }
                        }
                    }
                ?>
                <h1>Total: <?php echo $toltalPrice; ?></h1>
            </tbody>    
        </table>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<script>
    const filterDown = document.querySelector('#icon');
    const filterContent = document.querySelector('#filter-content');
    let clicks = false;
    filterDown.addEventListener('click', ()=>{
        if(!clicks){
            filterContent.classList.add('on');
            clicks = true;
        }else{
            filterContent.classList.remove('on');
            clicks = false;
        }
    })
</script>
</html>
<?php
// echo '<pre>';
// print_r($filterAll);
// echo '</pre>';
// echo $conditionSearch;