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
<section class="breadcumb-area bg-img" style="text-align: left;">


    <!-- ##### Breadcumb Area End ##### -->
    <br>
    <br

        <br>
        <br>
        <div class="container" style="margin-left: 25%; font-size: 18px;" >

            <div class="row">

                    </div>
                </>

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-6" style="background-color:gray">

                    <div class="contact-form">

                    <?php
                        $form = ActiveForm::begin(['id' => 'contact-form']);

                        $formGroupBegin = "<div class='form-group'>";
                        $formGroupEnd = "</div>";

                    ?>
                    <?= $formGroupBegin . $form->field($contactModel, 'name')->textInput(['autofocus' => true, "placeholder"=>"Name"]) . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($contactModel, 'phone')->textInput(["placeholder"=>"Phone"]) . $formGroupEnd ?>

                    <?= $formGroupBegin . $form->field($contactModel, 'email')->textInput(["placeholder"=>"Email"]) . $formGroupEnd ?>

                        <div class="form-group">
                            <?= $form->field($contactModel, 'message')->textarea(['rows' => 10, "cols" => 30, "placeholder"=>"Message"]) ?>
                        </div>

                        <?= Html::submitButton('Send Message', ['class' => 'btn south-btn', 'name' => 'submit']) ?>

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