<?php
/**
 * Retourne tous les parametres 
 */
function il_get_couleur(){
    global $wpdb;

    $resultat = $wpdb->get_var("SELECT * FROM ".IL_PARAMETRES." WHERE id=1");
    return $resultat;
}