<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" style="margin-top:0 !important;"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>
		<?php if (is_front_page()){
			bloginfo('name');
		}else{
			bloginfo('name'); wp_title('|', 'true');
		}
		?>

	</title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="meshdesign">
	<meta name="host" content="">
	<?php echo get_field('gsv_meta', 'options'); ?>
	<?php echo get_field('bsv_meta', 'options'); ?>

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Favicons
	================================================== -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>img/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>img/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>img/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<!-- Fonts
	================================================== -->
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'har3riu',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>img/apple-touch-icon-114x114.png">

	<?php $bugherd = true; 

	if($bugherd == true){?>
	<script type='text/javascript'>
		(function (d, t) {
		  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
		  bh.type = 'text/javascript';
		  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=eracq2oyw273gxbxxofkdw';
		  s.parentNode.insertBefore(bh, s);
		  })(document, 'script');
	</script>
	<?php } ?>

	<script>
		var $dir = "<?php echo get_template_directory_uri(); ?>";
	</script>

	<?php wp_head(); ?>
	
	<?php echo get_field('google_analytics_property', 'options'); ?>

</head>

<body <?php body_class(); ?>>
 
	<header>
		<div class="container">
			<div class="row">
			<div class="wrapper">
				<div class="mobile-menu-trigger">MENU</div>
				<nav class="main-navigation">

					<?php if(has_nav_menu('main_nav_1')){
								$defaults = array(
									'theme_location'  => 'main_nav_1',
									'menu'            => 'main_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '<div class="wrap"><div class="content"><div class="icon" aria-hidden="true"></div>',
									'after'           => '</div></div><div class="hyphen" aria-hidden="true"></div>',
									'link_before'     => '<span>',
									'link_after'      => '</span><span class="hover-arrow">'.file_get_contents(get_template_directory().'/img/arrow-right-01_white.svg').'</span>',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
				</nav>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<h1 class="site-title sr-only">
							<?php bloginfo( 'name' ); ?>
						</h1>
						<img alt="Appalachian Headwaters logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
					</a>
				</div>
				<nav class="main-navigation">
					<?php if(has_nav_menu('main_nav_2')){
								$defaults = array(
									'theme_location'  => 'main_nav_2',
									'menu'            => 'main_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '<div class="wrap"><div class="content"><div class="icon" aria-hidden="true"></div>',
									'after'           => '</div></div><div class="hyphen" aria-hidden="true"></div>',
									'link_before'     => '<span>',
									'link_after'      => '</span><span class="hover-arrow">'.file_get_contents(get_template_directory().'/img/arrow-right-01_white.svg').'</span>',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
				</nav>
			</div>
		</div>
		</div>
	</header>
