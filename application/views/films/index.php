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
    <div class="body">
        <div class="root">
            <!-- Здесь начинается страница -->

            <div class="disclaimer">
                <p>Образовательные кинопрограммы, специальные ретроспективы к выставкам, классика отечественного и мирового кино, премьерные показы новых картин, лучшие авторские фильмы в прокате, встречи и дискуссии с режиссёрами, актёрами, кинокритиками и киноведами. Показы программы «Кино» проходят в онлайн пространствах Галереи.
                </p>
                <svg width="36" height="18" viewBox="0 0 36 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M34.1455 0.499997L18 17.2789L1.85451 0.499999L34.1455 0.499997Z" fill-opacity="0" fill="#654145" stroke="#654145"/>
                </svg>
            </div>
            <div class="films">
                <div class="months">
                    <div class="month">
                        Сентябрь
                    </div>
                </div>

                <div class="film-container">

                <?php foreach ($filmsList as $filmItem):?>



                    <div class="film" style="background: url(<?php echo '/application/views/template/images/films/' . $filmItem['film_id'] . '.jpg' ?>) no-repeat center;">
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
                <?php endforeach;?>

                </div>

                <div class="genre">
                    <ul>

                        <!-- <?php 
                            // ColorAnalizator::Color(ROOT . '/application/views/template/images/films/1.jpg');
                         ?> -->

                        <li>Художественное</li>
                        <li>Документальное</li>
                        <li>Историческое</li>
                    </ul>
                </div>
            </div>

        </div>
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>  
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
</body>
</html>