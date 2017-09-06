<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	    NavBar::begin([
	        'brandLabel' => 'Auto Solutions',
	        'brandUrl' => Yii::$app->homeUrl,
	        'options' => [
	            'class' => 'navbar-inverse navbar-fixed-top',
	        ],
	    ]);
		    echo Nav::widget([
		        'options' => ['class' => 'navbar-nav navbar-right'],
		        'items' => [
		            ['label' => 'Home', 'url' => ['/site/index']],
		            ['label' => 'Clientes', 'url' => ['/cliente']],
		            ['label' => 'Contato', 'url' => ['/site/contact']],
		            Yii::$app->user->isGuest ? (
		                ['label' => 'Login', 'url' => ['/site/login']]
		            ) : (
		                '<li>'
		                . Html::beginForm(['/site/logout'], 'post')
		                . Html::submitButton(
		                    'Logout (' . Yii::$app->user->identity->username . ')',
		                    ['class' => 'btn btn-link logout']
		                )
		                . Html::endForm()
		                . '</li>'
		            )
		        ],
		    ]);
	    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
	            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	        ]);
        ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
	<?= Yii::$app->language ?>
    <div class="container">
        <p class="pull-left">&copy; Auto Solutions <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
