<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>
    <h1>Kết quả PHP Căn Bản</h1>

    <?php
    $ho_ten = "Nguyễn Văn A";
    $diem_tb = 7.5;
    $co_di_hoc_chuyen_can = true;

    echo "<h2>TODO 1: Khai báo 3 biến</h2>";
    echo "Họ tên: " . $ho_ten . "<br>";
    echo "Điểm TB: " . $diem_tb . "<br>";
    echo "Có đi học chuyên cần: " . ($co_di_hoc_chuyen_can ? "Có" : "Không") . "<br><br>";

    echo "<h2>TODO 2: In ra thông tin sinh viên</h2>";
    echo "Họ tên: " . $ho_ten . "<br>";
    echo "Điểm: " . $diem_tb . "<br><br>";

    echo "<h2>TODO 3: Viết cấu trúc IF/ELSE IF/ELSE</h2>";
    if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Giỏi";
    } elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Khá";
    } elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Trung bình";
    } else {
        echo "Xếp loại: Yếu (Cần cố gắng thêm!)";
    }
    echo "<br><br>";

    echo "<h2>TODO 4: Viết 1 hàm đơn giản</h2>";
    function chaoMung() {
        echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
    }
    
    chaoMung();
    echo "<br><br>";

    echo "<h2>TODO 5: Gọi hàm bạn vừa tạo</h2>";
    chaoMung();
    echo "<br><br>";

    ?>

</body>
</html>