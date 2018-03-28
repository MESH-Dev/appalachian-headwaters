<?php 
/* Template Name: Journal Archive Template*/
get_header(); 

	$hero_background = get_field('hero_image');
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');
	$overlay = get_field('overlay');
?>

<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>); background-size:cover; background-repeat:no-repeat; height:100vh;">
	<?php if ($overlay == true) { ?>
	<div class="curtain" aria-hidden="true" ></div>
	<?php } ?><div class="content">
		<h2 class="page-title"><?php echo get_the_title();//$intro_text; ?></h2>
		<?php get_template_part('/partials/down-arrow'); ?>
	</div>
</section>

<main id="content">
	
	<div class="container inner-content posts">
 
			<div class="">
				<?php 
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							);

						$query = new WP_Query($args)
					?>

				<?php if ( $query->have_posts() ) : ?>
					<!-- <h1>
						<?php if ( is_day() ) : ?>
							<?php //printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php //printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php //printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
						<?php else : ?>
							<?php //_e( 'Blog Archives' ); ?>
						<?php endif; ?>
					</h1> -->

					

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<article class="post row">
							<div class="columns-6">
							<h2 class="title"><?php the_title(); ?></h2>
							<?php the_excerpt('Read more &#8658'); ?>

							<!-- <a href="<?php the_permalink() ?>">Learn more about our story</a> -->
							</div>

							<?php 
									$img_id = get_post_thumbnail_id(); 
									$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true );
								?>
							<?php if(has_post_thumbnail()){ ?>
							<div class="columns-6 grid-item img" style="background-image:url('<?php echo the_post_thumbnail_url('large');?>')">
								<!-- <img class="" alt="<?php echo $alt; ?>" src="<?php echo the_post_thumbnail_url('large'); ?>"> -->
								
								
							</div>
							<?php } ?>
						</article>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
			<!-- <div class="columns-3">
				<?php //get_sidebar(); ?>
			</div> -->
 
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
