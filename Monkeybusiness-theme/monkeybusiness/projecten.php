		<?php /* Template Name: Projecten */ ?>

		<?php get_header() ?>
		<?php get_sidebar() ?>
		<!-- Laadt de berichten in -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-sm-8">
		<!-- Laadt de paginainhoud in -->
		<?php
		global $post;
		$args = array( 'numberposts' => 3, 'offset'=> 0, 'category' => 5 );
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) : setup_postdata($post); ?>
		<div id="blokje" class="block col-sm-8">
		<h2><?php the_title(); ?></h2>
		<?php the_content() ?>
		</div>
		<?php endforeach; ?>
		</div>
		<div id="categorieres" class="block col-sm-8">
		<?php the_date() ?>
		<?php the_author() ?>
		<?php the_category() ?>
		<?php the_post_thumbnail(); ?>
		</div>
		<?php endwhile;
		else:
		 // Insert any content or load a template for no posts found.
		endif;
		wp_reset_query();?>
		
		<?php get_footer() ?>

