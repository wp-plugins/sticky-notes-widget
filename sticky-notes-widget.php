<?php
/*
	Plugin Name: Sticky Notes Widget
	Plugin URI: http://www.superbcodes.com/
	Description: Using this widget users can add beautiful notes to the widget aria of their WordPress site.Different styles of background,attacher and fonts are available.User pick color by colorpicker and define the margin of the widget.
	Tags: texts,widgets,sticky,notes,paper,pins,tapes,sidebar
	Version: 1.0.1
	Author:	Nazmul Hossain Nihal
	Author URI: http://www.SuperbCodes.com/
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
	class StickyNotesWidget extends WP_Widget {
		
		public function __construct(){
			parent::__construct(
				'StickyNotesWidget',
				__( 'Sticky Notes Widget', 'StickyNotesWidget' ), 
				array( 'description' => __( 'Generate QrCode for every page ', 'StickyNotesWidget' ), )
			);
		}
		public function form( $instance ){
			$title = ! empty( $instance['title'] ) ? $instance['title'] : "";
			$margin = ! empty( $instance['margin'] ) ? $instance['margin'] : "0";
			$text_color = ! empty( $instance['text_color'] ) ? $instance['text_color'] : "#000000";
			$background_color = ! empty( $instance['background_color'] ) ? $instance['background_color'] : "#FFFFFF";
			$background_style = ! empty( $instance['background_style'] ) ? $instance['background_style'] : "paper-1";
			$tape_style = ! empty( $instance['tape_style'] ) ? $instance['tape_style'] : "tape-2";
			$font_style = ! empty( $instance['font_style'] ) ? $instance['font_style'] : "font-1";
			$texts = ! empty( $instance['texts'] ) ? $instance['texts'] : "";
			?>
			<p>
				
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
				
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Margin: (in pixels)' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'margin' ); ?>" name="<?php echo $this->get_field_name( 'margin' ); ?>" type="text" value="<?php echo esc_attr( $margin ); ?>">

				
				<label for="<?php echo $this->get_field_id( 'text_color' ); ?>"><?php _e( 'Text Color:' ); ?></label><br /> 
				<input class="widefat snw-color-picker" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" type="text" value="<?php echo esc_attr( $text_color ); ?>">
				<br /> 
				<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:' ); ?></label><br /> 
				<input class="widefat snw-color-picker" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>">
				<br /> 
				<label for="<?php echo $this->get_field_id( 'background_style' ); ?>"><?php _e( 'Background Style:' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'background_style' ); ?>" name="<?php echo $this->get_field_name( 'background_style' ); ?>">
				  <?php
					
					$options = array(
						"horizontal" => "Horizontal Line",
						"horizontal-vertical" => "Horizontal and Vertical Line",
						"paper-1" => "Crumbled Paper 1",
						"paper-2" => "Crumbled Paper 2",
						"paper-3" => "Lined Crumbled Paper",
						"paper-4" => "Crumbled Graph Paper",
						"texture" => "Texture"
					);
					
					foreach( $options as $value => $name ) {
						$selected = ( $background_style == $value ) ? 'selected="true"' : ''; 
						echo '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
					}

					?>
				</select>
				
				<label for="<?php echo $this->get_field_id( 'tape_style' ); ?>"><?php _e( 'Attacher Style:' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'tape_style' ); ?>" name="<?php echo $this->get_field_name( 'tape_style' ); ?>">
				  <?php
					
					$options = array(
						"none" => "None",
						"tape-1" => "Tape 1",
						"tape-2" => "Tape 2",
						"yellow-tape" => "Yellow Tape",
						"pin-blue pins" => "Blue Pin",
						"pin-red pins" => "Red Pin",
						"pin-green pins" => "Green Pin",
						"pin-yellow pins" => "Yellow Pin",
						"pin-black pins" => "Black Pin",
						"safety-pin" => "Safety Pin",
						"paper-clip" => "Paper Clip"
					);
					
					foreach( $options as $value => $name ) {
						$selected = ( $tape_style == $value ) ? 'selected="true"' : ''; 
						echo '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
					}

					?>
				</select>
				
				<label for="<?php echo $this->get_field_id( 'font_style' ); ?>"><?php _e( 'Font Style:' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'font_style' ); ?>" name="<?php echo $this->get_field_name( 'font_style' ); ?>">
				  <?php
					
					$options = array(
						" " => "Default",
						"font-1" => "Font Style 1",
						"font-2" => "Font Style 2",
						"font-3" => "Font Style 3",
						"font-5" => "Font Style 4"
					);
					
					foreach( $options as $value => $name ) {
						$selected = ( $font_style == $value ) ? 'selected="true"' : ''; 
						echo '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
					}

					?>
				</select>
				<label for="<?php echo $this->get_field_id( 'texts' ); ?>"><?php _e( 'Texts:' ); ?></label><br />
				<textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id( 'texts' ); ?>" name="<?php echo $this->get_field_name( 'texts' ); ?>" type="text"><?php echo esc_attr( $texts ); ?></textarea>

				<p>
				If you find this plugin useful then please rate this plugin <a style="text-decoration:none;" href="http://wordpress.org/extend/plugins/sticky-notes-widget" target="_blank">here</a> <br /> and don't forget to visit my website <a style="text-decoration:none;" href="http://www.SuperbCodes.com/" target="_blank">SuperbCodes.com</a>.
				<br /><br />
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FYMPLJ69H9EM6" target="_blank"><img style="width:100px;height:30px;" alt="Donate" src="<?php echo plugin_dir_url( __FILE__ ); ?>images/donate.gif" /></a>
				</p>
			</p>
			<?php
		}

		public function widget( $args, $instance ){
			ob_start();
			?>
			<div style="margin:<?php echo $instance["margin"]; ?>px;" class="<?php echo $instance["background_style"]; ?> snw-box <?php echo $instance["font_style"]; ?>">
				<div class="<?php echo $instance["tape_style"]; ?> taping"></div>
				<div class="paper" style="background-color:<?php echo $instance["background_color"]; ?>;color:<?php echo $instance["text_color"]; ?>;">
					<div class="title"><?php echo $instance["title"]; ?></div>
					<div class="texts">
						<?php echo $instance["texts"]; ?>
					</div>
				</div>
			</div>
			<?php
			echo ob_get_clean();
		}
		
	}
	
	function register_StickyNotesWidget() {
		register_widget( 'StickyNotesWidget' );
	}
	
	add_action( 'widgets_init', 'register_StickyNotesWidget' );
	
	function snw_add_color_picker( $hook ) {
	 
		if( is_admin() ) {   
			wp_enqueue_style( 'wp-color-picker' ); 
			wp_enqueue_script( 'custom-script-handle', plugins_url( 'js/jscolor.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
		}
	}
	add_action( 'admin_enqueue_scripts', 'snw_add_color_picker' );
	
	function StickyNotesWidget_styles() {
		wp_enqueue_style('custom-fonts-1',  plugins_url('sticky-notes-fonts.css', __FILE__));
		wp_enqueue_style('custom-style-2',plugins_url('sticky-notes-styles.css', __FILE__));
	}

	add_action( 'wp_enqueue_scripts', 'StickyNotesWidget_styles' );
	

?>