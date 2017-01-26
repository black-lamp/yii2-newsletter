<?php
/**
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;

use bl\newsletter\backend\Module as Newsletter;

/**
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $provider
 * @var boolean $enableCsv
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */

BootstrapAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <h1>
            <?= Newsletter::t('list', 'List of subscribed clients') ?>
            <?php if ($enableCsv): ?>
                <?= Html::a(
                        Newsletter::t('list', 'Download CSV'),
                        Url::toRoute(['download-csv']),
                        ['class' => 'btn btn-sm btn-success pull-right']
                ) ?>
            <?php endif; ?>
        </h1>
    </div>
    <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                ['class' => yii\grid\SerialColumn::className()],
                [
                    'attribute' => 'email',
                    'label' => Newsletter::t('list', 'E-mail')
                ],
                [
                    'attribute' => 'phone',
                    'label' => Newsletter::t('list', 'Phone')
                ],
                [
                    'attribute' => 'created_at',
                    'label' => Newsletter::t('list', 'Subscribe date'),
                    'format' => 'datetime'
                ],
                [
                    'class' => yii\grid\ActionColumn::className(),
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url) {
                            return Html::a(
                                    Newsletter::t('list', 'Remove'), $url, [
                                    'class' => 'btn btn-sm btn-danger'
                                ]);
                        }
                    ]
                ]
            ]
        ]) ?>
        <?= Html::a(
                Newsletter::t('list', 'Remove all'),
                Url::toRoute(['clear']),
                ['class' => 'btn btn-danger pull-right']
            ) ?>
    </div>
</div>
