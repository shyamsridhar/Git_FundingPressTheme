<?php foreach($options as $opt_value=>$opt_name): ?>
	<label>
		<input type="radio" name="<?php echo esc_attr($id); ?>" id="<?php echo esc_attr($id); ?>_<?php echo esc_attr($opt_value); ?>" value="<?php echo esc_attr($opt_value); ?>" <?php checked($value, $opt_value)?> />
		<?php echo esc_attr($opt_name); ?>
	</label>
<?php endforeach ?>