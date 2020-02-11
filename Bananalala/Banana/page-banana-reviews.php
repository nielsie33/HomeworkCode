<?php
/**
 * Template Name: Banana Reviews
 **/
?>
<?php get_header() ?>

    <div class="card border-0">
        <div class="card-body bg-weekbanana">
			<br><br><br>
		</div>
    </div>
    <br>
    <div class="row w-100 ml-0">
        <div class="col-md-9">
			<?php  $query = new WP_Query( array('post_type' => 'banana-reviews', 'posts_per_page' => 10 ) );
			while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="card border-0">
				<div class="row no-gutters">
					<div class="col-auto">
					</div>
					<div class="col">
						<div class="card-block p-3 ml-5 mr-5 mt-5">
							<h1 class="card-title"><?php the_title(); ?></h1>
                            <p class="card-text"><?php if ( has_post_thumbnail() ) {
							  the_post_thumbnail();
							}
							  the_content();
							?></p>
							<br><br>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php
			 wp_reset_postdata(); 
			 endwhile;
			?>
        </div>
		
        <?php get_sidebar() ?>
    </div>
	
    <br>
    <br>

    <?php get_footer() ?>
</body>
</html>