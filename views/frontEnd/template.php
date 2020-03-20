<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php echo ($title) ?></title>
    <?php require_once 'includes/head.php'; ?>

</head>

<body>

    <?php require_once 'includes/header.php'; ?>

    <!-- Condition pour eviter de mettre l'image fixe sur l'index -->
    <?php if(isset($index) != 1)  
    {require 'includes/backgroundImage.php';}
    function dateFormat($str)
    {
        list($date1,$date2) = explode(" ", $str);
        list($y,$m,$d) = explode("-", $date1);
        list($h,$min,$s) = explode("-", $date2);
        echo ''.$d.'/'.$m.'/'.$y.' à '.$h.''.$min.''.$s.'';
    }
    
    ?>
    <?php echo ($content) ?>
    <?php require_once 'includes/footer.php'; ?>



    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <script src="assets/js/scroll.js"></script>

</body>



</html>