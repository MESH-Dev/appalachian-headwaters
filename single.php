<?php get_header();

$hero_background = get_field('hero_image');
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');
	$overlay = get_field('overlay');
?>

<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>); background-size:cover; background-repeat:no-repeat; height:100vh;">
	<?php if ($overlay == true) { ?>
	<div class="curtain" aria-hidden="true" ></div>
	<?php } ?>
	<div class="content">
		<h2 class="page-title"><?php echo get_the_title();//$intro_text; ?></h2>
		<?php get_template_part('/partials/down-arrow'); ?>
	</div>
</section>

<main id="content">

	<div class="inner-content">
		<div class="wrapper post-single">
		<div class="container">
			<div class="row">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="post columns-9">
				<!-- <h1><//?php the_title(); ?></h1> -->
				<h1 class="postinfo"><?php the_date('m/d/Y'); ?></h1>

				<?php the_content(); ?>
				<!-- Go to www.addthis.com/dashboard to customize your tools -->
				<div class="social-share"><span>Share this on: <span> <div class="addthis_inline_share_toolbox"></div></div>
			</div>

			<?php //comments_template( '', true ); ?>

		<?php endwhile; ?>
		</div>
		</div>
		</div>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
