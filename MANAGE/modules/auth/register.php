<?php
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
            $sql = "SELECT id FROM users WHERE email = '$email'";
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
            $dataInsert = [
                'first_name' => $filterAll['first_name'],
                'last_name' => $filterAll['last_name'],
                'email' => $filterAll['email'],
                'phone_number' => $filterAll['phone_number'],
                'password' => $filterAll['password'],
                'reg_date' => date('Y-m-d H:i:s'),
                'status' => 1,
                'activeToken' => $activeToken
            ];
            $insertStatus = insert('users', $dataInsert);
            if($insertStatus){
                setFlashData('smg', 'Đăng ký thành công!!');
                setFlashData('smg_type', 'success');
            }
            redirect('?module=auth&action=login');
        }else{
            setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu!!');
            setFlashData('smg_type', 'danger');
            setFlashData('errors', $errors);
            redirect('?module=auth&action=register');
        }
        

    }

    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
    $errors = getFlashData('errors');

    //echo '<pre>';
    //print_r($errors);
    //echo '</pre>';
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="templates/CSS/Navbar_menu.css">
    <link rel="stylesheet" href="templates/CSS/Lắc tay.css">
    <link rel="stylesheet" href="templates/CSS/Đăng ký.css">
    <link rel="stylesheet" href="templates/CSS/footer.css">
</head>

<body>
    <header>
        <div class="header-logo">
            <div class="container">
                <div class="header-navbar">
                    <div class="container">
                        <div class="row">
                            <div class="col col-md-3 col-lg-3 col-xl-3">
                                <div class="icon">
                                    <div class="icon-facebook">
                                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                                    </div>
                                    <div class="icon-vertical_bar ms-2 me-2">
                                        <a href=""><i class="fa-solid fa-grip-lines-vertical"></i></a>
                                    </div>
                                    <div class="icon-instagram">
                                        <a href=""><i class="fa-brands fa-square-instagram"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col col-md-6 col-lg-6 col-xl-6">
                                <div class="navbar-logo">
                                    <a class="navbar-brand" href=""><img class="img-fluid" src="https://scontent.xx.fbcdn.net/v/t1.15752-9/434431017_327904316571320_1511531453258304126_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=Q5Cg9YMNgZQAX96SK08&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdRwbA1nNuVmXt67XoAeULnNZ3LI1wy3Sao7z9lhLxeVFw&oe=663264B9" alt=""></a>
                                </div>
                            </div>
                            <div class="col col-md-3 col-lg-3 col-xl-3">
                                <div class="icon">
                                    <div class="icon-seach">
                                        <div id="search-container">
                                            <a href=""></a>
                                            <i id="search-icon" class="fa fa-search" aria-hidden="true"></i>
                                            <form action="/search" method="get" >
                                                <input type="search" id="search-form" name="" placeholder="Sản phẩm muốn tìm..." style="font-size:11px; padding:10px;">
                                                <button id="button" type="submit">Tìm kiếm</button>
                                            </form>
                                        </div>
                                        <script src="templates/JS/Ẩn hiện thanh tìm kiếm.js"></script>
                                    </div>
                                    <div class="icon-vertical_bar ms-2 me-2">
                                        <a href=""><i class="fa-solid fa-grip-lines-vertical"></i></a>
                                    </div>
                                    <div class="icon-user">
                                        <ul class="menu" >
                                            <li><a href="#">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                   <ul class="sub-menu">
                                                        <li><a href="?module=auth&action=register">
                                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                            Đăng Ký
                                                        </a></li>
                                                        <li><a href="?module=auth&action=login">
                                                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                            Đăng Nhập
                                                        </a></li>
                                                   </ul>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="icon-vertical_bar ms-0.8 me-2">
                                        <a href=""><i class="fa-solid fa-grip-lines-vertical"></i></a>
                                    </div>
                                    <div class="icon-basket">
                                        <a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <nav id="navBar" class="navbar navbar-dark navbar-expand-md">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle-Navigation">
                    <span class="toggle-icon ms-4"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navLinks">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="Home.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Product</a> 
                            <button class="icon-down" id="have_child"><i class="fa-solid fa-chevron-down"></i></button>
                            <ul class="navbar-nav-child" id="nav-child-items">
                                <li class="nav-item"><a href="All items.php" class="nav-link">All Items</a></li>
                                <li class="nav-item"><a href="Lắc tay.php" class="nav-link">Lắc Tay</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Vòng Cổ</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Lắc Chân</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Bông Tai</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link">Look Book</a></li>
                        <li class="nav-item"><a href="" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Contact</a></li>  
                    </ul>
                    
                </div>
                
            </nav>
        </div>
    </header>
    <main class="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-0 col-xl-3 col-sm-0 col-0">



                </div>

                <div class="col-lg-8 col-md-12 col-xl-6 col-sm-12 col-12">
                <div class="form-rigister">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                            <button type="button" id="SIGN-UP" name="check" value="">SIGN UP</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                            <a href="?module=auth&action=login" >
                                <button type="button" id="SIGN-IN" name="check" value="">SIGN IN</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                            <p class="inform">Create Your Account</p>
                            <?php
                                if(!empty($smg)){
                                    getSmg($smg, $smg_type);
                                }
                            ?>
                        </div>
                    </div>
                    <form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="registerForm">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12 " >
                                <input type="text" name="first_name" id="First-name" placeholder="First-name:*" style="padding-left:10px;"    onkeydown="moveToNextField(event, 'Last-name')">                            
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="text" name="last_name" id="Last-name" placeholder="Last-name:*" style="padding-left:10px;"  onkeydown="moveToNextField(event, 'Email')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                                <input type="email" name="email" id="Email" placeholder="Email:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Phone')">
                                <input type="tel" name="phone_number" id="Phone" placeholder="Phone-Number:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Password')">
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="password" name="password" id="Password" placeholder="Password:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Comfirm-password')">
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="password" name="confirm_password" id="Comfirm-password" placeholder="Confirm-password:*" style="padding-left:10px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xl-3 col-sm-0 col-0">
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                            <button type="submit" name="" class="Button-Sign-in submit">SIGN UP</button>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xl-3 col-sm-0 col-0">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xl-3 col-sm-0 col-0">

                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <p class="Or-sign-up">Or sign up with one of there services</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xl-3 col-sm-0 col-0">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <button type="button" id="Log-in-facebook">
                                    <a href="https://www.facebook.com/v12.0/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri=YOUR_REDIRECT_URI&scope=email" target="_blank">
                                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                        Facebook
                                    </a>
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <button type="button" id="Log-in-google">
                                    <a href="https://accounts.google.com/o/oauth2/auth?client_id=YOUR_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URI&response_type=code&scope=email%20profile" target="_blank">
                                        <i class="fa fa-google" aria-hidden="true"></i>
                                        Google
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        
                    </div>
                </form>
                <script src="Đăng ký.js"></script>
                </div>
                </div>
                <div class="col-lg-2 col-md-0 col-xl-3 col-sm-0 col-0">



                </div>
            </div>
            <div class="row">
                <br><br>
            </div>
        </div>  

    </main>




    <script src="Home.js"></script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>






<script>
    //focus ra giữa màn hình
    // Lấy phần tử cần đặt trọng tâm
    var centeredElement = document.getElementById("registerForm");
    // Đặt trọng tâm cho phần tử
    centeredElement.focus();
    // Cuộn trang sao cho phần tử được hiển thị ở giữa màn hình
    window.scrollTo(0, centeredElement.offsetTop - window.innerHeight / 2 + centeredElement.offsetHeight / 2);
</script>



<script>
window.onload = function() {
    var FirstnameInput = document.getElementById('First-name');//khai báo biến
    var LastnameInput = document.getElementById('Last-name');//khai báo biến
    var EmailInput = document.getElementById('Email');//khai báo
    var PhoneInput = document.getElementById('Phone');//khai báo
    var PasswordInput = document.getElementById('Password');//khai báo
    var ComfirmPasswordInput = document.getElementById('Comfirm-password');//khai báo

    if(FirstnameInput.value.trim() === ''){
        FirstnameInput.focus();
        event.preventDefault();
        return;
    }
    else {
        var LastNameValue = LastnameInput.value.trim();
        if (LastNameValue === '') {
            LastnameInput.focus();
            event.preventDefault();
            return;
        }
        else{
            var Email = EmailInput.value.trim();
            if (Email === '') {
                EmailInput.focus();
                event.preventDefault();
                return;
            }
            else{
                var Phone = PhoneInput.value.trim();
                if (Phone === '') {
                    PhoneInput.focus();
                    event.preventDefault();
                    return;
                }
                else{
                    var Password = PasswordInput.value.trim();
                    if (Password === '') {
                        PasswordInput.focus();
                        event.preventDefault();
                        return;
                    }
                    else{
                        var ComfirmPassword = ComfirmPasswordInput.value.trim();
                        if (ComfirmPassword === '') {
                            ComfirmPasswordInput.focus();
                            event.preventDefault();
                            return;
                        }
                        else{
                            if (Password!== ComfirmPassword) {
                                ComfirmPasswordInput.focus();
                                event.preventDefault();
                                return;
                            }
                        }
                    }
                }
            }
        }
    }
};
</script>

<script>
// Hàm để xử lý sự kiện khi nhấn phím Enter trên các trường nhập liệu
function moveToNextField(event, nextFieldId) {
    if (event.key === "Enter") {
        event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
        document.getElementById(nextFieldId).focus(); // Di chuyển tiêu điểm tới trường tiếp theo
    }
}
</script>

