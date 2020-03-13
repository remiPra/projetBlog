<?php $title = $article['title'] ;?>
<?php ob_start() ?>
    

    <section id="mainBillet" class="row">
        <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">
            <?php echo '
            <h1>Billet simple pour l\'Alaska</h1>
            <h2>chapitre '.$article['numeroChapitre'].' : '.$article['title'].' </h2>
            <div id="paragrapheBillet">
               
            </div>
        </div>
</section>
    <section id="chapitreConteneur">
        <article id="billetConteneur"class="row">
            <div class="chapitretemplate col-md-8 col-md-offset-2 ">
      
              
            
                <div class=contenuChapitre>
                <figure class="row">
                    <img class="col-lg-8 col-lg-offset-2 colonne-centree" src="images/'.$article['imageChapitre'].' " 
                    alt="'.$article['imageAlt'].'">
                </figure>
                <div id="tinymce">
                   '.$article['content'].'
            
                </div> 
                <div class="trait"></div>
                </div>
                
                <form action="index.php?action=article&id='.$article['numeroChapitre'].'" method="POST"> '?> 
                   
                    <h3>Laisser un commentaire</h3>
                    <input type="text" name="numChapitre" class="inputNone" style="display:none" value="<?php echo $article['numeroChapitre'] ?>" disbable="disabled">
                    <label for="">Pseudo :</label>
                    <input type="text" name="pseudo">                    
                    <label for="">Message:</label>
                    <textarea name="commentaire" id="" cols="30" rows="10"></textarea>                    
                    <input type="submit" value="envoyer" name="btnComment">
                </form>


                <div class="commentaire">
                    <h3>Commentaires</h3>
                <?php foreach($comments as $comment): ?>   
               
                <?php echo    '<div class="trait"></div>
                    <h4>Pseudo : '.htmlspecialchars($comment['pseudo']).' </h4>
                    <h5>Publié le :  '.
                    
                    ($comment['date']).'</h5>
                    <p>" '.htmlspecialchars($comment['commentaire']).' "</p>
                    <form action="index.php?action=signalementRecu" method="POST">
                        <input class="inputNone" type="text" name="idComment"value="'.htmlspecialchars($comment['id']).'">
                        <input class="inputNone" type="text" name="signaler" value="1">
                        <input type="submit" value="Signaler ce commentaire">
                    </form> '?>
                <?php endforeach; ?>      
                    <div class="trait"></div>

                <div>

               
            </div>
        </article>
    </section>

    
  
    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>