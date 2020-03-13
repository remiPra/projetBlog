<header id="mainHeader">
    <div id="logo">
        <a href="">Jean Forteroche</a>
        <nav>
            <a href="index.php?action=administrationContactHome">
                <i class="fas fa-envelope-open-text"></i>
                <?php echo $nbMessages[0]['COUNT(*)']; ?>
            </a>
            <a href="index.php?action=administrationCommentaires">
                <i class="far fa-comments"></i>
                <?php echo $nbComments[0]['COUNT(*)']; ?>
            </a>
            <a href="index.php?action=administrationCommentaires#listesCommentairesSignales">
                <i class="fas fa-comment-slash"></i>
                <?php echo $nbCommentsDanger[0]['COUNT(*)']; ?>
            </a>
        </nav>
        <nav>
            <ul id="raccourciLien">
                <?php if (isset($raccourci[1]['lien'])) {
                    foreach ($raccourci as $element) :
                        echo ' <li> <a href="index.php?action=' . $element['lien'] . '"> ' . $element['name'] . '/ </a> </li>';
                    endforeach;
                } else {
                        echo ' <li> <a href="index.php?action=' . $raccourci['lien'] . '"> ' . $raccourci['name'] . '/ </a> </li>';
                } ?>
            </ul>
        </nav>

    </div>
    <!-- mise en place du menu -->
    <nav id="menu">
        <button id="toggle">Menu</button>
        <ul id="ulMenu">
            <!-- redirection des liens vers un chemin index.php?action=? -->
            <li><a href="index.php?action=index">Accueil</a></li>
            <li><a href="index.php?action=administrationChapitres">Listes des Chapitres</a></li>
            <li><a href="index.php?action=administrationCommentaires">Listes des commentaires</a></li>
            <li><a href="index.php?action=deconnexion">Deconnexion</a></li>
            <li><a href="index.php?action=administrationHome">Administration</a></li>




        </ul>
    </nav>
</header>