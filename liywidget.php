<?php
/**
 * @package LIY_Widget
 * @version 1
 */
/*
Plugin Name: LIY Widget
Plugin URI: http://wordpress.org
Description: Show url friends sites
Version: 1/0
Author URI: 
*/


/**
 * Friends Life in Yeshua theme widget
 *
 * @since 1.0
 */
class LIY_Widget_Friedns extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'liy_widget_friends', 'description' => __('Link to friends sites'));
		parent::__construct('liyfriends', __('friends'), $widget_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
/*		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $args['after_widget'];*/
		echo $instance['text'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link1'] = strip_tags($new_instance['link1']);
		$instance['link2'] = strip_tags($new_instance['link2']);
		$instance['link3'] = strip_tags($new_instance['link3']);
		$instance['img1'] = $new_instance['img1'];
		$instance['img2'] = $new_instance['img2'];
		$instance['img3'] = $new_instance['img3'];
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'link1' => '', 
			'link2' => '', 
			'link3' => '', 
			'img1' => '', 
			'img2' => '', 
			'img3' => '', 
			'title' => '', 
		) );
		$title = strip_tags($instance['title']);



?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<table id="liuwidget-table">
	<tr>
		<td><a class="add-image-button" href="#" id="link1">

<?php echo print_r($instance); ?>
			Add image
			</a>
		</td>
		<td>
			<input type="text" name="<?php echo $this->get_field_name('link1'); ?>" value="<?php echo esc_attr($instance['link1']); ?>" />
			<input type="hidden" name="<?php echo $this->get_field_name('img1'); ?>" value="<?php echo esc_attr($instance['img1']); ?>">
		</td>
	</tr>
	<tr>
		<td><a class="add-image-button" href="#" id="link2">Add image</a></td>
		<td>
			<input type="text" name="<?php echo $this->get_field_name('link2'); ?>" value="<?php echo esc_attr($instance['link2']); ?>" >
			<input type="hidden" name="<?php echo $this->get_field_name('img2'); ?>" value="<?php echo esc_attr($instance['img2']); ?>">
		</td>
	</tr>
	<tr>
		<td><a class="add-image-button" href="#" id="link3">Add image</a></td>
		<td>
			<input type="text" name="<?php echo $this->get_field_name('link3'); ?>" value="<?php echo esc_attr($instance['link3']); ?>" >
			<input type="hidden" name="<?php echo $this->get_field_name('img2'); ?>" value="<?php echo esc_attr($instance['img2']); ?>">
		</td>
	</tr>
</table>

<?php
	}
}

function LIY_widgets_init(){
	register_widget('LIY_Widget_Friedns');
}

add_action( 'widgets_init', 'LIY_widgets_init' );

function LIY_admin_enqueue_scripts(){
	wp_enqueue_media();
	wp_enqueue_script( 'admin_main', plugin_dir_url(__FILE__).'js/admin.js', array('jquery'));
}

add_action( 'admin_enqueue_scripts', 'LIY_admin_enqueue_scripts', 9);

?>
