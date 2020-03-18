<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'includes/head.php'; ?>
    <title> <?php echo ($title) ?></title>
    <script src="https://cdn.tiny.cloud/1/6ztoevx7at9ej6dibcvmhjeda1slkeqw64zucs9bcodphk4p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>
   

        <?php require 'includes/headerAdmin.php'; ?>
        <?php require 'includes/backgroundImage.php';?>
        <div class="resizeBody" 
       
        >
            <?php echo ($content) ?>
        </div>
        <?php require_once 'includes/footer.php'; ?>
        
        
        <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
        <script src="assets/js/scroll.js"></script>

</body>

</html>