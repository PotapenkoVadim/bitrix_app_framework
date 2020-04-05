		<?php include(__DIR__.'/layouts/header.php'); ?>
			<header class='container-fluid bg-primary'>
				<p class='text-white h4 text-center p-4'>Шаблон приложения</p>
			</header>
			<main class='container-fluid bg-light'>
				<p class='text-center'>Основной контент дефолтного шаблона</p>
				<?php if (!empty($data)): ?>
					<p class='text-center h5'><?php $this->debug($data);?></em></p>
				<?php endif; ?>
			</main>
			<footer class='container-fluid bg-info'>
				<p class='text-white text-right py-2'>Создано с божьей помощью</p>
			</footer>
		<?php include(__DIR__.'/layouts/footer.php'); ?>