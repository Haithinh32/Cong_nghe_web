<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .question { margin-bottom: 28px; }
        .question-title { font-weight: bold; margin-bottom: 8px; }
        .answers label { display: block; margin-bottom: 4px; }
        .submit-btn { padding: 8px 18px; font-size: 16px; background: #1976d2; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <form method="post">
    <?php
    $questions = [];
    $answers = [];
    $filename = 'Quiz.txt';
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $q = [];
        foreach ($lines as $line) {
            if (preg_match('/^ANSWER:/', $line)) {
                $ans = trim(str_replace('ANSWER:', '', $line));
                $q['correct'] = $ans;
                if (!empty($q)) $questions[] = $q;
                $q = [];
            } elseif (!empty($line) && !preg_match('/^ANSWER:/', $line) && !preg_match('/^[A-Z]\./', $line)) {
                $q['question'] = trim($line);
                $q['answers'] = [];
            } elseif (preg_match('/^[A-Z]\./', $line)) {
                $q['answers'][] = trim($line);
            }
        }
        if (!empty($q)) $questions[] = $q;
    }
    $submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
    $user_answers = $submitted ? $_POST : [];
    $i = 0;
    foreach ($questions as $idx => $q) {
        if (!isset($q['question'])) continue;
        echo '<div class="question">';
        echo '<div class="question-title">' . htmlspecialchars($q['question']) . '</div>';
        echo '<div class="answers">';
        foreach ($q['answers'] as $ans) {
            $val = substr($ans, 0, 1);
            $checked = ($submitted && isset($user_answers['q'.$idx]) && $user_answers['q'.$idx] == $val) ? 'checked' : '';
            echo '<label><input type="radio" name="q' . $idx . '" value="' . $val . '" ' . $checked . '> ' . htmlspecialchars($ans) . '</label>';
        }
        echo '</div>';
        if ($submitted) {
            echo '<div style="margin-top:6px;color:#1976d2;font-weight:bold;">Đáp án đúng: ' . htmlspecialchars($q['correct']) . '</div>';
        }
        echo '</div>';
        $i++;
    }
    if ($questions) echo '<button class="submit-btn" type="submit">Nộp bài</button>';
    ?>
    </form>
</body>
</html>
