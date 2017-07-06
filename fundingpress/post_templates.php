<?php
class fundingpress_Single_Post_Template_Plugin {
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_metabox' ) );
		add_action( 'save_post', array( $this, 'metabox_save' ), 1, 2 );
		add_filter( 'single_template', array( $this, 'get_post_template' ) );
	}
	function get_post_template( $template ) {
		global $post;
		$custom_field = get_post_meta( $post->ID, '_wp_post_template', true );
		if( !$custom_field )
			return $template;
		/** Prevent directory traversal */
		$custom_field = str_replace( '..', '', $custom_field );
		if( file_exists( get_stylesheet_directory() . "/{$custom_field}" ) )
			$template = get_stylesheet_directory() . "/{$custom_field}";
		elseif( file_exists( get_template_directory() . "/{$custom_field}" ) )
			$template = get_template_directory() . "/{$custom_field}";
		return $template;
	}
	function get_post_templates() {

		$themes = wp_get_themes();
		$theme = get_option( 'template' );
		$templates = $themes[$theme]['Template Files'];
		$post_templates = array();

	  if ( is_array( $templates ) ) {
	    $base = array( trailingslashit(get_template_directory()), trailingslashit(get_stylesheet_directory()) );

	    foreach ( $templates as $template ) {
	      $basename = str_replace($base, '', $template);

	      if ($basename != 'functions.php') {
	        // don't allow template files in subdirectories
	        if ( false !== strpos($basename, '/') )
	          continue;
			if($basename == 'post_templates.php')continue;
	        $template_data = implode( '', file( $template ));

	        $name = '';
	        if ( preg_match( '|Single Post Template:(.*)$|mi', $template_data, $name ) )
	          $name = _cleanup_header_comment($name[1]);

	        if ( !empty( $name ) ) {
	          $post_templates[trim( $basename )] = $name;
	        }
	      }
	    }
	  }
	  return $post_templates;

	}
	function post_templates_dropdown() {
		global $post;
		$post_templates = $this->get_post_templates();
		/** Loop through templates, make them options */
		foreach ( (array) $post_templates as $template_file => $template_name ) {
			$selected = ( $template_file == get_post_meta( $post->ID, '_wp_post_template', true ) ) ? ' selected="selected"' : '';
			echo '<option value="' . esc_attr( $template_file ) . '"' . $selected . '>' . esc_html( $template_name ) . '</option>';
		}
	}
	function add_metabox() {

         $screens = array( 'post', 'portfolio' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'pt_post_templates',
            esc_html__( 'Sidebar position', 'fundingpress' ),
            array( $this, 'metabox' ),
            $screen,'normal', 'high'

        );
    }


	}
	function metabox( $post ) {
		?>
		<input type="hidden" name="pt_noncename" id="pt_noncename" value="<?php echo wp_create_nonce(get_template_directory().'/post_templates.php'); ?>" />
		<label class="hidden" for="post_template"><?php  esc_html_e( 'Post Template', 'fundingpress' ); ?></label><br />
		<select name="_wp_post_template" id="post_template" class="dropdown">
			<?php $this->post_templates_dropdown(); ?>
		</select>
		<?php
	}
	function metabox_save( $post_id, $post ) {
		/*
		 * Verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times
		 */
		if(isset($_POST['pt_noncename'])){
		if ( !wp_verify_nonce( $_POST['pt_noncename'], get_template_directory().'/post_templates.php' ) )
			return $post->ID;
         }
		/** Is the user allowed to edit the post or page? */
		if(isset($_POST['post_type'])){
		if ( 'page' == $_POST['post_type'] )
			if ( !current_user_can( 'edit_page', $post->ID ) )
				return $post->ID;
		else
			if ( !current_user_can( 'edit_post', $post->ID ) )
				return $post->ID;
        }
		/** OK, we're authenticated: we need to find and save the data */
		/** Put the data into an array to make it easier to loop though and save */
		if(isset($_POST['_wp_post_template'])){
		$mydata['_wp_post_template'] = $_POST['_wp_post_template'];
        }
		/** Add values of $mydata as custom fields */
		if(isset($mydata)){
		foreach ( $mydata as $key => $value ) {
			/** Don't store custom data twice */
			if( 'revision' == $post->post_type )
				return;
			/** If $value is an array, make it a CSV (unlikely) */
			$value = implode( ',', (array) $value );
			/** Update the data if it exists, or add it if it doesn't */
			if( get_post_meta( $post->ID, $key, false ) )
				update_post_meta( $post->ID, $key, $value );
			else
				add_post_meta( $post->ID, $key, $value );
			/** Delete if blank */
			if( !$value )
				delete_post_meta( $post->ID, $key );
		}}
	}
}