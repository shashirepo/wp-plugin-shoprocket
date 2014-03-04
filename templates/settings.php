<div class="wrap">
    <h2>Shoprocket Settings</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('wp_plugin_Shoprocket-group'); ?>
        <?php @do_settings_fields('wp_plugin_Shoprocket-group'); ?>

        <?php do_settings_sections('wp_plugin_Shoprocket'); ?>

        <?php @submit_button(); ?>
    </form>
</div>