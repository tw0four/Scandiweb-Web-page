<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="styles/styles.css">

</head>
<body>
<header>
    <div class="title">
        <h1>Product List</h1>
    </div>

    <div class="btn-bar">
        <input type="button" value="ADD" class="btn icon-btn btn-success" id="add-product-btn" onclick="window.location.href='addPage.php'">
        <input type="submit" value="MASS DELETE" class="btn icon-btn btn-danger" id="delete-product-btn" name="delete" form="delete_products">
    </div>
    <hr>
</header>
<div class="wrapper">
    <form id="delete_products" method="post" action="deleteProducts.php">
    <?php
    spl_autoload_register(function($class){
        require_once ('library/'.$class.'.php');
    });

    require_once ('showProducts.php');
    ?>
    </form>
</div>
<footer>
    <hr>
    <div class="text-center">
        <h6>Scandiweb Test assignment</h6>
    </div>

</footer>
</body>
</html>
</title>
</head>
<body>

</body>
</html>
