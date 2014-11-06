<div class="content">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="register-default-box">
        <h1>Création du profil d'un collaborateur</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>user/register_action" name="registerform">
            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_email">
                Email
                <span style="display: block; font-size: 14px; color: #999;">
                    (Veuillez saisir une <span style="text-decoration: underline; color: mediumvioletred;">adresse email existante</span>,
                    afin de recevoir le mail d'activation)
                </span>
            </label>
            <input id="login_input_email" class="login_input" type="email" name="user_email" required />

            <!-- Catégorie utilisateur : définit le rôle au sein de l'application -->
            <label for="login_input_user_account_type">
                Catégorie d'utilisateur
                <span style="display: block; font-size: 14px; color: #999;">
                    La catégorie d'utilisateur défini les droits d'accès aux différentes sections de l'application. <a href="#">en savoir plus</a>
                </span>
            </label>
            <select id="login_input_user_account_type" class="login_input" type="text" name="user_account_type" required >
                <option value="3">Utilisateur simple</option>
                <option value="2">Manager / Chef d'équipe</option>
                <option value="1">Responsable RH</option>
            </select>
            <input type="submit" value="Créer le profil du collaborateur">
        </form>
    </div>


</div>
