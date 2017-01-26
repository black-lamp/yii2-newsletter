<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;

use bl\newsletter\frontend\Module as Newsletter;
use bl\newsletter\common\helpers\ResultMessage;

/**
 * Default controller for the frontend module
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @var Newsletter
     */
    public $module;
    /**
     * @inheritdoc
     */
    public $defaultAction = 'subscribe';


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'subscribe' => ['post']
                ]
            ]
        ];
    }

    /**
     * Subscribe on newsletter by email
     *
     * @return string|Response
     */
    public function actionSubscribe()
    {
        /** @var \bl\newsletter\common\entities\Client $client */
        $client = $this->module->getClientManager()->buildClient();
        $client->load(Yii::$app->request->post());
        $resultMessage = ResultMessage::get($client->insert());

        if(Yii::$app->request->isAjax) {
            return $resultMessage;
        }

        Yii::$app->get('session')
            ->setFlash($this->module->flashMessageKey, $resultMessage);

        return $this->redirect(Yii::$app->request->referrer);
    }
}
