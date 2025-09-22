<?php
// Debug file to test theme loading
echo "Theme directory exists: " . (is_dir(get_template_directory()) ? "Yes" : "No") . "<br>";
echo "Style.css exists: " . (file_exists(get_template_directory() . '/style.css') ? "Yes" : "No") . "<br>";
echo "Functions.php exists: " . (file_exists(get_template_directory() . '/functions.php') ? "Yes" : "No") . "<br>";
echo "Current theme: " . get_option('stylesheet') . "<br>";
echo "Template directory: " . get_template_directory() . "<br>";
echo "Stylesheet directory: " . get_stylesheet_directory() . "<br>";
?>
