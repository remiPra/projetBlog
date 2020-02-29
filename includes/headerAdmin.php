<header id="mainHeader">
    <div id="logo">
        <a href="">Jean Forteroche</a>
        <div>
            <a href="">
                <i class="fas fa-envelope-open-text"></i>
                <span><?php echo count($nbMessages); ?></span>
            </a>
            <a href="">
                <i class="far fa-comments"></i>
                <span><?php echo count($nbComments); ?></span>
            </a>
        </div>

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