<?php
/**
 * The theme's dynamic strings for WPML translation
 */
 
global $unisphere_options;

wpml_register_string('unisphere', 'Contact Form Error Message', $unisphere_options['email_error']);
wpml_register_string('unisphere', 'Contact Form Success Message', $unisphere_options['email_success']);

wpml_register_string('unisphere', '"Read the Blog" Button Link', $unisphere_options['home_blog_button_link']);
wpml_register_string('unisphere', '"Read the Blog" Button Text', $unisphere_options['home_blog_button_text']);
wpml_register_string('unisphere', 'Home Page Blog Section Sub-Title', $unisphere_options['home_blog_subtitle']);
wpml_register_string('unisphere', 'Home Page Blog Section Title', $unisphere_options['home_blog_title']);

wpml_register_string('unisphere', '"View Portfolio" Button Link', $unisphere_options['home_portfolio_button_link']);
wpml_register_string('unisphere', '"View Portfolio" Button Text', $unisphere_options['home_portfolio_button_text']);
wpml_register_string('unisphere', 'Home Page Portfolio Section Sub-Title', $unisphere_options['home_portfolio_subtitle']);
wpml_register_string('unisphere', 'Home Page Portfolio Section Title', $unisphere_options['home_portfolio_title']);

wpml_register_string('unisphere', 'Home Section 3', do_shortcode( $unisphere_options['home_section_3'] ) );
wpml_register_string('unisphere', 'Home Section 2', do_shortcode( $unisphere_options['home_section_2'] ) );
wpml_register_string('unisphere', 'Home Section 1', do_shortcode( $unisphere_options['home_section_1'] ) );

?>