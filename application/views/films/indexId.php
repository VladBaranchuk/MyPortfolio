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
    <link href="/application/views/films/CSS/styleId.css" rel="stylesheet" type="text/css" >

    <!-- SimpleBar script-->
    <script defer src="/application/views/template/simplebar/simplebar.js"></script>
    <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипты модулей -->
    <script defer type="module" src="/application/views/modules/header/script.js"></script>
    <script defer type="module" src="/application/views/modules/footer/script.js"></script>
    <script defer type="module" src="/application/views/modules/lift/script.js"></script>
    <!-- скрипт --> 
    <script type="module" src="/application/views/films/JS/scriptId.js"></script>
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

            <div class="id-information">
                <div class="img" style="background-image: url(<?php echo '/application/views/template/images/films/' . $filmsItem['film_id'] . '.jpg' ?>);"></div>
                
                <div class="content">
                    <div class="name">
                            <?php echo $filmsItem['name']; ?>
                    </div>
                    <div class="price-date-status">
                        <div class="price">
                            <?php echo $filmsItem['price'] . ' BYN'; ?>
                        </div>
                        <div class="date-status">
                            <div class="genre">
                                <?php echo $filmsItem['genre']; ?>
                            </div>
                            <div class="ds">
                                <div>
                                    <?php 
                                        echo TimeHelper::create($filmsItem['date'] . ' 00:00:00')->longDate();
                                    ?>
                                </div>
                                <div>
                                    <?php echo $filmsItem['status']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="film">
                <div class="youtube" id="Gbi3jcB-mwE" style="width: 1134px; height: 638px;"></div>
                <div class="data">
                    <div class="text">
                        <div class="description">
                            <?php echo $filmsItem['description']; ?>
                        </div>
                        <div class="country">
                            <?php echo $filmsItem['country']; ?>
                        </div>
                        <div class="producer">
                            <?php echo $filmsItem['producer']; ?>
                        </div>
                    </div>
                    <div class="popular"></div>
                </div>
            </div>
            <div class="comments">
                <span>КОММЕНТАРИИ</span>
                <div class="input-comment">
                    <img src="/application/views/template/images/films/1.jpg" alt="" width="50px" height="50px">
                    <form action="">
                        <textarea id="myElement" cols="30" rows="10"></textarea>
                        <button type="submit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="23" height="23" fill="white" stroke="#654145"/>
                                <path d="M17.3536 12.3536C17.5488 12.1583 17.5488 11.8417 17.3536 11.6464L14.1716 8.46447C13.9763 8.2692 13.6597 8.2692 13.4645 8.46447C13.2692 8.65973 13.2692 8.97631 13.4645 9.17157L16.2929 12L13.4645 14.8284C13.2692 15.0237 13.2692 15.3403 13.4645 15.5355C13.6597 15.7308 13.9763 15.7308 14.1716 15.5355L17.3536 12.3536ZM7 12.5L17 12.5V11.5L7 11.5V12.5Z" fill="#654145"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <?php foreach ($comments as $comment): ?>

                <div class="output-comments">
                    <img src="/application/views/template/images/films/1.jpg" alt="" width="50px" height="50px">
                    <div class="comment-ifn-container">
                        <div class="comment-information">
                            <div>
                                @BVlad
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
        <?php require_once(ROOT . '/application/views/modules/lift/lift.php') ?>
    </div>  
    <?php require_once(ROOT . '/application/views/modules/footer/footer.php') ?>
    <script> 

        // Мне абсолютно похуй и поебать что этот код не находится в scriptId.js, здесь он по крайней мере работает

        'use strict';
    function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
    r(function(){
        if (!document.getElementsByClassName) {
            // Поддержка IE8
            var getElementsByClassName = function(node, classname) {
                var a = [];
                var re = new RegExp('(^| )'+classname+'( |$)');
                var els = node.getElementsByTagName("*");
                for(var i=0,j=els.length; i < j; i++)
                    if(re.test(els[i].className))a.push(els[i]);
                return a;
            }
            var videos = getElementsByClassName(document.body,"youtube");
        } else {
            var videos = document.getElementsByClassName("youtube");
        }
        var nb_videos = videos.length;
        for (var i=0; i < nb_videos; i++) {
            // Находим постер для видео, зная ID нашего видео
            videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/sddefault.jpg)';
            // Размещаем над постером кнопку Play, чтобы создать эффект плеера
            var play = document.createElement("div");
            play.setAttribute("class","play");
            videos[i].appendChild(play);
            videos[i].onclick = function() {
                // Создаем iFrame и сразу начинаем проигрывать видео, т.е. атрибут autoplay у видео в значении 1
                var iframe = document.createElement("iframe");
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
                if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
                iframe.setAttribute("src",iframe_url);
                iframe.setAttribute("webkitallowfullscreen", true);
                iframe.setAttribute("mozallowfullscreen", true);
                iframe.setAttribute("allowfullscreen", true);
                iframe.setAttribute("frameborder",'0');
                // Высота и ширина iFrame будет как у элемента-родителя
                iframe.style.width  = this.style.width;
                iframe.style.height = this.style.height;
                addEventListener('dbleclick', function(){
                    iframe.requestFullScreen();
                })
                // Заменяем начальное изображение (постер) на iFrame
                this.parentNode.replaceChild(iframe, this);
            }
        }
    });
    </script>
</body>
</html>