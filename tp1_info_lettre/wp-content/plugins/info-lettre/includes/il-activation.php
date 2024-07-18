<?php
function il_activation(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

/**table parametre */
    $table_parametres = $wpdb->prefix . 'il_parametres';
    
    if($wpdb->get_var( "SHOW TABLES LIKE '$table_parametres'") != $table_parametres){
        $sql = "CREATE TABLE $table_parametres (
                    id int NOT NULL AUTO_INCREMENT,
                    couleur_bg varchar(10) NOT NULL ,
                    couleur_txt varchar(10) NOT NULL ,
                    titre varchar(50)  NOT NULL,
                    nom varchar(50)  NOT NULL,
                    courriel varchar(50)  NOT NULL,
                    suivant varchar(50)  NOT NULL,
                    soumettre varchar(50) NOT NULL,
                    PRIMARY KEY (id)
            ) $charset_collate;";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        ( $sql );
        dbDelta( $sql );
        $wpdb->insert($table_parametres,array('couleur_bg'=>'#ffffff','couleur_txt'=>'#000000','titre'=>'Inscrivez-vous à notre infolettre !','nom'=>'Nom','courriel'=>'Courriel','suivant'=>'Suivant','soumettre'=>'Soumettre'));
    }

/** table inscription */
    $table_inscriptions = $wpdb->prefix . 'il_inscriptions';
    
    if($wpdb->get_var( "SHOW TABLES LIKE '$table_inscriptions'") != $table_inscriptions){
        $sql = "CREATE TABLE $table_inscriptions (
                    id int NOT NULL AUTO_INCREMENT,
                    nom varchar(50)  NOT NULL,
                    courriel varchar(50)  NOT NULL,
                    PRIMARY KEY (id)
            ) $charset_collate;";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        ( $sql );
        dbDelta( $sql );

    }
}