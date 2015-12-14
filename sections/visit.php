<?php 
	global $visit;
	$title = get_post( $about )->post_title;
	$slug = get_post( $about )->post_name;
	$about = get_page_by_path( 'about' );
?>

<section class="visit" id="visit">
	<?php get_template_part('partials/nav') ?>
	<?php get_template_part('partials/side') ?>
	<div class="content">
		<h4 class="title orange"><?php echo $title ?></h4>

		<?php
		$office_hours = get_field( 'office_hours', $visit );
		$exhibition_hours = get_field( 'exhibition_hours', $visit );
		$address = get_field( 'address', $about );
		$directions_base = 'https://www.google.com/maps/dir//';
		$directions_link = $directions_base . strip_tags($address);
		$phone = get_field( 'phone', $about );
		$email = get_field( 'email', $about );

		$directions = get_field( 'directions', $visit );
		$directions_footnote = get_field( 'directions_footnote', $visit );
		?>

		<div class="info">
			<h1>Office Hours: <?php echo $office_hours; ?></h1>
			<h1>Exhibition Hours: <?php echo $exhibition_hours; ?></h1>
			<h1><?php echo $address ?></h1>
		</div>

		<div class="map" id="map">

		</div>

		<?php
		$theme = get_template_directory_uri();
		$marker = $theme .'/assets/images/marker.svg'
		?>
		<script type="text/javascript">
		function initMap() {
			var map;
			var location = new google.maps.LatLng(40.7142351, -73.9368839);
			map = new google.maps.Map(document.getElementById('map'), {
				center: location,
				zoom: 15,
				scrollwheel: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

		  	var marker = new google.maps.Marker({
				position: location,
				map: map,
				icon: '<?php echo $marker; ?>'
			});
		}
	    </script>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApM4iQyAfb0hbmkeXc_zs58aA_Jy0SIac&callback=initMap"></script>
		<?php
		echo '<div class="directions">';
		echo '<h4>Directions by Subway</h4>';
		if( get_field( 'directions', $visit ) ):
			echo '<ul class="steps">';
			while( has_sub_field( 'directions', $visit ) ):
				$step = get_sub_field( 'step', $home );
				echo '<li class="step">' . $step . '</li>';
			endwhile;
			echo '</ul>';
		endif;
		echo '<div class="footnote">';
		echo $directions_footnote;
		echo '</div>';
		echo '</div>';
		?>

		<div class="newsletter">
			<input type="text" placeholder="Subscribe for our newsletter"/>
		</div>
		
	</div>
	<?php get_template_part('partials/footer') ?>
</section>