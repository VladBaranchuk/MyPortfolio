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
    <link href="/application/views/main/CSS/style.css" rel="stylesheet" type="text/css" >

    <!-- SimpleBar script-->
    <!-- <script defer src="/application/views/template/simplebar/simplebar.js"></script> -->
    <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипты модулей -->
    <script defer type="module" src="/application/views/modules/header/script.js"></script>
    <script defer type="module" src="/application/views/modules/footer/script.js"></script>
    <script defer type="module" src="/application/views/modules/lift/script.js"></script>
    <!-- скрипт --> 
    <script defer type="module" src="/application/views/main/JS/script.js"></script>
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
    <div class="body">
        <div class="root">
            <!-- Здесь начинается страница -->

            <div class="disclaimer">
                <p>Проект создан с целью дать возможность свободным пользователям выкладывать собственные, качественные картины и скульптуры. Сайт позиционирует себя как онлайн-галерея, а значит все представленные арт-объекты принадлежат пользователям данного ресурса и нигде не представлены в одном месте.
                </p>
            </div>
            <div class="main">
                <div class="section-name">
                    КИНО
                </div>
                <div class="film-container">


                    

                    <?php foreach ($filmsList as $filmItem): ?>

                        <div class="film" style="background-image: url(<?php echo '/application/views/template/images/films/' . $filmItem['film_id'] . '.jpg' ?>);">
                            <div class="info">
                                <div class="name">
                                    <a href="/films/<?php echo $filmItem['film_id']; ?>" >
                                        <?php echo $filmItem['name']; ?>
                                    </a>
                                </div>
                                <div class="price-date-status">
                                    <div class="price">
                                        <?php echo $filmItem['price'] . ' BYN'; ?>
                                    </div>
                                    <div class="date-status">
                                        <div>
                                            <?php 
                                            echo TimeHelper::create($filmItem['date'] . ' 00:00:00')->longDate();
                                            ?>
                                        </div>
                                        <div>
                                            <?php echo $filmItem['status']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>



                    </div>
                    <div class="more">
                        БОЛЬШЕ
                        <svg width="26" height="14" viewBox="0 0 26 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.18463 1L13 13.2789L24.8154 1L1.18463 1Z" fill="#654145" stroke="#654145"/>
                        </svg>
                    </div>
                </div>
        </div>
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>  
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
</body>
</html>