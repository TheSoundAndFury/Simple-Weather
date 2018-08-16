<?php $this->load->view('header_v'); ?>

<div class='container'>
	<div class='jumbotron jumbotron-fluid' id= jumbo>
		<h1 class='display-4'><?php echo $cityname . " - " .$today . "<br>";?></h1>
		<div class='lead' id="max">
			<?php echo "Current Temp: " . round($temp_cur, 1) ."&deg;F<br>";?>
		</div>
		<div class='lead' id="max">
			<?php echo "High Today: " . round($temp_max,1) ."&deg;F<br>";?>
		</div>
		<div class='lead' id = "min">
			<?php echo "Low Today: " . round($temp_min,1) . "&deg;F<br>";?>
		</div>
		<div class='lead' id = "min">
			<?php echo "Humidity: " . $humidity . "%<br>";?>
		</div>
		<div class='lead' id = "min">
			<?php echo "Cloudiness: " . $cloudy . "%<br>";?>
		</div>
		<div class='icon' id = "icon">
			<?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";?>
		</div>
			<div class='lead' id = "desc">
			<?php echo ucfirst($description); ?>
		</div>
</div>
</div>
