		<?php include(__DIR__.'/layouts/header.php'); ?>
			<header class='container-fluid bg-primary'>
				<p class='text-white h4 text-center'>Шаблон табличного приложения</p>
				<?php if(!empty($data)): ?>
					<p class='text-white h5 text-center'>Переданные данные: <em><?=$data;?></em></p>
				<?php endif; ?>
				<form class='text-white'>
					<div class='row'>
						<div class="form-group col">
							<label for="formGroupExampleInput">Пункт формы:</label>
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Пример пункта формы">
						</div>
						<div class="form-group col">
							<label for="formGroupExampleInput2">Пункт формы:</label>
							<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Пример пункта формы">
						</div>
						<div class='form-group col'>
							<label class="mr-sm-2" for="inlineFormCustomSelect">Пункт формы:</label>
					    	<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
					    		<option selected>Выбор...</option>
					    		<option value="1">One</option>
					    		<option value="2">Two</option>
					    		<option value="3">Three</option>
					    	</select>
					    </div>
					</div>

					<div class='row'>
						<div class='col-1'>
							<input type="submit" name="name" class='btn btn-success m-2'>
						</div>
					</div>
				</form>
			</header>
			<main class='container-fluid bg-light'>
				<table class='table text-center table-hover'>
					<thead class='text-white'>
						<tr>
							<th class='bg-info'>Manger</th>
							<th class='bg-info'>Deals</th>
							<th class='bg-info'>Tasks</th>
							<th class='bg-info'>Descriptions</th>
							<th class='bg-info'>Comments</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
						<tr>
							<td>Item 1</td>
							<td>Item 2</td>
							<td>Item 3</td>
							<td>Item 4</td>
							<td>Item 5</td>
						</tr>
					</tbody>
					<tfoot class='text-white'>
						<tr>
							<th class='bg-info'>Result 1</th>
							<th class='bg-info'>Result 2</th>
							<th class='bg-info'>Result 3</th>
							<th class='bg-info'>Result 4</th>
							<th class='bg-info'>Result 5</th>
						</tr>
					</tfoot>
				</table>

				
			</main>
			<footer class='container-fluid bg-primary'>
				<p class='text-white text-right py-2'>Создано с божьей помощью</p>
			</footer>
		<?php include(__DIR__.'/layouts/footer.php'); ?>