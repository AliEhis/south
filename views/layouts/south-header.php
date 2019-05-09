<?php
/**
 * Created by PhpStorm.
 * User: MAXWELL
 * Date: 3/17/2019
 * Time: 9:40 AM
 */

use app\models\SessionManager;
use app\models\LoginSession;
use app\models\SignUp;


$homeUrl = Yii::$app->getHomeUrl();
?>

<!-- ##### Header Area Start ##### -->
<style>
 .logout{padding-right: 20px;
 padding-top: 10px;}
    .logout a{
        color: white;
        font-size: 18px;
        text-decoration:none;
    }
    .logout a:hover{
        background-color:black;

    }
</style>
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address" style="color: #fff;">
                    <h4>
                        <?php
                            $sessionId = SessionManager::getCookieSessionId();
                            if ($sessionId != null)
                            {
                                $sessionRow = LoginSession::find()->where(["sessionId"=>$sessionId])->asArray()->one();
                                $userRecord = SignUp::find()->where(["id"=>$sessionRow["signupId"]])->asArray()->one();
                                echo $userRecord["firstname"]." ".$userRecord["lastname"];
                            }
                        ?>
                    </h4>
                </div>
                <div class="phone-number d-flex">
                    <?php
                    if ($sessionId == null)
                    {
                        echo '<div style="color:white; background-color: black; font-size: 20px; text-decoration:none">
                                    <a href="../index/sign-up">Sign Up</a>
                                </div>';
                    }
                    ?>
                    <div class="icon">
                        <img src="<?=$homeUrl;?>img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a href="tel:+45 677 8993000 223">08077068954</a>
                    </div>
                    <?php
                        if ($sessionId != null)
                        {
                            echo '<div class="logout" style="color: white; font-size: 30px">
                                        <a href="../index/logout">Logout</a>
                                    </div>';
                        }
                    ?>

                </div>
            </div>
        </div>


        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index"><img src="<?=$homeUrl;?>img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index">Home</a></li>
                                        <li><a href="index/contact2">Contact2</a></li>
                                        <li><a href="#">Listings</a>
                                            <ul class="dropdown">
                                                <li><a href="listings.html">Listings</a></li>
                                                <li><a href="single-listings.html">Single Listings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Login</a>
                                            <ul class="dropdown">
                                                <li><a href="index/login">LOgin</a></li>
                                                <li><a href="single-blog.html">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="../index/about">About</a></li>
                                <li><a href="../index/properties">Properties</a>
                                    <ul class="dropdown">
                                        <?php
                                            if ($sessionId != null)
                                            {
                                                echo "<li><a href=\"../product/add-new\">Add New</a></li>";
                                            }
                                        ?>
                                        <li><a href="../index/product">Products</a>
                                            <ul class="dropdown">
                                                <li><a href="../index/categories">Categories</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                </li>
                                <li><a href="contact">Contact</a></li>
                                <?php
                                    if ($sessionId == null)
                                    {
                                       echo '<li><a href="../index/login">LOGIN</a>';
                                    }
                                ?>
                                    <?php
                                    if ($sessionId != null)
                                    {
                                        echo "<li><a href=\"../index/user-profile\">Update Profile</a></li>";
                                    }
                                    ?>
                                </li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->