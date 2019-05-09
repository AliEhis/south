<?php
/**
 * Created by PhpStorm.
 * User: MAXWELL
 * Date: 3/17/2019
 * Time: 11:07 AM
 */
use yii\helpers\html;
use yii\widgets\ActiveForm;


$homeUrl = Yii::$app->getHomeUrl();

?>

<section class="breadcumb-area bg-img" style="background-image: url(<?=$homeUrl;?>img/bg-img/hero1.jpg);">

        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Contact info</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address mt-30">
                            <h6><img src=<?=$homeUrl;?>"img/icons/phone-call.png" alt=""> 08077068964</h6>
                            <h6><img src=<?=$homeUrl;?>"img/icons/envelope.png" alt=""> office@gmail.com</h6>
                            <h6><img src=<?=$homeUrl;?>"img/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832,<br>fct, Abuja</h6>
                        </div>
                    </div>
                </div>



                    </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="googleMap" class="googleMap"></div>

                </div>
            </div>
        </div>
    </div>