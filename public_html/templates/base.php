<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Document</title>
        <link href="<?php echo STATIC_PATH ?>" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="<?php echo STATIC_PATH.'/jquery.js' ?>" type="application/javascript"></script>
        <script src="<?php echo STATIC_PATH.'/ajax.js' ?>" type="application/javascript"></script>
    </head>
    <body>
    <p>Header</p>
        <?php
            echo $content;
        ?>
    </body>
</html>