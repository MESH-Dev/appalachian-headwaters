<?php 
/* Template Name: Landing Template*/
get_header(); 

	$hero_background = get_field('hero_image');
	$hero_URL = $hero_background['sizes']['background-fullscreen'];
	$intro_text = get_field('intro_text');

?>

<section class="hero-banner" style="background-image:url(<?php echo $hero_URL; ?>); background-size:cover; background-repeat:no-repeat; height:100vh;">
	<div class="content">
		<h2><?php echo $intro_text; ?></h2>
		<?php get_template_part('/partials/down-arrow') ?>
	</div>
</section>

<main id="content">

	<?php get_template_part('/partials/greeting-row');?>

	<section class="grid inner">
		<?php 

			if (have_rows('row')):while(have_rows('row')):the_row();
			$grid_type = get_sub_field('row_type');
			//var_dump($grid_type);
			if($grid_type == 'text'){
				$text_block = get_sub_field('text_only_block');
		?>
		<div class="row text-row">
			<article class="text">
				<div class="hyphen" aria-hidden="true"></div>
				<h2><?php echo $text_block; ?></h2>
				<div class="hyphen" aria-hidden="true"></div>
			</article>
		</div>
		<?php } else{

			$block_count = count(get_sub_field('grid_block'));

			if (have_rows('grid_block')): ?>
			<div class="row">
			<?php
				while(have_rows('grid_block')):the_row();
				
				$gi_bg_img = get_sub_field('gi_bg_img');
				$gi_bg_URL = $gi_bg_img['sizes']['large'];
				$gi_overlay = get_sub_field('gi_over_color');
				$gi_title = get_sub_field('gi_title');
				$gi_desc = get_sub_field('gi_desc');
				$gi_link = get_sub_field('gi_link');
				$external = get_sub_field('external');

				$grid_class = '';

				if($block_count == 2){
					$grid_class="columns-6";
				}elseif($block_count == 3){
					$grid_class = "columns-4 tweener";
				}else{
					$grid_class = "columns-3 tweener";
				}

				$color = '';

				if($gi_overlay == 'orange'){
					$color = 'orange';
				}elseif($gi_overlay == 'blue'){
					$color = 'blue';
				}elseif($gi_overlay == 'green'){
					$color = 'green';
				}else{
					$color = 'yellow';
				}

				$is_external = '';

				if($external == 'true'){
					$is_external = 'target="_blank"';
				}
			?>
			<a href="<?php echo $gi_link; ?>" <?php echo $is_external; ?> >
				<article class="grid-item <?php echo $grid_class; ?> <?php echo $color; ?> no-padding" style="background-image:url('<?php echo $gi_bg_URL; ?>')">
					<div class="wrap">
						<div class="content">
							<div class="title">
								<h2><?php echo $gi_title; ?></h2>
							</div>
							<div class="hover">
								<div class="hyphen" aria-hidden="true"></div>
								<p class="desc"><?php echo $gi_desc; ?></p>
								<div class="hyphen" aria-hidden="true"></div>
								<p class="cta">learn more</p>
							</div>
						</div>
					</div>
				</article>
			</a>
		<?php endwhile; ?>
			</div>
	<?php endif; } 
			endwhile; endif;

	?>
	</section>

</main><!-- End of Content -->

<?php get_footer(); ?>
