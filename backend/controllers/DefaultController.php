<?php
namespace bl\newsletter\backend\controllers;

use yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;

use bl\newsletter\common\entities\Client;
use bl\newsletter\common\helpers\CSV;

/**
 * Default controller for the `newsletter` module
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
     * List of subscribed clients
     *
     * @return string
     */
    public function actionList()
    {
        $query = Client::find();

        $count_query = clone $query;
        $pages = new Pagination([
            'totalCount' => $count_query->count()
        ]);

        $clients = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $view_params = [
            'clients' => $clients,
            'pages' => $pages
        ];

        if(Yii::$app->request->isAjax) {
            return $this->renderAjax('list', $view_params);
        }

        return $this->render('list', $view_params);
    }

    /**
     * Remove client from database
     *
     * @param integer $id
     * @return Response
     */
    public function actionDelete($id)
    {
        if($client = Client::findOne($id)) {
            $client->delete();
        }

        if(Yii::$app->request->isAjax) {
            $this->actionList();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     *  Download list of clients as CSV file
     */
    public function actionDownloadCsv()
    {
        $csv = Client::getCsv();
        CSV::download($csv, 'clients.csv');
    }
}
