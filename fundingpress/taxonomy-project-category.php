<?php get_header();?>
<?php if (of_get_option('page_header')!=""){ ?>
	<style>
    html{
    background-image:url(<?php echo esc_url(of_get_option('page_header')); ?>) !important;
    background-position:center top !important;
    background-repeat:  no-repeat !important;
}
</style>
<?php } ?>
<div class="profile-projects">
<div class="container blog">
  <div class="row">
<h2><?php esc_html_e("Projects", 'fundingpress'); ?></h2>

    <div class="cl-lg-12 isoprblck">
        <?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'=> 'project',
            'order'    => 'ASC',
            'posts_per_page' => get_option('posts_per_page'),
             'tax_query' => array(
                            array(
                                'taxonomy' => 'project-category',
                                'field' => 'id',
                                'terms' => get_queried_object()->term_id,
                                'operator' => 'IN')
                        ),
             'paged'   =>   $paged
         );

        $wp_query = new WP_Query( $args);
         if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
         <?php      global $post;
                global $f_currency_signs;
                $project_settings = (array) get_post_meta($post->ID, 'settings', true);
                if(get_option('date_format') == 'm/d/Y' && strtotime($project_settings['date']) != false){
				$array = explode('/', $project_settings['date']);
				$tmp = $array[0];
				$array[0] = $array[1];
				$array[1] = $tmp;
				unset($tmp);
				if($array[0] == NULL){
					$project_settings['date'] = $array[1];
				}else{
				$project_settings['date'] = implode('/', $array);
				}
			}

				if(get_option('date_format') == 'd/m/Y' && strtotime($project_settings['date']) != false){
				$array = explode('/', $project_settings['date']);
				$tmp = $array[0];
				$array[0] = $array[1];
				$array[1] = $tmp;
				unset($tmp);
				if($array[0] == NULL){
					$project_settings['date'] = $array[1];
				}else{
				$project_settings['date'] = implode('/', $array);
				}
			}

				if (strpos( $project_settings['date'] , "/") !== false) {
  				$parseddate = str_replace('/' , '.' , $project_settings['date']);
				}else{
					$parseddate = $project_settings['date'];
				}

            	$project_expired = strtotime($parseddate) < time();

                $project_currency_sign = $f_currency_signs[$project_settings['currency']];
                $target= $project_settings['target'];
                $rewards = get_children(array(
                'post_parent' => $post->ID,
                'post_type' => 'reward',
                'order' => 'ASC',
                'orderby' => 'meta_value_num',
                'meta_key' => 'funding_amount',
            ));
            $funders = array();
            $funded_amount = 0;
            $chosen_reward = null;
            foreach($rewards as $this_reward){
                $these_funders = get_children(array(
                    'post_parent' => $this_reward->ID,
                    'post_type' => 'funder',
                    'post_status' => 'publish'
                ));
                foreach($these_funders as $this_funder){
                    $funding_amount = get_post_meta($this_funder->ID, 'funding_amount', true);
                    $funders[] = $this_funder;
                    $funded_amount += $funding_amount;
                }
            } ?>
         <?php if(empty($target) or $target == 0){$target = 1;} ?>
			 <div class="project-card cl-lg-3">
               <div class="project-thumb-wrapper">
            	<?php
              	$autorpic = get_the_author_meta('profile_pic', get_current_user_id());
              	if(!empty($autorpic)){
               	$image = aq_resize( $autorpic,  250, 250, true, true, true ); //resize & crop img
              	if (!isset ($image[0])) {
              		$theimage = $autorpic;
              	} else {
              		$theimage = $image;
              	} ?>
               	<img class="userimg" src="<?php echo esc_url($theimage); ?>" />
               <?php }else{ ?>
               	<img class="userimg" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/defaults/default_user.png" />
               <?php } ?>


             	<?php if(has_post_thumbnail()){
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
                    $image = aq_resize( $img_url, 320, 200, true, '', true ); //resize & crop img
                ?>

	              	<a href="<?php the_permalink(); ?>">
	              		<img src="<?php echo esc_url($image[0]); ?>" />
	              	</a>

                <?php }else{ ?>

	                <a href="<?php the_permalink(); ?>">
	                	<img class="pbimage" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/defaults/default_project.jpg">
	                </a>

                <?php } ?>

                </div>

            <h5 class="bbcard_name">
            	<a href="<?php the_permalink(); ?>">
            		<?php $title = get_the_title(); echo esc_attr(mb_substr($title, 0,23)); if(strlen($title) > 23){echo '...';}?>
            	</a>
            </h5>
            <?php if(get_the_author_meta('first_name',get_the_author_meta('ID')) or get_the_author_meta('last_name',get_the_author_meta('ID'))){ ?>
                 	<span><?php esc_html_e("by", 'fundingpress'); ?>

                 		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                 			<?php echo esc_attr(get_the_author_meta('first_name',get_the_author_meta('ID')).' '.get_the_author_meta('last_name',get_the_author_meta('ID'))); ?>
                 		</a>
                 	</span>
                 <?php }else{ ?>
              		<span><?php esc_html_e("by", 'fundingpress'); ?>

                 		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                 			<?php echo esc_attr(get_the_author_meta('display_name',get_the_author_meta('ID'))); ?>
                 		</a>
                 	</span>

              	<?php } ?>


              	<p><?php
                $excerpt = get_the_excerpt();
                echo mb_substr($excerpt, 0,110);echo '...';
             ?></p>
			  <p>
                <?php if(usercountry_name_display(get_the_author_meta( 'ID' )) != '' || get_the_author_meta('city', get_the_author_meta( 'ID' )) != ''){ ?>
                <span class="icon-map-marker" ></span> <b><?php echo esc_attr(usercountry_name_display(get_the_author_meta( 'ID' )));?></b>
                <?php if(get_the_author_meta('city', get_the_author_meta( 'ID' )) != ''){ echo ', '; } ?>
                <?php if ( get_the_author_meta('city', get_the_author_meta( 'ID' )) ) {echo esc_attr(get_the_author_meta('city',get_the_author_meta( 'ID' ))); } ?>
                <?php } ?>
            </p>


			            <div class="progress progress-striped active bar-green"><div style="width: <?php printf('%u%', round($funded_amount/$target*100), $project_currency_sign, number_format(round((int)$target), 0, '.', ',')) ?>%" class="bar"></div></div>

            <ul class="project-stats">
                <li class="first funded">
                     <strong><?php printf(esc_html__('%u%%', 'fundingpress'), round($funded_amount/$target*100), $project_currency_sign, number_format(round((int)$target), 0, '.', ',')) ?></strong><?php esc_html_e( 'funded', 'fundingpress'); ?>
                </li>
                <li class="pledged">
                    <strong>
                        <?php print $project_currency_sign; print number_format(round((int)$target), 0, '.', ',')?></strong><?php esc_html_e('target', 'fundingpress'); ?>
                </li>
               <li data-end_time="2013-02-24T08:41:18Z" class="last ksr_page_timer">
            <?php       if(!$project_expired){ ?>
                        <?php if(strpos(F_Controller::timesince(time(), strtotime($parseddate), 1, ''), "hour")){ ?>
                        	<strong> <?php esc_html_e('< 24', 'fundingpress'); ?></strong>
                        <?php }else{ ?>
                        	<strong><?php print F_Controller::timesince(time(), strtotime($parseddate), 1, ''); } ?></strong>

                        <?php if(strpos(F_Controller::timesince(time(), strtotime($parseddate), 1, ''), "hour")){ ?>
                         <?php esc_html_e('hours to go', 'fundingpress'); ?>
                        <?php }else{ ?>

                        <?php if(F_Controller::timesince(time(), strtotime($parseddate), 1, '') == 1){ ?>
                        		 <?php esc_html_e('day to go', 'fundingpress'); ?>
                        	<?php }else{ ?>
                        		 <?php esc_html_e('days to go', 'fundingpress'); ?>
                        	<?php } ?>
                        <?php } ?>

                    <?php }else{ ?>
							<strong> <?php esc_html_e('Ended', 'fundingpress'); ?></strong>
							<?php if($funded_amount > $target or $funded_amount == $target){ ?>
								<?php esc_html_e('Successful', 'fundingpress'); ?>
							<?php }else{ ?>
								<?php esc_html_e('Unsuccessful', 'fundingpress'); ?>
							<?php } ?>
                    <?php  } ?>
			                </li>
            </ul>

           <div class="clear"></div>
        </div>



        <?php endwhile; endif; ?>

        <div class="clear"></div>


    </div>
    <!-- /.cl-lg-12 -->
<ul id="pager">
              <li>
           <?php

           	 $args = array(
            'post_type'=> 'project',
            'order'    => 'ASC',
            'posts_per_page' => get_option('posts_per_page'),
             'tax_query' => array(
                            array(
                                'taxonomy' => 'project-category',
                                'field' => 'id',
                                'terms' => get_queried_object()->term_id,
                                'operator' => 'IN')
                        ),
             'paged'   =>   $paged
         );

            $additional_loop = new WP_Query($args);
            $page=$additional_loop->max_num_pages;
            echo funding_kriesi_pagination($additional_loop->max_num_pages);
            ?>
            <?php wp_reset_query(); ?>
              </li>
            </ul>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
</div> <!-- /.profile -->



<?php get_footer(); ?>