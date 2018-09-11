<?php

use yeesoft\helpers\Html;
use yeesoft\widgets\ActiveForm;
use yeesoft\post\models\Category;

/* @var $this yii\web\View */
/* @var $model yeesoft\post\models\Category */
/* @var $form yeesoft\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin() ?>

<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body">

                <?= $form->languageSwitcher($model) ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'slug')->slugInput(['maxlength' => true], 'title', '/category/') ?>

                <?= $form->field($model, 'parent_id')->dropDownList(Category::getCategories(), ['prompt' => Yii::t('yii', '(not set)'), 'encodeSpaces' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'visible')->checkbox() ?>
                    </div>

                    <?php if ($model->isNewRecord): ?>
                        <div class="col-md-6">
                            <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::a(Yii::t('yee', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']) ?>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col-md-6">
                            <?=
                            Html::a(Yii::t('yee', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-default btn-block',
                                'data' => [
                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>