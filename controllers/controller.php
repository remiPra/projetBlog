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
// Controlleur de la page pour Modify un Chapter
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

        // condition si un Comment est envoyé sur l'article    
        if (!empty($_POST) && isset($_POST['btnComment'])) {
            // recupération de l'article concerné par l'id
            require 'models/frontEnd/articleManager.php';
            require 'models/frontEnd/CommentManager.php';
            // extraction de $_GET
            extract($_GET);
            $id = strip_tags($id);

            //fonction pour envoyer le Comment
            $CommentManagerF = new CommentManagerF();
            $sendComment = $CommentManagerF->sendComment();

            //fonction pour recuperer l'article et le Comment seulement le numéro de Chapter
            $articles = new ArticlesManager();
            $article = $articles->getArticle($id);

            $Comments = $CommentManagerF->getComment($id);

            // Affichage de la view de l'article
            require 'views/frontEnd/articleView.php';
        } else {
            require 'models/frontEnd/articleManager.php';
            require 'models/frontEnd/CommentManager.php';

            extract($_GET);
            $id = strip_tags($id);

            $articles = new ArticlesManager();
            $article = $articles->getArticle($id);
            $CommentManagerF = new CommentManagerF();
            $Comments = $CommentManagerF->getComment($id);
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
        and ($_POST['message'] != null) and ($_POST['subject'] != null)
    ) {

        //appel de la méthode contact pur recuperer le message
        require 'models/frontEnd/contactManager.php';
        $ContactManager = new ContactManager();
        $contactForm = $ContactManager->contactForm();
        $messageEnvoye = '<p id="succes">Votre message a bien été envoyé</p>';
        //affichag de la page qui montre que le contact est recu
        require 'views/frontEnd/contactRecuView.php';
    } else {

        $notificationError = '<p id="Error">vous n\'avez pas remplis tous les champs</p>';
        require 'views/frontEnd/contactView.php';
    }
}

// Controlleur lorsqu'un signalement a été actionné sur le site
function signalementRecu()
{
    //fonction pour signaler le Comment selon le Number de Chapter
    require 'models/frontEnd/CommentManager.php';
    $idComment = $_POST['idComment'];
    $CommentManagerF = new CommentManagerF();
    $signalerComment = $CommentManagerF->signalerComment($idComment);
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
        
        $isPasswordCorrect = password_verify($_POST['password'], $admin['password']);
        //condition
        if ($isPasswordCorrect== true AND $pseudo == $admin['name']) {
            global $_SESSION;
           
       
            $_SESSION['pseudo'] = $admin['name'];

            if ($admin['newPassword'] == 0) {
                header('Location:index.php?action=administrationHomeNewPassword');
            } else {
                header('Location: index.php?action=administrationHome');
            }
        } else if ($password != $admin['password']) {
            echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionError');</script>";
            exit();
        }
    } else {
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionErrorVide');</script>";
    }
}

// controlleur pour bien verifier le nouveau password
function administrationConnexionNewPasswordCheck()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();
    
    $nbCommentsDanger = $Comments->countCommentsDanger();

    if (($_POST['password'] != null) AND ($_POST['password1'] != null)) {
        if($_POST['password'] == $_POST['password1'] ){
            $passwordCrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $pseudo = $_SESSION['pseudo'];
            require 'models/backEnd/administrationManager.php';
            $administrationManager = new AdministrationManager();
            $newPassword = $administrationManager->passwordChange($pseudo,$passwordCrypt);
            require 'views/backEnd/administrationHomeView.php';
        }
        else {
            header('Location:index.php?action=administrationHomeNewPasswordError');   
        }
    } else {
        header('Location:index.php?action=administrationHomeNewPasswordError');
    }
}
//controlleur des erreurs sur le password
function administrationHomeNewPasswordError()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();
    
    $nbCommentsDanger = $Comments->countCommentsDanger();

    $notificationError = '<p id="Error">vous n\'avez pas remplis tous les champs</p>';
    require 'views/backEnd/administrationHomeNewPasswordView.php';
}

// Controlleur de redirection pour prevenir du password trop faible
function administrationHomeNewPassword()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();
    
    $nbCommentsDanger = $Comments->countCommentsDanger();

    require 'views/backEnd/administrationHomeNewPasswordView.php';
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
    $notification = '<p class="success"vous etes déconnecté</p>';
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administration');</script>";
    exit();
}

// Controller de notifications sous le logo en page administration
function notifications()
{

    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
}

// Controlleur de l'accueil de la page administration 
function administrationHome()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();

    //Affichage de la page d'accueil de l'administration
    require 'views/backEnd/administrationHomeView.php';
}

// Controlleur de l'accueil de l'administration des Chapters
function administrationChapters()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
    require 'models/backEnd/articleManager.php';
    $articlesManager = new ArticlesManager();
    $Chapters = $articlesManager->NumbersChapter();
    $images = $articlesManager->getImages();

    //Affichage du l'administration pour ecrire un nouveau Chapter
    require 'views/backEnd/administrationChaptersEcrireView.php';
}
// Controlleur de la page pour Modify un Chapter
function administrationChaptersModify()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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

        //recuperaton des articles pour les Modify 
        $articlesManager = new ArticlesManager();

        $articleBrouillon = $articlesManager->brouillonArticle($id);
        $Chapters = $articlesManager->NumbersChapter();
        $article = $articlesManager->getArticleBrouillon($id);

        require 'views/backEnd/administrationChaptersModifyView.php';
    }
}
// Controlleur de la page pour envoyer la modification d'un Chapter
function administrationChaptersEnvoiModify()
{

    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';
    require  'models/backEnd/articleManager.php';
    $allArticles = new ArticlesManager();


    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
    //variable notification
    $notification = '<p> votre article a été envoyé </p>';


    $articleEnv = $allArticles->ModifyArticle();

    $articles = $allArticles->getArticles();
    $articlesB = $allArticles->getArticlesBrouillon();
    $articlesS = $allArticles->getArticlesSupprimer();



    require 'views/backEnd/administrationChaptersView.php';
}
// Controlleur de la page pour envoyer un nouveau Chapter
function administrationChapterNouveau()
{

    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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
function administrationChapterTransformBrouillon()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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

        $notification = '<p class="success">Votre Chapter a étét déplacé dans la liste des Chapters brouillon</p>';
        $articles = $allArticles->getArticles();
        $articlesB = $allArticles->getArticlesBrouillon();
        $articlesS = $allArticles->getArticlesSupprimer();

        require 'views/backEnd/administrationChaptersView.php';
    }
}

function administrationChapterTransformSupprimer()
{

    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();
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
// CommentS ADMINISTRATION

function administrationComments()
{
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contact = new ContactManager();
    // global $nbMessages;
    $nbMessages = $contact->countMessageNew();
    $Comments = new Comments();
    //  global $nbComments;
    $nbComments = $Comments->countCommentsNew();

    $nbCommentsDanger = $Comments->countCommentsDanger();

    $CommentsP = $Comments->getAllComments();
    $CommentsV = $Comments->getAllCommentsValidate();
    $CommentsS = $Comments->getAllCommentsSignaler();

    // affichage de la partie administration des Comments 
    require 'views/backEnd/administrationCommentsView.php';
}

function AdministrationCommentsTransformEnCours()
{


    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les Comments publiés et signalés

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';

    $contactManager = new ContactManager();
    $Comments = new Comments();
    $CommentsEnCours = $Comments->changeCommentEnCours($id);


    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();




    $notification = 'le Comment a été placé dans les Comments en cours';
    $CommentsP = $Comments->getAllComments();
    $CommentsV = $Comments->getAllCommentsValidate();
    $CommentsS = $Comments->getAllCommentsSignaler();
    // affichage de la partie administration des Comments 
    require 'views/backEnd/administrationCommentsView.php';
}

function AdministrationCommentsTransformSuppression()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les Comments publiés et signalés

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';


    $contactManager = new ContactManager();
    $Comments = new Comments();


    $CommentsSuppression = $Comments->supressionFinal($id);

    $nbComments = $Comments->countCommentsNew();
    $nbMessages = $contactManager->countMessageNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();


    $notification = 'le Comment a été supprimé';
    $CommentsP = $Comments->getAllComments();
    $CommentsV = $Comments->getAllCommentsValidate();
    $CommentsS = $Comments->getAllCommentsSignaler();
    // affichage de la partie administration des Comments 
    require 'views/backEnd/administrationCommentsView.php';
}

function AdministrationCommentsTransformSupprimer()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les Comments publiés et signalés
    require 'models/backEnd/CommentManager.php';

    require 'models/backEnd/contactManager.php';


    $contactManager = new ContactManager();
    $Comments = new Comments();
    $CommentsSuppression = $Comments->changeCommentSignaler($id);

    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();



    $notification = 'le Comment a été placé dans les Commentares supprimés';
    $CommentsP = $Comments->getAllComments();
    $CommentsV = $Comments->getAllCommentsValidate();
    $CommentsS = $Comments->getAllCommentsSignaler();
    // affichage de la partie administration des Comments 
    require 'views/backEnd/administrationCommentsView.php';
}

function AdministrationCommentsTransformValider()
{

    extract($_GET);
    $id = strip_tags($id);
    // Recuperation de tous les Comments publiés et signalés
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';


    $contactManager = new ContactManager();
    $Comments = new Comments();
    $CommentsSuppression = $Comments->changeCommentValider($id);

    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();



    $notification = 'le Comment a été validé';
    $CommentsP = $Comments->getAllComments();
    $CommentsV = $Comments->getAllCommentsValidate();
    $CommentsS = $Comments->getAllCommentsSignaler();
    // affichage de la partie administration des Comments 
    require 'views/backEnd/administrationCommentsView.php';
}

function administrationContactHome()
{

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();
    require 'views/backEnd/administrationContactHomeView.php';
}
function administrationContactMessageNonLu()
{

    extract($_GET);
    $id = strip_tags($id);

    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();

    $messageNonLu = $contactManager->getContactMessage($id);

    require 'views/backEnd/administrationContactMessageNonLuView.php';
}

function administrationContactTransformLu()
{

    extract($_GET);
    $id = strip_tags($id);
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $Comments = new Comments();

    $contactChangeLu  = $contactManager->changeContactLu($id);

    // recuperation des notifications 
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();
    //recuperation des messages 
    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();


    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformNonLu()
{

    extract($_GET);
    $id = strip_tags($id);
    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $Comments = new Comments();


    $contactSuppression  = $contactManager->changeContacNonLu($id);
    // recuperation des notifications 
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();
    //recuperation des messages 
    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();

    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformSuppression()
{

    extract($_GET);
    $id = strip_tags($id);


    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';
    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();


    $contactSuppression  = $contactManager->supressionFinal($id);

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();

    require 'views/backEnd/administrationContactHomeView.php';
}

function administrationContactTransformSupprimer()
{

    extract($_GET);
    $id = strip_tags($id);


    require 'models/backEnd/CommentManager.php';
    require 'models/backEnd/contactManager.php';

    $contactManager = new ContactManager();
    $Comments = new Comments();
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();

    $contactSuppression  = $contactManager->changeContactSupprimer($id);

    $MessagesS = $contactManager->getContactMessages();
    $MessagesSLu = $contactManager->getContactMessagesLu();
    $MessagesSup = $contactManager->getContactMessagesSupprimer();
    require 'views/backEnd/administrationContactHomeView.php';
}
