			<a class='text-muted' target="_blank" href='https://nicedo.ru/'><img class='float-left' src="core/templates/default/images/logo.png"></a>
			<div class='float-right py-4'>
				<?php if ($appName): ?>
					<p class='h6 text-muted'>Приложение: <em><?=$appName;?></em></p>
				<?php endif; ?>
				<p class='h6'><a class='text-muted' target="_blank" href='https://nicedo.ru/'>Компания разработчик: <em>NiceDo</em></a></p>
			</div>
			<div class='clearfix'></div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="core/templates/default/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="https://api.bitrix24.com/api/v1/"></script>
		<script>
			BX24.init(function () {
                BX24.resizeWindow(
                    $( document ).width(), 
                    $( document ).height() + 100 > 800 
                                    ? $( "#application" ).height() + 100 : 800,
                    function (data) {}
                );
            });
        </script>
	</body>
</html>