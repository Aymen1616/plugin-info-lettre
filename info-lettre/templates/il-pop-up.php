<div class= "il-pop-up il-pop-up--ouvert"  data-js-il-pop-up>
    <button class="fermer-popup">X</button>
    <form method="post" id="formulaire-inscription">
         <h2><?php echo $il_titre; ?></h2> 
            <section data-page="0">
                <div class="groupe-champs">
                    <label for="il-nom-client"><?php echo $il_nom; ?></label>
                    <input type="text" id="il-nom-client" name="il-nom-client" maxlength="100" required />
                    <small class="erreur">Vous devez entrer votre nom complet</small>
                </div>
                <nav class="navigation-section">
                    <div class="bouton" data-direction="1"><?php echo $il_btn_prochain; ?>
                    </div>
                </nav>
            </section>

            <section data-page="1">
                <div class="groupe-champs">
                    <label for="il-courriel-client"><?php echo $il_courriel; ?>
                    </label>
                    <input type="email" id="il-courriel-client" name="il-courriel-client" maxlength="100" required />
                    <small class="erreur">Vous devez entrer votre courriel</small>
                </div>
                <nav class="navigation-section">
                    <div class="bouton" data-direction="1"><?php echo $il_btn_prochain; ?></div>
                </nav>
            </section>

            <section data-page="2" data-resume>                    
                <nav class="navigation-section">
                    <button type="submit" name="enregistrer"><?php echo $il_btn_soumission; ?></button>
                </nav>
            </section>
    </form>
</div>