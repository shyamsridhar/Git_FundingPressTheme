<?php
$el_news_number_posts = $el_news_categories =  $el_news_title = $border_color = $el_class = '';
$posts = array();
extract( shortcode_atts( array(
    'el_news_title' => '',
    'el_news_number_posts' => '',
    'el_class' => '',
    'el_news_categories' => '',
    'border_color' => '',
), $atts ) );
if(empty($css))$css = '';
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<div class="<?php echo esc_attr($css_class); if(!empty($el_class)) echo esc_attr($el_class); ?>">
    <div class="wpb_wrapper">
        <div class="title-wrapper">
            <h3 class="widget-title" style="border-color: <?php echo esc_attr($border_color); ?>"><i class="fa fa-newspaper-o"></i> <?php if(!empty($el_news_title)) echo esc_attr($el_news_title); ?></h3>
            <div class="clear"></div>
        </div>
        <?php
                    // Categories
                    $ct = array();
                    if ( $el_news_categories != '' ) {
                        $el_news_categories = explode( ",", $el_news_categories );
                        foreach ( $el_news_categories as $category ) {
                            array_push( $ct, $category );
                        }
                    }

                    $posts = new WP_Query(array(
                        'showposts' => $el_news_number_posts,
                        'category__in' => $ct
                    ));
        ?>
        <div class="wcontainer column_news_wrapper">
          <ul class="newsbh">
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php global $post; $categories = wp_get_post_categories($post->ID);  ?>
				<?php $cat_data = get_option("category_$categories[0]");  ?>
                <li class="newsbh-item " >

                		<?php global $post; $categories = wp_get_post_categories($post->ID);  ?>
                		<?php $i = 0; $len = count($categories);
                		foreach ($categories as $category) {
                				$cat_data = get_option("category_$category");
                			  	if ($i == $len - 1) {
       							?><a href="<?php echo esc_url(get_category_link($category)); ?>" class="ncategory" style="background-color: <?php echo esc_attr($cat_data['catBG']); ?> !important" >
       							  <?php	echo get_cat_name($category); ?>
								  </a>
    							<?php }else{
    							?> <a href="<?php echo esc_url(get_category_link($category)); ?>" class="ncategory" style="background-color: <?php echo esc_attr($cat_data['catBG']); ?> !important" >
    							  <?php	echo get_cat_name($category); ?>
    							  </a>
    							  <?php
    							}   $i++;
						} ?>

                    <div class="newsb-thumbnail">


					<?php $overall_rating = get_post_meta($post -> ID, 'overall_rating', true); ?>
					<?php if(of_get_option('rating_type') == 'numbers'){ ?>


			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 0.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="carousel_rating carousel_rating_number">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 5</b>/5
					</div>
					<?php } ?>



					<?php }else{ ?>

			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="carousel_rating" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<?php } ?>

					<?php } ?>
                        <a rel="bookmark" href="<?php the_permalink(); ?>">
							<i class="fa fa-hand-pointer-o" style="text-shadow: 0px 0px 10px <?php echo esc_attr($cat_data['catBG']); ?>"></i>

                            <?php if(has_post_thumbnail()){
                                    $thumb = get_post_thumbnail_id();
                                    $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
                                    $image = aq_resize( $img_url, 350, 230, true, '', true ); //resize & crop img
                                    ?>
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />

                            <?php } else{ ?>
                                <img src="<?php echo get_template_directory_uri().'/img/defaults/305x305.jpg'?>" alt="<?php the_title(); ?>" />
                            <?php }  ?>

                           <div class="clear"></div>
						   <span class="overlay-link"></span>

                        </a>
                     </div>

                        <h4 class="newsb-title"><a rel="bookmark" href="<?php the_permalink(); ?>"><?php if(strlen(get_the_title()) > 34){echo substr(get_the_title(), 0,34);echo '...';}else{ the_title();}  ?></a></h4>
                            <p class="post-meta">

								<?php
				              $autorpic = get_the_author_meta('profile_pic', get_the_author_meta('ID'));
				              if(!empty($autorpic)){
				               $image = aq_resize( $autorpic,  60, 60, true, true, true ); //resize & crop img
				              	if (!isset ($image[0])) {
				              		$theimage = $autorpic;
				              	} else {
				              		$theimage = $image;
				              	}
				               ?><img class="avatar avatar-60 photo authorimg" src="<?php echo esc_url($theimage); ?>" />
				               <?php }else{ ?>
				               <img class="avatar avatar-60 photo authorimg" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/defaults/default_user.png" />
				               <?php } ?>


			    	 				<?php	esc_html_e('by', 'fundingpress'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo get_the_author(); ?></a> <?php esc_html_e('on', 'fundingpress'); ?> <?php the_time(get_option('date_format')); ?> <?php esc_html_e('with', 'fundingpress'); ?>
			                      <?php if ( is_plugin_active( 'disqus-comment-system/disqus.php' )){ ?>
			                        <a  title="<?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'fundingpress' ), number_format_i18n( get_comments_number() ) ); ?> <?php esc_html_e('in this post', 'fundingpress'); ?>" href="<?php echo esc_url(the_permalink()); ?>#comments" >
			                        <?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'fundingpress' ), number_format_i18n( get_comments_number() ) ); ?>
			                        </a> &nbsp;
			                        <?php }else{ ?>
			                        <a title="<?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'fundingpress' ), number_format_i18n( get_comments_number() ) ); ?> <?php esc_html_e('in this post', 'fundingpress'); ?>" href="<?php echo esc_url(the_permalink()); ?>#comments" data-toggle="tooltip" data-placement="top">
			                        <?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'fundingpress' ), number_format_i18n( get_comments_number() ) ); ?>
			                        </a> &nbsp;

			                       <?php } ?>
			                  </p>
			                       <?php global $more; $more = 1; the_excerpt(); ?>

                        </li>

            <?php endwhile;wp_reset_postdata(); ?>

            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>