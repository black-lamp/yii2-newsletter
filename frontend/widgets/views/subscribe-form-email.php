<?php
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\ActiveForm;

use bl\newsletter\common\entities\Client;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @var \yii\web\View $this
 * @var string $moduleId
 * @var Client $model
 */

BootstrapAsset::register($this);
?>

<?php
$action_route = $moduleId . '/default/subscribe-email';
$form = ActiveForm::begin([
    'action' => [$action_route],
    'options' => ['class' => 'form-inline'],
    'enableClientValidation' => false
]);
?>
    <?= $form->field($model, 'email')->textInput()->label(false) ?>
    <?= Html::submitButton('Subscribe', ['class' => 'btn btn-success']) ?>
<?php $form->end() ?>
