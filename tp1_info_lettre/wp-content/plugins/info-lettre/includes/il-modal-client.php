<?php
function charge_popup(){

    require_once('il-get-couleur.php');
    $il_couleur_bg = il_get_info();
    ob_start();
    include( dirname(plugin_dir_path( __FILE__ ) ) . '/templates/il-pop-up.php' );
    $template = ob_get_clean();
    echo $template;
}
add_action('wp_body_open', 'charge_popup');





/**
 * Gestion de la soumission du formulaire côté client
 */
function il_nouvelle_inscription() {

    
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        
        if ( !empty( $_POST['il-courriel'] ) ) {
            echo 'test';

            global $wpdb;

            $il_courriel = sanitize_email( $_POST['il-courriel'] );

            $wpdb->insert( IL_INSCRIPTIONS,
                array(
                    'courriel' => $il_courriel
                ), array(
                    '%s'        // $format (optionnel) => string
                )
            );

            /**
             * Rafraîchi la page pour faire la communication client serveur
             * Détruit la variable spécifiée
             * exit pour stopper l'exécution de la suite du code
             */
            header( "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
            unset( $_POST );
            exit;
        }
    }
}
add_action( 'init', 'il_nouvelle_inscription' );