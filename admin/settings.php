<?php
class Admin_Settings_Page {
    public function __construct() {
        add_action('admin_init', [$this, 'admin_settings_page_init']);
        add_action('admin_menu', [$this, 'add_openai_menu_page']);
    }
    public function add_openai_menu_page() {
        add_options_page('Openai Content Generator', __('Openai Content Generator', 'openai-content-generator'), 'manage_options', 'bdthemes_openai_options', [$this, 'create_admin_page']);
    }
    public function create_admin_page() {
?>
        <div class="wrap">
            <h1><?php _e('Openai Content Generator', 'openai-content-generator'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('bdthemes_openai_options');
                do_settings_sections('bdthemes_openai_options');
                submit_button();
                ?>
            </form>
        </div>
<?php
    }

    public function admin_settings_page_init() {
        add_settings_section('bdt_openai_section', 'Openai Setings', [$this, 'openai_settings_section'], 'bdthemes_openai_options');
        add_settings_field('bdt_openai_api_key', __('API Key', 'openai-content-generator'), [$this, 'openai_content_generator_callback'], 'bdthemes_openai_options', 'bdt_openai_section');
        register_setting('bdthemes_openai_options', 'bdt_openai_api_key', ['sanitize_callback' => 'esc_attr']);
    }
    public function openai_settings_section() {
        printf('<p>%s</p>', 'Please enter your Openai API key.');
    }
    public function openai_content_generator_callback() {
        $api_key = get_option('bdt_openai_api_key');
        echo '<input type="text" name="bdt_openai_api_key" value="' . $api_key . '" class="large-text" placeholder="sk-..." />';
    }
}

new Admin_Settings_Page();
