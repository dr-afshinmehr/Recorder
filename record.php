<?php
session_start();
include_once "connect.php";
$conn = connection();
$tb_name = "tasks_tbl";
$user_conn = connection_user();
$user_tb_name = "users_info_tbl";
$user_id = $_POST['userid'];
$pass = $_POST['pass'];
$query = "SELECT * FROM `$user_tb_name` WHERE `user_id` LIKE '$user_id' AND `pass` LIKE '$pass'";
$sql = $user_conn->query($query);
if ($sql->num_rows > 0) {
    $row = $sql->fetch_assoc();
    $user_id = $row['user_id'];
    $password = $row['pass'];
    if ($pass == $password) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['pass'] = $pass;
    }else{
        header("location: login.php");
        exit();
    }
}else{
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ضبط عبارات</title>
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
        <div class="col-12 header">
            <img src="img/AIA WATER MARK (ORIGINAL SIZE).png" class="logo logo-sm" alt="عصر هوش مصنوعی">
            <img src="img/logo-painting.png" class="logo2 logo2-sm" alt="دانشگاه آزاد اسلامی">
            <h2>ثبت نمونه گفتار</h2>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="index.html">  صفحه اصلی</a></li>
                        <li class="nav-item"><a class="nav-link" href="literature.html">برای پژوهشگران</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">درباره این پروژه</a></li>
                    </ul>
                    <button type="submit" class="btn btn-warning margin-right" disabled>خروج</button>
                </div>

                <a class="navbar-brand bg-light rounded-circle" href="#">
                    <img src="img/AIA%20WATER%20MARK%20(ORIGINAL%20SIZE).png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
                </a>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col col-12 padding-text">
                    <h4><span class="livicon" data-n="user-flag" data-color="red" data-size="38" data-onparent="true"></span>  <?php echo "$user_id"?>  عزیز خوش آمدید!</h4>
                    <br><span class="attend-star"><img src="img/attention.png" height="30px" width="30px"/></span><h4>به نکات زیر توجه فرمایید.</h4><br>
                    <span class="attend attend-star">*</span><p>برای ثبت صدای خود در هر مرحله دکمه قرمز <span class="attend">(RECORD)</span> را کلیک کنید.</p>
                    <span class="attend attend-star">*</span><p>لطفا متن زیر را با صدای بلند و رسا بخوانید.</p>
                    <span class="attend attend-star">*</span><p>پس از اتمام قرائت متن مجددا دکمه قرمز <span class="attend">(STOP)</span> را کلیک کنید.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
            <div class="col col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="col notebook notebook-sm">
                    <?php
                    $sql = "SELECT id, heading, task FROM $tb_name";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $ids[] = $row["id"];
                            $heads[] = $row["heading"];
                            $tasks[] = $row["task"];
                        }
                    }
                    $json_ids = json_encode($ids);
                    $ids_json_file = fopen("ids.json", "w");
                    fwrite($ids_json_file, $json_ids);
                    fclose($ids_json_file);
                    $i = 0;
                    while ($i < count($ids)){
                        if ($i == 0){
                            echo "<h4 id=\"head[$i]\">$heads[$i]</h4><br id=\"br[$i]\">";
                            echo "<p class=\"tasks\" id=\"task[$i]\"><span class='livicon' data-n='quote-right' data-color='red' data-size='22' data-onparent='true' data-loop='true'></span> $tasks[$i] <span class='livicon' data-n='quote-left' data-color='red' data-size='22' data-onparent='true' data-loop='true'></span></p>";
                            $i++;
                        }elseif ($i > 0 ) {
                            echo "<h4 id=\"head[$i]\" hidden='hidden'>$heads[$i]</h4><br id=\"br[$i]\" hidden>";
                            echo "<p class=\"tasks\" id=\"task[$i]\" hidden='hidden'><span class='livicon' data-n='quote-right' data-color='red' data-size='22' data-onparent='true' data-loop='true'></span> $tasks[$i] <span class='livicon' data-n='quote-left' data-color='red' data-size='22' data-onparent='true' data-loop='true'></span></p>";
                            $i++;
                        }
                    }
                    echo "<h4 id=\"end\" hidden>تبریک شما به پایان فرآیند ثبت گفتار رسیدید!</h4>";
                    ?>
                </div>
            </div>
            <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
            <button class="record-btn record-btn-lg record-btn-md record-btn-sm" id="record" onclick="hiden()"><span class="livicon" data-n="morph-c-s" data-color="white" data-size="48" data-onparent="true"><br></span><span  style="font-weight: bolder">ضبط کردن</span></button>
            <button class="record-btn record-btn-lg record-btn-md record-btn-sm" id="pause" hidden onclick="show(); task_shower()"><span class="livicon" data-n="morph-s-c" data-color="white" data-size="48" data-onparent="true"><br></span><span  style="font-weight: bolder">پایان ضبط</span></button>
        </div>
    </div>
</div>
<script src="js/RecordRTC.js"></script>
<script src="js/recording.js"></script>
</body>

</html>
<?php
connection()->close();
?>