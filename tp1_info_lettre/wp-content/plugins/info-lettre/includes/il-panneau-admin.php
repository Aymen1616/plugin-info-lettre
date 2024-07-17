<?php
/**
 * ajoute le panneau du pluggin dans l interface admin
 */
function il_ajouter_menu() {
    add_menu_page('Mon Premier Plugin',// Page title
        'Mon Premier Plugin',// Menu title
        'manage_options',// Capability
        'il-menu-page',// Menu slug
        'il_ajouter_formulaire'          // Callable function   
    );
}
add_action( 'admin_menu', 'il_ajouter_menu' );




function il_ajouter_formulaire() {
        // S'il y a un query string nom, ajoute sa valeur à la db  
        if ( isset($_POST['il-couleur-bg'] ) ) {
            il_update_data(); // Appelle la fonction pour l’appel à la db 
        } ;
        
    require_once('il-get-couleur.php');
    $il_couleur_bg = il_get_couleur();
    echo '<div style="padding:5vw;">
        <h2>' . get_admin_page_title() . '</h2>
        <form method="post" style="margin-top:25px;">
            <label for="il-couleur-bg">Couleur du fond</label>
            <input type="color" id="il-couleur-bg" name="il-couleur-bg" value = "'.esc_attr($il_couleur_bg).'">
            <button type="submit" name="enregistrer">Enregistrer</button>   
        </form>
    </div>';  

        //il_afficher_data();    // Appelle la fonction qui affiche les datas
     }
function il_update_data(){
    global $wpdb;

    $il_couleur_bg = sanitize_hex_color($_POST['il-couleur-bg']);

    $data = ['couleur_bg'=>$il_couleur_bg];
    $where = ['id'=>1];
    $wpdb->update( IL_PARAMETRES,$data,$where);
}

// function il_afficher_data() {
//     global $wpdb;
//     // Récupère les valeurs de la table wp_mon_premier_plugin
//     $resultats = $wpdb->get_results( "SELECT * FROM " . IL_TABLE_NAME );
//           // S'il y a des résultats
//           if ( $resultats ) {
//             echo '<div style="padding:0 5vw;">
//             <h2>Entrée(s)</h2>
//             <ul>';
//             foreach ( $resultats as  $data ) {
//                 echo '<li><small>Nom : </small>' . esc_html( $data->nom ) . '<li>';
//             }echo '  </ul> 
//                     </div>';   
//                 }
//             }