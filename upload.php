<?php
// upload.php
session_start();
$userid = $_SESSION['user_id']; // این مقدار را از session یا هر جای دیگری که ذخیره کرده‌اید بگیرید.

$uploadDir = "voices/$userid/";

$uploadFile = $uploadDir . $userid . '_' . basename($_FILES['audio']['name']);

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (move_uploaded_file($_FILES['audio']['tmp_name'], $uploadFile)) {
    echo "فایل با موفقیت ذخیره شد.";
} else {
    echo "خطا در ذخیره فایل.";
}
?>