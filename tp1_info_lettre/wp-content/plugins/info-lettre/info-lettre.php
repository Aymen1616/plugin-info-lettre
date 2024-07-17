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

/**
 * ajoute une table a la db suite a l activation du plugin
 */
// function il_activation(){
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'mon_premier_plugin';
//     $charset_collate = $wpdb->get_charset_collate();

//     if($wpdb->get_var( "SHOW TABLES LIKE '$table_name'") != $table_name){
//         $sql = "CREATE TABLE $table_name (
//                     id int NOT NULL AUTO_INCREMENT,
//                     nom varchar(50)  NOT NULL,
//                     PRIMARY KEY (id)
//             ) $charset_collate;";
        
//         require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//         ( $sql );
//         dbDelta( $sql );
//     }
// }


/*change les comportements a l activation*/
require_once(plugin_dir_path(__FILE__) .'/includes/il-activation.php');
register_activation_hook( __FILE__, 'il_activation' );


/**
 * supprime la table wp_mon_oremier_plugin a la db suite a la desactivation du plugin
 * a utiliser en cours de developpement pour fin de nettoyage de la table au besoin
 * Fonction a supprimer ou commenter avant la remise du plugin car le comportement attendu n est pas de perdre les informations lors de la desactivation
 */
function il_deactivation() {
    global $wpdb;
    $table_parametres = $wpdb->prefix . 'il_parametres';
    $wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

    $table_inscriptions = $wpdb->prefix . 'il_inscriptions';
    $wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );
}
register_deactivation_hook( __FILE__, 'il_deactivation' );

/** */
require_once(plugin_dir_path(__FILE__).'includes/il-panneau-admin.php');


require_once(plugin_dir_path(__FILE__).'includes/il-modal-client.php');


function il_ajouter_styles_et_scripts() {
    wp_register_style( 'il-style', plugins_url( 'assets/styles/styles.css', __FILE__ ) );
    wp_enqueue_style( 'il-style' );
    wp_register_script( 'il-script', plugins_url( 'assets/scripts/main.js', __FILE__ ) );
    wp_enqueue_script( 'il-script' );
}
//add_action( 'init', 'il_ajouter_styles_et_scripts' );
add_action( 'wp_enqueue_scripts', 'il_ajouter_styles_et_scripts' ); //uniquement cote client
//add_action( 'admin_enqueue_scripts', 'il_ajouter_styles_et_scripts' );











/**
 * ajoute le panneau du pluggin dans l interface admin
 */
// function il_ajouter_menu() {
//     add_menu_page('Mon Premier Plugin',// Page title
//         'Mon Premier Plugin',// Menu title
//         'manage_options',// Capability
//         'il-menu-page',// Menu slug
//         'il_ajouter_formulaire'          // Callable function   
//     );
// }
// add_action( 'admin_menu', 'il_ajouter_menu' );




// function il_ajouter_formulaire() {
//     echo '<div style="padding:5vw;">
//         <h2>' . get_admin_page_title() . '</h2>
//         <form method="post" style="margin-top:25px;">
//             <label for="nom">Nom</label>
//             <input type="text" id="nom" name="nom">
//             <button type="submit" name="enregistrer">Enregistrer</button>   
//         </form>
//     </div>';  
//     // S'il y a un query string nom, ajoute sa valeur à la db  
//     if ( isset(    $_POST['nom'] ) ) {
//         il_ajouter_data(); // Appelle la fonction pour l’appel à la db 
//     } ;
//         il_afficher_data();    // Appelle la fonction qui affiche les datas
//      }


// function il_ajouter_data(){
//     global $wpdb;
//     $il_nom = sanitize_text_field( $_POST['nom'] );
//     $wpdb->insert( IL_TABLE_NAME,
//                     array(
//                         'nom' => $il_nom     
//                     )
                      
//                 );
// }




// /*
// Plugin Name: Mon Premier Plugin
// Description: Mon premier plugin pour WordPress
// Version: 1.0
// Author: aymen
// */




// // function il_change_wordpress( $content ) {
// //     return str_replace( 'wordpress', 'WordPress', $content );
// // }
// // add_filter( 'the_content', 'il_change_wordpress' );



