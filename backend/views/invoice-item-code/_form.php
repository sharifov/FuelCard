<?php
/**
 * /var/www/html/backend/runtime/giiant/4b7e79a8340461fe629a6ac612644d03
 *
 * @package default
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 *
 * @var yii\web\View $this
 * @var common\models\InvoiceItemCode $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="invoice-item-code-form">

    <?php $form = ActiveForm::begin([
		'id' => 'InvoiceItemCode',
		'layout' => 'horizontal',
		'enableClientValidation' => true,
		'errorSummaryCssClass' => 'error-summary alert alert-danger',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				//'offset' => 'col-sm-offset-4',
				'wrapper' => 'col-sm-8',
				'error' => '',
				'hint' => '',
			],
		],
	]
);
?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>


<!-- attribute account_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'account_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(common\models\Account::find()->all(), 'account', 'account'),
	[
		'prompt' => 'Select',
		'disabled' => (isset($relAttributes) && isset($relAttributes['account_id'])),
	]
); ?>

<!-- attribute description -->
			<?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<!-- attribute type -->
			<?php echo $form->field($model, 'type')->dropDownList(
                \common\enums\InvoiceItemCodeType::getUiEnums(),
                [
                    'prompt' => 'Select'
                ]
            ); ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('app', 'InvoiceItemCode'),
				'content' => $this->blocks['main'],
				'active'  => true,
			],
		]
	]
);
?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?php echo Html::submitButton(
	'<span class="glyphicon glyphicon-check"></span> ' .
	($model->isNewRecord ? 'Create' : 'Save'),
	[
		'id' => 'save-' . $model->formName(),
		'class' => 'btn btn-success'
	]
);
?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
