<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="/php/Home">Tuyển dụng Việc</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="/php/Home" class="nav-link active">Home</a></li>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li class="has-children">
                        <a href="#" class="active">All Jobs</a>
                        <ul class="dropdown">
                            <li><a href="/php/adminBaiViet/AddBaiViet">Tất cả công việc</a></li>
                            <li><a href="/php/adminBaiViet/AllBaiViet">Công việc ngẫu nhiên</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Trang quản lý</a></li>

                    <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                    <li class="d-lg-none"><a href="login.html">Log In</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <?php
                    if (Session::getSesion('name') != '') {
                        echo '<a href="#" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block">Xin chào ' . Session::getSesion("name") . '</a><a href="' . BASE_URL . 'login/logout" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>';
                    } else
                        echo '<a href="' . BASE_URL . 'login/login" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>';

                    ?>
                </div>
                <la href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-g-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

        </div>
    </div>
</header>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('/php/Assets/images/hero_1.jpg');" id="home-section">
</section>