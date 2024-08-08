<?php
session_start();
include_once "connect.php";
$conn = connection_user();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام در سایت</title>
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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
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
                <form action="result.php" method="POST" class="form-control">
                    <h3>فرم ثبت مشخصات فردی</h3>
                    <p>مشخصات بیمار با دقت وارد شود</p>
                    <br>
                    <hr>
                    <br>
<!--                    <span class="attend attend-star">*</span><label for="name" class="form-label">نام:</label>-->
<!--                    <input type="text" id="name" name="name" class="form-control" placeholder="نام" required><br>-->
<!---->
<!--                    <span class="attend attend-star">*</span><label for="lastname" class="form-label">نام خانوادگی:</label>-->
<!--                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="نام خانوادگی" required><br>-->

                    <span class="attend attend-star">*</span><label for="job" class="form-label" >شغل:</label>
                    <input type="text" id="job" name="job" class="form-control" required><br>

                    <span class="attend attend-star">*</span><label for="e-mail" class="form-label" title="لطفا پست الکترونیک خود یا یک پست الکترونیک در دسترس را وارد کنید(برای دریافت کد کاربری و رمز عبور)">پست الکترونیک(ایمیل):</label>
                    <input type="email" id="e-mail" name="email" class="form-control" placeholder="example@mailservice.com" required title="لطفا پست الکترونیک خود یا یک پست الکترونیک در دسترس را وارد کنید(برای دریافت کد کاربری و رمز عبور)"><br>

                    <span class="attend attend-star">*</span><h4>جنسیت:</h4><br>
                    <input type="radio" id="Female" name="gender" value="female" class="form-check-input">
                    <label for="Female" class="form-label">زن</label><br>

                    <input type="radio" id="Male" name="gender" value="male" class="form-check-input" required>
                    <label for="Male" class="form-label">مرد</label><br><br>

                    <span class="attend attend-star">*</span><h4>میزان تحصیلات:</h4><br>
                    <label for="education">تحصیلات:</label>
                    <select id="education"  name="education" class="form-select" required>
                        <option value="">--یک گزینه را انتخاب کنید--</option>
                        <br>
                        <option value="High School">زیر دیپلم</option>
                        <br>
                        <option value="Diploma Degree">دیپلم</option>
                        <br>
                        <option value="Associate Degree">کاردانی</option>
                        <br>
                        <option value="Bachelor Degree">کارشناسی</option>
                        <br>
                        <option value="Master Degree">کارشناسی ارشد</option>
                        <br>
                        <option value="PhD">دکتری</option>
                    </select>
                    <br>
                    <h4>محدوده سنی:</h4>
                    <span class="attend attend-star">*</span><p>شما در چه محدوده سنی قرار دارید؟</p><br>
                    <input type="radio" name="age_area" id="lower" value="-18" class="form-check-input" required>
                    <label for="lower" class="form-label"> کمتر از 18 سال (کودک) </label><br>

                    <input type="radio" name="age_area" id="upper" value="+18" class="form-check-input">
                    <label for="upper" class="form-label"> بیشتر از 18 سال (بزرگسال) </label><br><br><hr>

                    <span class="attend attend-star">*</span><h4>نوع بیماری و تاریخ تشخیص بیماری:</h4><br>
                    <div class="row">
                        <div class="col-3">
                            <input type="radio" name="disease" id="als" value="ALS" class="form-check-input" required>
                            <label for="als" class="form-label">ALS</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" name="disease" id="ms" value="MS" class="form-check-input">
                            <label for="ms" class="form-label">MS</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" name="disease" id="cva" value="CVA" class="form-check-input">
                            <label for="cva" class="form-label">سکته مغزی</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" name="disease" id="parkinson" value="PARKINSON" class="form-check-input">
                            <label for="parkinson" class="form-label">پارکینسون</label>
                        </div>
                    </div>
                    <br>
                    <span class="attend attend-star">*</span><label for="D">تاریخ تشخیص بیماری:</label>
                    <br><br>
                    <div class="input-group">
                        <!--                    Day-->
                        <select class="form-select" name="day" id="D" required><option value="">روز</option><?php for ($i=0; $i<31; $i++){ $d = 1 + $i; echo "<option value=\"$d\">$d</option>";} ?></select>
                        <!--                    Month-->
                        <select class="form-select" name="month" id="M" required><option value="">ماه</option><?php for ($i=0; $i<12; $i++){ $m = 1 + $i; echo "<option value=\"$m\">$m</option>";} ?></select>
                        <!--                    Year-->
                        <select class="form-select" name="year" id="Y" required><option value="">سال</option><?php for ($i=1; $i<=100; $i++){ $y = 1303 + $i; echo "<option value=\"$y\">$y</option>";} ?></select>
                    </div>
                    <br>
                    <h4>سابقه گفتار درمانی</h4>
                    <br>
                    <span class="attend attend-star">*</span><p>وضعیت گفتار درمانی خود را مشخص کنید</p>
                    <br>

                    <input type="radio" name="therapy" id="therapy" class="form-check-input" value="سابقه گفتار درمانی دارد" required>
                    <label for="therapy">دارد</label>
                    <br><br>

                    <input type="radio" name="therapy" id="not_therapy" class="form-check-input" value="سابقه گفتار درمانی ندارد" required>
                    <label for="not_therapy">ندارد</label>
                    <br><br>

                    <input type="radio" name="therapy" id="in_therapy" class="form-check-input" value="درحال درمان است" required>
                    <label for="in_therapy">درحال درمان</label>
                    <br>
                    <br>
                    <hr>
                    <h4>وضعیت بینایی و شنوایی:</h4>
                    <br>
                    <span class="attend attend-star">*</span><h6>بینایی:</h6><br>
                    <input type="radio" name="vision" id="corrected" value="Corrected" class="form-check-input" required>
                    <label for="corrected">اصلاح شده</label>
                    <input type="radio" name="vision" id="Not corrected" value="Not corrected" class="form-check-input margin-right">
                    <label for="Not corrected">اصلاح نشده</label>
                    <br><br>
                    <br>
                    <span class="attend attend-star">*</span><h6>شنوایی:</h6><br>
                    <input type="radio" name="hearing" id="h-corrected" value="Corrected" class="form-check-input" required>
                    <label for="h-corrected">اصلاح شده</label>
                    <input type="radio" name="hearing" id="h-Not corrected" value="Not corrected" class="form-check-input margin-right">
                    <label for="h-Not corrected">اصلاح نشده</label>
                    <br><br><br>
                    <hr>
                    <label for="description">
                        <h4>توضیحات:</h4>
                        <p>درصورتی که نکته خاصی در بیماری شما وجود دارد که در فرآیند پژوهش ما اثرگذار است در کادر زیر ذکر فرمایید</p>
                    </label>
                    <textarea id="description" name="description" class="form-control"></textarea><br>
                    <input type="checkbox" class="form-check-input" name="agreement" id="agreement" value="پس از مطالعه روند پژوهش بدینوسیله رضایت خود را برای مشارکت در این پروژه تحقیقاتی اعلام می‌کنم." required>
                    <label for="agreement">پس از مطالعه <a href="#" target="_blank" aria-required="true">روند پژوهش</a> بدینوسیله رضایت خود را برای مشارکت در این پروژه تحقیقاتی اعلام می‌کنم.</label><br>
                    <br><br>
                    <hr>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info btn-block"><span class="livicon" data-n="check-circle-alt" data-size="22" data-color="white" data-onparent="true"></span>  ثبت نام</button>
                        <br>
                        <hr>
                        <button type="reset" class="btn btn-outline-danger" title="انصراف از ثبت نام"><span class="livicon" data-n="ban" data-color="#dc3545" data-size="22" data-hc="white" data-onparent="true"></span>  انصراف</button>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
        </div>
    </div>
    <!--    Footer Block-->
    <div class="row footer_contents">
        <section class="copyright2">
            <p><span class="livicon" data-n="info" data-size="18" data-color="blue" data-onparent="true"></span>  طراحی و اجرا: <span style="color: red; font-weight: bold">رضا افشین مهر</span></p>
        </section>
    </div>
</div>
<!--Script Block for Animation Scroll-->
<script src="js/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>

