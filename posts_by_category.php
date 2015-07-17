<?php 
	$cats = get_the_category();
	$category = $cats[0];
	
	$args = array(
		'posts_per_page' => 7,
		'category__in' => array($category->term_id),
		'orderby' => 'title',
		'order' => 'ASC',
		'exclude' => array('6,7')
		);
		
		$thisCategoryQuery = new WP_Query($args);
		
		if ($thisCategoryQuery->have_posts()) :
		            echo '<div class="wrapper">';
		            echo '<a href="' . get_category_link( $category->term_id ) . '"><h3 class="cat-h3">' . $category->name . ' sarjan jaksot</h3></a>';
		            echo '<hr>';
		            echo '<div class="category-post-lister">';
		            while ($thisCategoryQuery->have_posts()) : $thisCategoryQuery->the_post(); ?>
		            
		            <div class="single-category-element animated fadeIn go"><a href="<?php the_permalink() ?>" class="thumbnail-wrapper">
		            	<!-- <div class="time"></div> -->
		            	<?php echo has_post_thumbnail() ? get_the_post_thumbnail() : focus_default_post_thumbnail();  ?>
		            </a>
		
		            <a href="<?php the_permalink(); ?>"><h2 class="entry-title-category"><span>
		            	<?php echo get_the_title() ? get_the_title() : __('Untitled', 'focus') ?>
		            </span></h2></a></div>
		        <?php
		            endwhile; 
		            echo '</div></div>'; 
		        ?>    
		
		<?php
		        else :
		            echo 'No post published in:'.$category->name;                
		        endif; 
		        wp_reset_query();
		
		
	
?>