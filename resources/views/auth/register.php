<?php 
	echo (new \App\Controllers\Controller())->view('partials.header');
?>
	<div class="container">
		
		<form action="">
			
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Enter name">
			</div>
			
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Enter email">
			</div>
			
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Enter password">
			</div>
			
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Repeat password">
			</div>

		</form>

	</div>
<?php 
	echo (new \App\Controllers\Controller())->view('partials.footer');
