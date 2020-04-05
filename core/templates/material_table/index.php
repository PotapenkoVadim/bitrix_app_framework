		<?php include(__DIR__.'/layouts/header.php'); ?>
			<div class='row grey darken-3'>
				<div class='col s12 pad'>
					<nav class=' grey darken-4'>
				    	<div class="nav-wrapper">
				      		<a href="#!" class="brand-logo center">Шаблон Materialize</a>
				      		<ul class="right hide-on-med-and-down">
				        		<li><a href="#excel"><i class="material-icons">file_download</i></a></li>
				        		<li><a href="#modal1" class="modal-trigger"><i class="material-icons">info</i></a></li>
				      		</ul>
				    	</div>
				  	</nav>
	        		<div id="modal1" class="modal">
	        			<a href="#!" class="modal-close waves-effect waves-green btn-flat right"><i class="material-icons">close</i></a>
				    	<div class="modal-content">
				      		<h4>Шаблон табличного приложения</h4>
				      		<p>Описание приложения и его смысл и тд и тп.</p>
				    	</div>
				    	<div class="modal-footer">
				      		<!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons">close</i></a> -->
				    	</div>
				  	</div>
				</div>
				<form method='GET'>
					<div class='col offset-l1 s12 m4 l4'>
						<label for='dateFrom'>Дата начала:</label>
						<input id='dateFrom' type="text" class="datepicker">
					</div>
					<div class='col s12 m4 l4'>
						<label for='dateTo'>Дата окончания:</label>
						<input id='dateTo' type="text" class="datepicker">
					</div>
					<div class='input-field offset-l1 col s12 m3 l3'>
				    	<select>
				    		<option value="" disabled selected>Choose your option</option>
				    		<option value="1">Option 1</option>
				    		<option value="2">Option 2</option>
				    		<option value="3">Option 3</option>
				    	</select>
				    	<label>Выпадающий список:</label>
					</div>
					<div class='input-field col s12 m3 l3'>
				    	<select>
				    		<option value="" disabled selected>Choose your option</option>
				    		<option value="1">Option 1</option>
				    		<option value="2">Option 2</option>
				    		<option value="3">Option 3</option>
				    	</select>
				    	<label>Выпадающий список:</label>
					</div>
					<div class='input-field col s12 m3 l3'>
				    	<select>
				    		<option value="" disabled selected>Choose your option</option>
				    		<option value="1">Option 1</option>
				    		<option value="2">Option 2</option>
				    		<option value="3">Option 3</option>
				    	</select>
				    	<label>Выпадающий список:</label>
					</div>
					<div class='col offset-s1 s11 pad'>
						<button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Сформировать
		    				<i class="material-icons right">keyboard_return</i>
		  				</button>
		  			</div>
		  		</form>
	  		</div>
	  		<div class='row'>
	  			<table>
        			<thead>
          				<tr>
              				<th class="center">Name</th>
              				<th class="center">Item Name</th>
              				<th class="center">Item Price</th>
          				</tr>
        			</thead>

        			<tbody class='user-table'>
          				<tr>
            				<td class="center">Alvin</td>
            				<td class="center">Eclair</td>
            				<td class="center">$0.87</td>
          				</tr>
          				<tr>
            				<td class="center">Alan</td>
            				<td class="center">Jellybean</td>
            				<td class="center">$3.76</td>
          				</tr>
          				<tr>
            				<td class="center">Jonathan</td>
            				<td class="center">Lollipop</td>
            				<td class="center">$7.00</td>
          				</tr>
          				<tr>
            				<td class="center">Jonathan</td>
            				<td class="center">Lollipop</td>
            				<td class="center">$7.00</td>
          				</tr>
          				<tr>
            				<td class="center">Jonathan</td>
            				<td class="center">Lollipop</td>
            				<td class="center">$7.00</td>
          				</tr>
          				<tr>
            				<td class="center">Alvin</td>
            				<td class="center">Eclair</td>
            				<td class="center">$0.87</td>
          				</tr>
          				<tr>
            				<td class="center">Alvin</td>
            				<td class="center">Eclair</td>
            				<td class="center">$0.87</td>
          				</tr>
          				<tr>
            				<td class="center">Alan</td>
            				<td class="center">Jellybean</td>
            				<td class="center">$3.76</td>
          				</tr>
        			</tbody>
      			</table>
	  		</div>
		<?php include(__DIR__.'/layouts/footer.php'); ?>