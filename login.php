<?php
session_start();
include_once 'connect.php';
connection_user();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود به سایت</title>
    <link rel="stylesheet" href="css/login.css">
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
        <div class="col col-12 header">
            <img src="img/AIA WATER MARK (ORIGINAL SIZE).png" class="logo logo-sm" alt="عصر هوش مصنوعی">
            <img src="img/logo-painting.png" class="logo2 logo2-sm" alt="دانشگاه آزاد اسلامی">
            <h1>به درگاه ثبت گفتار بیماران دیزآرتری خوش آمدید!</h1>
            <p>لطفا مشخصات خود را وارد کنید و پس از آن بر اساس دستور العمل کلمات خواسته شده را ضبط نمایید.</p>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="index.html">  صفحه اصلی</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">ورود</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">ثبت نام</a></li>
                        <li class="nav-item"><a class="nav-link" href="literature.html">برای پژوهشگران</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">درباره این پروژه</a></li>
                    </ul>
                </div>
                <a class="navbar-brand bg-light rounded-circle" href="#">
                    <img src="img/AIA%20WATER%20MARK%20(ORIGINAL%20SIZE).png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
                </a>
            </div>
        </nav>
        <div class="row padding-text">
            <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
            <div class="col col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
               <div class="form-control">
                   <br>
                   <h4>برای ورود به سامانه کلیک کنید</h4>
                   <br><br>
                   <button  onclick="document.getElementById('id01').style.display='block'" class="btn btn-success"><span class="livicon" data-n="sign-in" data-color="white" data-onparent="true"></span>  ورود و ضبط گفتار</button>
                   <br>
               </div>
    <!--            Modal Content-->
               <div id="id01" class="my_modal">
                    <form action="record.php" class="modal_content animate" method="post">
                        <div class="img_container">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="بستن">&times;</span>
                            <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container my_container">
                            <br>
                            <h3>ورود به سامانه</h3>
                            <br>
                            <p>لطفا کد کاربری که از سامانه دریافت کرده‌اید را با دقت وارد کنید.</p>
                            <br>
                            <hr>
                            <br>
                            <span class="attend attend-star">*</span><label for="userid" class="form-label">کد کاربری:</label>
                            <input type="text" id="userid" name="userid" class="form-control" required title="کد کاربری دریافتی از سامانه را وارد کنید"><br>

                            <span class="attend attend-star">*</span><label for="password" class="form-label">رمز عبور:</label>
                            <input type="password" id="password" name="pass" class="form-control" required title="رمز عبور را وارد کنید"><br>

                            <input type="checkbox" class="form-check-input" name="agreement" id="agreement" required>
                            <label for="agreement">پس از مطالعه <a href="#" target="_blank" aria-required="true">روند پژوهش</a> بدینوسیله رضایت خود را برای مشارکت در این پروژه تحقیقاتی اعلام می‌کنم.</label><br>
                            <br><br>
                            <hr>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-info btn-block" title="ورود به سامانه">ورود</button>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <button class="btn btn-outline-danger" onclick="document.getElementById('id01').style.display='none'" title="انصراف از ورود">انصراف</button>
                        </div>
                    </form>
               </div>
            </div>
            <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
        </div>
    </div>

</div>
</body>
</html>
<?php
connection()->close()
?>
