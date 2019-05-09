<?php

namespace app\controllers;
use app\models\ChangeHistory;
use Yii;
use \yii\web\Controller;
use app\models\contact;
use app\models\SignUp;
use app\models\LoginManager;
use app\models\SessionManager;
use app\models\SignUpServices;
use app\models\login;
use app\models\LoginSession;
use yii\bootstrap\Widget ;
use yii\web\UploadedFile;

class IndexController extends controller
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

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionContact()
    {
        $request = Yii::$app->request;

        if ($request->isPost && count($request->post()) > 0) {
            $model = new contact();
            $model->load($request->post());
            if ($model->validate()){
                $model->save();

            } else {
                return $this->render('contact', ['contactModel' => $model]);
            }
        }

        $model = new contact();
        return $this->render('contact', ['contactModel' => $model]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignUp()
    {
        $request = Yii::$app->request;
        if ($request->isPost && count($request->post()) > 0) {
            $signUpServices = new SignUpServices();
            $signUpServices->registerNewUser();

            //Reset Form for New Registration...
            $signUpModel = new SignUp();
            $loginModel = new login();
            return $this->render('signup', ['signUpModel' => $signUpModel,'loginModel' => $loginModel, "submitted"=>true]);
        }

        $signUpModel = new SignUp();
        $loginModel = new login();
        return $this->render('signup', ['loginModel' => $loginModel, 'signUpModel'=>$signUpModel]);
     }


    public function actionProperties()
    {

        return $this->render('properties');
    }


    public function actionLogin()
    {
        $result = Yii::$app->request;

        if ($result->isPost && count($result->post()) > 0){
            $login = $result->post("login");
            $loginManager = new LoginManager();
            $loginData = $loginManager->processLogin($login["email"], $login["password"]);
            if (!is_null($loginData) && is_array($loginData)){
                //Redirect user to landing page...OR Product listing page...
                $this->redirect(['index/index']);
            }

            $loginModel = new login();
            return $this->render('loginnew', ['loginModel' => $loginModel, "error"=>true]);
        }

        if ($result->get("session", 1)==0){
            $message = "Session Timeout/Expired! Please Login again.";
        }
        else if ($result->get("session", 1)==2){
            $message = "Logout Successfully!";
        }
        else{
            $message = "";
        }

        return $this->render('loginnew', ['loginModel' => new login(), "message"=>$message]);

    }


    public function actionUserProfile()
    {
        $signUpModel = new SignUp();
        $loginModel = new login();
        $sessionId = SessionManager::getCookieSessionId();
        if ($sessionId != null)
        {
            $sessionRow = LoginSession::find()->where(["sessionId"=>$sessionId])->asArray()->one();
            $signUpModel = SignUp::find()->where(["id"=>$sessionRow["signupId"]])->one();
            $loginModel = Login::find()->where(["signupId"=>$sessionRow["signupId"]])->one();

            $request = Yii::$app->request;
            if ($request->isPost && count($request->post()) > 0)
            {
                $signUpServices = new SignUpServices();
                $signUpServices->udpateProfile($sessionRow["signupId"], $signUpModel, $loginModel);
            }
        }
        return $this->render('profile', ['loginModel' => $loginModel, 'signUpModel'=>$signUpModel]);
    }


    public function actionLogout()
    {
        $sessionId = SessionManager::getCookieSessionId();
        if (!is_null($sessionId))
        {
            $sessionManager = new SessionManager();
            $sessionManager->deleteExpiredSession();
            $sessionManager->deleteSession($sessionId);
            LoginManager::deleteCookie(SessionManager::$sessionCookieName);
        }
        return $this->redirect(["/index/login", "session"=>"2"]);
    }


    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionCategories()
    {

        return $this->render('categories');
    }


}
