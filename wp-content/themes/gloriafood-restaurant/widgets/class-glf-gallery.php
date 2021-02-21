<?php

class Glf_Gallery extends WP_Widget {

	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>'
	);

	function __construct() {

		parent::__construct(
			'glf-gallery',  // Base ID
			__( 'GloriaFood - Photo Gallery', 'gloriafood-restaurant' )   // Name
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'glf_assets' ) );
	}

	public function glf_assets() {
		wp_enqueue_media();
		wp_enqueue_script( 'glf-gallery-media-upload', get_template_directory_uri() . '/widgets/glf-gallery-media-upload.js', array( 'jquery' ), gloriafood_get_version() );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( empty( $instance['position'] ) ) {
			$instance['position'] = 1;
		}

		if ( empty( $instance['images'] ) ) {
			$instance['images'] = array();
		}

		echo "<div class='row'>
            <div class='col text-center'>
                <h2>" . ( empty( $instance['title'] ) ? '' : $instance['title'] ) . "</h2>
                <span class='glf-card-subbtitle-container text-center'>
                    <span class='glf-card-subtitle-dash ml-auto'></span>
                    <span class='glf-card-subtitle mr-auto subtitle'>" . ( empty( $instance['subtitle'] ) ? '' : $instance['subtitle'] ) . "</span>
                </span>
            </div>
        </div>
        <div class='row widget-glf-gallery-gallery'>";

		if ( ! empty( $instance['images'] ) ) {
			$images = explode( ',', $instance['images'] );
			$images = array_slice( $images, 0, 12 ); //Maximum 12 images displayed in this gallery
            foreach ( $images as $imageId ) {
                $image = false;
                $thumbnailImage = false;
                if ( ! filter_var( $imageId, FILTER_VALIDATE_URL ) ) {
                    if ( $image = $this->getGalleryImage($imageId, 'full') ) {
                        $image = $image[0];
                    }
                    if ( $thumbnailImage = $this->getGalleryImage($imageId, 'medium') ) {
                        $thumbnailImage = $thumbnailImage['url'];
                    }
                }
                if ( $image ) {
                    echo "<div class='col-6 col-md-4 glf-gallery-image'>
                        <a href='{$image}' rel='{$this->id}'>
                            <img src='" . ($thumbnailImage ? $thumbnailImage : $image) . "' class='img-responsive glf-coverify-image'/>
                        </a>
                    </div>";
                }
            }
        }

        echo "</div>";

        echo $args['after_widget'];

    }

    public function getGalleryImage ( $attachmentId, $size ) {
        if ( $size === 'full' ) {
            $image = wp_get_attachment_image_src( $attachmentId, $size );
        } else {
            $image = image_get_intermediate_size( $attachmentId, $size );
        }
        $uploadDir = wp_get_upload_dir();
        if ( $size !== 'full' &&
            (
                !$image ||
                !isset($image['path']) ||
                !file_exists(sprintf("%s/%s", $uploadDir['basedir'], $image['path']))
            )
        ) {
            return false;
        }
        return $image;
    }

	public function form( $instance ) {

		$title    = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$images   = ! empty( $instance['images'] ) ? $instance['images'] : array();
		?>
        <style>
            #available-widgets [class*=glf-gallery] .widget-title:before {
                font-family: "GLFIcons";
                content: "\0043";
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
            <label for="<?php echo $this->get_field_name( 'images' ); ?>"><?php _e( 'Images:', 'gloriafood-restaurant' ); ?></label>
        <div id="<?php echo $this->get_field_id( 'images' ); ?>-preview">
			<?php
			if ( ! empty( $images ) ) {
				$images = explode( ',', $images );

				foreach ( $images as $image ) {
					if ( $image = wp_get_attachment_image_src( $image ) ) {
						echo "<img src='{$image[0]}' style='width:32%;margin-left:1%' />";
					}
				}
			}
			?>
        </div>
        <input name="<?php echo $this->get_field_name( 'images' ); ?>"
               id="<?php echo $this->get_field_id( 'images' ); ?>" type="hidden"
               value="<?php echo esc_attr( implode( ',', $images ) ); ?>"/>
        <input class="upload_gallery_button button-primary" type="button"
               data-image-id-field="<?php echo $this->get_field_id( 'images' ); ?>"
               value="Select Images"/>
        </p>
		<?php

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? $new_instance['subtitle'] : '';
		$instance['images']   = ( ! empty( $new_instance['images'] ) ) ? $new_instance['images'] : '';

		return $instance;
	}

}