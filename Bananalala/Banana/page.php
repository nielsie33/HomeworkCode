<?php get_header() ?>

    <div class="card border-0">
        <div class="card-body bg-weekbanana">
			<br><br><br>
		</div>
    </div>
    <br>
    <div class="row w-100 ml-0">
        <div class="col-md-9">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="card border-0">
				<div class="row no-gutters">
					<div class="col-auto">
						<?php the_post_thumbnail( '', array( 'class' => 'img-fluid imgnone' ) ); ?>
					</div>
					<div class="col">
						<div class="card-block p-3 ml-5 mr-5 mt-5">
							<h1 class="card-title"><?php the_title(); ?></h1>
                            <p class="card-text"><?php the_content(); ?></p>
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