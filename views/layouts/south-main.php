<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$homeUrl = Yii::$app->getHomeUrl();
?>
<?php $this->beginPage() ?>
</head>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="south real estate buy home Nigeria Costruction Home-Buyer Property Properties">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Favicon  -->
    <link rel="icon" href="<?=$homeUrl;?>img/core-img/favicon.ico">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=$homeUrl;?>style.css">
    <script src="<?=$homeUrl;?>js/main-south.js">

    </script>
    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>
<!---->
<!--<div class="wrap">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
//    ]);
//    NavBar::end();
//    ?>

<!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <div class="">
        <?= $this->render('south-header')?>
        <?= $content ?>
        <?= $this->render('south-footer')?>
    </div>
<!--</div>-->

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
