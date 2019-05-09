<?php
/**
 * Created by PhpStorm.
 * User: ehi
 * Date: 4/28/2019
 * Time: 4:48 PM
 */


namespace app\models;
use Yii;
use yii\web\UploadedFile;


class SignUpServices
{
    /**
     * @return bool
     */
    public function registerNewUser()
    {
        $request = Yii::$app->request;
        $signUpModel = new SignUp();
        $image = UploadedFile::getInstance($signUpModel, 'image');
        $uploadedImageName = substr(md5(rand(0, 1000)), 0, 10).".".$image->extension;
        $image->saveAs('uploads/'. $uploadedImageName);

        $post = $request->post();
        $post["SignUp"]["image"] = $uploadedImageName;

        //Now, save into the 2 tables
        $signUpModel->load($post, "SignUp");
        $signUpModel->save();

        $signupId = Yii::$app->db->getLastInsertID();

        $post["login"]["password"] = md5($post["login"]["password"]);
        $post["login"]["email"] = $post["SignUp"]["email"];
        $post["login"]["isAdmin"] = 0;
        $post["login"]["otpPass"] = "";
        $post["login"]["signupId"] = $signupId;

        $loginModel = new login();
        $loginModel->load($post, "login");
        return $loginModel->save();
    }

    /**
     * @param SignUp $signUpModel
     * @param lo3gin $loginModel
     * @return bool
     */
    public function udpateProfile($signupId, SignUp &$signUpModel, login &$loginModel)
    {
        $request = Yii::$app->request;
        $post = $request->post();
        $SignUpPostData = $post["SignUp"];
        $loginPostData = $post["login"];

        $image = UploadedFile::getInstance($signUpModel, 'image');
        $ChangeHistory = new ChangeHistory();

        if (!$image->hasError)
        {
            $uploadedImageName = substr(md5(rand(0, 1000)), 0, 10).".".$image->extension;
            $image->saveAs('uploads/'. $uploadedImageName);

            $oldImage = $signUpModel->getAttribute("image");
            $signUpModel->setAttribute("image", $uploadedImageName);
            $signUpModel::updateAll(["image"=>$uploadedImageName], ["id"=>$signupId]);
            //Log change History
            $ChangeHistory->log($signUpModel::tableName(), "image", $oldImage, $uploadedImageName, $signupId);
        }

        unset($SignUpPostData["image"]);
        foreach($SignUpPostData as $fieldName => $newValue){
            $oldValue = $signUpModel->getAttribute($fieldName);
            $signUpModel->setAttribute($fieldName, $newValue);
            //Log change History
            $ChangeHistory->log($signUpModel::tableName(), $fieldName, $oldValue, $newValue, $signupId);
            if ($fieldName=="email" || $fieldName=="password" ){
                $loginPostData[$fieldName] = $newValue;
                $oldValue = $loginModel->getAttribute($fieldName);
                $loginModel->setAttribute($fieldName, $newValue);
                $ChangeHistory->log($loginModel::tableName(), $fieldName, $oldValue, $newValue, $signupId);
            }
        }
        $signUpModel::updateAll($SignUpPostData, ["id"=>$signupId]);
        $loginModel::updateAll($loginPostData, ["signupId"=>$signupId]);
        return true;
    }

}