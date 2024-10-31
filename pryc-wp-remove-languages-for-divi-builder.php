<?php
/*
 * Plugin Name: PRyC WP: Languages remover for Divi Builder
 * Plugin URI:
 * Description: The plugin regularly removes translations from Divi Builder (Elegant Themes Divi & Extra themes & Divi Builder plugin). Removes only backend translations - Divi Builder.
 * Author: PRyC
 * Author URI: http://PRyC.pl
 * Version: 1.0.1
 */


/* CODE: */

if ( ! defined( 'ABSPATH' ) ) exit;


if ( !function_exists( "pryc_wp_remove_divi_builder_languages" ) ) {
	function pryc_wp_remove_divi_builder_languages() {
				
				// Tempalte Dir (parent theme)				
				$WPContentDir = WP_CONTENT_DIR;
				
				$DiviLangDir = $WPContentDir . "/themes/Divi/includes/builder/languages/";
				$DiviLangFile = $DiviLangDir . "en_US.mo";
				
				$ExtraLangDir = $WPContentDir . "/themes/Extra/includes/builder/languages/";
				$ExtraLangFile = $ExtraLangDir . "en_US.mo";
				
				// Plugin dir
				$PluginsDir = WP_PLUGIN_DIR;
				$DiviBuilderLangDir = $PluginsDir . "/divi-builder/includes/builder/languages/";
				$DiviBuilderLangFile = $DiviBuilderLangDir . "en_US.mo";
				
								
				if ( file_exists( $DiviLangFile ) ) {
					array_map( 'unlink', glob( $DiviLangDir . "*.mo" ) );
					
					if ( file_exists( $DiviLangFile ) ) {
						?>
						<div class="notice notice-warning is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Something went wrong. Check files permissions: <?php echo $DiviLangDir; ?>*</p>
						</div>
						<?php
					} else {
						?>
						<div class="notice notice-success is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Divi Builder (Divi theme) lang files deleted.</p>
						</div>
						<?php
					}
				}
				
				if ( file_exists( $ExtraLangFile ) ) {
					array_map( 'unlink', glob( $ExtraLangDir . "*.mo" ) );
					
					if ( file_exists( $ExtraLangFile ) ) {
						?>
						<div class="notice notice-warning is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Something went wrong. Check files permissions: <?php echo $ExtraLangDir; ?>*</p>
						</div>
						<?php
					} else {
						?>
						<div class="notice notice-success is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Divi Builder (Extra theme) lang files deleted.</p>
						</div>
						<?php
					}
				}
				
				if ( file_exists( $DiviBuilderLangFile ) ) {
					array_map( 'unlink', glob( $DiviBuilderLangDir . "*.mo" ) );
					
					if ( file_exists( $DiviBuilderLangFile ) ) {
						?>
						<div class="notice notice-warning is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Something went wrong. Check files permissions: <?php echo $DiviBuilderLangDir; ?>*</p>
						</div>
						<?php
					} else {
						?>
						<div class="notice notice-success is-dismissible"> 
							<p>PRyC WP: Remove Divi Builder languages: Divi Builder (plugin) lang files deleted.</p>
						</div>
						<?php
					}
				}

	}
}
add_action( 'admin_init', 'pryc_wp_remove_divi_builder_languages', 999 );
//add_action( 'after_setup_theme', 'pryc_wp_remove_divi_builder_languages', 999 );
//add_action( 'upgrader_process_complete', 'pryc_wp_remove_divi_builder_languages', 10, 2 ); 


/* END */

