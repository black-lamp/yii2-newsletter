<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\newsletter\backend\controllers;

use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;

use bl\newsletter\backend\Module as Newsletter;
use bl\newsletter\common\entities\Client;
use bl\newsletter\common\helpers\CSV;

/**
 * Default controller for the backend module
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'list';
    /**
     * @var Newsletter
     */
    public $module;


    /**
     * List of subscribed clients
     *
     * @return string
     */
    public function actionList()
    {
        $providerConfig = array_merge($this->module->dataProvider, ['query' => Client::find()]);
        $provider = new ActiveDataProvider($providerConfig);

        $viewParams = [
            'provider' => $provider,
            'enableCsv' => $this->module->enableCsv
        ];

        if(Yii::$app->request->isAjax) {
            return $this->renderAjax('list', $viewParams);
        }

        return $this->render('list', $viewParams);
    }

    /**
     * Remove client from database
     *
     * @param integer $id
     * @return Response|string
     */
    public function actionDelete($id)
    {
        if($client = Client::findOne($id)) {
            $client->delete();
        }

        if(Yii::$app->request->isAjax) {
            return $this->actionList();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Remove all clients from database
     *
     * @return string|Response
     */
    public function actionClear()
    {
        $clients = Client::find()->all();
        $transaction = Client::getDb()->beginTransaction();
        try {
            foreach ($clients as $client) {
                $client->delete();
            }
            $transaction->commit();
        }
        catch (Exception $ex) {
            $transaction->rollBack();
        }

        if(Yii::$app->request->isAjax) {
            return $this->actionList();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     *  Download list of clients as CSV file
     */
    public function actionDownloadCsv()
    {
        CSV::download($this->module->clientManager->getCsv(), 'clients.csv');
    }
}
