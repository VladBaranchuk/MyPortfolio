<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- глобальный стиль -->
    <link href="/application/views/template/CSS/global.css" rel="stylesheet" type="text/css" >
    <!-- стиль -->
    <link href="/application/views/registration/CSS/style.css" rel="stylesheet" type="text/css" >

    <!-- глобальный скрипт -->
    <script defer type="module" src="/application/views/template/JS/cls_Global.js"></script>
    <!-- скрипт --> 
    <script defer type="module" src="/application/views/registration/JS/script.js"></script>
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
    <div class="reg">
        <div id="login" >РЕГИСТРАЦИЯ</div>
        <div id="signup" >ВХОД</div>
    </div>
    <div class="login">
        <form action="/" method="post" name="signup">
            <input name="name" type="text" placeholder="имя..."/>
            <input name="surname" type="text" placeholder="фамилия..."/>
            <input name="login" type="text" placeholder="@логин..."/>
            <input name="middlename" type="text" placeholder="отчество..."/>
            <input name="email" type="text" placeholder="email..."/>
            <input name="password" type="password" placeholder="пароль..."/>
            <input name="confirmPassword" type="password" placeholder="повторите пароль..."/>
            <input type="reset" value="сбросить"/>
            <input type="submit" value="отправить"/>
        </form>
    </div>
    <div class="signup">
        <form action="/" method="post" name="login">
            <input name="login" type="text" placeholder="@логин..."/>
            <input name="password" type="password" placeholder="пароль..."/>
            <input name="confirmPassword" type="password" placeholder="повторите пароль..."/>
            <input type="reset" value="сбросить"/>
            <input type="submit" value="отправить"/>
        </form>
    </div>
    <div class="back">
        <a href="/">
            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.1945 25L1.00406 1" stroke="#654145" stroke-width="2"/>
                <path d="M26.1945 0.999993L1.00407 25" stroke="#654145" stroke-width="2"/>
            </svg>
        </a>
    </div>  
</body>
</html>