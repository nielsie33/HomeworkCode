<?php get_header() ?>

    <div class="card border-0">
        <div class="card-body bg-weekbanana">
		<a href="" onclick="window.history.go(-1); return false;">
            <img src="<?php echo get_bloginfo('template_url');?>/img/pagination_back.png" alt="pagination_back.png"/> <pag>Terug</pag>
        </a>
		</div>
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
                            <h4 class="card-subtitle mb-2 noFont">Posted By: <?php the_author() ?> - <?php the_date() ?></h4>
                            <p class="card-text"><?php the_content(); ?></p>
							<a href="" onclick="window.history.go(-1); return false;">
								<img src="<?php echo get_bloginfo('template_url');?>/img/pagination_back.png" alt="pagination_back.png"/> <pag>Terug</pag>
							</a>
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
	
    <br>
    <br>

    <?php get_footer() ?>
</body>
</html>