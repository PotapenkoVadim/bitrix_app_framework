<?php
$result = libs\crest\CRestPlus::installApp();
if($result['rest_only'] === false):?>
<head>
	<link rel="stylesheet" type="text/css" href="core/templates/default/bootstrap/css/bootstrap.css">
	<script src="//api.bitrix24.com/api/v1/"></script>
	<?if($result['install'] == true):?>
	<script>
		BX24.init(function(){
			BX24.installFinish();
			window.location.reload()
		});
	</script>
	<?endif;?>
</head>
<body>
	<?if($result['install'] == true):?>
		<p class='bg-success text-white h1'>Установка приложения завершена</p>
	<?else:?>
		<p class='bg-danger text-white h1'>Ошибка при установке приложения</p>
	<?endif;?>
</body>
<?endif;