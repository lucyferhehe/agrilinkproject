<?php

namespace frontend\controllers;
use frontend\models\MemberSignup;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
class SignupController extends \yii\web\Controller
{
    public function actionIndex()
    {
       
        
        $model = new MemberSignup();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
     public function actionLogout()
    {
      
        Yii::$app->user->logout();

        return $this->goHome();
    }
     public function actionLogin()
    {               
      
        $model = new LoginForm();
        if (r()->isPost) {
            $post_data = Yii::$app->request->post();

            $model->load($post_data);
            $model->trimAttributes();
            if (r()->isAjax) {
                app()->response->format = yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }
            if ($model->login()) {

                return $this->goHome();
            }
        }
        return $this->render('login', [
                    'model' => $model,                
        ]);
    }

}
