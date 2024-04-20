<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['UserName'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập

    header("Location: Đăng nhập.php");
    exit;
}

// Lấy thông tin của người dùng từ phiên
$userName = $_SESSION['UserName'];

// Tích hợp cơ sở dữ liệu và truy vấn thông tin người dùng
include("database.php");
$query = "SELECT * FROM users WHERE UserName = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $userName);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- Bất kỳ CSS hoặc JavaScript nào bạn muốn bao gồm -->
</head>

<body>
    <h1>Welcome, <?php echo $user['UserName']; ?>!</h1>
    <p>Your email: <?php echo $user['Email']; ?></p>
    <!-- Hiển thị các thông tin người dùng khác tùy thuộc vào nhu cầu của bạn -->

    <a href="logout.php">Logout</a> <!-- Link để đăng xuất, nên chuyển hướng đến một tệp xử lý đăng xuất -->

    <!-- Bất kỳ nội dung HTML hoặc giao diện người dùng khác bạn muốn bao gồm -->
</body>

</html>
