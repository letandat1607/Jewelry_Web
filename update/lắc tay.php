<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lắc Tay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="Navbar_menu.css">
    <link rel="stylesheet" href="Lắc tay.css">
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
                                            <form method="post" >
                                                <input type="search" id="search-form" name="Search" placeholder="Sản phẩm muốn tìm..." style="font-size:11px; padding:10px;">
                                                <button id="button" type="submit" name="btn" >Tìm kiếm</button>
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
                        <li class="nav-item"><a href="Home.html" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Product</a> 
                            <button class="icon-down" id="have_child"><i class="fa-solid fa-chevron-down"></i></button>
                            <ul class="navbar-nav-child" id="nav-child-items">
                                <li class="nav-item"><a href="All items.php" class="nav-link">All Items</a></li>
                                <li class="nav-item"><a href="Lắc tay.php" class="nav-link">Lắc Tay</a></li>
                                <li class="nav-item"><a href="Vòng cổ.php" class="nav-link">Vòng Cổ</a></li>
                                <li class="nav-item"><a href="Lắc chân.php" class="nav-link">Lắc Chân</a></li>
                                <li class="nav-item"><a href="Bông tai.php" class="nav-link">Bông Tai</a></li>
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
                <div class="col-lg-1 col-md-0 col-xl-1 col-sm-0 col-xs-0">
                    
                </div>

                <div class="col-lg-10 col-md-12 col-xl-10 col-sm-12 col-xs-12">
                    <div class="row">
                    <?php
include("database.php");

// Kiểm tra xem có tìm kiếm được thực hiện hay không
$searchPerformed = false;

if (isset($_POST['btn'])) {
    $Search_product = $_POST['Search'];

    $sql = "SELECT * FROM search WHERE ten_san_pham LIKE '%$Search_product%'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            // Hiển thị kết quả tìm kiếm
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-lg-3 col-md-4 col-xl-3 col-sm-6 col-6">';
                echo '<div class="row">';
                $price = '0đ';
                echo '<img class="img-fluid" src="' . $row['anh_san_pham'] . '">';
                echo '<p class="name-product">' . $row['ten_san_pham'] . '</p>';
                echo '<p class="price-product">' . $row['gia_tien'] . '</p>';
                // Hiển thị các chi tiết sản phẩm khác nếu cần
                echo '</div>';
                echo '</div>';
            }
            // Đánh dấu rằng đã thực hiện tìm kiếm
            $searchPerformed = true;
        } else {
            echo "Không tìm thấy sản phẩm phù hợp.";
        }
    }
}

// Nếu không có tìm kiếm hoặc tìm kiếm không thành công, hiển thị tất cả sản phẩm
if (!$searchPerformed) {
    $sql = "SELECT * FROM search";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    } else {
        // Hiển thị tất cả sản phẩm
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="col-lg-3 col-md-4 col-xl-3 col-sm-6 col-6">';
            echo '<div class="row">';
            $price = '0đ';
            echo '<img class="img-fluid" src="' . $row['anh_san_pham'] . '">';
            echo '<p class="name-product">' . $row['ten_san_pham'] . '</p>';
            echo '<p class="price-product">' . $row['gia_tien'] . '</p>';
            // Hiển thị các chi tiết sản phẩm khác nếu cần
            echo '</div>';
            echo '</div>';
        }
    }
}
?>

                    </div>
                    </div>
                </div>


                <div class="col-lg-1 col-md-0 col-xl-1 col-sm-0 col-xs-0">

                </div>
            </div>
        </div>
        <br><br><br><br>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-0 col-md-0 col-xl-0 col-sm-0 col-0">


                </div>
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-xl-4 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                    <ul class="nav-tabs-1">
                                        <li class="active"><a href="#">TRANG CHỦ</a></li>
                                        <li class="active"><a href="#">TRANG SỨC</a></li>
                                        <li class="active"><a href="#">INSTAGRAM</a></li>
                                        <li class="active"><a href="#">BỘ SƯU TẬP</a></li>
                                        <li class="active"><a href="#">BÀI VIẾT</a></li>
                                        <li class="active"><a href="#">THÔNG TIN</a></li>
                                        <li class="active"><a href="#">ANH EM TÔI</a></li>
                                        <li class="active"><a href="#">LIÊN HỆ</a></li>
                                    </ul>      
                                </div>
                                <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
                                    <ul class="nav-tabs-1">
                                        <li class="active"><a href="#">
                                            <i class="fa fa-instagram" aria-hidden="true"></i> AE BÁN TRANG SỨC
                                        </a></li>
                                        <li class="active"><a href="">
                                            <i class="fa fa-facebook-square" aria-hidden="true"></i> ANH EM TÔI
                                        </a></li>
                                        <li class="active"><a href="#">
                                            <i class="fa fa-mobile" aria-hidden="true"></i> 0111222333
                                        </a></li>
                                        <li class="active"><a href="#">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> aetoi123@gmail.com
                                        </a></li>
                                        <br>
                                        <li class="active"><a href="#">
                                            <img class="img-responsive" src="https://bizweb.dktcdn.net/100/302/551/themes/758295/assets/bct.png?1709018987720">
                                        </a></li>
                                        <br>
                                        <li class="active"><a href="#">
                                            <img class="img-responsive" src="https://images.dmca.com/Badges/dmca_protected_16_120.png?ID=738673b0-644b-49c3-a69d-3a6a360d49d0">
                                        </a></li>
                                    </ul>
                                </div>
                               
                            </div>                           
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-xl-4 col-sm-12 col-12">
                            <ul class="nav-tabs">
                                <li class="active"><a href="#">AE TÔI IN SAI GON</a></li>
                                <li class="active"><a href="#">DESIGN & MADE TO ODER</a></li>
                                <li class="active"><a href="#">- GIÁM ĐỐC: TRƯƠNG QUỐC BẢO</a></li>
                                <li class="active"><a href="#">- PHÓ GIÁM ĐỐC: LÊ TẤN ĐẠT</a></li>
                                <li class="active"><a href="#">- BÍ THƯ: TRẦN THIỆN TÂM</a></li>
                                <li class="active"><a href="#">- PHÓ BÍ THƯ: TRẦN GIA PHÚC</a></li>
                                <br>
                                <div class="line">
                                    <li class="active"><a href="#">Since 2024</a></li>
                                </div>  
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xl-4 col-sm-12 col-12">
                            <ul class="nav-tabs">
                                <li class="active"><a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> HỒ CHÍ MINH
                                </a></li>
                                <li class="active"><a href="#">915/5 Lê Thị Kỉnh, Nhà Bè</a></li>
                                <li class="active"><a href="#">19 Lê Văn Lương, Nhà Bè</a></li>
                                <li class="active"><a href="#">19 Nguyễn Thị Thập, Quận 7</a></li>
                                <li class="active"><a href="#">100 Cách Mạng Tháng 8, Phường 5, Quận 3</a></li>
                                <br>
                                <li class="active"><a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> NHA TRANG 
                                </a></li>
                                <li class="active"><a href="#">137 Đường 2/4, Vĩnh Hoà</a></li>
                                <li class="active"><a href="#">19 Trần Phú, Lộc Thọ</a></li>
                                <li class="active"><a href="#">04 Điện Biên Phủ, Vĩnh Hoà</a></li>
                                <br>
                                <li class="active"><a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> ĐÀ NẴNG
                                </a></li>
                                <li class="active"><a href="#">23 Lê Duẩn, Thanh Khê</a></li>
                                <br>
                                <li class="active"><a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> HÀ NỘI
                                </a></li>
                                <li class="active"><a href="#">02 Tràng Thi, P.Hàng Bông, Q.Hoàn Kiếm</a></li>
                            </ul>       
                        </div>
                    </div>
                </div>
                <div class="col-lg-0 col-md-0 col-xl-0 col-sm-0 col-0">

                </div>
            </div>
        </div>
    </footer>

    <script src="Home.js"></script>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>

