<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách các loài hoa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .flower-list { display: flex; flex-wrap: wrap; gap: 24px; }
        .flower-item { width: 250px; border: 1px solid #ddd; border-radius: 8px; padding: 12px; background: #fafafa; box-shadow: 0 2px 8px #eee; }
        .flower-item img { width: 100%; height: 180px; object-fit: cover; border-radius: 6px; }
        .flower-name { font-size: 1.2em; font-weight: bold; margin: 10px 0 6px; }
        .flower-desc { color: #555; }
    </style>
</head>
<body>
    <h1>4 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
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
        echo '<div style="margin-bottom:40px;">';
        echo '<h2 style="margin-bottom:8px;">' . $i . '. ' . htmlspecialchars($flower["name"]) . '</h2>';
        echo '<div style="margin-bottom:10px;font-size:16px;">' . $flower["desc"] . '</div>';
        echo '<img src="' . $flower["image"] . '" alt="' . htmlspecialchars($flower["name"]) . '" style="max-width:100%;height:auto;border-radius:8px;box-shadow:0 2px 8px #ccc;">';
        echo '</div>';
        $i++;
    }
    ?>
</body>
</html>
