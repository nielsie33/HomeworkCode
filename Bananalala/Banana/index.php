<?php get_header() ?>

    <div class="card border-0">
	<?php
	query_posts('&showposts=1&orderby=post_date&order=desc&cat=5'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="card-body bg-weekbanana">
			<?php the_post_thumbnail( '', array( 'class' => 'img-fluid float-right grayscale ml-5 imgnone', 'title' => 'grayscale' ) ); ?>
            <h1 class="bananaTitle"><?php the_title(); ?></h1>
            <p class="card-text"><?php the_content(); ?></p>
		</div>
	<?php endwhile; ?>
	<?php else: ?>
	<?php _e('Er is nog geen bericht in deze categorie'); ?>
	<?php endif;
	wp_reset_query(); ?>
    </div>
    <br>

    <div class="row w-100 ml-0">
        <div class="col-md-9">
		<!-- Laadt de berichten in -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="card border-0">
				<div class="row no-gutters">
					<div class="col-auto">
						<?php the_post_thumbnail( '', array( 'class' => 'img-fluid imgnone' ) ); ?>
					</div>
					<div class="col">
						<div class="card-block p-3">
							<h1 class="card-title"><?php the_title(); ?></h1>
                            <h4 class="card-subtitle mb-2 noFont">Posted By: <?php the_author() ?> - <?php echo get_the_date() ?></h4>
                            <p class="card-text"><?php echo get_the_excerpt(); ?></p>
							<a href="<?php echo(get_permalink()); ?>" class="btn p-2 bg-readmore float-right border-0 w-25">
                            <h4>READ&thinsp;&thinsp;MORE</h4></a>
							<br><br>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php endwhile;
			else:
				echo "<h1>Nothing found</h1>
				<a href='". home_url() ."' class='btn btn-lg bg-readmore'><h3>Home</h3></a>";
			endif;
			wp_reset_query();?>
        </div>
		
        <?php get_sidebar() ?>
    </div>
	
    <div class="col-lg-12 text-center">
		<?php previous_posts_link('<img id="pagination_back_img" src="'. get_bloginfo('template_url') .'/img/pagination_back.png" alt="pagination_back.png"/><pag>&thinsp;&thinsp;Previous Page</pag>&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;'); ?>
		<?php next_posts_link('<pag>Next Page</pag>&thinsp;&thinsp;<img id="pagination_next_img" src="'. get_bloginfo('template_url') .'/img/pagination_next.png" alt="pagination_next.png"/>'); ?>
	</div>

    <br>
    <br>

    <?php get_footer() ?>
</body>
</html>