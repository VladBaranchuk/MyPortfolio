<div class="header">
    <div class="container">
        <div class="compensator">
                
        </div>
        <div class="nav-container">
            <a href="/">
                <div class="logo">
                    <img src="/application/views/template/images/logo.png" alt=""/>
                    <span>MyPortfolio</span>
                </div>
            </a>
            <ul>
                <li><a href="/gallery/">галерея</a></li>
                <li><a href="/films/">кино</a></li>
                <li><a href="/">о проекте</a></li>
            </ul>
        </div>
        <div class="compensator">
            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9.5" cy="9.5" r="9.5" fill="white" fill-opacity="0.3"/>
            <circle cx="9.5" cy="9.5" r="9" stroke="#654145" stroke-opacity="0.35"/>
            <path d="M22 22L16 16" stroke="#654145" stroke-opacity="0.35"/>
        </svg>    
        </div>
    </div>
    <div class="extended-menu">
        <div class="extended-container">
            <div class="menu">
                <ul>
                    <li><a href="#">Выставки</a></li>
                    <li><a href="/films/">Кино</a></li>
                    <li><a href="/gallery/">Галерея</a></li>
                    <li><a href="#">События</a></li>
                    <li><a href="/">О проекте</a></li>
                </ul>
            </div>

            <?php
            
                if(isset($_SESSION["login"])): ?>

                <div class="profile">
                    <div class="avatar">
                        <img src="/application/views/template/images/users/c.png" width="167" alt=""/>
                    </div>
                    <div class="data-header">
                        <div class="dataname">
                            <span class="FIO"><?php echo $_SESSION["name"]; ?></span>
                            <span class="login"><?php echo $_SESSION["login"]; ?></span>
                        </div>
                        <div class="works">
                            <div class="w">
                                <div class="w-1">картины:</div>
                                <div class="w-2"><?php echo $_SESSION["pictures"]; ?></div>
                            </div>
                            <div class="w">
                                <div class="w-1">выставки:</div>
                                <div class="w-2"></div>
                            </div>
                            <div class="w">
                                <div class="w-1">скульптуры:</div>
                                <div class="w-2"><?php echo $_SESSION["sculptures"]; ?></div>
                            </div>
                        </div>
                        <div class="control-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="23" height="23" fill="white" stroke="#654145"/>
                                <path d="M7 12H17" stroke="#654145"/>
                                <path d="M12 7V17" stroke="#654145"/>
                            </svg>
                            <a href="/cabinet/"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="23" height="23" fill="white" stroke="#654145"/>
                                    <path d="M17.3536 12.3536C17.5488 12.1583 17.5488 11.8417 17.3536 11.6464L14.1716 8.46447C13.9763 8.2692 13.6597 8.2692 13.4645 8.46447C13.2692 8.65973 13.2692 8.97631 13.4645 9.17157L16.2929 12L13.4645 14.8284C13.2692 15.0237 13.2692 15.3403 13.4645 15.5355C13.6597 15.7308 13.9763 15.7308 14.1716 15.5355L17.3536 12.3536ZM7 12.5L17 12.5V11.5L7 11.5V12.5Z" fill="#654145"/>
                                </svg></a>
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="25.5" y="23.5" width="21" height="23" transform="rotate(-180 25.5 23.5)" fill="white" stroke="#654145"/>
                                <path d="M0.93934 10.9393C0.353554 11.5251 0.353554 12.4749 0.93934 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.93934 10.9393ZM12 10.5L2 10.5L2 13.5L12 13.5L12 10.5Z" fill="white"/>
                                <path d="M1.64645 11.6464C1.45118 11.8417 1.45118 12.1583 1.64645 12.3536L4.82843 15.5355C5.02369 15.7308 5.34027 15.7308 5.53553 15.5355C5.7308 15.3403 5.7308 15.0237 5.53553 14.8284L2.70711 12L5.53553 9.17157C5.7308 8.97631 5.7308 8.65973 5.53553 8.46447C5.34027 8.2692 5.02369 8.2692 4.82843 8.46447L1.64645 11.6464ZM12 11.5L2 11.5L2 12.5L12 12.5L12 11.5Z" fill="#654145"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <?php else: ?>

                <a href="/registration/">
                        <svg class="input" width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="25.5" y="23.5" width="21" height="23" transform="rotate(-180 25.5 23.5)" fill="white" stroke="#654145"/>
                            <path d="M20.0607 13.0607C20.6464 12.4749 20.6464 11.5251 20.0607 10.9393L10.5147 1.3934C9.92893 0.807612 8.97919 0.807612 8.3934 1.3934C7.80761 1.97919 7.80761 2.92893 8.3934 3.51472L16.8787 12L8.3934 20.4853C7.80761 21.0711 7.80761 22.0208 8.3934 22.6066C8.97918 23.1924 9.92893 23.1924 10.5147 22.6066L20.0607 13.0607ZM2 13.5L19 13.5L19 10.5L2 10.5L2 13.5Z" fill="white"/>
                            <path d="M11.3536 12.3536C11.5488 12.1583 11.5488 11.8417 11.3536 11.6464L8.17157 8.46447C7.97631 8.2692 7.65973 8.2692 7.46447 8.46447C7.2692 8.65973 7.2692 8.97631 7.46447 9.17157L10.2929 12L7.46447 14.8284C7.2692 15.0237 7.2692 15.3403 7.46447 15.5355C7.65973 15.7308 7.97631 15.7308 8.17157 15.5355L11.3536 12.3536ZM-4.80825e-08 12.5L11 12.5L11 11.5L4.80825e-08 11.5L-4.80825e-08 12.5Z" fill="#654145"/>
                        </svg>
                </a>

            <?php endif ?>
        </div>
    </div>
    <div class="open">
        <svg width="38" height="21" viewBox="0 0 38 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="37" height="20" fill="white" stroke="#654145"/>
            <path d="M26.4852 13.5L19 5.72111L11.5148 13.5L26.4852 13.5Z" fill="#654145" stroke="#654145"/>
        </svg>
    </div>
</div>
