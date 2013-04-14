<?php
/*
Plugin Name: Ads Spaces
Description: Create some ads spaces in sidebar 
Version: 1.0
Author: Thrbowl 
License: GPL
*/

register_activation_hook(__FILE__,'ads_spaces_install'); 
register_deactivation_hook( __FILE__, 'ads_spaces_remove' );

function ads_spaces_install() {
}

function ads_spaces_remove() {
//Todo: clear options created by the plugin.
}

class Ads_Spaces_Widget extends WP_Widget {
	function Ads_Spaces_Widget() {
		$widget_ops = array('classname' => 'ads_spaces', 'description' => 'Create some ads spaces in sidebar' );
		$this->WP_Widget(false, 'Ads Spaces', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
                echo '<div class="block">';
		echo $instance['ads'];
                echo '</div>';
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['ads'] = stripslashes($new_instance['ads']);
		return $instance;
	}
	
	function form($instance) {
	    $ads = $instance['ads'];
            ?>

	    <p>
            <label for="<?php echo $this->get_field_id('ads'); ?>"><?php _e("Ads script:"); ?></label>
            <textarea class="widefat" rows="9" id="<?php echo $this->get_field_id('ads'); ?>" name="<?php echo $this->get_field_name('ads'); ?>"><?php echo $ads; ?></textarea>
            </p>

            <?php	
	}
}

### Function: Init Ads Spaces Widget
add_action('widgets_init', 'ads_spaces_views_init');
function ads_spaces_views_init() {
	register_widget('Ads_Spaces_Widget');
}

?>
