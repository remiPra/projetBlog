<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php'; ?>
    <title> <?php echo ($title) ?></title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>

    <?php require_once 'includes/header.php'; ?>
   
    <?php echo ($content) ?>
    <?php require_once 'includes/footer.php'; ?>


    <script src="https://kit.fontawesome.com/5a70a7892a.js"></script>
    <script src="assets/js/scroll.js"></script>
</body>

</html>