<footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-4 mt-md-0 mt-3">
                    <h1>FOLLOW US</h1>
                    <br>
                    <br>
                    <a href="https://facebook.com"><img src="<?php echo get_bloginfo('template_url');?>/img/facebook.png" alt="" /></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://twitter.com"><img src="<?php echo get_bloginfo('template_url');?>/img/twitter.png" alt="" /></a>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-5 mb-md-0 mb-3">
					<div class="col-md-9">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar 2') ) :  endif; ?>
					</div>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h1>BANANALALA</h1>
                    <br> Bananalaan 112
                    <br> 1234 AB Amsterdam
                    <br> Telefoon: 1234567890
                    <br> Email: info@bananalala.nl
                    <br>
                </div>
            </div>
    </footer>