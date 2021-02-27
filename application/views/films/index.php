<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- SimpleBar style-->
    <link href="/application/views/template/simplebar/simplebar.css" rel="stylesheet" type="text/css"/>
    <!-- глобальный стиль -->
    <link href="/application/views/template/CSS/global.css" rel="stylesheet" type="text/css" >
    <!-- стили модулей -->
    <link href="/application/views/modules/header/header.css" rel="stylesheet" type="text/css" >
    <link href="/application/views/modules/footer/footer.css" rel="stylesheet" type="text/css" >
    <link href="/application/views/modules/lift/lift.css" rel="stylesheet" type="text/css" >
    <!-- стиль -->
    <link href="/application/views/films/style.css" rel="stylesheet" type="text/css" >

    <!-- SimpleBar script-->
    <script defer src="/application/views/template/simplebar/simplebar.js"></script>
    <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипты модулей -->
    <script defer type="module" src="/application/views/modules/header/script.js"></script>
    <script defer type="module" src="/application/views/modules/footer/script.js"></script>
    <script defer type="module" src="/application/views/modules/lift/script.js"></script>
    <!-- скрипт --> 
    <script defer type="module" src="/application/views/films/script.js"></script>
    <noscript>
      <style>
        /**
        * Reinstate scrolling for non-JS clients
        */
        .simplebar-content-wrapper {
          overflow: auto;
        }
      </style>
    </noscript>
</head>
<body>
    <?php require_once(ROOT . '/application/views/modules/header/header.php') ?>
    <div class="root">
        <!-- Здесь начинается страница -->

        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>  
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
</body>
</html>