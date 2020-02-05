<?php $title = "bibliographie";?>
<?php ob_start() ?>
        <section id="imageParrallaxBillet" >
            <picture>

                <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 480px)">
                <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 1000px)">       
                <img src="images/fog-on-dark-waters-edge.jpg" alt="">
            </picture>
        </section>       
    
    <section id="mainBillet" class="row">
            <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

                <h1>Bibliographie</h1>
                <h2>Jean Forteroche : un ecrivain atypique </h2>
                <div id="paragrapheBillet">
                   <p>Retrouvez la liste des chapitres écrites par jean Laroche sur les differentes vignettes </p>
    
                </div>
            </div>
    </section>
    <section id="listeChapitre" class="row" >
     
       
        
        <div class="chapitretemplate col-sm-8 col-sm-offset-2">
            <h3 class="h3Bibliographie">Qui suis-je ?</h3>
            <div class="row"> 
                <figure class="col-md-4">
                    <img src="images/denis-rouvre.jpg" alt="">
                </figure>
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, nobis voluptas in alias accusantium voluptatum fuga quo beatae. Rem omnis laudantium ab consectetur illum amet consequuntur maiores eum excepturi ipsa.</p>
                </div>
            </div>
            <h3 class="h3Bibliographie"> Bibliographie</h3>
            <div class="listBibliographie">
                <?php for($i=0; $i<5;$i++) {
                    echo 
                '<figure>
                    <img src="images/a-gothic-church-window-illuminates-a-corridor-of-archways.jpg" alt="">
                </figure>';
                } ?> 
            </div>
        </div>     
    </section>
 
    <script src="scroll.js"></script>

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>  