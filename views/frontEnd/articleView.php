<?php $title = $article['title'] ;?>
<?php ob_start() ?>
    

    <section id="mainBillet" class="row">
        <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">
            <?php echo '
            <h1>Billet simple pour l\'Alaska</h1>
            <h2>Chapitre '.$article['NumberChapter'].' : '.$article['title'].' </h2>
            <div id="paragrapheBillet">
               
            </div>
        </div>
</section>
    <section id="ChapterContainer">
        <article id="billetContainer"class="row">
            <div class="Chaptertemplate col-md-8 col-md-offset-2 ">
      
              
            
                <div class=contenuChapter>
                <figure class="row">
                    <img class="col-lg-8 col-lg-offset-2 colonne-centree" src="images/'.$article['imageChapter'].' " 
                    alt="'.$article['imageAlt'].'">
                </figure>
                <div id="tinymce">
                   '.$article['content'].'
            
                </div> 
                <div class="trait"></div>
                </div>
                
                <form action="index.php?action=article&id='.$article['NumberChapter'].'" method="POST"> '?> 
                   
                    <h3>Laisser un commentaire</h3>
                    <input type="text" name="numChapter" class="inputNone" style="display:none" value="<?php echo $article['NumberChapter'] ?>" disbable="disabled">
                    <label for="">Pseudo :</label>
                    <input type="text" name="pseudo">                    
                    <label for="">Message:</label>
                    <textarea name="Comment" id="" cols="30" rows="10"></textarea>                    
                    <input type="submit" value="envoyer" name="btnComment">
                </form>


                <div class="Comment">
                    <h3>Commentaires</h3>
                <?php foreach($Comments as $Comment): ?>   
               
                <?php echo    '<div class="trait"></div>
                    <h4>Pseudo : '.htmlspecialchars($Comment['pseudo']).' </h4>
                    <h5>Publié le :  '.
                    
                    ($Comment['date']).'</h5>
                    <p>" '.htmlspecialchars($Comment['Comment']).' "</p>
                    <form action="index.php?action=signalementRecu" method="POST">
                        <input class="inputNone" type="text" name="idComment"value="'.htmlspecialchars($Comment['id']).'">
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