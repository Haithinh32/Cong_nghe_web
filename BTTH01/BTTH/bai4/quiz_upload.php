<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['quiz_file'])) {
    $file = $_FILES['quiz_file']['tmp_name'];
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $q = [];
    foreach ($lines as $line) {
        if (preg_match('/^ANSWER:/', $line)) {
            $ans = trim(str_replace('ANSWER:', '', $line));
            $q['correct'] = $ans;
            if (!empty($q)) {
                $stmt = $conn->prepare("INSERT INTO quiz (question, answers, correct) VALUES (?, ?, ?)");
                $answers = isset($q['answers']) ? implode("|", $q['answers']) : '';
                $stmt->bind_param('sss', $q['question'], $answers, $q['correct']);
                $stmt->execute();
                $stmt->close();
            }
            $q = [];
        } elseif (!empty($line) && !preg_match('/^ANSWER:/', $line) && !preg_match('/^[A-Z]\./', $line)) {
            $q['question'] = trim($line);
            $q['answers'] = [];
        } elseif (preg_match('/^[A-Z]\./', $line)) {
            $q['answers'][] = trim($line);
        }
    }
    echo '<div style="color:green">Đã upload và lưu trắc nghiệm vào CSDL!</div>';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload Quiz vào CSDL</title>
</head>
<body>
    <h2>Upload file Quiz.txt</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="quiz_file" required>
        <button type="submit">Upload</button>
    </form>
    <h2>Danh sách câu hỏi trong CSDL</h2>
    <table border="1" cellpadding="6">
        <tr><th>Câu hỏi</th><th>Đáp án</th><th>Đáp án đúng</th></tr>
        <?php
        $res = $conn->query("SELECT question, answers, correct FROM quiz");
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['question']) . '</td>';
            echo '<td>' . htmlspecialchars(str_replace('|', '<br>', $row['answers'])) . '</td>';
            echo '<td>' . htmlspecialchars($row['correct']) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>