<?php $raccourci = ['Link' => 'administrationHome', 'name' => 'Administration']; ?>


<?php $title = "Contact"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Formulaire de contact</h2>
        <div id="paragrapheBillet" class="col-lg-12">

            <form action="index.php?action=administrationConnexionNewPasswordCheck" method='POST'>
                <p>  <?php echo $_SESSION['pseudo']; ?> , vous avez un mot de passe trop sensible.</p>
                <p>Nous vous conseillons de changez votre mot de passe : </p>
                
                
                <?php if(isset($notificationError)) { echo $notificationError;} ?>
                <label> Pseudo :</label>
                <input name="name" type="text" value="<?php echo  $_SESSION['pseudo']; ?> ">
                <input class="inputNone" name="newPassword" value="1" type="text">
                <label> email :</label>
                <input name="email" type="email">
                <label> Nouveau mot de passe</label>
                <input name="password1" type="password">
                <label> Retaper votre nouveau mot de passe</label>
                <input name="password" type="password">
                <input type="submit" value="Se connecter">
            </form>

        </div>
    </div>
</section>





<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>