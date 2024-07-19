<?php
/**
 * ajoute le panneau du pluggin dans l interface admin
 */
function il_ajouter_menu() {
    add_menu_page('Info Lettre',// Page title
        'Info Lettre',// Menu title
        'manage_options',// Capability
        'il-menu-page',// Menu slug
        'il_ajouter_formulaire'          // Callable function   
    );
}
add_action( 'admin_menu', 'il_ajouter_menu' );




function il_ajouter_formulaire() {
        // S'il y a un query string nom, ajoute sa valeur à la db  
        if ( isset($_POST['il-couleur-bg']) || isset($_POST['il-couleur-txt']) || isset($_POST['il-titre']) || isset($_POST['il-nom']) || isset($_POST['il-courriel']) || isset($_POST['il-suivant']) || isset($_POST['il-soumettre']) ) {
            il_update_data(); // Appelle la fonction pour l’appel à la db 
        } ;
        
    require_once('il-get-infos.php');
    $il_infos = il_get_info();
    echo '<div>
        <h1>' . get_admin_page_title() . '</h1>
        <form method="post">
            <label for="il-couleur-bg">Couleur du fond :</label>
            <input type="color" id="il-couleur-bg" name="il-couleur-bg" value = "'.esc_attr($il_infos->couleur_bg).'">
            <br>
            <label for="il-couleur-txt">Couleur :</label>
            <input type="color" id="il-couleur-txt" name="il-couleur-txt" value = "'.esc_attr($il_infos->couleur_txt).'">
            <br>
            <label for="il-titre">Titre :</label>
            <input type="text" id="il-titre" name="il-titre" value = "'.esc_attr($il_infos->titre).'">
            <br>
            <label for="il-nom">Nom :</label>
            <input type="text" id="il-nom" name="il-nom" value = "'.esc_attr($il_infos->nom).'">
            <br>
            <label for="il-courriel">Courriel :</label>
            <input type="text" id="il-courriel" name="il-courriel" value = "'.esc_attr($il_infos->courriel).'">
            <br>
            <label for="il-suivant">Suivant :</label>
            <input type="text" id="il-suivant" name="il-suivant" value = "'.esc_attr($il_infos->btn_prochain).'">
            <br>
            <label for="il-soumettre">Soumettre :</label>
            <input type="text" id="il-soumettre" name="il-soumettre" value = "'.esc_attr($il_infos->btn_soumission).'">
            <br>
            <button type="submit" name="enregistrer">Enregistrer</button>   
        </form>
    </div>';  

           // Afficher les inscriptions
    il_afficher_inscriptions();
     }

     
function il_update_data(){
    global $wpdb;

    $il_couleur_bg = sanitize_hex_color($_POST['il-couleur-bg']);
    $il_couleur_txt = sanitize_hex_color($_POST['il-couleur-txt']);
    $il_titre =  sanitize_text_field($_POST['il-titre']);
    $il_nom =  sanitize_text_field($_POST['il-nom']);
    $il_courriel =  sanitize_text_field($_POST['il-courriel']);
    $il_suivant =  sanitize_text_field($_POST['il-suivant']);
    $il_soumettre =  sanitize_text_field($_POST['il-soumettre']);
    
    $data = [ 'couleur_bg'=>$il_couleur_bg,
              'couleur_txt'=>$il_couleur_txt,
              'titre'=>$il_titre,
              'nom'=>$il_nom,
              'courriel'=>$il_courriel,
              'btn_prochain'=>$il_suivant,
              'btn_soumission'=>$il_soumettre,
            ];

    $where = ['id'=>1];
    $wpdb->update( IL_PARAMETRES,$data,$where);
}


function il_afficher_inscriptions() {
    global $wpdb;

    // Récupérer les inscriptions de la base de données
    $inscriptions = $wpdb->get_results("SELECT * FROM " . IL_INSCRIPTIONS);

    // Vérifier s'il y a au moins une inscription
    if (!empty($inscriptions)) {
        echo '<h2>Inscriptions à l\'infolettre</h2>';

        echo '<table>';
        echo '<tr><th>Nom</th><th>Courriel</th></tr>';

        // Afficher chaque inscription dans une ligne du tableau
        foreach ($inscriptions as $inscription) {
            echo '<tr>';
            echo '<td>' . esc_html($inscription->nom) . '</td>';
            echo '<td>' . esc_html($inscription->courriel) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
