<?php 
/* Template Name: 404 Page Template*/

get_header(); 

	$page = get_page_by_path( '404-page' );
	$my_id = $page->ID;

	$hero_background = get_field('hero_image', $my_id);
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');
	$errorpageid = get_option( '404pageid', 0 ); 
	$my_content = get_post($my_id);

	$nf_content = $my_content->post_content;
	//echo $nf_content;
	//var_dump($errorpageid);

	

?>

<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>); background-size:cover; background-repeat:no-repeat; height:100vh;">
	<div class="content">
		<h2 class="page-title">
		Sorry, we couldn't find that page.<br />
		It's not your fault, it's ours.  Would you like to visit<br />
		the <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">homepage</a> and start again?</h2>
		<?php //get_template_part('/partials/down-arrow'); ?>
	</div>
</section>

<!--<main id="content">
	<div class="wrapper four-oh-four">
		<div class="container">
			<div class="inner-content">
				<?php //if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php echo do_shortcode('[listmenu menu="site_map" menu_class=sitemap-menu]')//echo $nf_content; ?>
				<?php //endwhile; ?>
			</div>
		</div>
	</div>
</main> End of Content-->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>