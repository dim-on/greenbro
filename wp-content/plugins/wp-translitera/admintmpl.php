<?php // add in p1.1


//wpforo добавлено p1.0.3
$wpforoconf = '';
if (file_exists(WP_PLUGIN_DIR . '/wpforo/wpforo.php')) {
    $wpforoconf = '<h4>' . __('WPForo', 'wp-translitera') . ':</h4>'
            . '<input type="checkbox" name="f1" value="1">' . __('Forums', 'wp-translitera') . '</br>'
            . '<input type="checkbox" name="f2" value="1">' . __('Topics', 'wp-translitera') . '</br>';
}
//--------------

$ret = '<h2>' . __('Convert existing', 'wp-translitera') . ':</h2></br>'
        . '<form method=POST> '
        . '<input type="checkbox" name="r1" value="1">' . __('Pages and posts', 'wp-translitera') . '</br>'
        . '<input type="checkbox" name="r2" value="1">' . __('Headings, tags etc...', 'wp-translitera') . '</br>'
        . $wpforoconf //wpforo добавлено p1.0.3
        . '<input type="submit" value="' . __('Transliterate', 'wp-translitera') . '" name="transliterate">'
        . '</form>'
        . '<p><h2>' . __('Settings', 'wp-translitera') . ':</h2></br>'
        . '<form method=POST> '
        . '<input type="checkbox" name="use_force_transliterations" value="1"' . wp_translitera::getchebox("use_force_transliterations") . '>' . __('Use forces transliteration for title', 'wp-translitera') . '</br>'
        . '<input type="checkbox" name="tranliterate_uploads_file" value="1"' . wp_translitera::getchebox("tranliterate_uploads_file") . '>' . __('Transliterate names of uploads files', 'wp-translitera') . '</br>'
        . '<input type="checkbox" name="lowercase_filename" value="1"' . wp_translitera::getchebox("lowercase_filename") . '>' . __('Convert names to lower case', 'wp-translitera') . '</br>'
        . '<input type="checkbox" name="tranliterate_404" value="1"' . wp_translitera::getchebox("tranliterate_404") . '>' . __('Transliterate 404 url', 'wp-translitera') . '</br>'
        . '<input type="checkbox" name="init_in_front" value="1"' . wp_translitera::getchebox("init_in_front") . '>' . __('Use transliteration in frontend for transliteration title out ACP (enable if use bbPress, buddypress, woocommerce etc)', 'wp-translitera') . '</br>'
        . __('File extensions, separated by commas , titles that do not need to transliterate', 'wp-translitera') . '<input type="text" size="80" name="typefiles" value="' . $extforform . '"></br>'
        . '<label style="color:red;font-weight:800">' . __('Custom transliteration rules, in format я=ja (Everyone ruled from a new line!)', 'wp-translitera') . '</label></br><textarea name="customrules" cols="30" rows="10">' . $customrulesstring . '</textarea></br>'
        . '<input type="submit" value="' . __('Apply', 'wp-translitera') . '" name="apply">'
        . '</form>';

