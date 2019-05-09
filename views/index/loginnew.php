<?php
/**
 * Created by PhpStorm.
 * User: ehi
 * Date: 4/4/2019
 * Time: 10:51 AM
 */
use yii\helpers\html;
use yii\widgets\ActiveForm;

$homeUrl = Yii::$app->getHomeUrl();

?>



<section class="breadcumb-area bg-img" style="text-align: left;">
    <!-- Contact Form Area -->
    <br>
    <br>
    <br>
    <br>
    <div class="col-12 col-lg-12" style="font-size: 18px">
        <div class="col-md-6" style="margin-left: 25%">

            <div class="contact-form">

                <?php

                if (!empty($message)){
                    echo "<div class='alert alert-info' >$message</div>";
                }

                if (!empty($error)){
                    echo "<div class='alert alert-danger' >Invalid Username and/or Password</div>";
                }

                $form = ActiveForm::begin(['options' =>['enctype'=>'multipart/form-data']]);

                $formGroupBegin = "<div class='form-group'>";
                $formGroupEnd = "</div>";

                ?>

                <?= $formGroupBegin . $form->field($loginModel, 'email')->textInput(["placeholder"=>"Email"]) . $formGroupEnd ?>
                <?= $formGroupBegin . $form->field($loginModel, 'password')->passwordInput([ "placeholder"=>"Password"]) . $formGroupEnd ?>
                <?= Html::submitButton('submit', ['class' => 'btn south-btn', 'name' => 'submit']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>




    <!-- Google Maps -->
    <div class="map-area mb-100">
            <div class="row">
                <div class="col-12">
                    <div id="googleMap" class="googleMap"></div>


            </div>
        </div>
    </div>





