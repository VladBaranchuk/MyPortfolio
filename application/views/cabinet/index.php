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
    <link href="/application/views/cabinet/CSS/style.css" rel="stylesheet" type="text/css" >

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
    <script defer type="module" src="/application/views/cabinet/JS/script.js"></script>
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
 
            <div  class="about">
                <div class="imtext">
                    <img src="/application/views/template/images/users/<?php echo $_SESSION['login']; ?>full.jpg" alt=""/>
                    <div>
                        <div class="data-header" style="margin: 0px;">
                            <div class="dataname">
                                <div class="FIO-container">
                                    <span class="FIO" style="font-size: 30px;"><?php echo $_SESSION["name"]; ?></span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" fill="transparent"/>
                                        <path d="M11.5 33L13.1452 28.0645M11.5 33L16.4355 31.3548M11.5 33H27.4032M13.1452 28.0645L16.4355 31.3548M13.1452 28.0645L25.2097 16L28.5 19.2903L16.4355 31.3548" stroke="#654145"/>
                                    </svg>
                                </div>    
                                <span class="login"><?php echo $_SESSION["login"]; ?></span>
                            </div>
                            <div class="works" style="margin-bottom: 0px;">
                                <div class="w">
                                    <div class="w-1">картины:</div>
                                    <div class="w-2"><?php echo $_SESSION["pictures"]; ?></div>
                                </div>
                                <div class="w">
                                    <div class="w-1">выставки:</div>
                                    <div class="w-2"></div>
                                </div>
                                <div class="w" style="margin-bottom: 0px;">
                                    <div class="w-1">скульптуры:</div>
                                    <div class="w-2"><?php echo $_SESSION["sculptures"]; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-redactor">
                            <svg width="560" height="40" viewBox="0 0 560 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 24.5H522" stroke="#654145" stroke-opacity="0.3"/>
                                <rect x="520" width="40" height="40" fill="white"/>
                                <path d="M531 33L532.645 28.0645M531 33L535.935 31.3548M531 33H546.903M532.645 28.0645L535.935 31.3548M532.645 28.0645L544.71 16L548 19.2903L535.935 31.3548" stroke="#654145"/>
                            </svg>
                        </div>
                        <p>Идейные соображения высшего порядка,
                            а также консультация с широким активом
                            играет важную роль в формировании дальнейших
                            направлений развития. Повседневная практика
                            показывает, что сложившаяся структура организации
                            позволяет выполнять важные задания
                            по разработке модели развития. Не следует,
                            однако забывать, что укрепление и развитие
                            структуры способствует подготовки и реализации
                            новых предложений. Разнообразный и богатый
                            опыт сложившаяся структура организации
                            позволяет выполнять важные задания по разработке
                            новых предложений. Таким образом новая модель
                            организационной деятельности в значительной
                            степени обуславливает создание систем массового участия.
                        </p>
                    </div>
                </div>
            </div>
            <div class="gallery-container">

                    <?php foreach ($artsList as $artItem): ?>

                    <div class="art-container" id="<?php echo $artItem['art_id']; ?>">
                        <img src="/application/views/template/images/arts/<?php echo $artItem['art_id']; ?>.jpg" data-type="picture" alt="">
                        <div class="space">
                            <a href="/gallery/<?php echo $artItem['art_id']; ?>">
                                <div class="inner-space" style="background-color:<?php echo $artItem['low_color'];?>;">
                                    <svg id="first" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 12.5V0.5H12.5" stroke="<?php echo $artItem['high_color'];?>" />
                                    </svg>
                                    <svg id="second" class="corner" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.500024 1.47556L12.5 1.5L12.4756 13.5" stroke="<?php echo $artItem['high_color'];?>"/>
                                    </svg>
                                    <svg id="third" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5244 0.499048L12.5 12.499L0.500025 12.4746" stroke="<?php echo $artItem['high_color'];?>" />
                                    </svg>
                                    <svg id="fourth" class="corner" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 12.5L0.5 12.5L0.499999 0.5" stroke="<?php echo $artItem['high_color'];?>" />
                                    </svg>
                                </div>
                            </a><div class="outer-space" style="background-color:<?php echo $artItem['low_color'] . '00';?>;">

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

                                        <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="<?php echo $artItem['high_color'];?>" fill-opacity="1" fill="<?php echo $artItem['high_color'];?>"/>

                                    <?php else:?>

                                            <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="<?php echo $artItem['high_color'];?>" fill-opacity="0" fill="<?php echo $artItem['high_color'];?>"/>

                                    <?php endif; ?>


                                    </svg>
                                    <svg class="comments" width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="20" height="14" stroke="<?php echo $artItem['high_color'];?>"/>
                                        <path d="M0.477295 0.46875L10.5 7.5L20.5227 0.46875" stroke="<?php echo $artItem['high_color'];?>"/>
                                    </svg>
                                    <svg class="share" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 5.5V16.5H10H19.5V5.5" stroke="<?php echo $artItem['high_color'];?>"/>
                                        <path d="M10.3536 0.146446C10.1583 -0.0488157 9.84171 -0.0488157 9.64645 0.146446L6.46447 3.32843C6.2692 3.52369 6.2692 3.84027 6.46447 4.03553C6.65973 4.2308 6.97631 4.2308 7.17157 4.03553L10 1.20711L12.8284 4.03553C13.0237 4.2308 13.3403 4.2308 13.5355 4.03553C13.7308 3.84027 13.7308 3.52369 13.5355 3.32843L10.3536 0.146446ZM10.5 10.5L10.5 0.5L9.5 0.5L9.5 10.5L10.5 10.5Z" fill="<?php echo $artItem['high_color'];?>"/>
                                    </svg>
                                </div>
                                <div class="stat" style="color:<?php echo $artItem['high_color'];?>;">

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
                          
                        <a href="/user/<?= $artItem['login']; ?>/">
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
</body>
</html>