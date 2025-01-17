<?php
/*
Plugin Name: Info Lettre
Description: un plugin qui, du côté admin, propose
quelques champs pour personnaliser un modal côté client
Version: 1
Author: aymen
*/


 // Exit if accessed directly
 if( !defined( 'ABSPATH' ) ) {  
     exit;
}
function il_definir_const() {
    if ( !defined( 'IL_PARAMETRES' ) ) {
        global $wpdb;
        define( 'IL_PARAMETRES', $wpdb->prefix . 'il_parametres' );
    }
    
    if ( !defined( 'IL_INSCRIPTIONS' ) ) {
        global $wpdb;
        define( 'IL_INSCRIPTIONS', $wpdb->prefix . 'il_inscriptions' );
    }
}
add_action( 'plugins_loaded', 'il_definir_const', 0 );


/*change les comportements a l activation*/
require_once(plugin_dir_path(__FILE__) .'/includes/il-activation.php');
register_activation_hook( __FILE__, 'il_activation' );


/**rajoute le style et le comportement js a la modale */
function il_ajouter_styles_et_scripts() {
    wp_register_style( 'il-style', plugins_url( 'assets/styles/styles.css', __FILE__ ) );
    wp_enqueue_style( 'il-style' );
    // Récupérer les informations
    require_once(plugin_dir_path(__FILE__) .'/includes/il-get-infos.php');
    $il_infos = il_get_info();
    $il_couleur_bg = $il_infos->couleur_bg;
    $il_couleur_txt = $il_infos->couleur_txt;
    // Définir les styles CSS
    $inline_css = "
        :root {
            --il-couleur-bg: $il_couleur_bg;
            --il-couleur-txt: $il_couleur_txt;
        }";
    // Ajouter les styles CSS en ligne
    wp_add_inline_style( 'il-style', $inline_css );
    wp_register_script( 'il-script', plugins_url( 'assets/scripts/main.js', __FILE__ ) );
    wp_enqueue_script( 'il-script' );
}
add_action( 'init', 'il_ajouter_styles_et_scripts' );


require_once(plugin_dir_path(__FILE__).'includes/il-panneau-admin.php');
require_once(plugin_dir_path(__FILE__).'includes/il-modal-client.php');


/**
 * supprime la table wp_mon_oremier_plugin a la db suite a la desactivation du plugin
 * a utiliser en cours de developpement pour fin de nettoyage de la table au besoin
 * Fonction a supprimer ou commenter avant la remise du plugin car le comportement attendu n est pas de perdre les informations lors de la desactivation
 */
// function il_deactivation() {
//     global $wpdb;
//     $table_parametres = $wpdb->prefix . 'il_parametres';
//     $wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

//     $table_inscriptions = $wpdb->prefix . 'il_inscriptions';
//     $wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );
// }
// register_deactivation_hook( __FILE__, 'il_deactivation' );
