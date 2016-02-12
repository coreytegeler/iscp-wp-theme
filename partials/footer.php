<?php 
	$menu_items = wp_get_nav_menu_items( 'footer' );
	$about = get_page_by_path( 'about' );
	$about_id = $about->ID;
	$address = get_field( 'address', $about_id );
?> 
<footer>
	<aside class="left footer">
		<a href="<?php echo site_url() ?>" class="logo swap">
			<div class="icon default"></div>
			<div class="icon hover"></div>
		</a>
	</aside>
	<div class="wrapper">
		<div class="inner">
			<nav>
				<?php foreach ( (array) $menu_items as $key => $menu_item ) {
					if ( $menu_item->menu_item_parent == 0 ) :
						$title = $menu_item->title;
						$id = $menu_item->ID;
						$url = $menu_item->url;
						$no_link = array( 'residencies' );
						$slug = basename($url);
					    echo '<div class="cell ' . $slug . '">';
						echo '<div class="cell-inner">';
						$html_title = '<div class="title">' . $title . '</div>';
						if( in_array( $slug, $no_link ) ):
							echo $html_title;
						else:
					    	echo '<a href="' . $url . '">' . $html_title . '</a>';
					    endif;
					    echo '<div class="sub-menu">';
					    foreach ( (array) $menu_items as $key => $child_menu_item ) {
					    	$child_title = $child_menu_item->title;
					    	$child_url = $child_menu_item->url;
					    	$child_slug = str_replace('#','-',basename($child_url));
					    	$parent_id = $child_menu_item->menu_item_parent;
					    	if ($parent_id == $id ) : 
					    		echo '<div class="child-item ' . $child_slug . '">';
					    		echo '<a href="' . $child_url . '">';
					    		if( $slug == 'resident-resources' ):
							    	echo '<div class="swap">';
									echo '<div class="icon default"></div>';
									echo '<div class="icon hover"></div>';
									echo '</div>';
							    endif;
					    		echo $child_title;
					    		echo '</a>';
					    		echo '</div>';
					    	endif;
					    }
					   	echo '</div>';
					   	echo '</div>';
					   	echo '</div>';
					endif;
				} ?>

				<div class="cell search">
		    		<div class="cell-inner">
	    				<div class="title">Search</div>
		    			<div class="sub-menu">
		    				<form role="search" method="get" class="searchform" class="searchform" autocomplete="off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		    					<div class="placeholder"><span>Type here</span></div>
								<input type="text" name="s" class="s" />
								<div class="counter"></div>
							</form>
		    			</div>
		    		</div>
		    	</div>

		    	<?php
					$twitter_handle = str_replace( '@', '', get_field( 'twitter', $about_id ) );
					$twitter_url = 'http://twitter.com/' . $twitter_handle;
					$facebook_url = get_field( 'facebook', $about_id );
					$instagram_handle = str_replace('@', '', get_field( 'instagram', $about_id ) );
					$instagram_url = 'http://instagram.com/' . $instagram_handle;
					$newsletter_url = get_field( 'newsletter', $about_id );
				?>

		    	<div class="cell connect">
		    		<div class="cell-inner">
	    				<div class="title">Connect</div>
		    			<div class="sub-menu">
		    				<div class="child-item twitter">
		    					<a href="<?php echo $twitter_url ?>">Twitter</a>
		    				</div>
		    				<div class="child-item facebook">
		    					<a href="<?php echo $facebook_url ?>">Facebook</a>
		    				</div>
		    				<div class="child-item instagram">
		    					<a href="<?php echo $instagram_url ?>">Instagram</a>
		    				</div>
		    			</div>
		    		</div>
		    	</div>

		    	<div class="cell newsletter">
		    		<div class="cell-inner">
		    			<div class="title">Newsletter</div>
		    			<div class="sub-menu">
		    				<form role="search" method="get" class="newsletter" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		    					<div class="placeholder"><span>Subscribe</span></div>
		    					<input type="text">
		    				</form>
		    			</div>
		    		</div>
		    	</div>
	    	</nav>
		</div>
		<div class="bottom">
			<div class="half">
				<h3>
					<a href="<?php echo site_url() ?>">International Studio &amp; Curatorial Program</a>
				</h3>
			</div>
			<div class="half">
				<?php
				$about = get_page_by_path( 'about' );
				$address = get_field( 'address', $about );

				$visit = get_page_by_path( 'visit' );
				$visit_url = get_permalink( $visit );
				?>
				<h3>
					<a href="<?php echo $visit_url ?>"><?php echo $address ?></a>
				</h3>
			</div>
	    </div>
	</div>
	<aside class="right footer">
		<a href="<?php echo site_url() ?>" class="logo swap">
			<div class="icon default"></div>
			<div class="icon hover"></div>
		</a>
	</aside>
</footer>