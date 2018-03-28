<section class="greeting-row" id="scrollr-row">
	<div id="right" data-anchor-target="#scrollr-row" data--400-top="top:-30%" data--200-bottom="top:15%"></div><!-- style="background-attachment:fixed; top:0; bottom:0; right:0; left:0;" -->
	<div id="left"  data-anchor-target="#scrollr-row" data--200-top="top:-20%" data-bottom="top:0%"></div>
	<section class="container">
		<?php 
			$g_title = get_field('greeting_title');
			$g_text = get_field('greeting_text');
			$g_link = get_field('greeting_link');
		?>
		<div class="row content">
			<article class="columns-6">
				<h2 class="title"><?php echo $g_title; ?></h2>
			</article>
			<article class="columns-6 text">
				<?php echo $g_text; ?>
				<?php if($g_link !=""){ ?>
					<p><a class="greeting-cta" href="<?php echo $g_link; ?>"><span class="text">learn more about our story </span><span class="img"><?php echo file_get_contents(get_template_directory().'/img/arrow-right-01.svg')?></span></a></p>
				<?php } ?>
			</article>
		</div>
			
	</section>
</section>