<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลนักเรียน</title>
</head>
<body>

    <h2>ฟอร์มบันทึกข้อมูลนักเรียน</h2>
    
    <form action="" method="post">
        <label for="fullname">ชื่อจริง:</label>
        <input type="text" name="fullname" required>
        <br><br>

        <label for="nickname">ชื่อเล่น:</label>
        <input type="text" name="nickname" required>
        <br><br>

        <button type="submit" name="submit">บันทึกข้อมูล</button>
    </form>

    <h3>รายชื่อนักเรียนที่บันทึก</h3>
    <ul>
        <?php
        $filename = "student.txt";

        // ถ้ามีการกด submit
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $nickname = $_POST['nickname'];

            // บันทึกลงไฟล์
            $file = fopen($filename, "a");
            fwrite($file, "$fullname - $nickname\n");
            fclose($file);

            // รีเฟรชหน้าเว็บเพื่อแสดงผลทันที
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // แสดงข้อมูลที่บันทึก
        if (file_exists($filename)) {
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                echo "<li>$line</li>";
            }
        }
        ?>
    </ul>

</body>
</html>