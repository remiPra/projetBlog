<?php $title = $article->title ;?>
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
            <?php echo '
            <h1>Billet simple pour l\'Alaska</h1>
            <h2>chapitre '.$article['numeroChapitre'].' : '.$article['title'].' </h2>
            <div id="paragrapheBillet">
               
            </div>
        </div>
</section>
    <section id="chapitreContainer">
        <div id="billetContainer"class="row">
            <div class="chapitretemplate col-md-8 col-md-offset-2 ">
      
              
            
                <div class=contenuChapitre>
                <figure class="row">
                    <img class="col-lg-8 col-lg-offset-2 colonne-centree" src="'.$article['imageChapitre'].' " 
                    alt="'.$article['imageAlt'].'">
                </figure>
                <p>
                   '.$article['content'].'
                </p> 
                <div class="trait"></div>
                </div>
                
                <form action="index.php?action=article&id='.$article['id'].'" method="POST"> '?> 
                   
                    <h3>Laisser un commentaire</h3>
                    <input type="text" name="numChapitre" style="opacity:0" value="<?php echo $article['numeroChapitre'] ?>" disbable="disabled">
                    <label for="">Pseudo :</label>
                    <input type="text" name="pseudo">                    
                    <label for="">Message:</label>
                    <textarea name="commentaire" id="" cols="30" rows="10"></textarea>                    
                    <input type="submit" value="envoyer" name="btnComment">
                </form>


                <div class="commentaire">
                <?php foreach($comments as $comment): ?>   
               
                <?php echo    '<div class="trait"></div>
                    <h3>Commentaires</h3>
                    <h4>Pseudo : '.$comment['pseudo'].' </h4>
                    <h5>Publié le :  '.$comment['date'].'</h5>
                    <p> '.$comment['commentaire'].' </p>
                    <form action="index.php?action=signalementRecu" method="POST">
                        <input type="text" name="idComment"value="'.$comment['id'].'">
                        <label for=""><input type="checkbox" name="signaler" value="1">Signaler ce commentaire.</label>
                        <input type="submit" value="Cliquez pour valder">
                    </form> '?>
                <?php endforeach; ?>      
                    <div class="trait"></div>

                <div>

               
            </div>
        </div>
    </section>

    
    <script src="assets/js/scroll.js"></script>
    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>