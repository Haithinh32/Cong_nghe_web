<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['flower_image'])) {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['desc'] ?? '';
    $img = $_FILES['flower_image']['name'];
    $target = 'uploads/' . basename($img);
    if (move_uploaded_file($_FILES['flower_image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $desc, $img);
        $stmt->execute();
        $stmt->close();
        echo '<div style="color:green">Đã thêm hoa thành công!</div>';
    } else {
        echo '<div style="color:red">Lỗi upload ảnh!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload hoa vào CSDL</title>
</head>
<body>
    <h2>Thêm hoa mới</h2>
    <form method="post" enctype="multipart/form-data">
        Tên hoa: <input name="name" required><br>
        Mô tả: <input name="desc" required><br>
        Ảnh: <input type="file" name="flower_image" required><br>
        <button type="submit">Upload</button>
    </form>
    <h2>Danh sách hoa trong CSDL</h2>
    <table border="1" cellpadding="6">
        <tr><th>Tên hoa</th><th>Mô tả</th><th>Ảnh</th></tr>
        <?php
        $res = $conn->query("SELECT name, description, image FROM flowers");
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
            echo '<td><img src="uploads/' . htmlspecialchars($row['image']) . '" width="100"></td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>