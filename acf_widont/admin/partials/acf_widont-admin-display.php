<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://oliverbelmont.com
 * @since      1.0.0
 *
 * @package    Acf_widont
 * @subpackage Acf_widont/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2 class="">ACF Widont</h2>
    <br>

    <form method="post" name="acf_widont_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // widont options split up for use with checked function
        $textfield = $options['textfield'];
        $textarea = $options['textarea'];
        $wysiwyg = $options['wysisyg'];

    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

    <!-- Apply Widont filter to all text fields -->
	<fieldset>
        <legend class="screen-reader-text">
            <span>Apply Widont to all text fields</span>
        </legend>
        <label for="<?php echo $this->plugin_name; ?>-textfield">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-textfield" name="<?php echo $this->plugin_name; ?>[textfield]" value="1" <?php checked($textfield, 1); ?> />
            <span><?php esc_attr_e('Apply Widont to all text fields', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <!-- Apply Widont filter to all textarea fields -->
	<fieldset>
        <legend class="screen-reader-text">
            <span>Apply Widont to all textarea fields</span>
        </legend>
        <label for="<?php echo $this->plugin_name; ?>-textarea">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-textarea" name="<?php echo $this->plugin_name; ?>[textarea]" value="1" <?php checked($textarea, 1); ?> />
            <span><?php esc_attr_e('Apply Widont to all textarea fields', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <!-- Apply Widont filter to all textarea fields -->
	<fieldset>
        <legend class="screen-reader-text">
            <span>Apply Widont to all textarea fields</span>
        </legend>
        <label for="<?php echo $this->plugin_name; ?>-wysisyg">
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-wysisyg" name="<?php echo $this->plugin_name; ?>[wysisyg]" value="1" <?php checked($wysiwyg, 1); ?> />
            <span><?php esc_attr_e('Apply Widont to all wysisyg fields', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

</div>
