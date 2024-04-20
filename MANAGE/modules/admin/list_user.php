<?php
if (!defined('_CODE')){
    die('ACCESS DENIED........');
}
if(!isLoginAdmin()){
    redirect('?module=admin&action=admin_login');
}
$filterAll = filter();
if(!empty($filterAll['id'])){
    $userID = $filterAll['id'];

    $userDetail = oneRaw("SELECT * FROM users WHERE id = $userID");
    if(!empty($userDetail)){
        setFlashData('user_detail', $userDetail);
    }
}

$listUsers = getRaw("SELECT * FROM users ORDER BY update_date DESC");
if(isPost()){
    $filterAll = filter();
    $errors = [];
    
    if(empty($filterAll['first_name'])){
        $errors ['first_name']['required'] = 'Họ bắt buộc phải nhập'; 
    }

    if(empty($filterAll['last_name'])){
        $errors ['last_name']['required'] = 'Tên bắt buộc phải nhập'; 
    }

    if(empty($filterAll['phone_number'])){
        $errors ['phone_number']['required'] = 'Số điện thoại bắt buộc phải nhập'; 
    }

    if(empty($filterAll['email'])){
        $errors ['email']['required'] = 'Email bắt buộc phải nhập'; 
    }else{
        $email = $filterAll['email'];
        $sql = "SELECT id FROM users WHERE email = '$email' AND id <> $userID";
        if(getRows($sql) > 0){
            $errors['email']['unique'] = 'Email đã được đăng kí';
        }
    }
    
    if(empty($filterAll['password'])){
        $errors ['password']['required'] = 'Pass bắt buộc phải nhập'; 
    }else{
        if(strlen($filterAll['password']) < 8){
            $errors['password']['min'] = 'pass phải lớn hơn 8 kí tự';
        }
    }

    if(empty($filterAll['confirm_password'])){
        $errors ['confirm_password']['required'] = 'Pass bắt buộc phải nhập'; 
    }else{
        if($filterAll['password'] != $filterAll['confirm_password']){
            $errors ['confirm_password']['match'] = 'K dung';
        }
    }

    if(empty($errors)){

        $activeToken = sha1(uniqid().time());
        
        $updateData = [
            'first_name' => $filterAll['first_name'],
            'last_name' => $filterAll['last_name'],
            'email' => $filterAll['email'],
            'phone_number' => $filterAll['phone_number'],
            'password' => $filterAll['password'],
            'update_date' => date('Y-m-d H:i:s'),
            'status' => $filterAll['status'],
        ];
        $dataInsert = [
            'first_name' => $filterAll['first_name'],
            'last_name' => $filterAll['last_name'],
            'email' => $filterAll['email'],
            'phone_number' => $filterAll['phone_number'],
            'password' => $filterAll['password'],
            'reg_date' => date('Y-m-d H:i:s'),
            'status' => $filterAll['status'],
            'activeToken' => $activeToken
        ];
        $condition = "id = $userID";
        $updateStatus = update('users', $updateData, $condition);
        if($updateStatus){
            redirect('?module=admin&action=list_user&id='.$userID.'');
        }else{
            $insertStatus = insert('users', $dataInsert);
            if($insertStatus){
                redirect('?module=admin&action=list_user');
            }
        }
        redirect('?module=admin&action=list_user&id='.$userID.'');
    }else{
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
        redirect('?module=admin&action=list_user&id='.$userID.'');

    }
}

$errors = getFlashData('errors');
$old = getFlashData('old');
$userInfo = getFlashData('user_detail');
if(!empty($userInfo)){
    $old = $userInfo;
}

?>


<!DOCTYPE html>
<html lang="en">
<style></style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Order</title>
  <link rel="stylesheet" href="templates/CSS/Sidebar.css">
  <link rel="stylesheet" href="templates/CSS/Admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="templates/CSS/Manage Customer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body >
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
                <a href="?module=admin&action=manage_product">Quản lý sản phẩm</a>
            </div>
            <div class="col-4 customer-content">
                <a href="Manage Customer.html">Quản lý khách hàng</a>
            </div>
            <div class="col-4 order-content">
                <a href="Manage Order.html">Quản lý đơn hàng</a>
            </div>
        </div>
        <form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="registerForm">
            <div class="form">
                <div class="form-group">
                    <label for="name">First Name </label>
                    <input type="text" name="first_name" id="name" class="form-input"
                    value="<?php echo old('first_name', $old); ?>"
                    >                    
                    <?php
                        echo (!empty($errors['first_name']['required'])) ? '<span class="error-message">' . $errors['first_name']['required'] . '</span>' : null;
                    ?>
                </div>
                
                <div class="form-group">
                    <label for="">Last Name </label>
                    <input type="text" id="" name="last_name" class="form-input" value="<?php echo old('last_name', $old); ?>">
                    <?php
                        echo (!empty($errors['last_name']['required'])) ? '<span class="error-message">' . reset($errors['last_name']) . '</span>' : null;
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="email" name="email" id="email" class="form-input" value="<?php echo old('email', $old); ?>">
                    <?php
                        if (!empty($errors['email'])) {
                            echo '<span class="error-message">' . reset($errors['email']) . '</span>';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Phone: </label>
                    <input type="tel" name="phone_number" id="Phone" class="form-input" value="<?php echo old('phone_number', $old); ?>" >
                    <?php
                        echo (!empty($errors['phone_number']['required'])) ? '<span class="error-message">' . $errors['phone_number']['required'] . '</span>' : null;
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Password: </label>
                    <input type="text" name="password" id="date" class="form-input">
                    <?php
                        echo (!empty($errors['password']['required'])) ? '<span class="error-message">' . $errors['password']['required'] . '</span>' : null;
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password: </label>
                    <input type="text" name="confirm_password" id="" class="form-input">
                    <?php
                        if (!empty($errors['confirm_password'])) {
                            echo '<span class="error-message">' . reset($errors['confirm_password']) . '</span>';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Status: </label>
                    <select name="status" id="" class="form-input">
                        <option value="1" <?php echo (old('status', $old) == 1) ? 'selected'  : false; ?>>Open</option>
                        <option value="0" <?php echo (old('status', $old) == 0) ? 'selected'  : false; ?>>Lock</option>    
                    </select>
                </div>
                <div>
                    
                    <button id="save" >Submit</button>
                    <input type="hidden" name="id" value="<?php echo $userID ?>"> 
                    <button id="update" style="display: block;" >Update</button>
                    <a href="?module=admin&action=list_user" class="btn btn-dark btn-sm mt-2"><i class="fa-solid fa-rotate-right"></i></a>
                </div>
            </div>
        </form>

        <table class="table" id="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th width="5%">Edit</th>
                    <th width="5%">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($listUsers)):
                        $count = 0;
                        foreach($listUsers as $item):
                            $count++;
                ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['phone_number']; ?></td>
                <td><?php echo $item['password']; ?></td>
                <td><?php echo $item['status'] == 1 ? '<button class ="btn btn-success btn-sm">Open</button>' : '<button class ="btn btn-danger btn-sm">Lock</button>'; ?></td>
                <td><a href="?module=admin&action=list_user&id=<?php echo $item['id']; ?>" id="edit" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="?module=admin&action=delete_user&id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
                <?php 
                        endforeach;
                    endif;    
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
<?php 


