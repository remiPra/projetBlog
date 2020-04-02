
<?php $title = "Contact"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">
        <h1>Billet simple pour l'Alaska</h1>
        <?php if($_GET['action'] == 'initializeNewPassword') {echo '
               <form action="index.php?action=administrationConnexionNewPasswordCheck" method=\'POST\'>
               <p>  <?php echo '.$_GET['name'].'; ?> </p>
               <p>Veuillez changer votre mot de passe:  </p>
               
               <label> Pseudo :</label>
               <input name="name" type="text" value="'.$_GET['name'].'">
               <input class="inputNone" name="newPassword" value="1" type="text">
               <label> reecrivez votre email :</label>
               <input  name="email" type="email">
               
               <label> Nouveau mot de passe</label>
               <input name="password1" type="password">
               <label> Retaper votre nouveau mot de passe</label>
               <input name="password" type="password">
               <input type="submit" value="Se connecter">
           </form> ';
        }
        else { echo'
        <h2>Mot de passe oublié </h2>
      

            <form action="index.php?action=administrationPasswordForgotCheck" method=\'POST\'>
               
                <p>Veuillez rentrer votre pseudo </p>
                '?>
                <?php if(isset($notificationError)) { echo $notificationError;} ?>
                <?php echo'
                <label for="name"> Pseudo :</label>
                <input name="name" type="text">   
                <input class="inputNone" name="date" type="text"><?php echo date("d-m-Y à h:i:sa");?>
                <input type="submit" value="recuperer mot de passe">
            </form>
        
     
        ';}?>
    </div>
</section>





<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>