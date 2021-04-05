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
    <link href="/application/views/gallery/CSS/style.css" rel="stylesheet" type="text/css" >

    <!-- SimpleBar script-->
    <!-- <script defer src="/application/views/template/simplebar/simplebar.js"></script> -->
     <!-- Masonry script-->
    <script defer src="/application/views/template/masonry/masonry.js"></script>
     <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипты модулей -->
    <script defer type="module" src="/application/views/modules/header/script.js"></script>
    <script defer type="module" src="/application/views/modules/footer/script.js"></script>
    <script defer type="module" src="/application/views/modules/lift/script.js"></script>
    <!-- скрипт --> 
    <script defer type="module" src="/application/views/gallery/JS/script.js"></script>
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
                <p>Ознакомьтесь с произведениями неизвестных художников-любителей, чтобы дать развитие новым талантам. На данный момент наша коллекция насчитывает более 190 000 произведений и регулярно пополняется. На сайте представлены произведения разных направлений, в том числе и трехмерных композиций которые составляют виртуальную галерею.
                </p>
                <svg width="36" height="18" viewBox="0 0 36 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M34.1455 0.499997L18 17.2789L1.85451 0.499999L34.1455 0.499997Z" fill-opacity="0" fill="#654145" stroke="#654145"/>
                </svg>
            </div>
            <div class="sorting">
                    <div class="year-sorting sort">
                        ГОД
                        <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.4852 8.5L9 0.721111L1.51476 8.5L16.4852 8.5Z" fill="#654145" stroke="#654145"/>
                        </svg>
                    </div>
                    <div class="month-sorting sort">
                        МЕСЯЦ
                        <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.4852 8.5L9 0.721111L1.51476 8.5L16.4852 8.5Z" fill="#654145" stroke="#654145"/>
                        </svg>
                    </div>
                    <div class="art-sorting sort">
                        КАРТИНЫ
                        <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.4852 8.5L9 0.721111L1.51476 8.5L16.4852 8.5Z" fill="#654145" stroke="#654145"/>
                        </svg>
                    </div>
                </div>
                <div class="gallery-container">



                <?php foreach ($artsList as $artItem): ?>



                <div class="art-container" id="<?php echo $artItem['art_id']; ?>">
                    <img src="/application/views/template/images/arts/<?php echo $artItem['art_id']; ?>.jpg" data-type="picture" alt="">
                    <div class="space">
                        <a href="<?php echo $artItem['art_id']; ?>">
                            <div class="inner-space">
                                <svg id="first" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 12.5V0.5H12.5" stroke="#FFFFFF" />
                                </svg>
                                <svg id="second" class="corner" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.500024 1.47556L12.5 1.5L12.4756 13.5" stroke="#FFFFFF"/>
                                </svg>
                                <svg id="third" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5244 0.499048L12.5 12.499L0.500025 12.4746" stroke="#FFFFFF" />
                                </svg>
                                <svg id="fourth" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 12.5L0.5 12.5L0.499999 0.5" stroke="#FFFFFF" />
                                </svg>
                            </div>
                        </a><div class="outer-space">

                            <div class="icons">
                                <svg class="likes" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <?php

                                    $flag = 0;

                                    foreach ($userLikes as $userLike){
                                       if($artItem['art_id'] == $userLike['art_id']){
                                            $flag = 1;
                                        } 
                                    }

                                ?>

                                <?php if($flag == 1):?>

                                    <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="#FFFFFF" fill-opacity="1" fill="#FFFFFF"/>

                                <?php else:?>

                                        <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="#FFFFFF" fill-opacity="0" fill="#FFFFFF"/>

                                <?php endif; ?>


                                </svg>
                                <svg class="comments" width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="20" height="14" stroke="#FFFFFF"/>
                                    <path d="M0.477295 0.46875L10.5 7.5L20.5227 0.46875" stroke="#FFFFFF"/>
                                </svg>
                                <svg class="share" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 5.5V16.5H10H19.5V5.5" stroke="#FFFFFF"/>
                                    <path d="M10.3536 0.146446C10.1583 -0.0488157 9.84171 -0.0488157 9.64645 0.146446L6.46447 3.32843C6.2692 3.52369 6.2692 3.84027 6.46447 4.03553C6.65973 4.2308 6.97631 4.2308 7.17157 4.03553L10 1.20711L12.8284 4.03553C13.0237 4.2308 13.3403 4.2308 13.5355 4.03553C13.7308 3.84027 13.7308 3.52369 13.5355 3.32843L10.3536 0.146446ZM10.5 10.5L10.5 0.5L9.5 0.5L9.5 10.5L10.5 10.5Z" fill="#FFFFFF"/>
                                </svg>
                            </div>
                            <div class="stat">

                            <?php foreach ($artsLike as $artLike): ?>

                                <?php if($artItem['art_id'] == $artLike['art_id']):?>
                                    <span id="likes" width="21px">
                                        <?= $artLike['likes']; ?>
                                    </span>
                                <?php endif; ?>

                            <?php endforeach; ?>

                            <?php foreach ($artsComments as $artComment): ?>

                                <?php if($artItem['art_id'] == $artComment['art_id']):?>
                                    <span id="comments">
                                        <?= $artComment['comments']; ?>
                                    </span>
                                <?php endif; ?>

                            <?php endforeach; ?>
                                
                                <span id="share"></span>

                            </div>                
                        </div> 
                    </div>
                      
                    <a href="">
                        <?= $artItem['login']; ?>
                    </a>
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
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>  
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
    <div class="footer-menu">
        <span>портрет</span>
        <span>пейзаж</span>
        <span>марина</span>
        <span>исторический</span>
        <span>авангардизм</span>
        <span>портрет</span>
        <span>пейзаж</span>
        <span>марина</span>
        <span>исторический</span>
        <span>бытовой</span>
        <span>авангардизм</span>
    </div>
</body>
</html>