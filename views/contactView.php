


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja&display=swap" rel="stylesheet">

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