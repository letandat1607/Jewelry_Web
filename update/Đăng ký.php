<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="Navbar_menu.css">
    <link rel="stylesheet" href="Lắc tay.css">
    <link rel="stylesheet" href="Đăng ký.css">
    <link rel="stylesheet" href="footer.css">
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
                                    <a class="navbar-brand" href=""><img class="img-fluid" src="https://bizweb.dktcdn.net/100/483/192/themes/904708/assets/logo.png?1707100360154" alt=""></a>
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
                                        <script src="Ẩn hiện thanh tìm kiếm.js"></script>
                                    </div>
                                    <div class="icon-vertical_bar ms-2 me-2">
                                        <a href=""><i class="fa-solid fa-grip-lines-vertical"></i></a>
                                    </div>
                                    <div class="icon-user">
                                        <ul class="menu" >
                                            <li><a href="#">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                   <ul class="sub-menu">
                                                        <li><a href="Đăng ký.php">
                                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                            Đăng Ký
                                                        </a></li>
                                                        <li><a href="Đăng nhập.php">
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
                            <a href="Đăng nhập.php" >
                                <button type="button" id="SIGN-IN" name="check" value="">SIGN IN</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                            <p class="inform">Create Your Account</p>
                        </div>
                    </div>
                    <form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="registerForm">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="text" name="First_name" id="First-name" placeholder="First-name:*" style="padding-left:10px;"    onkeydown="moveToNextField(event, 'Last-name')">                              
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="text" name="Last_name" id="Last-name" placeholder="Last-name:*" style="padding-left:10px;"  onkeydown="moveToNextField(event, 'Email')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                                <input type="email" name="Email" id="Email" placeholder="Email:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Phone')">
                                <input type="tel" name="Phone" id="Phone" placeholder="Phone-Number:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Password')">
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="password" name="Password" id="Password" placeholder="Password:*" style="padding-left:10px;" onkeydown="moveToNextField(event, 'Comfirm-password')">
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                <input type="password" name="Confirm_password" id="Comfirm-password" placeholder="Confirm-password:*" style="padding-left:10px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xl-3 col-sm-0 col-0">
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                            <button type="submit" name="" class="Button-Sign-in">SIGN UP</button>
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



<?php
// Mảng chứa các trường dữ liệu và thông báo tương ứng
$fields = array(
    "First_name" => "First name",
    "Last_name" => "Last name",
    "Email" => "Email",
    "Phone" => "Phone number",
    "Password" => "Password",
    "Confirm_password" => "Confirm password"
);


// Kiểm tra nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form và làm sạch
    $First_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $Last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $Email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_SPECIAL_CHARS);
    $Phone = filter_input(INPUT_POST, "Phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $Password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_SPECIAL_CHARS);
    $Confirm_password = filter_input(INPUT_POST, "Confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

    // Kiểm tra từng trường dữ liệu
    foreach ($fields as $field => $label) {
        $value = filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($value)) {
            echo "<script>alert('Vui lòng nhập $label.');</script>";
            // Dừng việc kiểm tra nếu có trường dữ liệu bị bỏ trống
            break;
        }
    } if ($Password != $Confirm_password) {
        echo "<script>alert('Mật khẩu và xác nhận mật khẩu không khớp.');</script>";
    } else {
        // Kiểm tra giá trị phone_number
        if (empty($Phone)) {
            // Nếu giá trị phone_number rỗng, gán giá trị NULL cho cột phone_number
            $phoneValue = "NULL";
        } else {
            // Nếu có giá trị, thực hiện trích xuất số điện thoại
            $phoneValue = "'$Phone'";
        }

        // Tiếp tục với quá trình đăng ký người dùng
        // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hash = password_hash($Password, PASSWORD_DEFAULT);
        // Thực hiện lệnh INSERT SQL
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password) 
               VALUES ('$First_name', '$Last_name', '$Email', $phoneValue, '$hash')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Đăng ký thành công.');</script>";
            header('Location: user_page.php');
            exit();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>

