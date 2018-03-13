<?php 
/* Template Name: Homepage Template*/
get_header(); ?>

<?php 
	$hero_background = get_field('hero_image');
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');
	?>

<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>);">
	<!-- <div class="curtain" aria-hidden="true" ></div> -->
	<div class="content">
		<h2><?php echo $intro_text; ?></h2>
		<?php get_template_part('/partials/down-arrow') ?>
	</div>
</section>

<main id="content">
	
	
	<?php get_template_part('/partials/greeting-row');?>
	<section class="grid">
		<div class="row" >
			<?php if (have_rows('callout_item')):
					while(have_rows('callout_item')):the_row();
					$co_bg = get_sub_field('callout_bg');
					$co_bg_url = $co_bg['sizes']['large'];
					$co_type = get_sub_field('callout_type');
					$co_icon = get_sub_field('callout_icon');
					$co_icon_URL = $co_icon['sizes']['large'];
					$co_icon_alt = $co_icon['alt'];
					$co_title = get_sub_field('callout_title');
					$co_desc = get_sub_field('callout_description');
					$co_link = get_sub_field('callout_link');

					$type_class = '';

					if($co_type=='bees'){
						$type_class = 'bees';
					}elseif ($co_type == 'forest'){
						$type_class = 'forestation';
					}else{
						$type_class = 'plants';
					}

					?>
					<a href="<?php echo $co_link; ?>">
						<article class="grid-item co columns-4 no-padding <?php echo $type_class; ?>" style="position:relative; 	background-image:url(<?php echo $co_bg_url; ?>);">
							<div class="wrap">	
								<div class="content">
									<div class="title">
										<div class="icon-container">
											<img class="icon" alt="<?php echo $co_icon_alt; ?>" src="<?php echo $co_icon_URL; ?>" />
										</div>
										<h2><?php echo $co_title; ?></h2>
									</div>
									<div class="hover">
										<div class="hyphen" aria-hidden="true"></div>
										<p class="desc">
											<?php echo $co_desc; ?>
										</p>
										<div class="hyphen" aria-hidden="true"></div>

										<p class="cta">learn more</p>
									</div>
								</div>
							</div>
						</article>
					</a>

			<?php endwhile; endif; ?>
		</div>
	</section>

</main><!-- End of Content -->

<?php get_footer(); ?>
