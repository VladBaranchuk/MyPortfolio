<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- SimpleBar style-->
    <!-- <link href="/application/views/template/simplebar/simplebar.css" rel="stylesheet" type="text/css"/> -->
    <!-- глобальный стиль -->
    <link href="/application/views/template/CSS/global.css" rel="stylesheet" type="text/css" >
    <!-- стили модулей -->
    <link href="/application/views/modules/header/header.css" rel="stylesheet" type="text/css" >
    <link href="/application/views/modules/footer/footer.css" rel="stylesheet" type="text/css" >
    <link href="/application/views/modules/lift/lift.css" rel="stylesheet" type="text/css" >
    <!-- стиль -->
    <link href="/application/views/gallery/CSS/styleId.css" rel="stylesheet" type="text/css" >

    <!-- SimpleBar script-->
    <!-- <script defer src="/application/views/template/simplebar/simplebar.js"></script> -->
     <!-- Masonry script-->
    <script defer src="/application/views/template/masonry/masonry.js"></script>
     <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипты модулей -->
    <script defer type="module" src="/application/views/modules/footer/script.js"></script>
    <script defer type="module" src="/application/views/modules/lift/script.js"></script>
    <!-- скрипт --> 
    <script defer type="module" src="/application/views/gallery/JS/scriptId.js"></script>
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
    <div class="body">
        <div class="root">
            <!-- Здесь начинается страница -->

            <div class="back">
                <div class="control">
                    <svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 24.8154L0.72111 13L13 1.18463L13 24.8154Z" stroke="#DDD2BF"/>
                    </svg>
                </div>
                <div class="content">
                    <div class="image" style="background-image: url(<?php echo '/application/views/template/images/arts/' . $artsItem['art_id'] . '.jpg' ?>);">
                        <div class="data"></div>
                    </div>
                    
                </div>
                <div class="control">
                    <svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 24.8154L13.2789 13L0.999999 1.18463L1 24.8154Z" stroke="#E1C9A2"/>
                    </svg>
                </div>
            </div>

        </div>
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
</body>
</html>