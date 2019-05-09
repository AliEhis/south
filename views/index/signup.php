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
    <br>
    <br

    <br>
    <br>

    <div class="container h-100">





            <!-- Contact Form Area -->
            <div class="col-12 col-lg-6" style="font-size: 18px; margin-left: 25%; background-color: #f1f6f8">

                <div class="signup-form" style="">

                    <?php

                    if (!isset($submitted)){
                        $submitted = false;
                    }

                    if ($submitted){
                        echo "<div class='alert alert-success' >Sign Up Successful.</div>";
                    }

                    $form = ActiveForm::begin(['options' =>['enctype'=>'multipart/form-data']]);

                    $formGroupBegin = "<div class='form-group'>";
                    $formGroupEnd = "</div>";

                    ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'firstname')->textInput(['autofocus' => true, "placeholder"=>"FirstName"]) . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($signUpModel, 'lastname')->textInput(["placeholder"=>"LastName"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'username')->textInput([ "placeholder"=>"Username"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'phone')->textInput([ "placeholder"=>"Phone"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'email')->textInput(["placeholder"=>"email"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($loginModel, 'password')->textInput(["placeholder"=>"Password"]) . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($signUpModel, 'dob')->textInput([ "placeholder"=>"Date Of Birth"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'address')->textInput(["placeholder"=>"Address"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'state')->textInput(["placeholder"=>"state"]) . $formGroupEnd ?>
                    <?= $formGroupBegin . $form->field($signUpModel, 'country')->textInput(["placeholder"=>"Country"]) . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($signUpModel, 'image')->fileInput() . $formGroupEnd ?>
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