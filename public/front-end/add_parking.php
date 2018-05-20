<?php require_once("include/header.php"); ?>





	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/cars/tesla_model_x.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-0 col-md-pull-1 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc" style="float: left;margin-right:200px;">
		   						<a href="add_cars.php" class="btn btn-light btn-xs" role="button">Add New Car</a>
		   						<a href="add_parking.php" class="btn btn-light btn-xs" role="button">Add new parking lot</a>
		   						<a href="add_service.php" class="btn btn-light btn-xs" role="button">Add Car Service</a>
		   					</div>
		   				</div>
		   			
		   				<div class="slider-text-inner">
		   					<div class="desc" style="margin: auto; width:450px">
		   						Address:
		   						<input type="text" class="form-control" placeholder="Address"  aria-label="address" aria-describedby="basic-addon1">
		   						Latitude:
		   						<input type="text" class="form-control" placeholder="Latitude" aria-label="lat" aria-describedby="basic-addon1">
		   						Longitude: 
		   						<input type="text" class="form-control" placeholder="Longitude" aria-label="lng" aria-describedby="basic-addon1">
		   						Capacity: 
		   						<input type="text" class="form-control" placeholder="Capacity" aria-label="capacity" aria-describedby="basic-addon1">
								<br>
		   						<button type="button" class="btn btn-light btn-xs">Add Parking Lot</button>
		   					</div>
		   				</div>
		   			</div>
		   		</div>

		   	</li>

		  	</ul>
	  	</div>
	</aside>



<?php require_once("include/footer.php"); ?>
