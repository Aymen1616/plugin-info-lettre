<?php
/**
 * Retourne tous les parametres 
 */
function il_get_info(){
    global $wpdb;

    $resultat = $wpdb->get_row("SELECT * FROM ".IL_PARAMETRES." WHERE id=1");
    return $resultat;
}