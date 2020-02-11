		<?php get_header() ?>
		
		<?php get_sidebar() ?>
		<div id="content">
		<!--
		<p>mijn tekst</p>
		-->
		</div>
		
		<!-- Laadt de berichten in -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="block col-sm-8">
		<!-- Geeft de titel van een bericht weer -->
		<h2><?php the_title(); ?></h2>
		<!-- Geeft de content van een bericht weer -->
		<?php the_content(); ?>
		
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
		<div id="nextpost">
		<?php next_post_link (); ?>
		</div>
		<?php get_footer() ?>

