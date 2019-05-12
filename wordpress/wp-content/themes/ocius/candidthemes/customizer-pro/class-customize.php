<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ocius_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Ocius_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ocius_Customize_Section_Pro(
				$manager,
				'ocius',
				array(
					'title'    => esc_html__( 'Premium Verison', 'ocius' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'ocius' ),
					'pro_url'  => 'https://www.templatesell.com/item/ociuspro/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';


		wp_enqueue_script( 'ocius-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ocius-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Ocius_Customize::get_instance();

if ( ! class_exists( 'Ocius_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Ocius_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Ocius', 'ocius')?></h2>
			<p><?php esc_html_e('Ocius is clean and minimal WordPress theme for blog website.', 'ocius')?> </p>
			<p>
				<a href="<?php echo esc_url('http://demo.candidthemes.com/ocius/'); ?>" target="_blank"><?php esc_html_e( 'Ocius Demo', 'ocius' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'ocius')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'ocius')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/ocius/'); ?>" target="_blank"><?php esc_html_e( 'Ocius Documentation', 'ocius' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'ocius')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'ocius')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Ocius Support', 'ocius' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'ocius' ); ?></h3>
			<p><?php esc_html_e('If you like Ocius Kindly Rate this Theme', 'ocius')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/ocius/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'ocius' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
