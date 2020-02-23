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
            <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

                <h1>Bibliographie</h1>
                <h2>Jean Forteroche : un ecrivain atypique </h2>
                <div id="paragrapheBillet">
                  
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
                    <p>jean Forteroche (prononcer [wɛlˈbɛk]), né Michel Thomas le 26 février 1956 à Saint-Pierre (La Réunion), est un écrivain, poète et essayiste français.

Il est révélé par les romans Extension du domaine de la lutte et, surtout, Les Particules élémentaires, qui le fait connaître d'un large public. Ce dernier roman, et son livre suivant Plateforme, sont considérés comme précurseurs dans la littérature française, notamment pour leur description de la misère affective et sexuelle de l'homme occidental dans les années 1990 et 2000. Avec La Carte et le Territoire, Michel Houellebecq reçoit le prix Goncourt en 2010, après avoir été plusieurs fois pressenti pour ce prix. Son œuvre est traduite en plus de 40 langues.</p>
                </div>
            </div>
            <h3 class="h3Bibliographie"> Bibliographie</h3>
            <div class="listBibliographie">
               <figure>
                    
                    <img src="images/Bibliographie/hot-chocolate-dark-cocoa.jpg" alt="">
                    
                    <figcaption>L'histoire autour d'une bataille au sein d'une riche famille spécialisé dans le chocolat.</figcaption>  
               </figure>
               <figure>
                    
                    <img src="images/Bibliographie/iconic-flower.jpg" alt="">
                    
                    <figcaption>Ce livre retrace l'histoire d'amour d'un soldat allemand avec une francaise lors de la 2nd guerre.</figcaption>  
               </figure>
               <figure>
                    
                    <img src="images/Bibliographie/woman-in-darkness-holds-a-yellow-flower-in-her-mouth.jpg" alt="">
                    
                    <figcaption>Le roman phénomène plusieurs fois primés au Goncourt parlant de la vie de la mannequin Ingrid Vergen.</figcaption>  
               </figure>
               <figure>
                    
                    <img src="images/Bibliographie/midnight-stroll-through-the-city.jpg" alt="">
                    
                    <figcaption>Le premier thriller de Jean Forteroche qui l'a écrit dans sa chambre d'étudiant à Rouen.</figcaption>  
               </figure>
            </div>
        </div>     
    </section>
 
   

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>  