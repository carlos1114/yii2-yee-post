<?php

use yii\widgets\Pjax;
use yeesoft\helpers\Html;
use yeesoft\grid\GridView;
use yeesoft\post\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\post\TagSearch */
/* @var $dataProvider yeesoft\data\ActiveDataProvider */

$this->title = Yii::t('yee/media', 'Tags');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/post', 'Posts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['actions'] = Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']);
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $pjax = Pjax::begin() ?>
        <?=
        GridView::widget([
            'pjaxId' => $pjax->id,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'quickFilters' => false,
            'columns' => [
                ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px'], 'displayFilter' => false],
                [
                    'class' => 'yeesoft\grid\columns\TitleActionColumn',
                    'title' => function (Tag $model) {
                        return Html::a($model->title, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                    },
                    'buttonsTemplate' => '{update} {delete}',
                    'filterOptions' => ['colspan' => 2],
                ],
                [
                    'attribute' => 'slug',
                    'options' => ['style' => 'width:50%'],
                ],
            ],
        ]);
        ?>
        <?php Pjax::end() ?>
    </div>
</div>