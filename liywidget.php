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
		?>

		<table id="liuwidget-table">
				<?php for ($i=0;$i<3;$i++): ?>
			<tr>

				<td><a class="add-image-button" href="<?php $instance['link'.$i] ?>" id="link1">
						
				<?php if ($instance['img'.$i]): ?>
					<img src="<?php echo wp_get_attachment_image_src($instance['img'.$i])[0];?>" />
				<?php endif ?>

				</a>
				</td>
				<td>
					<a href="<?php echo $instance['link'.$i] ?>"><?php echo $instance['label'.$i] ?></a>
				</td>
			</tr>
				<?php endfor ?>
		</table>

	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		for ($i=0;$i<3;$i++){
			$instance['link'.$i] = strip_tags($new_instance['link'.$i]);
			$instance['img'.$i] = $new_instance['img'.$i];
			$instance['label'.$i] = $new_instance['label'.$i];
		}
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'link0' => '', 
			'link1' => '', 
			'link2' => '', 
			'label0' => '', 
			'label1' => '', 
			'label2' => '', 
			'img0' => '', 
			'img1' => '', 
			'img2' => '', 
			'title' => '', 
		) );
		$title = strip_tags($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<table id="liuwidget-table">
			<?php for ($i=0;$i<3;$i++): ?>
			<tr>

				<td><a class="add-image-button" href="#" id="link1">
						
			<?php if ($instance['img'.$i]==''): ?>
					Add image
			<?php  else:  ?>
				<img src="<?php echo wp_get_attachment_image_src($instance['img'.$i])[0];?>" />
			<?php endif ?>
					</a>
				</td>
				<td>
					Text
					<input type="text" name="<?php echo $this->get_field_name('label'.$i); ?>" value="<?php echo esc_attr($instance['label'.$i]); ?>" /><br />
					Link
					<input type="text" name="<?php echo $this->get_field_name('link'.$i); ?>" value="<?php echo esc_attr($instance['link'.$i]); ?>" />
					<input type="hidden" name="<?php echo $this->get_field_name('img'.$i); ?>" value="<?php echo esc_attr($instance['img'.$i]); ?>">
				</td>
			</tr>
			<?php endfor?>
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
