<?php

function hathaway_script_enque(){
wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/hathaway.css', array(), '1.0.0', 'all' );
}

/* Call functions */
add_action( 'wp_enqueue_scripts', 'hathaway_script_enque');