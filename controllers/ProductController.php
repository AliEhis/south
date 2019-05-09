<?php

namespace app\controllers;

use app\models\ChangeHistory;
use app\models\Products;
use Yii;
use \yii\web\Controller;
use app\models\contact;
use app\models\SignUp;
use app\models\LoginManager;
use app\models\SessionManager;
use app\models\SignUpServices;
use app\models\login;
use app\models\LoginSession;
use yii\web\UploadedFile;

class ProductController extends controller
{
    public function beforeAction($action)
    {
        $this->layout = "south-main.php";

        $sessionId = SessionManager::getCookieSessionId();
        if (!is_null($sessionId))
        {
            $sessionManager = new SessionManager();
            $sessionManager->deleteExpiredSession();
            if ($sessionManager->validateSession($sessionId) == false){
                //Invalid Session - re-route user to login again.
                LoginManager::deleteCookie(SessionManager::$sessionCookieName);
                return $this->redirect(["/index/login", "session"=>"0"]);
            }
           $sessionManager->refreshSession($sessionId);
        }

        return parent::beforeAction($action);
    }


    public function actionAddNew()
    {
        $productModel = new Products();
        $request = Yii::$app->request;
        if ($request->isPost && count($request->post()) > 0){
        $productModel = new Products();
        $image = UploadedFile::getInstance($productModel, 'product_image');
        $uploadedImageName = substr(md5(rand(0, 1000)), 0, 10).".".$image->extension;
        $image->saveAs('uploads/'. $uploadedImageName);

        $post = $request->post();
        $post["Products"]["product_image"] = $uploadedImageName;
        $productModel->load($post, "Products");
        $productModel->save();



            return $this->redirect(["/product/product-listing"]);


        }
        return $this->render('add-new', ["productModel" => $productModel]);
    }


    public function actionProductListing()
    {
        $allProducts = Products::find()->where(["is_deleted"=>0])->limit(10)->asArray()->all();

        return $this->render('product-listing', ["allProducts"=>$allProducts]);
    }


}
