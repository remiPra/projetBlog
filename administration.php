<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja&display=swap" rel="stylesheet">
    <title><?php $remi = substr($_SERVER['SCRIPT_FILENAME'] ,0 , -9);
                    echo($remi); ?></title>
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
            <h2>Administration </h2>
            <div id="paragrapheBillet">
               <p>Entrez votre nom et votre mot de passe </p>

            </div>
        </div>
</section>
    <section id="administration">
        <form action="">
            <label> Pseudo : 
            </label>
            <input type="text">
            <label> Mot de Passe
            </label>    
            <input type="password">
            <input type="submit" value="Se connecter">
        </form>
        
    </section>
    <?php include_once 'includes/footer.php' ?>
    <script src="scroll.js"></script>
</body>
</html>