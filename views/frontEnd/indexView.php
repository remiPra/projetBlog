<?php $title = "Bienvenue sur le site de Jean Forteroche" ;?>
<?php ob_start() ?>
    <section id="main">
        <picture id="imageParrallax" >
            <source srcset="images/fog-on-dark-waters-edge.mobile.mobile.jpg" media="(max-width: 480px)">
            <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 900px)">
            <img src="images/fog-on-dark-waters-edge.jpg" alt="">
        </picture>       
            <div id="imageParrallaxText" class="row">
                <div id="containerTitre" class="col-md-8 col-md-offset-2">
                    <h1>Billet simple pour l'Alaska</h1>
                    <h2>Un livre de Jean Forteroche</h2>
                    <div id="boutonHomePage">
                        <button> <a href="#conceptLivre">
                        Decouvrez le projet</button>
                        </a> 
                        <button> <a href="livre.php">
                        Acceder au chapitre</button>
                        </a> 
                    </div>
                </div>
                    
            </div>
    </section>
    <section id="bienvenue">
        <h2>Bienvenue sur le site officiel De Jean Laroche : <br>
            Billet simple pour l'alaska. <br> </h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error temporibus quisquam doloribus velit fugiat perspiciatis, ipsa numquam maiores architecto cupiditate officiis aperiam vero facilis laborum nisi eum. Adipisci, cumque amet!</p>
            
    </section>
    <section id="conceptLivre">
            <h2> Un concept de livre en ligne innovant</h2>
            <div id="containerConcept">
                <div id="explicationConcept" class="row">
                    <p class="col-md-7">   Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error temporibus quisquam doloribus velit fugiat perspiciatis, ipsa numquam maiores architecto cupiditate officiis aperiam vero facilis laborum nisi eum. Adipisci, cumque amet!</p>
                    <figure class="col-md-5">
                        <img src="images/denis-rouvre.jpg" alt="">
                    </figure>   
                </div>
            </div>
    </section>
    <section id="dernierChapitrePublie">
        <?php foreach($lastArticles as $lastArticle): ?>
            <H2> Dernier Chapitre : </H2>
            <div class="chapitre row">
                <figure class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <div class=infoChapitre>
                        <h3 class="titreChapitre"> Chapitre <?php echo $lastArticle->numeroChapitre ?> <br>
                        <?php echo $lastArticle->title ?></h3>
                        <h4 class="Publication">Publié le : <?php echo $lastArticle->date ?></h4>
                    </div>
                    <img src="<?php echo $lastArticle->imageChapitre ?>" alt="<?php echo $lastArticle->imageAlt ?>">    
                    <figcaption >
                        <h5 class="resume"> <?php echo $lastArticle->sentence ?> </h5>
                        <div>
                        <a href='index.php?action=article&id=<?php echo $lastArticle->id ?>'class="btnS">Lire la suite</a>
                        </div>
                    </figcaption>
                </figure>
            </div>
        <?php endforeach; ?> 
  
            
            
    </section>

  
        
    <script src="assets/js/scroll.js"></script>

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?> 