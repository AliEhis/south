<?php
/**
 * Created by PhpStorm.
 * User: ehi
 * Date: 4/28/2019
 * Time: 4:05 PM
 */

namespace app\models;
use Yii;


class SessionManager
{
    public static $sessionCookieName = "south-user";

    public static $session_timeout = (60 * 30); //60sec, 30min


    /**
     * @param $loginUserId
     * @return string
     * @throws \Exception
     * @throws \yii\db\Exception
     * Login Successful...Now create a login session before redirecting user to landing page.
     */
    public static function createLoginSession($loginUserId){
        $now = date("Y-m-d H:i:s");
        $sessionId = LoginManager::createSession();
        $loginSession = new LoginSession();
        $loginSession->getDb()->createCommand()
            ->insert(LoginSession::tablename(),
                ["sessionId" => $sessionId,
                    "computerName" => LoginManager::getComputer(),
                    "ipAddress" => $_SERVER["REMOTE_ADDR"],
                    "timeAdded" => $now,
                    "lastAction" => $now,
                    "lastVisited" => LoginManager::getCurrentUrl(),
                    "signupId" => $loginUserId,
                    "is_deleted" => 0])->execute();

        return $sessionId;
    }


    /**
     * @param null $cookieName
     * @return null
     */
    public static function getCookieSessionId($cookieName = null){
        $cookieName = empty($cookieName) ? self::$sessionCookieName : $cookieName;
        $sessionId = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : null;
        return $sessionId;
    }

    /**
     * @return int
     * Delete All In-active session. A session is said to be inactive if lastAction time is more than 30 minutes.
     */
    public static function deleteExpiredSession(){
        $expiredTime = date("Y-m-d H:i:s", time()-self::$session_timeout);
        return LoginSession::updateAll(["is_deleted"=>1], ["<", "lastAction", $expiredTime]);
    }

    /**
     * @return int
     * Delete A session by id.
     */
    public static function deleteSession($sessionId)
    {
        return LoginSession::updateAll(["is_deleted"=>1], ["sessionId" => $sessionId]);
    }

    /**
     * @param null $sessionId
     * @return bool
     * Validate Session - check if session is active...that is, NOT deleted.
     */
    public static function validateSession($sessionId = null){
        $sessionId = empty($sessionId) ? self::getCookieSessionId() : $sessionId;
        $session = LoginSession::find()->where(["sessionId" => $sessionId, "is_deleted"=>0])->asArray()->one();
        return ($session!=null) ? true : false;
    }

    /**
     * @param null $sessionId
     * @return int
     */
    public static function refreshSession($sessionId = null){
        $sessionId = empty($sessionId) ? self::getCookieSessionId() : $sessionId;
        $now = date("Y-m-d H:i:s");
//        $lastVisited = $_SERVER["HTTP_REFERER"];//Post Update
        $lastVisited = LoginManager::getCurrentUrl();//Pre Update

        //Method 1
        return LoginSession::updateAll(["lastAction" => $now, "lastVisited" => $lastVisited], ["sessionId" => $sessionId]);

        //Method 2 of updating...
//        $loginSession = new LoginSession();
//        return $loginSession->getDb()->createCommand()
//                           ->update(LoginSession::tablename(),
        //                                ["lastAction" => $now,
//                                    "lastVisited" => $lastVisited],
//                                ["sessionId" => $sessionId])
//                            ->execute();
    }


}