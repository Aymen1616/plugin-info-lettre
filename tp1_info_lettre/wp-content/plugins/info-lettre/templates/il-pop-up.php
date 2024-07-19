<div class= "il-pop-up il-pop-up--ouvert" style="background-color:<?php echo $il_couleur_bg ; ?>" data-js-il-pop-up>

    <form method="post" id="formulaire-inscription">
        <h2>Inscrivez-vous a notre infolettre !</h2> 
                <section data-page="0">
                    <div class="groupe-champs">
                        <label for="il-nom-client">Nom Complet *obligatoire</label>
                        <input type="text" id="il-nom-client" name="il-nom-client" maxlength="100" required />
                        <small class="erreur">Vous devez entrer votre nom complet</small>
                    </div>
                    <nav class="navigation-section">
                        <div class="bouton" data-direction="1">Suivant</div>
                    </nav>
                </section>

                <section data-page="1">
                <div class="groupe-champs">
                        <label for="il-courriel-client">Courriel *obligatoire</label>
                        <input type="email" id="il-courriel-client" name="il-courriel-client" maxlength="100" required />
                        <small class="erreur">Vous devez entrer votre courriel</small>
                    </div>
                    <nav class="navigation-section">
                        <div class="bouton" data-direction="1">Suivant</div>
                    </nav>
                </section>

                <section data-page="2" data-resume>                    
                    <nav class="navigation-section">
                    <button type="submit" name="enregistrer">Sounettre</button>
                    </nav>
                </section>
            </form>
</div>