<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị danh sách hoa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
        img { width: 80px; height: 60px; object-fit: cover; border-radius: 4px; }
        .crud-btn { padding: 4px 10px; border: none; border-radius: 4px; background: #1976d2; color: #fff; cursor: pointer; margin-right: 4px; }
        .crud-btn.delete { background: #d32f2f; }
    </style>
</head>
<body>
    <h1>Quản trị danh sách các loài hoa</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php
        $flowers = [
        [
            "name" => "Hoa Đỗ Quyên",
            "desc" => "<b>Hoa đỗ quyên</b> là loài hoa nổi bật với sắc màu rực rỡ, thường được trồng làm cảnh trong vườn hoặc chậu. Đỗ quyên tượng trưng cho sự may mắn, hạnh phúc và thịnh vượng.",
            "image" => "image/hoadep/doquyen.jpg"
        ],
        [
            "name" => "Hoa Hải Đường",
            "desc" => "<b>Hoa hải đường</b> mang vẻ đẹp sang trọng, quý phái, thường nở vào dịp Tết. Hoa tượng trưng cho sự giàu sang, phú quý và đoàn viên.",
            "image" => "image/hoadep/haiduong.jpg"
        ],
        [
            "name" => "Hoa Mai",
            "desc" => "<b>Hoa mai</b> là biểu tượng của mùa xuân miền Nam, với sắc vàng tươi rực rỡ, tượng trưng cho sự may mắn, phát tài và thịnh vượng.",
            "image" => "image/hoadep/mai.jpg"
        ],
        [
            "name" => "Hoa Tường Vy",
            "desc" => "<b>Hoa tường vy</b> có vẻ đẹp dịu dàng, thanh thoát, thường được trồng làm cảnh ở ban công, sân vườn. Hoa tượng trưng cho tình yêu trong sáng và thuần khiết.",
            "image" => "image/hoadep/tuongvy.jpg"
        ]
    ];
        $i = 1;
        foreach ($flowers as $flower) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . htmlspecialchars($flower["name"]) . '</td>';
            echo '<td style="max-width:350px;">' . htmlspecialchars($flower["desc"]) . '</td>';
            echo '<td><img src="' . $flower["image"] . '" alt="' . htmlspecialchars($flower["name"]) . '"></td>';
            echo '<td>';
            echo '<button class="crud-btn">Sửa</button>';
            echo '<button class="crud-btn delete">Xóa</button>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>