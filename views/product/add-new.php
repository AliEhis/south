<?php
/**
 * Created by PhpStorm.
 * User: ehi
 * Date: 4/4/2019
 * Time: 10:51 AM
 */
use yii\helpers\html;
use yii\widgets\ActiveForm;
use app\models\ProductType;
use app\models\ProductStatus;

$homeUrl = Yii::$app->getHomeUrl();

?>

<!-- ##### Breadcumb Area End ##### -->

<section class="south-contact-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-heading">
                    <h6>Register New Product</h6>
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

            <!-- Contact Form Area -->
            <div class="col-12 col-lg-8" style="font-size: 18px">

                <div class="contact-form">

                    <?php

                    if (!isset($submitted)){
                        $submitted = false;
                    }

                    if ($submitted){
                        echo "<div class='alert alert-success' >Add Successful.</div>";
                    }

                    $form = ActiveForm::begin(['options' =>['enctype'=>'multipart/form-data']]);

                    $formGroupBegin = "";
                    $formGroupEnd = "";

                    ?>
                    <?= $formGroupBegin . $form->field($productModel, 'name')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'land_size')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_type') . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_address')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_city')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_state')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_country')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'estimatedPrice')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'quotedPrice')->textInput() . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_status') . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($productModel, 'product_summary')->textInput() . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($productModel, 'product_image')->fileInput() . $formGroupEnd ?>
                    <?= Html::submitButton('submit', ['class' => 'btn south-btn', 'name' => 'submit']) ?>

                    <?php ActiveForm::end(); ?>

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