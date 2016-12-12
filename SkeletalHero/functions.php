<?php
add_action( 'wp_enqueue_scripts', 'enqueue_style' );
function enqueue_style() {
    wp_enqueue_style( 'isca-style', get_template_directory_uri() . '/style.css' );
}

