<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="/php/Login/dashboard">ADMIN</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="/php/Login/dashboard" class="nav-link active">Home</a></li>
                    <li><a href="################">About</a></li>
                    <li class="has-children">
                        <a href="#" class="active">Bài viết</a>
                        <ul class="dropdown">
                            <li><a href="/php/adminBaiViet/AddBaiViet">Thêm bài tuyển dụng</a></li>
                            <li><a href="/php/adminBaiViet/AllBaiViet">Liệt kê bài tuyển dụng</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#">Duyệt Công việc</a>
                        <ul class="dropdown">
                            <li><a href="localhost/php/demo/dashboard">Duyệt bài</a></li>
                            <li><a href="#">Ngu</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#">Công cụ</a>
                        <ul class="dropdown">
                            <li><a href="localhost/php/demo/dashboard">Thông tin đơn xin việc</a></li>
                            <li><a href="localhost/php/demo/dashboard">Danh sách các tài khoản</a></li>
                        </ul>
                    </li>
                    <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                    <li class="d-lg-none"><a href="login.html">Log In</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <a href="#" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block">Xin chào <?php echo Session::getSesion('name') ?></a>
                    <a href="<?php echo BASE_URL; ?>login/logout" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

        </div>
    </div>
</header>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('/php/Assets/images/hero_1.jpg');" id="home-section">
</section>