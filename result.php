<?php
session_start();
include_once "connect.php";
$conn = connection_user();
$tb_name = "users_info_tbl";
//$name = $_POST['name'];
//$lastname = $_POST['lastname'];
$job = $_POST['job'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$education = $_POST['education'];
$age_area = $_POST['age_area'];
$disease_type = $_POST['disease'];
$diagnosis_day = $_POST['day'];
$diagnosis_month = $_POST['month'];
$diagnosis_year =$_POST['year'];
$diagnosis_date = $diagnosis_year . "/" . $diagnosis_month . "/" . $diagnosis_day;
$therapy_status = $_POST['therapy'];
$vision = $_POST['vision'];
$hearing = $_POST['hearing'];
$description =  $_POST['description'];
$agreement = $_POST['agreement'];
$special_chars = "@#%&*";
$password = $disease_type.$special_chars[rand(0, strlen($special_chars)-1)]. rand(1000,999999);
$voice_address = NULL;
$email_query = "SELECT COUNT(*) FROM $tb_name WHERE email LIKE '$email'";
$sql_query = $conn->query($email_query);
$row_sql = $sql_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>پروژه پژوهشی ثبت گفتار</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/livicons.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/action.js"></script>
</head>
<body dir="rtl">
<div class="container-fluid">
    <div class="row">
        <div class="col col-2 col-xxl-2 col-lg-2 col-md-12 col-sm-12"></div>
        <div class="col col-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
            <?php
            if ((integer)$row_sql['COUNT(*)'] == 0) {
                if ($disease_type == "ALS") {
                    $query = "SELECT COUNT(*) FROM $tb_name WHERE disease_type LIKE 'ALS'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        $row = $sql->fetch_assoc();
                        $count = (integer)$row['COUNT(*)'] + 101;
                        $user_id = "$disease_type" . $count;
                    } else {
                        echo "<div class=\"message_box\"><h4>خطا در اتصال به پایگاه داده!</h4></div>";
                    }
                } elseif ($disease_type == "MS") {
                    $query = "SELECT COUNT(*) FROM $tb_name WHERE disease_type LIKE 'MS'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        $row = $sql->fetch_assoc();
                        $count = (integer)$row['COUNT(*)'] + 101;
                        $user_id = "$disease_type" . $count;
                    } else {
                        echo "<div class=\"message_box\"><h4>خطا در اتصال به پایگاه داده!</h4></div>";
                    }
                } elseif ($disease_type == "CVA") {
                    $query = "SELECT COUNT(*) FROM $tb_name WHERE disease_type LIKE 'CVA'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        $row = $sql->fetch_assoc();
                        $count = (integer)$row['COUNT(*)'] + 101;
                        $user_id = "$disease_type" . $count;
                    } else {
                        echo "<div class=\"message_box\"><h4>خطا در اتصال به پایگاه داده!</h4></div>";
                    }
                } elseif ($disease_type == "PARKINSON") {
                    $query = "SELECT COUNT(*) FROM $tb_name WHERE disease_type LIKE 'PARKINSON'";
                    $sql = $conn->query($query);
                    if ($sql->num_rows > 0) {
                        $row = $sql->fetch_assoc();
                        $count = (integer)$row['COUNT(*)'] + 101;
                        $user_id = "$disease_type" . $count;
                    } else {
                        echo "<div class=\"message_box\"><h4>خطا در اتصال به پایگاه داده!</h4></div>";
                    }
                }

                $sql = "INSERT INTO $tb_name (user_id, job, email, gender, education, age_area, disease_type, diagnosis_date,therapy_status, vision, hearing, description, agreement, pass, voice_address) VALUES ('$user_id', '$job', '$email','$gender', '$education', '$age_area', '$disease_type', '$diagnosis_date','$therapy_status', '$vision', '$hearing', '$description', '$agreement', '$password', '$voice_address')";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='message_box'><br><br><h4>ثبت نام شما با موفقیت انجام شد.</h4><br><br><h6><span class='livicon' data-n='user' data-color='blue' data-onparent='true'></span>  نام کاربری شما: </h6><br><h4><span class='btn btn-outline-success' data-onparent='true'>$user_id</span></h4><br><h6><span class='livicon' data-n='key' data-color='red' data-onparent='true'></span>  رمز عبور شما: </h6><br><h4><span class='btn btn-outline-danger' data-onparent='true'>$password</span></h4><br><p><span class='livicon' data-n='warning-alt' data-color='orange' data-onparent='true'></span>داوطلب گرامی لطفا <span style='color: #0a53be; font-weight: bold'>کد کاربری</span> و <span style='color: red; font-weight: bold'>رمز عبور</span> خود را در جای مطمئن ذخیره نمایید!<span class='livicon' data-n='warning-alt' data-color='orange' data-onparent='true'></span></p><br><p><span class='livicon' data-n='warning-alt' data-color='blue' data-onparent='true'></span>رمز عبور و نام کاربری شامل حروف یزرگ انگلیسی و اعداد و کاراکترهای خاص مثل: <span style='color: red; font-weight: bold'> \"@, $, %, *, #\" </span> و غیره است.<span class='livicon' data-n='warning-alt' data-color='blue' data-onparent='true'></span></p><hr><br><a class='btn btn-success' href='login.php'><span class='livicon' data-n='user-add' data-size='22' data-color='white' data-onparent='true'></span>  ورود  </a><br><br></div>";
                } else {
                    echo "<div class='message_box'><p>ERROR: $sql</p><br><p>$conn->error</p></div>";
                }
            } else {
                echo "<div class='message_box'><h4><span class='livicon' data-n='warning' data-color='orange' data-size='48' data-onparent='true'></span>  این پست الکترونیک تکراریست!</h4><br><button class='btn btn-warning' onclick='history.back()'><span class='livicon' data-n='undo' data-color='white' data-size='20' data-onparent='true'></span>  بازگشت</button></div>";
            }
            ?>
        </div>
        <div class="col col-2 col-xxl-2 col-lg-2 col-md-12 col-sm-12"></div>
    </div>
</div>
<?php
connection_user()->close();
?>
</body>
</html>