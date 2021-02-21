<?php

class Glf_About_Us_Widget extends WP_Widget {

	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '',
		'after_widget'  => ''
	);

	function __construct() {

		parent::__construct(
			'glf-about-us',  // Base ID
			__( 'GloriaFood - Text and Image', 'gloriafood-restaurant' )   // Name
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'glf_assets' ) );
	}

	public function glf_assets() {
		wp_enqueue_media();
		wp_enqueue_script( 'glf-media-upload', get_template_directory_uri() . '/widgets/glf-media-upload.js', array( 'jquery' ), gloriafood_get_version() );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( empty( $instance['position'] ) ) {
			$instance['position'] = 1;
		}

		if ( empty( $instance['title'] ) ) {
			$instance['title'] = '';
		}

		if ( empty( $instance['text'] ) ) {
			$instance['text'] = '';
		}

		echo "<div class='row'>
            <div class='col-lg-6 glf-about-card-text'>
                <h2>{$instance['title']}</h2>";

		if ( ! empty( $instance['subtitle'] ) ) {
			echo "<span class='glf-card-subbtitle-container'>
                <span class='glf-card-subtitle-dash'></span>
                <span class='glf-card-subtitle subtitle'>{$instance['subtitle']}</span>
            </span>";
		}

		echo wpautop( $instance['text'] );

		echo "</div>";

		if ( empty( $instance['columns'] ) ) {
			$instance['columns'] = 2;
		}

		if ( 1 == $instance['columns'] ) {
			if ( ! empty( $instance['image_1'] ) ) {
				$image_src = false;

				if ( filter_var( $instance['image_1'], FILTER_VALIDATE_URL ) ) {
					$image_src = $instance['image_1'];
					$image_alt = $instance['image_1'];
				} elseif ( $image = wp_get_attachment_image_src( $instance['image_1'], 'glf_about_us_single' ) ) {
					$image_src = $image[0];
					$image_alt = get_post_meta( $instance['image_1'], '_wp_attachment_image_alt', true );
				}

				if ( $image_src ) {
					echo "<div class='col-12 col-lg-6 col-md-8 glf-about-card-image'>
                        <img src='" . $image_src . "' alt='" . $image_alt . "' class='img-responsive glf-coverify-image'/>
                    </div>";
				}
			}
		} else {
			if ( ! empty( $instance['image_1'] ) ) {
				$image_src = false;

				if ( filter_var( $instance['image_1'], FILTER_VALIDATE_URL ) ) {
					$image_src = $instance['image_1'];
					$image_alt = $instance['image_1'];
				} elseif ( $image = wp_get_attachment_image_src( $instance['image_1'], 'glf_about_us_double' ) ) {
					$image_src = $image[0];
					$image_alt = get_post_meta( $instance['image_1'], '_wp_attachment_image_alt', true );
				}

				if ( $image_src ) {
					echo "<div class='col-12 col-lg-3 col-md-4 glf-about-card-image'>
                        <img src='" . $image_src . "' alt='" . $image_alt . "' class='img-responsive glf-coverify-image'/>
                    </div>";
				}
			}

			if ( ! empty( $instance['image_2'] ) ) {
				$image_src = false;

				if ( filter_var( $instance['image_2'], FILTER_VALIDATE_URL ) ) {
					$image_src = $instance['image_2'];
					$image_alt = $instance['image_2'];
				} elseif ( $image = wp_get_attachment_image_src( $instance['image_2'], 'glf_about_us_double' ) ) {
					$image_src = $image[0];
					$image_alt = get_post_meta( $instance['image_2'], '_wp_attachment_image_alt', true );
				}

				if ( $image_src ) {
					echo "<div class='col-12 col-lg-3 col-md-4 glf-about-card-image'>
                        <img src='" . $image_src . "' alt='" . $image_alt . "' class='img-responsive glf-coverify-image'/>
                    </div>";
				}
			}
		}


		echo "</div>";

		echo $args['after_widget'];

	}

	public function form( $instance ) {
		$title    = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$text     = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$columns  = ! empty( $instance['columns'] ) ? $instance['columns'] : 2;
		$image_1  = ! empty( $instance['image_1'] ) ? $instance['image_1'] : '';
		$image_2  = ! empty( $instance['image_2'] ) ? $instance['image_2'] : '';

		?>
        <style>
            #available-widgets [class*=glf-about-us] .widget-title:before {
                font-family: "GLFIcons";
                content: "\0041";
            }
        </style>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'gloriafood-restaurant' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'gloriafood-restaurant' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $subtitle ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text:', 'gloriafood-restaurant' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
                      name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30"
                      rows="10"><?php echo esc_html( $text ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Image columns:', 'gloriafood-restaurant' ); ?></label>
            <select class="widefat glf_about_us_columns_selector"
                    id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>"
                    data-toggle-column="<?php echo $this->get_field_id( 'image_2_wrapper' ); ?>">
                <option value="1" <?php echo( 1 == $columns ? 'selected' : '' ); ?>><?php esc_html_e( '1 column', 'gloriafood-restaurant' ); ?></option>
                <option value="2" <?php echo( 2 == $columns ? 'selected' : '' ); ?>><?php esc_html_e( '2 columns', 'gloriafood-restaurant' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image_1' ); ?>"><?php esc_html_e( 'Image 1:', 'gloriafood-restaurant' ); ?></label>
            <img src="<?php echo( empty( $image_1 ) ? '' : wp_get_attachment_thumb_url( $image_1 ) ); ?>"
                 id="<?php echo $this->get_field_id( 'image_1' ); ?>-img" style="display: block;margin-bottom:5px;"/>
            <input name="<?php echo $this->get_field_name( 'image_1' ); ?>"
                   id="<?php echo $this->get_field_id( 'image_1' ); ?>" type="hidden"
                   value="<?php echo esc_attr( $image_1 ); ?>"/>
            <input class="upload_image_button button-primary" type="button"
                   data-image-id-field="<?php echo $this->get_field_id( 'image_1' ); ?>" data-allow-multiple=""
                   value="Upload Image"/>
        </p>
        <p id="<?php echo $this->get_field_id( 'image_2_wrapper' ); ?>">
            <label for="<?php echo $this->get_field_name( 'image_2' ); ?>"><?php esc_html_e( 'Image 2:', 'gloriafood-restaurant' ); ?></label>
            <img src="<?php echo( empty( $image_2 ) ? '' : wp_get_attachment_thumb_url( $image_2 ) ); ?>"
                 id="<?php echo $this->get_field_id( 'image_2' ); ?>-img" style="display: block;margin-bottom:5px;"/>
            <input name="<?php echo $this->get_field_name( 'image_2' ); ?>"
                   id="<?php echo $this->get_field_id( 'image_2' ); ?>" type="hidden"
                   value="<?php echo esc_attr( $image_2 ); ?>"/>
            <input class="upload_image_button button-primary" type="button"
                   data-image-id-field="<?php echo $this->get_field_id( 'image_2' ); ?>" data-allow-multiple=""
                   value="Upload Image"/>
        </p>
        <script>
            console.log('here');
            glfWidgetHookGalleryButtons();
        </script>
		<?php

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? wp_strip_all_tags( $new_instance['subtitle'] ) : '';
		$instance['text']     = ( ! empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
		$instance['columns']  = ( ! empty( $new_instance['columns'] ) ) ? $new_instance['columns'] : '';
		$instance['image_1']  = ( ! empty( $new_instance['image_1'] ) ) ? $new_instance['image_1'] : '';
		$instance['image_2']  = ( ! empty( $new_instance['image_2'] ) ) ? $new_instance['image_2'] : '';

		return $instance;
	}

}
