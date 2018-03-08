<?php 

get_header(); 

	$hero_background = get_field('hero_image');
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');
?>

<main id="content">
	<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>); background-size:cover; background-repeat:no-repeat; height:100vh;">
		<div class="content">
			<h2><?php echo $intro_text; ?></h2>
		</div>
	</section>
	<div class="container">
 
			<div class="columns-9">

				<?php if ( have_posts() ) : ?>
					<h1>
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives' ); ?>
						<?php endif; ?>
					</h1>

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="post">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<p class="postinfo">By <?php the_author(); ?> | Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?></p>
							<?php the_content('Read more &#8658'); ?>
						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
			<!-- <div class="columns-3">
				<?php //get_sidebar(); ?>
			</div> -->
 
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
