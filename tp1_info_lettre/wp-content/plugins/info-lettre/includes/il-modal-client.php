<?php
function charge_popup(){

    require_once('il-get-infos.php');
    $il_infos = il_get_info();
    $il_couleur_bg = $il_infos->couleur_bg;
    $il_couleur_txt = $il_infos->couleur_txt;
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
        
        if ( !empty( $_POST['il-courriel-client'] ) || !empty( $_POST['il-nom-client'] )) {
            echo 'test';

            global $wpdb;

            $il_nom = sanitize_text_field( $_POST['il-nom-client'] );
            $il_courriel = sanitize_email( $_POST['il-courriel-client'] );
            
            $wpdb->insert( IL_INSCRIPTIONS,
                array(
                    'nom_client'=>$il_nom,
                    'courriel_client' => $il_courriel
                ), array(
                    '%s' ,
                    '%s'   // $format (optionnel) => string
                )
            );
            $wpdb->print_error();
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