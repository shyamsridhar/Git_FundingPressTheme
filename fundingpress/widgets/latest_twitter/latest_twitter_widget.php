<?php
/*
Plugin Name: Latest twitter sidebar widget
Plugin URI: http://www.tacticaltechnique.com/wordpress/latest-twitter-sidebar-widget/
Description: Creates a sidebar widget that displays the latest twitter updates for any user with public tweets.
Author: Corey Salzano
Email: coreysalzano@gmail.com
Version: 0.120328
Author URI: http://www.tacticaltechnique.com/
*/
class latest_twitter_widget extends WP_Widget {

    function __construct() {
        // widget actual processes
        parent::__construct( /* Base ID */'latest_twitter_widget', /* Name */'Latest twitter widget', array( 'description' => __('Displays your latest twitter.com updates', 'fundingpress') ) );
    }
    function form($instance) {
        // outputs the options form on admin
        if ( !function_exists('quot') ){
            function quot($txt){
                return str_replace( "\"", "&quot;", $txt );
            }
        }
        // format some of the options as valid html
        @$username = htmlspecialchars($instance['user'], ENT_QUOTES);
        @$api = htmlspecialchars($instance['api'], ENT_QUOTES);
        @$apisecret = htmlspecialchars($instance['apisecret'], ENT_QUOTES);
        @$token = htmlspecialchars($instance['token'], ENT_QUOTES);
        @$tokensecret = htmlspecialchars($instance['tokensecret'], ENT_QUOTES);
        @$updateCount = htmlspecialchars($instance['count'], ENT_QUOTES);
        @$showTwitterIconTF = $instance['showTwitterIconTF'];
        @$showProfilePicTF = $instance['showProfilePicTF'];
        @$showTweetTimeTF = $instance['showTweetTimeTF'];
        @$widgetTitle = stripslashes(quot($instance['widgetTitle']));
        @$includeRepliesTF = $instance['includeRepliesTF'];
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('user')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Twitter user: @", 'fundingpress') ?><input type="text" size="12" id="<?php echo esc_attr($this->get_field_id('user')); ?>" name="<?php echo esc_attr($this->get_field_name('user')); ?>" value="<?php echo esc_attr($username); ?>" /></label>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Show", 'fundingpress') ?> <input type="text" id="<?php echo esc_attr($this->get_field_id('count')); ?>" size="2" name="<?php echo esc_attr($this->get_field_name('count')); ?>" value="<?php echo esc_attr($updateCount); ?>" /><?php _e("twitter updates", 'fundingpress'); ?></label>
            <label for="<?php echo esc_attr($this->get_field_id('widgetTitle')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Widget title:", 'fundingpress') ?> <input type="text" id="<?php echo esc_attr($this->get_field_id('widgetTitle')); ?>" size="16" name="<?php echo esc_attr($this->get_field_name('widgetTitle')); ?>" value="<?php echo esc_attr($widgetTitle); ?>" /></label>
            <p><input type="checkbox" id="<?php echo esc_attr($this->get_field_id('includeRepliesTF')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('includeRepliesTF')); ?>"<?php if($includeRepliesTF){ ?> checked="checked"<?php } ?>> <label for="<?php echo esc_attr($this->get_field_id('includeRepliesTF')); ?>"><?php _e("Include replies", 'fundingpress') ?></label></p>
            <br />
            <?php _e('If your tweets doesn&#8217;t show up with this Application settings please register another twitter APP on https://apps.twitter.com/app', 'fundingpress') ?>
            <br></br>
            <label for="<?php echo esc_attr($this->get_field_id('api')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Api key:", 'fundingpress') ?><input placeholder="Cz2crWMRSc62Nlp1yagt9w" type="text" size="35" id="<?php echo esc_attr($this->get_field_id('api')); ?>" name="<?php echo esc_attr($this->get_field_name('api')); ?>" value="<?php echo esc_attr($api); ?>" /></label>
            <label for="<?php echo esc_attr($this->get_field_id('apisecret')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Api key secret: ", 'fundingpress') ?><input placeholder="UOwKXRriyG2l4oL8NKuqsEwr0pXEkPNEkhrxrftI4lE" type="text" size="35" id="<?php echo esc_attr($this->get_field_id('apisecret')); ?>" name="<?php echo esc_attr($this->get_field_name('apisecret')); ?>" value="<?php echo esc_attr($apisecret); ?>" /></label>
            <label for="<?php echo esc_attr($this->get_field_id('token')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Token: ", 'fundingpress') ?><input placeholder="764237641-JLC4OqK2WNkpWlNgc3pHWN68bmjl0s9669nldZ5I" type="text" size="35" id="<?php echo esc_attr($this->get_field_id('token')); ?>" name="<?php echo esc_attr($this->get_field_name('token')); ?>" value="<?php echo esc_attr($token); ?>" /></label>
            <label for="<?php echo esc_attr($this->get_field_id('tokensecret')); ?>" style="line-height:35px;display:block;"><?php esc_html_e("Token secret: ", 'fundingpress') ?><input placeholder="8Lo97YIwwLJn78FlFwZ80lw2iOHEyZ8wwcJ9xCTVv8" type="text" size="35" id="<?php echo esc_attr($this->get_field_id('tokensecret')); ?>" name="<?php echo esc_attr($this->get_field_name('tokensecret')); ?>" value="<?php echo esc_attr($tokensecret); ?>" /></label>
        </p>
<?php
    }
    function update($new_instance, $old_instance) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['user'] = esc_html($new_instance['user']);
        $instance['api'] = esc_html($new_instance['api']);
        $instance['apisecret'] = esc_html($new_instance['apisecret']);
        $instance['token'] = esc_html($new_instance['token']);
        $instance['tokensecret'] = esc_html($new_instance['tokensecret']);
        $instance['count'] = esc_html($new_instance['count']);
        $instance['widgetTitle'] = esc_html( $new_instance['widgetTitle']);
        $instance['showTwitterIconTF'] = false;
        $instance['showProfilePicTF'] = false;
		if (strlen ($instance['api']) < 5) {
			$instance['api'] = "Cz2crWMRSc62Nlp1yagt9w";
		}
		if (strlen ($instance['apisecret']) < 10) {
			$instance['apisecret'] = "UOwKXRriyG2l4oL8NKuqsEwr0pXEkPNEkhrxrftI4lE";
		}
        if (strlen ($instance['token']) < 10) {
			$instance['token'] = "764237641-JLC4OqK2WNkpWlNgc3pHWN68bmjl0s9669nldZ5I";
		}
		if (strlen ($instance['tokensecret']) < 10) {
			$instance['tokensecret'] = "8Lo97YIwwLJn78FlFwZ80lw2iOHEyZ8wwcJ9xCTVv8";
		}
        switch( $new_instance['showIconOrPic'] ){
            case "icon":
                $instance['showTwitterIconTF'] = true;
                break;
            case "pic":
                $instance['showProfilePicTF'] = true;
                break;
            case "none":
                break;
        }
        if( $new_instance['showTweetTimeTF']=="1"){
            $instance['showTweetTimeTF'] = true;
        } else{
            $instance['showTweetTimeTF'] = false;
        }
        if( $new_instance['includeRepliesTF']=="1"){
            $instance['includeRepliesTF'] = true;
        } else{
            $instance['includeRepliesTF'] = false;
        }
        return $instance;
    }
    function widget($args, $instance) {

        extract($args, EXTR_SKIP);

        $query_arg['count']              = $instance['count'] ? $instance['count'] : 3;
        $query_arg['exclude_replies']    = !($instance['includeRepliesTF']);
        $query_arg['include_rts']        = false;
        $query_arg['screen_name'] = $instance['user'];
        $title = $instance['widgetTitle'];

        if( !class_exists( 'Codebird' ) ) {
            require_once( plugin_dir_path( __FILE__ ) . 'codebird.php' );
        }

		if (!isset($instance['api'])) {
			$instance['api'] = "Cz2crWMRSc62Nlp1yagt9w";
		}
		if (!isset($instance['apisecret'])) {
			$instance['apisecret'] = "UOwKXRriyG2l4oL8NKuqsEwr0pXEkPNEkhrxrftI4lE";
		}
        if (!isset($instance['token'])) {
			$instance['token'] = "764237641-JLC4OqK2WNkpWlNgc3pHWN68bmjl0s9669nldZ5I";
		}
		if (!isset($instance['tokensecret'])) {
			$instance['tokensecret'] = "8Lo97YIwwLJn78FlFwZ80lw2iOHEyZ8wwcJ9xCTVv8";
		}

		Codebird::setConsumerKey( $instance["api"], $instance["apisecret"] );

        $codebird_instance = Codebird::getInstance();


        $codebird_instance->setToken( $instance["token"], $instance["tokensecret"] );

        $codebird_instance->setReturnFormat( CODEBIRD_RETURNFORMAT_ARRAY );

        try {
            $latest_tweet = $codebird_instance->statuses_userTimeline( $query_arg );
        }
        catch( Exception $e ) {
            echo  'Error retrieving tweets';
        }

        echo  $before_widget;
        echo  $before_title . $title . $after_title;



		if (isset($latest_tweet['errors'][0])) {
			//error handling here plz
			echo "Error code ".$latest_tweet['errors'][0]['code'].": ".$latest_tweet['errors'][0]['message'];
		} else {
			foreach( $latest_tweet as $single_tweet ) {
				$tweet_text = $single_tweet['text'];
				$tweet_text      = preg_replace( "/[^^](http:\/\/+[\S]*)/", '<a href="$0">$0</a>', $tweet_text );

				$screen_name     = $single_tweet['user']['screen_name'];
				$user_permalink  = 'http://twitter.com/#!/' . $screen_name;
				$tweet_permalink = 'http://twitter.com/#!/' . $screen_name . '/status/' . $single_tweet['id_str'];

				if( $tweet_text ) {
					echo '<div class="latest-twitter-tweet"><i class="fa fa-twitter"></i> &quot;' . esc_attr($tweet_text) . '&quot;</div>';
				}
			}
		}
        $username = $instance['user'];
        echo '<div id="latest-twitter-follow-link"><a href="http://twitter.com/' . esc_attr($username) . '">';
        printf( esc_attr__( 'Follow %s on Twitter', 'fundingpress' ), $username );
        echo '</a></div>';
        echo  $after_widget;
    }
}
if( !function_exists('register_latest_twitter_widget')){
    add_action('widgets_init', 'register_latest_twitter_widget');
    function register_latest_twitter_widget() {
        register_widget('latest_twitter_widget');
    }
}
if( !function_exists('latest_twitter_widget_css')){
    function latest_twitter_widget_css( ){ ?>
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/widgets/latest_twitter/latest_twitter_widget.css" />
    <?php
     }
    add_action('wp_head', 'latest_twitter_widget_css');
}
?>