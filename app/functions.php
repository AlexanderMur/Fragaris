<?php
require get_template_directory() . '/inc/theme-helpers.php';
if ( defined('Carbon_Fields_Plugin\PLUGIN_FILE') ) {
    require get_template_directory() . '/inc/carbon-fields.php';
}
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/widget-areas.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/enqueue-script-style.php';
require get_template_directory() . '/inc/tgm-list.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/register-tax-post.php';
require get_template_directory() . '/inc/image_sizes.php';
