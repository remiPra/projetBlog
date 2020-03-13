<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php echo ($title) ?></title>
    <?php require_once 'includes/head.php'; ?>

</head>

<body>

    <?php require_once 'includes/header.php'; ?>
    <?php if($_GET['action'] != 'index' ) 
    {require 'includes/backgroundImage.php';}
    
    
    ?>
    <?php echo ($content) ?>
    <?php require_once 'includes/footer.php'; ?>



    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <script src="assets/js/scroll.js"></script>

</body>



</html>