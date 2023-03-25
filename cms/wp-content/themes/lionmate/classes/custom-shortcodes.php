<?php

// --- Custom Shortcodes --- //
function shortcode_faqs_allgemeines() {
	ob_start();
	get_template_part( 'shortcodes/shortcode_faqs_allgemeines');
	return ob_get_clean();
}

add_shortcode( 'shortcode_faqs_allgemeines', 'shortcode_faqs_allgemeines' );


function shortcode_faqs_einnahme() {
	ob_start();
	get_template_part( 'shortcodes/shortcode_faqs_einnahme');
	return ob_get_clean();
}

add_shortcode( 'shortcode_faqs_einnahme', 'shortcode_faqs_einnahme' );


function shortcode_faqs_inhalt() {
	ob_start();
	get_template_part( 'shortcodes/shortcode_faqs_inhalt');
	return ob_get_clean();
}

add_shortcode( 'shortcode_faqs_inhalt', 'shortcode_faqs_inhalt' );


function shortcode_faqs_verpackung() {
	ob_start();
	get_template_part( 'shortcodes/shortcode_faqs_verpackung');
	return ob_get_clean();
}

add_shortcode( 'shortcode_faqs_verpackung', 'shortcode_faqs_verpackung' );





?>