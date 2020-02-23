<?php $title = "Bienvenue sur le site de Jean Forteroche" ;?>
<?php ob_start() ?>
    <section id="main">
        <picture id="imageParrallax" >
            <source srcset="images/fog-on-dark-waters-edge.mobile.mobile.jpg" media="(max-width: 480px)">
            <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 900px)">
            <img src="images/fog-on-dark-waters-edge.jpg" alt="">
        </picture>       
            <div id="imageParrallaxText" class="row">
                <div id="conteneurTitre" class="col-md-8 col-md-offset-2">
                <h1 class="ghost">Billet simple pour l'Alaska</h1>
                    <h2>Un livre de Jean Forteroche</h2>
                    <div id="boutonHomePage">
                         <a href="#conceptLivre">
                        Decouvrez le projet
                        </a> 
                        <a href="livre.php">
                        Acceder aux chapitres
                        </a> 
                    </div>
                </div>
                    
            </div>
    </section>
    <div id="bodyConteneur">
    <section id="bienvenue">
        <h2>Bienvenue sur le site officiel De Jean Laroche : <br>
            Billet simple pour l'alaska. <br> </h2>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>


            <p>Ce site va vous permettre de lire en ligne le dernier roman de Jean Forteroche ,un livre fascinant et intrigant</p>
    </section>
    <section id="conceptLivre">
            <h2> Un concept de livre en ligne innovant</h2>
            <div id="conteneurConcept" class="col-lg-10">
                <div id="explicationConcept" class="row">
                    <p class="col-md-7">   J'ai décidé de creer une relation spéciale avec mes lecteurs , pour la première fois vous allez pouvoir suivre la construction de mon nouveau roman grace à la publication en ligne de mes différents chapitres.</p>
                    <figure class="col-md-5">
                        <img src="images/denis-rouvre.jpg" alt="">
                    </figure>   
                </div>
            </div>
    </section>
    <section id="dernierChapitrePublie">
        <?php foreach($lastArticles as $lastArticle): ?>
            <H2> Dernier Chapitre : </H2>
            <article class="chapitre row">
                <figure class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <div class=infoChapitre>
                        <?php echo'
                        <h3 class="titreChapitre"> Chapitre '.$lastArticle['numeroChapitre'].'<br>
                        '.$lastArticle['title'].'</h3>
                        <h4 class="Publication">Publié le : '.$lastArticle['date'].'</h4>
                    </div>
                    <img src="'.$lastArticle['imageChapitre'].'" alt="'.$lastArticle['imageAlt'].'">    
                    <figcaption >
                        <h5 class="resume"> '.$lastArticle['sentence'].' </h5>
                        <div>
                        <a href="index.php?action=article&id='.$lastArticle['id'] ?>" class="btnS">Lire la suite</a>
                        </div>
                    </figcaption>
                </figure>
            </article>
        <?php endforeach; ?> 
  
            
            
    </section>

    </div>
        
  

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?> 