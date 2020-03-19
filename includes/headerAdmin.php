<header id="mainHeader">
    <div id="logo">
        <a href="">Jean Forteroche</a>
        <nav>
            <a href="index.php?action=administrationContactHome">
                <i class="fas fa-envelope-open-text"></i>
                <?php echo $nbMessages[0]['COUNT(*)']; ?>
            </a>
            <a href="index.php?action=administrationComments">
                <i class="far fa-comments"></i>
                <?php echo $nbComments[0]['COUNT(*)']; ?>
            </a>
            <a href="index.php?action=administrationComments#listesCommentsSignales">
                <i class="fas fa-comment-slash"></i>
                <?php echo $nbCommentsDanger[0]['COUNT(*)']; ?>
            </a>
        </nav>
        <nav>
            <ul id="raccourciLink">
                <?php if (isset($raccourci[1]['Link'])) {
                    foreach ($raccourci as $element) :
                        echo ' <li> <a href="index.php?action=' . $element['Link'] . '"> ' . $element['name'] . '/ </a> </li>';
                    endforeach;
                } else {
                        echo ' <li> <a href="index.php?action=' . $raccourci['Link'] . '"> ' . $raccourci['name'] . '/ </a> </li>';
                } ?>
            </ul>
        </nav>

    </div>
    <!-- mise en place du menu -->
    <nav id="menu">
        <button id="toggle">Menu</button>
        <ul id="ulMenu">
            <!-- redirection des Links vers un chemin index.php?action=? -->
            <li><a href="index.php?action=index">Accueil</a></li>
            <li><a href="index.php?action=administrationChapters">Listes des Chapters</a></li>
            <li><a href="index.php?action=administrationComments">Listes des Comments</a></li>
            <li><a href="index.php?action=deconnexion">Deconnexion</a></li>
            <li><a href="index.php?action=administrationHome">Administration</a></li>




        </ul>
    </nav>
</header>