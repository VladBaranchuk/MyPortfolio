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
            <div class="background" style="background: <?php echo $artsItem['low_color'];?>">
                <a href="/gallery/" class="back">
                    <svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26 25L2 1" stroke="white" stroke-width="2"/>
                        <path d="M26.0001 0.999993L2 25" stroke="white" stroke-width="2"/>
                    </svg>  
                </a>
                <a href="<?php  $id = $artsItem['art_id'] - 1;
                                if($id == '0'){
                                    echo '/gallery/';
                                }
                                else{
                                    echo '/gallery/' . $id;
                                }
                                ?>">
                    <div class="control">
                        <svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 24.8534L0.734806 13L13.5 1.1466L13.5 24.8534Z" fill="#DDD2BF" fill-opacity="0" stroke="#DDD2BF"/>
                        </svg>
                    </div>
                </a>
                
                <div class="img-container">
                    <div class="content">
                        <div class="data" style="border: 1px solid <?php echo $artsItem['high_color'];?>">
                            <div class="information" style="color: <?php echo $artsItem['high_color'];?>">
                                <div class="name">
                                    <?php echo $artsItem['name']?>
                                </div>
                                <div class="date">
                                    <div class="month">
                                        <?php if($artsItem['month'] != ''){
                                            echo $artsItem['month'] . '.';
                                        } ?>
                                    </div>
                                    <div class="year">
                                        <?php echo $artsItem['year']?>
                                    </div>
                                </div>
                            </div>
                            <img class="image" id="<?php echo $artsItem['art_id'] ?>" src="<?php echo '/application/views/template/images/arts/' . $artsItem['art_id'] . '.jpg' ?>"/>
                        </div>
                        <div class="footer-information">
                            <div class="outer-space-top" id="<?php echo $artsItem['art_id']?>">
                                <div class="icons-top">
                                    <svg class="likes-top" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <?php

                                            $flag = 0;

                                            foreach ($userLikes as $userLike){
                                               if($artsItem['art_id'] == $userLike['art_id']){
                                                    $flag = 1;
                                                } 
                                            }

                                        ?>

                                        <?php if($flag == 1):?>

                                            <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="<?php echo $artsItem['high_color'];?>" fill-opacity="1" fill="<?php echo $artsItem['high_color'];?>"/>

                                        <?php else:?>

                                                <path d="M12.2 0.5L9.5 3.32353L6.8 0.5H3.2L0.5 3.32353V7.08824L9.5 16.5L18.5 7.08824V3.32353L15.8 0.5H12.2Z" stroke="<?php echo $artsItem['high_color'];?>" fill-opacity="0" fill="<?php echo $artsItem['high_color'];?>"/>

                                        <?php endif; ?>
                                    </svg>
                                    <svg class="comments-top" width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="20" height="14" stroke="<?php echo $artsItem['high_color'];?>"/>
                                        <path d="M0.477295 0.46875L10.5 7.5L20.5227 0.46875" stroke="<?php echo $artsItem['high_color'];?>"/>
                                    </svg>
                                    <svg class="share-top" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 5.5V16.5H10H19.5V5.5" stroke="<?php echo $artsItem['high_color'];?>"/>
                                        <path d="M10.3536 0.146446C10.1583 -0.0488157 9.84171 -0.0488157 9.64645 0.146446L6.46447 3.32843C6.2692 3.52369 6.2692 3.84027 6.46447 4.03553C6.65973 4.2308 6.97631 4.2308 7.17157 4.03553L10 1.20711L12.8284 4.03553C13.0237 4.2308 13.3403 4.2308 13.5355 4.03553C13.7308 3.84027 13.7308 3.52369 13.5355 3.32843L10.3536 0.146446ZM10.5 10.5L10.5 0.5L9.5 0.5L9.5 10.5L10.5 10.5Z" fill="<?php echo $artsItem['high_color'];?>"/>
                                    </svg>
                                    <svg class="scale" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.5 1.50003H18.5V18.5H1.5V1.50003Z" stroke="<?php echo $artsItem['high_color'];?>"/>
                                        <path d="M3 17L9 17L3 11V17Z" fill="<?php echo $artsItem['high_color'];?>"/>
                                        <path d="M17 2.99999L11 3.00003L17 9.00004L17 2.99999Z" fill="<?php echo $artsItem['high_color'];?>"/>
                                    </svg>
                                </div>
                                <div class="stat-top">

                                    <?php foreach ($artsLike as $artLike): ?>

                                        <?php if($artsItem['art_id'] == $artLike['art_id']):?>
                                            <span id="likes-top" width="21px" style="color: <?php echo $artsItem['high_color'];?>">
                                                <?= $artLike['likes']; ?>
                                            </span>
                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                    <?php foreach ($artsComments as $artComment): ?>

                                        <?php if($artsItem['art_id'] == $artComment['art_id']):?>
                                            <span id="comments-top" style="color: <?php echo $artsItem['high_color'];?>">
                                                <?= $artComment['comments']; ?>
                                            </span>
                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                    <span id="share-top"></span>
                                    <span id="eto-bolwanka-ne-trogai"></span>
                                </div>                
                            </div>
                            <div class="user">
                                <a href="/user/<?= $artsItem['login']; ?>/" style="color: <?php echo $artsItem['high_color'];?>">
                                    <?= $artsItem['login']; ?>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>

                <a href="<?php  $id = $artsItem['art_id'] + 1;
                                if($artsItem['art_id'] == ''){
                                    echo '/gallery/';
                                }
                                else{
                                    echo '/gallery/' . $id;
                                }
                                ?>">
                    <div class="control">
                        <svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.5 24.8534L13.2652 13L0.5 1.14661L0.5 24.8534Z" fill="#DDD2BF" fill-opacity="0" stroke="#E1C9A2"/>
                        </svg>
                    </div> 
                </a>
            </div>
            <div class="full-image">
                 <img src="<?php echo '/application/views/template/images/arts/' . $artsItem['art_id'] . '.jpg' ?>"/>
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
                <a href="/user/<?= $artItem['login']; ?>">
                    УЗНАТЬ БОЛЬШЕ О <br><?= $artItem['login']; ?>
                    <svg width="26" height="14" viewBox="0 0 26 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.18463 1L13 13.2789L24.8154 1L1.18463 1Z" fill="#654145" stroke="#654145"/>
                    </svg>
                </a> 
            </div>
            <div class="comments-module">
                <span>КОММЕНТАРИИ</span>
                <div class="input-comment">
                    <img src="/application/views/template/images/films/1.jpg" alt="" width="50px" height="50px">
                    <form>
                        <textarea id="myElement" name="message" cols="30" rows="10"></textarea>
                        <button class="submit" type="submit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="23" height="23" fill="white" stroke="#654145"/>
                                <path d="M17.3536 12.3536C17.5488 12.1583 17.5488 11.8417 17.3536 11.6464L14.1716 8.46447C13.9763 8.2692 13.6597 8.2692 13.4645 8.46447C13.2692 8.65973 13.2692 8.97631 13.4645 9.17157L16.2929 12L13.4645 14.8284C13.2692 15.0237 13.2692 15.3403 13.4645 15.5355C13.6597 15.7308 13.9763 15.7308 14.1716 15.5355L17.3536 12.3536ZM7 12.5L17 12.5V11.5L7 11.5V12.5Z" fill="#654145"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="output">
                    <?php foreach ($comments as $comment): ?>

                    <div class="output-comments">
                        <img src="/application/views/template/images/users/<?php echo $comment['login']; ?>.jpg" alt="" width="50px" height="50px">
                        <div class="comment-ifn-container">
                            <div class="comment-information">
                                <div>
                                    <a href="/user/<?php echo $comment['login']; ?>">
                                        <?php echo $comment['login']; ?>
                                    </a>
                                </div>
                                <div style="color: #65414580;">
                                    <?php echo date('d.m.Y', strtotime($comment['date']));  ?>
                                </div>
                            </div>
                            <div class="comment">
                                <?php echo $comment['text']; ?>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
</body>
</html>