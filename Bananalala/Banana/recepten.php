<?php /* Template Name: Recepten */ ?>
<?php get_header() ?>

    <br>

	<div class="row w-100">
	<div class="col-lg-12 ml-3">
	<h1 class="text-left ml-responsive ml-3">Recepten</h1>
	<div class="card-deck">
	<?php
		$args_index = array('posts_per_page' => 4, 'cat' => '4', 'order' => 'desc');
		$args_index['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;
		$index_query = new WP_Query($args_index);
		$temp_query = $wp_query;
		$wp_query = NULL;
		$wp_query = $index_query;
		?>
		<?php
		if ($index_query->have_posts()) : while ($index_query->have_posts()) : $index_query->the_post();
		?>
	  <div class="col-sm-3">
	  <div class="card ml-responsive border-0">
		<?php the_post_thumbnail( '', array( 'class' => 'card-img-top' ) ); ?>
		<div class="card-body">
		  <h2 class="card-title"><?php the_title(); ?></h2>
		  <h4 class="card-subtitle mb-2 noFont">Posted By: <?php the_author() ?> - <?php echo get_the_date() ?></h4>
		  <p class="card-text"><?php echo get_the_excerpt() ?></p>
		  <a href="<?php echo(get_permalink()); ?>" class="btn p-2 bg-readmore border-0 w-75 ml-5">
          <h4>READ&thinsp;&thinsp;MORE</h4></a>
		</div>
	  </div>
	  </div>
		<?php endwhile;
		else:
			echo "<div class='col-lg-12 ml-3'><h1>Nothing found</h1>
				<a href='". home_url() ."' class='btn btn-lg bg-readmore'><h3>Home</h3></a></div>";
		endif;
		wp_reset_postdata();?>
	</div>
	</div>
	</div>
	<br><br>
	
    <div class="col-lg-12 text-center">
		<?php previous_posts_link('<img id="pagination_back_img" src="'. get_bloginfo('template_url') .'/img/pagination_back.png" alt="pagination_back.png"/><pag>&thinsp;&thinsp;Previous Page</pag>&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;', $index_query->max_num_pages); ?>
		<?php next_posts_link('<pag>Next Page</pag>&thinsp;&thinsp;<img id="pagination_next_img" src="'. get_bloginfo('template_url') .'/img/pagination_next.png" alt="pagination_next.png"/>'); ?>
	</div>
    <br>
    <br>

    <?php get_footer() ?>
</body>
</html>