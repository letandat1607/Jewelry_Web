<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
if(!empty($filterAll['id'])){
    $productID = $filterAll['id'];

    $productDetail = oneRaw("SELECT * FROM products WHERE id = $productID");
    if(!empty($productDetail)){
        setFlashData('product_detail', $productDetail);
    }
}

$item_page = 10;
$local_page = !empty($filterAll['page'])?$filterAll['page']:1;
$offset = ($local_page - 1) * $item_page;
$totalItems = getRows("SELECT id FROM products");
$totalPages = ceil($totalItems / $item_page);

$listProducts = getRaw("SELECT * FROM products LIMIT ".$item_page." OFFSET ".$offset."");
if(isPost()){
    $filterAll = filter();
    $errors = [];
    if(empty($filterAll['ten_san_pham'])){
        $errors ['ten_san_pham']['required'] = 'Bắt buộc phải nhập'; 
    }

    if(empty($filterAll['gia_tien'])){
        $errors ['gia_tien']['required'] = 'Bắt buộc phải nhập'; 
    }

    if(empty($filterAll['anh_san_pham'])){
        $errors ['anh_san_pham']['required'] = 'Bắt buộc phải nhập'; 
    }
    if(empty($filterAll['phan_loai'])){
        $errors ['phan_loai']['required'] = 'Bắt buộc phải nhập'; 
    }
    // if(empty($filterAll['so_luong'])){
    //     $errors ['so_luong']['required'] = 'Bắt buộc phải nhập'; 
    // }
    if(empty($errors)){
        $dataInsert = [
            'ten_san_pham' => $filterAll['ten_san_pham'],
            'gia_tien' => $filterAll['gia_tien'],
            'anh_san_pham' => $filterAll['anh_san_pham'],
            'phan_loai' => $filterAll['phan_loai'],
            'so_luong' => $filterAll['so_luong']
        ];
        $dataUpdate = [
            'ten_san_pham' => $filterAll['ten_san_pham'],
            'gia_tien' => $filterAll['gia_tien'],
            'anh_san_pham' => $filterAll['anh_san_pham'],
            'phan_loai' => $filterAll['phan_loai'],
            'so_luong' => $filterAll['so_luong']
        ];
        $condition = "id = $productID";
        $updateStatus = update('products', $dataUpdate, $condition);
        if($updateStatus){
            redirect('?module=admin&action=manage_product&id='.$productID.'');
        }else{
            $insertStatus = insert('products', $dataInsert);
            if($insertStatus){
                redirect('?module=admin&action=manage_product');
            }
        }
        
    }else{
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        redirect('?module=admin&action=manage_product');
    }
    
}

$errors = getFlashData('errors');
$old = getFlashData('old');
$productInfo = getFlashData('product_detail');
if(!empty($productInfo)){
    $old = $productInfo;   
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Product</title>
  <link rel="stylesheet" href="templates/CSS/Sidebar.css?v= <?php echo time(); ?>">
  <link rel="stylesheet" href="templates/CSS/Admin.css?v= <?php echo time(); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="templates/CSS/Manage Product.css?v= <?php echo time(); ?>">
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
                <a href="Revenue Statistics.html"><ion-icon name="bar-chart"></ion-icon> Business</a>
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
    <div class="container">
        <div class="row">
            <div class="col-4 product-content">
                <a href="#">Quản lý sản phẩm</a>
            </div>
            <div class="col-4 customer-content">
                <a href="?module=admin&action=list_user">Quản lý khách hàng</a>
            </div>
            <div class="col-4 order-content">
                <a href="Manage Order.html">Quản lý đơn hàng</a>
            </div>
        </div>
        <div class="content-manage">
            <form action="" method="post">
                <div class="form">
                    <div class="form-group">
                        <label for="name_product">Product: </label>
                        <input type="text" id="name_product" class="form-input" name="ten_san_pham"
                        value="<?php echo old('ten_san_pham', $old); ?>">
                        <?php
                            echo (!empty($errors['ten_san_pham']['required'])) ? '<span class="error-message">' . $errors['ten_san_pham']['required'] . '</span>' : null;
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="money">Price: </label>
                        <input type="text" id="money" class="form-input" name="gia_tien"
                        value="<?php echo old('gia_tien', $old); ?>">
                        <?php
                            echo (!empty($errors['gia_tien']['required'])) ? '<span class="error-message">' . $errors['gia_tien']['required'] . '</span>' : null;
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Image: </label>
                        <input type="text" class="img-input form-input" name="anh_san_pham"
                        value="<?php echo old('anh_san_pham', $old); ?>">
                        <img src="<?php echo old('anh_san_pham', $old); ?>" alt="" id="image" width="200" height="200">
                        <?php
                            echo (!empty($errors['anh_san_pham']['required'])) ? '<span class="error-message">' . $errors['anh_san_pham']['required'] . '</span>' : null;
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="">Amount: </label>
                        <input type="number" class="form-input" name="so_luong"
                        value="<?php echo old('so_luong', $old); ?>">
                        <?php
                            echo (!empty($errors['so_luong']['required'])) ? '<span class="error-message">' . $errors['so_luong']['required'] . '</span>' : null;
                        ?> 
                    </div>
                    <div class="form-group">
                        <label for="">Phân loại: </label>
                        <select name="phan_loai" class="form-input">
                            <option value="none" <?php echo (old('phan_loai', $old) === 'none') ? 'selected'  : false; ?>>---None---</option>
                            <option value="lac tay" <?php echo (old('phan_loai', $old) === 'lac tay') ? 'selected'  : false; ?>>Lắc tay</option>
                            <option value="nhan" <?php echo (old('phan_loai', $old) === 'nhan') ? 'selected'  : false; ?>>Nhẫn</option>
                            <option value="vong co" <?php echo (old('phan_loai', $old) == 'vong co') ? 'selected'  : false; ?>>Vòng cỗ</option>
                            <option value="bong tai" <?php echo (old('phan_loai', $old) == 'bong tai') ? 'selected'  : false; ?>>Bông tai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="save" onclick="add()">Submit</button>
                        <input type="hidden" name="id" value="<?php echo $productID ?>"> 
                        <button id="update" >Update</button>
                        <a href="?module=admin&action=manage_product" class="btn btn-dark btn-sm"><i class="fa-solid fa-rotate-right"></i></a>
                    </div>
                </div>
            </form>

            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Phân loại</th>
                        <th>Amount</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            if(!empty($listProducts)):
                                $count = 0;
                                foreach($listProducts as $item):
                                    $count++;
                        ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item['ten_san_pham']; ?></td>
                            <td><?php echo $item['gia_tien']; ?></td>
                            <td><?php echo $item['anh_san_pham']; ?></td>
                            <td><?php echo $item['phan_loai']; ?></td>
                            <td><?php echo $item['so_luong']; ?></td>
                            <td><a href="?module=admin&action=manage_product&id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="?module=admin&action=delete_product&id=<?php echo $item['id']; ?>"  class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php
                                endforeach;
                            endif;
                        ?>
                </tbody>
            </table>
            <div class="page-number" >
            <?php
                if ($local_page > 3){
                    ?>
                    <a href="?module=admin&action=manage_product&page=1"  class="page-item">First page</a>
                    <?php                    
                }
                for($num = 1; $num <= $totalPages; $num++){
                    if($num != $local_page){
                        if($num < $local_page + 3 && $num > $local_page - 3){
                            ?>
                            <a href="?module=admin&action=manage_product&page=<?php echo $num; ?>"  class="page-item"><?php echo $num; ?></a>
                            <?php
                        }   
                    }else{
                        ?>
                        <a href="?module=admin&action=manage_product&page=<?php echo $num; ?>"  class="page-item local-page"><?php echo $num; ?></a>
                        <?php
                    }
                }
                if ($local_page < $totalPages - 3){
                    ?>
                    <a href="?module=admin&action=manage_product&page=<?php echo $totalPages ?>"  class="page-item">Last page</a>
                    <?php                    
                }
            ?> 
        </div>
        </div>
    </div>
  </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
<script>
    const imgInput = document.querySelector('.img-input');
    const image = document.getElementById('image');

    imgInput.addEventListener('input', function(){
        const imgUrl = this.value;
        image.src = imgUrl;
    });

   

</script>

<?php
echo '<pre>';
print_r($errors);
echo '</pre>';
?>