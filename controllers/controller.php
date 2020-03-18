<?php
// Sommaire 
///////////////////////Front END/////////////////////////////
// Controller de la page d'accueil
// Controller de la page des Chapters du Book 
// Controller de la page des d'un article sélectionné
// Controller de la page de la bibliographie
// Controller de la page des contacts 
// Controlleur de la page de l'envoie d'un message contact si envoyé
// Controlleur lorsqu'un signalement a été actionné sur le site
// Controlleur de la page d'accueil de connexion a l'administration
// Controlleur de l'execution de connexion a la partie administration
// Controlleur de redirection en cas d'une Error de connexion
// Controlleur de redirection en cas d'une Error de connexion du aux champs vides
//////////////////////Partie Administration////////////////////////////////
// Controller de l'execution de deconnexion
// Controller de notifications sous le logo en page administration
// Controlleur de l'accueil de la page administration 
// Controlleur de l'accueil de l'administration des Chapters
// Controlleur de la page pour ecrire un nouveau Chapter 
// Controlleur de la page pour modifier un Chapter
// Controlleur de la page pour envoyer la modification d'un Chapter
// Controlleur de la page pour envoyer un nouveau Chapter

require 'models/connect.php';
$connectManager =  new ConnectManager();
$bdds = $connectManager->connect();

// controller de la page d'accueil
////////////////////////
function index()
{ 
    require 'models/frontEnd/articleManager.php';
    $articles = new ArticlesManager();
    $lastArticles = $articles->getLastArticles();
    // condition pour afficher le background
    global $index;
    $index = 1;

    // affichage de la page d'accueil
    require 'views/frontEnd/indexView.php';
}
// Controller de la page des Chapters du Book 
//////////////////////////:
function Book()
{
    //recuperation de tous les articles 
    require 'models/frontEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $articles = $allArticles->getArticles();

    //affichage de la page Book ou se trouvent tous les Chapters publiées
    require 'views/frontEnd/BookView.php';
}


// controller de la page des d'un article sélectionné
////////////////////////////////
function post()
{
    // on verifie si l'id existe et si c'est bien un nombre
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        // redirection vers header
        header('Location: index.php');
    } else {

        // condition si un commentaire est envoyé sur l'article    
        if (!empty($_POST) && isset($_POST['btnComment'])) {
            // recupération de l'article concerné par l'id
            require 'models/frontEnd/articleManager.php';
            require 'models/frontEnd/commentManager.php';
            // extraction de $_GET
            extract($_GET);
            $id = strip_tags($id);

            //fonction pour envoyer le commentaire
            $CommentManagerF = new CommentManagerF();
            $sendComment = $CommentManagerF->sendComment();

            //fonction pour recuperer l'article et le commentaire seulement le numéro de Chapter
            $articles = new ArticlesManager();
            $article = $articles->getArticle($id);

            $comments = $CommentManagerF->getComment($id);

            // Affichage de la view de l'article
            require 'views/frontEnd/articleView.php';
        } else {
            require 'models/frontEnd/articleManager.php';
            require 'models/frontEnd/commentManager.php';

            extract($_GET);
            $id = strip_tags($id);

            $articles = new ArticlesManager();
            $article = $articles->getArticle($id);
            $CommentManagerF = new CommentManagerF();
            $comments = $CommentManagerF->getComment($id);
            require 'views/frontEnd/articleView.php';
        }
    }
}
// Controller de la page de la bibliographie
function bibliographie()
{
    require 'views/frontEnd/bibliographieView.php';
}

// Controller de la page des contacts 
function contact()
{
    // affichage de la page contact
    require 'views/frontEnd/contactView.php';
}
// Controlleur de la page de l'envoie d'un message contact si envoyé
function contactRecu()
{
    if (($_POST['pseudo'] != null) and ($_POST['email'] != null)
        and ($_POST['message'] != null) and ($_POST['sujet'] != null)
    ) {

        //appel de la méthode contact pur recuperer le message
        require 'models/frontEnd/contactManager.php';
        $ContactManager = new ContactManager();
        $contactForm = $ContactManager->contactForm();
        $messageEnvoye = '<p id="succes">Votre message a bien été envoyé</p>';
        //affichag de la page qui montre que le contact est recu
        require 'views/frontEnd/contactRecuView.php';
    } else {

        $notificationError = '<p id="Error"vous n\'avez pas remplis tous les champs';
        require 'views/frontEnd/contactView.php';
    }
}

// Controlleur lorsqu'un signalement a été actionné sur le site
function signalementRecu()
{
    //fonction pour signaler le commentaire selon le Number de Chapter
    require 'models/frontEnd/commentManager.php';
    $idcomment = $_POST['idComment'];
    $CommentManagerF = new CommentManagerF();
    $signalerComment = $CommentManagerF->signalerComment($idcomment);
    // affichage de la page réussite
    $messageSignalement = '<p>Votre signalement nous a bien été transmis <br>
    Nous prenons beaucoup a coeur de bien traiter les signalements sur notre site <br>
    Merci </p>';
    require 'views/frontEnd/contactRecuView.php';
}


// Controlleur de la page d'accueil de connexion a l'administration
function administration()
{

    //recuperation de la view de la page de connexion a l'accueil
    require 'views/frontEnd/administrationView.php';
}


// Controlleur de l'execution de connexion a la partie administration
function administrationConnexion()
{

    if (($_POST['name'] != null) and ($_POST['password']) != null) {
        //declaration des variables de connexion
        $pseudo = $_POST['name'];
        $password = $_POST['password'];
        // appel a la base  de données pour verifier le password selon le pseudo
        require 'models/backEnd/administrationManager.php';
        $administrationManager = new AdministrationManager();
        $admin = $administrationManager->getUser($pseudo);

        //condition
        if ($password == $admin['password'] and $pseudo == $admin['name']) {
            $_SESSION['connect'] = 1;
            $_SESSION['name'] = $admin['name'];
            var_dump($_SESSION['connect']);
            echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome');</script>";
            exit();
        } else if ($password != $admin['password']) {
            echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionError');</script>";
            exit();
        }
    } else {
        $notification1 = '<p id="Error"> Veuillez rentrer vos identifiants svp</p>';
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionErrorVide');</script>";
    }
}

// Controlleur de redirection en cas d'une Error de connexion
function administrationConnexionError()
{
    $notification = '<p id="Error">Error dans vos identifiants</p>';
    require 'views/frontEnd/administrationView.php';
}

// Controlleur de redirection en cas d'une Error de connexion du aux champs vides
function administrationConnexionErrorVide()
{
    $notification = '<p id="Error">Remplissez les différents champs svp</p>';
    require 'views/frontEnd/administrationView.php';
}

// Controller de l'execution de deconnexion
function deconnexion()
{
    session_destroy();
    $notification = '<p id="success"vous etes déconnecté</p>';
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administration');</script>";
    exit();
}

// Controller de notifications sous le logo en page administration
function notifications()
{

    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
}

// Controlleur de l'accueil de la page administration 
function administrationHome()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();

    //Affichage de la page d'accueil de l'administration
    require 'views/backEnd/administrationHomeView.php';
}

// Controlleur de l'accueil de l'administration des Chapters
function administrationChapters()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();
    
    $nbCommentsDanger = $commentaires->countCommentsDanger();
    require 'models/backEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $articlesS = $allArticles->getArticlesSupprimer();
    $articles = $allArticles->getArticles();
    $articlesB = $allArticles->getArticlesBrouillon();

    //affichage des Chapters dans l'administration
    require 'views/backEnd/administrationChaptersView.php';
}
// Controlleur de la page pour ecrire un nouveau Chapter 
function administrationChaptersEcrire()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    require 'models/backEnd/articleManager.php';
    $articlesManager = new ArticlesManager();
    $Chapters = $articlesManager->NumbersChapter();
    $images = $articlesManager->getImages();

    //Affichage du l'administration pour ecrire un nouveau Chapter
    require 'views/backEnd/administrationChaptersEcrireView.php';
}
// Controlleur de la page pour modifier un Chapter
function administrationChaptersModifier()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //premiere condition pour voir si Id getter est non vide et est un chiffre
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        // redirection vers header
        header('Location: index.php');
        exit();
    } else {
        // recupération de l'article concerné par l'id 
        // extraction de $_GET
        extract($_GET);
        $id = strip_tags($id);

        require 'models/backEnd/articleManager.php';

        //recuperaton des articles pour les modifier 
        $articlesManager = new ArticlesManager();
        $article = $articlesManager->getArticleBrouillon($id);
        $Chapters = $articlesManager->NumbersChapter();

        require 'views/backEnd/administrationChaptersModifierView.php';
    }
}
// Controlleur de la page pour envoyer la modification d'un Chapter
function administrationChaptersEnvoiModifier()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //variable notification
    $notification = '<p> votre article a été envoyé </p>';

    require  'models/backEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $articleEnv = $allArticles->modifierArticle();

    $articles = $allArticles->getArticles();
    $articlesB = $allArticles->getArticlesBrouillon();
    $articlesS = $allArticles->getArticlesSupprimer();



    require 'views/backEnd/administrationChaptersView.php';
}
// Controlleur de la page pour envoyer un nouveau Chapter
function administrationChapterNouveau()
{

    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //Envoie de l'article fini 
    require  'models/backEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $articleEnv = $allArticles->envoyerArticleFini();


    require  'models/frontEnd/imageManager.php';
    $imagemanager =  new imageManager();
    $imageUpload = $imagemanager->uploadImage();


    //variable notification
    $notification = '<p> votre article a été envoyé </p>';

    $articles = $allArticles->getArticles();
    $articlesB = $allArticles->getArticlesBrouillon();
    $articlesS = $allArticles->getArticlesSupprimer();



    require 'views/backEnd/administrationChaptersView.php';
}

function administrationChaptersSupprimer()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //premiere condition pour voir si Id getter est non vide et est un chiffre
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        // redirection vers header
        header('Location: index.php');
        exit();
    } else {
        // extraction de $_GET
        extract($_GET);
        $id = strip_tags($id);
        // recupération de l'article concerné par l'id

        require 'models/backEnd/articleManager.php';



        $allArticles = new ArticlesManager();
        $article = $allArticles->supprimerArticle($id);




        $articles = $allArticles->getArticles();
        $articlesB = $allArticles->getArticlesBrouillon();
        $articlesS = $allArticles->getArticlesSupprimer();


        $notification = '<p id="succes"> votre Chapter est dans la liste des Chapters supprimer</p>';
        require 'views/backEnd/administrationChaptersView.php';
    }
}
function administrationChapterTransformerBrouillon()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //premiere condition pour voir si Id getter est non vide et est un chiffre
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        // redirection vers header
        header('Location: index.php');
        exit();
    } else {



        // extraction de $_GET
        extract($_GET);
        $id = strip_tags($id);
        // recupération de l'article concerné par l'id
        require 'models/backEnd/articleManager.php';
        $allArticles = new ArticlesManager();
        $articleBrouillon = $allArticles->brouillonArticle($id);

        $notification = '<p id="success">Votre Chapter a étét déplacé dans la liste des Chapters brouillon</p>';
        $articles = $allArticles->getArticles();
        $articlesB = $allArticles->getArticlesBrouillon();
        $articlesS = $allArticles->getArticlesSupprimer();

        require 'views/backEnd/administrationChaptersView.php';
    }
}

function administrationChapterTransformerSupprimer()
{

    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //premiere condition pour voir si Id getter est non vide et est un chiffre
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        // redirection vers header
        header('Location: index.php');
        exit();
    } else {
        // extraction de $_GET
        extract($_GET);
        $id = strip_tags($id);
        // recupération de l'article concerné par l'id


        require 'models/frontEnd/imageManager.php';



        $imagemanager = new ImageManager();

        $imageDelete = $imagemanager->deleteImageSrc($id);


        require 'models/backEnd/articleManager.php';
        $allArticles = new ArticlesManager();
        $articlesuppression = $allArticles->supressionFinal($id);
        $notification = "<Votre Chapter a été completement supprimé";
        $articles = $allArticles->getArticles();
        $articlesB = $allArticles->getArticlesBrouillon();
        $articlesS = $allArticles->getArticlesSupprimer();


        require 'views/backEnd/administrationChaptersView.php';
    }
}
// COMMENTAIRES ADMINISTRATION

function administrationCommentaires()
{
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $commentaires = new Commentaires();
    //  global $nbComments;
    $nbComments = $commentaires->countCommentsNew();

    $nbCommentsDanger = $commentaires->countCommentsDanger();

    $comments = $commentaires->getAllComments();
    $commentsV = $commentaires->getAllCommentsValidate();
    $commentsS = $commentaires->getAllCommentsSignaler();

    // affichage de la partie administration des commentaires 
    require 'views/backEnd/administrationCommentairesView.php';
}

function AdministrationCommentairesTransformerEnCours()
{


    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les commentaires publiés et signalés

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/commentManager.php';

    $contactManager = new ContactManager();
    $commentaires = new Commentaires();
    $commentsEnCours = $commentaires->changeCommentEnCours($id);


    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();




    $notification = 'le commentaire a été placé dans les commentaires en cours';
    $comments = $commentaires->getAllComments();
    $commentsV = $commentaires->getAllCommentsValidate();
    $commentsS = $commentaires->getAllCommentsSignaler();
    // affichage de la partie administration des commentaires 
    require 'views/backEnd/administrationCommentairesView.php';
}

function AdministrationCommentairesTransformerSuppression()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les commentaires publiés et signalés

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/commentManager.php';


    $contactManager = new ContactManager();
    $commentaires = new Commentaires();


    $commentsSuppression = $commentaires->supressionFinal($id);

    $nbComments = $commentaires->countCommentsNew();
    $nbMessages = $contactManager->countMessageNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();


    $notification = 'le commentaire a été supprimé';
    $comments = $commentaires->getAllComments();
    $commentsV = $commentaires->getAllCommentsValidate();
    $commentsS = $commentaires->getAllCommentsSignaler();
    // affichage de la partie administration des commentaires 
    require 'views/backEnd/administrationCommentairesView.php';
}

function AdministrationCommentairesTransformerSupprimer()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les commentaires publiés et signalés
    require 'models/backEnd/commentManager.php';

    require 'models/backEnd/contactManager.php';


    $contactManager = new ContactManager();
    $commentaires = new Commentaires();
    $commentsSuppression = $commentaires->changeCommentSignaler($id);

    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();



    $notification = 'le commentaire a été placé dans les commentares supprimés';
    $comments = $commentaires->getAllComments();
    $commentsV = $commentaires->getAllCommentsValidate();
    $commentsS = $commentaires->getAllCommentsSignaler();
    // affichage de la partie administration des commentaires 
    require 'views/backEnd/administrationCommentairesView.php';
}

function AdministrationCommentairesTransformerValider()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les commentaires publiés et signalés
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';


    $contactManager = new ContactManager();
    $commentaires = new Commentaires();
    $commentsSuppression = $commentaires->changeCommentValider($id);

    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();



    $notification = 'le commentaire a été validé';
    $comments = $commentaires->getAllComments();
    $commentsV = $commentaires->getAllCommentsValidate();
    $commentsS = $commentaires->getAllCommentsSignaler();
    // affichage de la partie administration des commentaires 
    require 'views/backEnd/administrationCommentairesView.php';
}

function administrationContactHome()
{

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/commentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();
    require 'views/backEnd/administrationContactHomeView.php';
}
function administrationContactMessageNonLu()
{

    extract($_GET);
    $id = strip_tags($id);

    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();

    $messageNonLu = $contactManager->getContactMessage($id);

    require 'views/backEnd/administrationContactMessageNonLuView.php';
}

function administrationContactTransformerLu()
{

    extract($_GET);
    $id = strip_tags($id);
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $commentaires = new Commentaires();

    $contactChangeLu  = $contactManager->changeContactLu($id);

    // recuperation des notifications 
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //recuperation des messages 
    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();


    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformerNonLu()
{

    extract($_GET);
    $id = strip_tags($id);
    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $commentaires = new Commentaires();


    $contactSuppression  = $contactManager->changeContacNonLu($id);
    // recuperation des notifications 
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();
    //recuperation des messages 
    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();

    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformerSuppression()
{

    extract($_GET);
    $id = strip_tags($id);


    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();


    $contactSuppression  = $contactManager->supressionFinal($id);

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();

    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformerSupprimer()
{

    extract($_GET);
    $id = strip_tags($id);


    require 'models/backEnd/commentManager.php';
    require 'models/backEnd/contactManager.php';

    $contactManager = new ContactManager();
    $commentaires = new Commentaires();
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();

    $contactSuppression  = $contactManager->changeContactSupprimer($id);

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();
    require 'views/backEnd/administrationContactHomeView.php';
}
