<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');

include('functions/clean.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
		        h1 a {
		          background-size: 227px 85px !important;
		          margin-bottom: 20px !important;
		          background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
		    </style>';
}

//Add ajax functionality to pages, all not just in admin
add_action('wp_enqueue_scripts','loadmore_ajaxurl');
function loadmore_ajaxurl() {

	global $wp_query;
	//var_dump($wp_query);

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 2,
			'order'=> 'DESC',
			'orderby' => 'ID'
			);

		 $the_query = new WP_Query($args);
   		
	wp_register_script( 'my_loadmore', get_template_directory_uri().'/js/myloadmore.js', array('jquery'), true);
 

   	wp_localize_script( 'my_loadmore', 'loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $the_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $the_query->max_num_pages
	) );
    
   		wp_enqueue_script( 'my_loadmore',get_template_directory_uri().'/js/myloadmore.js', array('jquery'),true);

     }

//var_dump(get_template_directory_uri());
//Add ajax functionality to pages, all not just in admin
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
    }


function loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	//var_dump('Args= '.$args);
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );

	// $args = array(
	// 		'post_type' => 'post',
	// 		'posts_per_page' => 5,
	// 		);

	// 	$the_query = new WP_Query($args);
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			//get_template_part( 'template-parts/post/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
			
 			echo '<article class="post row">';
 			echo '<div class="columns-6">';
 			echo '<h2>'.get_the_title(). '</a></h2>';
			//echo '<p class="postinfo">By '.the_author().' | Categories: '.the_category(', ').' | '. comments_popup_link().'</p>';
			the_excerpt($post->ID);
			//echo '<a href="'.get_the_permalink().'">Learn more about our story</a>';
 			echo '</div>';
 			$img_id = get_post_thumbnail_id($post->ID);
 			//var_dump($img_id);
 			$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
 			if(has_post_thumbnail($post->ID)){

 				echo '<div class="columns-6 grid-item img" style="background-image:url('.get_the_post_thumbnail_url($post->ID, 'large').');">';
 				//echo '<img class="" alt="'.$alt.'" src="'.get_the_post_thumbnail_url($post->ID, 'large').'" >';
 				echo '</div>';
 			}
 			echo '</article>';
 			
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


function custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Replace the_excerpt "more" text with a link
 *
 */

function new_excerpt_more($more) {
    global $post;
    $directory = get_template_directory();
    $imgs = '/img/arrow-right-01.svg';
    $arrow  = $directory.$imgs;
    $arrow_icon = file_get_contents($arrow);
    $arrow_clean = str_replace(array("\r\n", "\r", "\n"), '',$arrow_icon);
    return '... <p><a class="more-link" href="'. get_permalink($post->ID) . '"><span class="text">Learn More about our story<span><span class="img">'.$arrow_clean.'</span></a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Add/Change excerpt
// function new_excerpt_more( $more ) {
//   return '...  <div class="read-more"><a class="cta-link" href="' . get_permalink( get_the_ID() ) . '"><span>' . __( 'Explore radio science', 'your-text-domain' ) . '</a></span></div>';
// }
// add_filter( 'excerpt_more', 'new_excerpt_more' );

?>
