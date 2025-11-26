<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    if (($handle = fopen($file, 'r')) !== false) {
        $header = fgetcsv($handle);
        if (isset($header[0])) {
            $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]);
        }
        $dbCols = ['username','password','lastname','firstname','city','email','course1'];
        $headerMap = array_flip($header);
        $colIndexes = [];
        foreach ($dbCols as $col) {
            $colIndexes[] = isset($headerMap[$col]) ? $headerMap[$col] : null;
        }
        $placeholders = rtrim(str_repeat('?,', count($dbCols)), ',');
        $insertSql = "INSERT INTO accounts (" . implode(",", $dbCols) . ") VALUES ($placeholders)";
        $stmt = $conn->prepare($insertSql);
        while (($row = fgetcsv($handle)) !== false) {
            $params = [];
            foreach ($colIndexes as $idx) {
                $params[] = ($idx !== null && isset($row[$idx])) ? $row[$idx] : '';
            }
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
        }
        $stmt->close();
        fclose($handle);
        echo '<div style="color:green">Đã upload và lưu CSV vào CSDL!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload CSV vào CSDL</title>
</head>
<body>
    <h2>Upload file CSV</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" required>
        <button type="submit">Upload</button>
    </form>
    <h2>Danh sách tài khoản trong CSDL</h2>
    <table border="1" cellpadding="6">
        <tr>
        <?php
        $headers = ['username','password','lastname','firstname','city','email','course1'];
        foreach ($headers as $h) {
            echo '<th>' . htmlspecialchars($h) . '</th>';
        }
        echo '</tr>';
        $res = $conn->query("SELECT username,password,lastname,firstname,city,email,course1 FROM accounts");
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            foreach ($headers as $h) {
                echo '<td>' . htmlspecialchars($row[$h]) . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>