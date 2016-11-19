<?php
namespace bl\newsletter\controllers;

use yii;
use yii\web\Controller;
use yii\web\Response;
use yii\base\Exception;
use yii\web\NotFoundHttpException;

use bl\newsletter\Newsletter;
use bl\newsletter\entities\Client;

/**
 * Frontend controller for the `newsletter` module
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class FrontendController extends Controller
{
    /**
     * Subscribe on newsletter by email
     *
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionSubscribeEmail()
    {
        if(Yii::$app->request->isPost) {
            $client = new Client(['scenario' => Client::SCENARIO_EMAIL]);
            $client->load(Yii::$app->request->post());

            $result_message = Newsletter::t('frontend', 'Error!');
            if($client->validate() && $client->save()) {
                $result_message = Newsletter::t('frontend', 'Success!');
            }

            if(Yii::$app->request->isAjax) {
                return $result_message;
            }

            Yii::$app->session->setFlash('newsletter', $result_message);
            return $this->redirect(Yii::$app->request->referrer);
        }

        $error_mesage = Newsletter::t('error', 'Page not found!');
        throw new NotFoundHttpException($error_mesage);
    }

    public function actionSubscribePhone()
    {
        // TODO: action for subscribe by phone number
        throw new Exception("Not implement method");
    }

    public function actionSubscribe()
    {
        // TODO: action for subscribe by email and phone number
        throw new Exception("Not implement method");

    }
}
