<?php
/**
 * Created by PhpStorm.
 * User: ehi
 * Date: 4/20/2019
 * Time: 2:14 PM
 */

namespace app\models;
use Yii;
use \yii\web\Controller;
use app\models\contact;
use app\models\SignUp;
use yii\web\Cookie;
use yii\web\UploadedFile;
use app\models\login;

class LoginManager
{
    /**
     * @param $email
     * @param $password
     * @return array|\yii\db\ActiveRecord[]
     */
    public function processLogin($email, $password) {
        self::deleteCookie();
        $loginModel = new login();
        $data = $loginModel->find()->where(["email" => $email, "password" => md5($password)])->asArray()->one();
        if (count($data) > 0) {
            $sessionId = SessionManager::createLoginSession($data["signupId"]);
            /** Now, Save Session ID into Cookie */
            LoginManager::createCookie("south-user", $sessionId);
        }
        return $data;
    }

    public static function createCookie($name = "south-user", $value = "") {
        if (isset($_COOKIE[$name]) && !empty($_COOKIE[$name])){
            return true;
        }
        setcookie($name, $value);
        setcookie($name, $value, null, "/");
        $_COOKIE[$name] = $value;
        return true;
    }

    public static function deleteCookie($name = "south-user"){
        setcookie($name, "", time()-1000);
        setcookie($name, "", time()-1000, "/");
        return true;
    }

    public static function createSession(){
        return substr(sha1(md5(time())), 0, 5);
    }

    public static function getComputer(){
        return PHP_VERSION > "5.3" ? gethostname() : php_uname("n");
    }

    public static function getCurrentUrl($show_www = true){
        $url = "http://";
        if (isset($_SERVER["HTTPS"])){
            $url = ($_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        }
        if ($_SERVER["SERVER_PORT"] != "80"){
            $url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else{
            $url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $show_www ? $url : str_replace("www.", "", $url);
    }
}