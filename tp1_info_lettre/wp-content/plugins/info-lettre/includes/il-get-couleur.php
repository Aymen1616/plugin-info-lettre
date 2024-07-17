<?php
/**
 * Retourne le parametre couleur_bg
 */
function il_get_couleur(){
    global $wpdb;

    $resultat = $wpdb->get_var("SELECT couleur_bg FROM ".IL_PARAMETRES." WHERE id=1");
    return $resultat;
}