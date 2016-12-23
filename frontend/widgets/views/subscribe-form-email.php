<?php
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\ActiveForm;

/**
 * View file for Subscribe widget
 *
 * @var \yii\web\View $this
 * @var \bl\newsletter\common\entities\Client $model
 * @var string $actionRoute
 *
 * @link https://github.com/black-lamp/yii2-newsletter
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */

BootstrapAsset::register($this);
?>

<?php
$form = ActiveForm::begin([
    'action' => $actionRoute,
    'options' => ['class' => 'form-inline'],
    'enableClientValidation' => false
])
?>
    <?= $form->field($model, 'email')
            ->textInput()
            ->label(false) ?>
    <?= Html::submitButton('Subscribe', ['class' => 'btn btn-success']) ?>
<?php $form->end() ?>
