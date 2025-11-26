<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị danh sách tài khoản CSV</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Danh sách tài khoản (CSV)</h1>
    <table>
        <tbody>
        <?php
        $filename = '65HTTT_Danh_sach_diem_danh.csv';
        if (file_exists($filename)) {
            $f = fopen($filename, 'r');
            $isHeader = true;
            while (($row = fgetcsv($f)) !== false) {
                echo '<tr>';
                foreach ($row as $cell) {
                    if ($isHeader) {
                        echo '<th>' . htmlspecialchars($cell) . '</th>';
                    } else {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                }
                echo '</tr>';
                $isHeader = false;
            }
            fclose($f);
        } else {
            echo '<tr><td colspan="10">Không tìm thấy file CSV.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</body>
</html>
