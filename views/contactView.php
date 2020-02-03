


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'includes/head.php' ?>


    <title>Document</title>
</head>
<body>
    <?php include_once 'includes/header.php' ?>
    <section id="imageParrallaxBillet" >
        <picture>

            <source srcset="images/fog-on-dark-waters-edge.mobile.mobile.jpg" media="(max-width: 480px)">
                <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 900px)">
                <img src="images/fog-on-dark-waters-edge.jpg" alt="">
        </picture>
    </section>     

    <section id="mainBillet" class="row">
        <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Formulaire de contact</h2>
            <div id="paragrapheBillet">
               <p>Veuillez remplir ce formulaire si vous désirez plus de renseignements </p>

            </div>
        </div>
</section>
    <section id="administration">
        <form action="">
            <label> Nom
            </label>
            <input type="text" name="firstname">
            <label> Email
            </label>    
            <input type="mail" name="email">
            <label for=""> Message </label>
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <input class="formButton" type="submit" value="Envoyer" name="btnContact">
        </form>
        
    </section>
    <?php include_once 'includes/footer.php' ?>
     
    <script src="scroll.js"></script>
</body>
</html>