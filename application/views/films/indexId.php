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
                <img src="<?php echo '/application/views/template/images/films/' . $filmsItem['film_id'] . '.jpg' ?>" alt="">
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
                <div class="youtube" id="xq7E4yaaefg" style="width: 1134px; height: 638px;"></div>
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