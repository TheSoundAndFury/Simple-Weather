<?php $this->load->view('header_v'); ?>

<div class="jumbotron">
	<h1 class="display-4"><?php echo $cityname . " - " .$today . "<br>";?></h1>
	<div class="lead">
		<?php echo "Temp Max: " . $temp_max ."&deg;C<br>";?>
	</div>
	<div class="lead">
		<?php echo "Temp Min: " . $temp_min ."&deg;C<br>";?>
	</div>
	<div class="display-4">
		<?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";?>
	</div>
</div>

