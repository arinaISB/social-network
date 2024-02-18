<body>

<div class="main-container">

    <!-- HEADER -->
    <header class="block">
        <ul class="header-menu horizontal-list">
<!--            <li>-->
<!--                <a class="header-menu-tab" href="#1"><span class="icon entypo-cog scnd-font-color"></span>Log out</a>-->
<!--            </li>-->
            <li>
                <a class="header-menu-tab" href="#2"><span class="icon fontawesome-user scnd-font-color"></span>Account</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages</a>
                <a class="header-menu-number" href="#4">5</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Feed</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Subscriptions</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Notifications</a>
            </li>
        </ul>
        <div class="profile-menu">
            <p>Me <a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
            <div class="profile-picture small-profile-picture">
                <img width="40px" alt="{{ Auth::user()->name }} picture"
                     src="{{ Auth::user()->avatar_url ?: 'https://media.istockphoto.com/id/1209654046/vector/user-avatar-profile-icon-black-vector-illustration.jpg?s=612x612&w=0&k=20&c=EOYXACjtZmZQ5IsZ0UUp1iNmZ9q2xl1BD1VvN6tZ2UI=' }}" >
            </div>
        </div>
    </header>

    <!-- LEFT-CONTAINER -->
    <div class="left-container container">
        <div class="menu-box block"> <!-- MENU BOX (LEFT-CONTAINER) -->
            <h2 class="titular">MENU BOX</h2>
            <ul class="menu-box-menu">
<!--                <li>-->
<!--                    <a class="menu-box-tab" href="#6"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages<div class="menu-box-number">24</div></a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="menu-box-tab" href="#8"><span class="icon entypo-paper-plane scnd-font-color"></span>Subscriptions<div class="menu-box-number">3</div></a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="menu-box-tab" href="#10"><span class="icon entypo-calendar scnd-font-color"></span>Latest posts<div class="menu-box-number">3</div></a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="menu-box-tab" href="#13"><span class="icon entypo-chart-line scnd-font-color"></span>Notifications<div class="menu-box-number">3</div></a>-->
<!--                </li>-->
                <li>
                    <a class="menu-box-tab" href="#12"><span class="icon entypo-cog scnd-font-color"></span>Account Settings</a>
                </li>
            </ul>
        </div>
        <div class="join-newsletter block">
            <h2 class="titular">JOIN THE TELEGRAM NEWSLETTERS</h2>
            <div class="input-container">
                <input type="text" placeholder="Your phone number" class="phone number text-input">
                <div class="input-icon envelope-icon-newsletter"><span class="fontawesome-envelope scnd-font-color"></span></div>
            </div>
            <a class="subscribe button" href="#21">SUBSCRIBE</a>
        </div>
    </div>

    <!-- MIDDLE-CONTAINER -->
    <div class="middle-container container">
        <div class="profile block"> <!-- PROFILE (MIDDLE-CONTAINER) -->
            <a class="add-button" href="#28"><span class="icon entypo-plus scnd-font-color"></span></a>
            <div class="profile-picture big-profile-picture clear">
                <img width="150px" alt="{{ Auth::user()->name }} picture"
                     src="{{ Auth::user()->avatar_url ?: 'https://media.istockphoto.com/id/1209654046/vector/user-avatar-profile-icon-black-vector-illustration.jpg?s=612x612&w=0&k=20&c=EOYXACjtZmZQ5IsZ0UUp1iNmZ9q2xl1BD1VvN6tZ2UI=' }}" >
            </div>
            <h1 class="user-name">{{ Auth::user()->name }}</h1>
            <div class="profile-description">
                <p class="scnd-font-color">{{ $status }}</p>
            </div>
            <ul class="profile-options horizontal-list">
<!--                <li><a class="followers" href="#40"><p><span class="icon fontawesome-comment-alt scnd-font-color"></span>23</li></p></a>-->
<!--                <li><a class="following" href="#41"><p><span class="icon fontawesome-eye-open scnd-font-color"></span>841</li></p></a>-->
<!--                <li><a class="posts" href="#42"><p><span class="icon fontawesome-heart-empty scnd-font-color"></span>49</li></p></a>-->
                <li>
                    <a class="followers" href="#40">
                        <p><span class="icon fontawesome-comment-alt scnd-font-color"></span>767</p>
                        <div class="label">posts</div>
                    </a>
                </li>
                <li>
                    <a class="following" href="#41">
                        <p><span class="icon fontawesome-eye-open scnd-font-color"></span>{{$followersCount}}</p>
                        <div class="label">followers</div>
                    </a>
                </li>
                <li>
                    <a class="posts" href="#42">
                        <p><span class="icon fontawesome-heart-empty scnd-font-color"></span>{{$followingCount}}</p>
                        <div class="label">following</div>
                    </a>
                </li>
            </ul>
        </div>

{{--        последние новости НА ДРУГУЮ СТРАНИЦУ ПЕРЕНЕСТИ--}}
<!--        <div class="tweets block"> <!-- TWEETS (MIDDLE-CONTAINER) -->
<!--            <h2 class="titular"><span class="icon zocial-twitter"></span>LATEST TWEETS</h2>-->
<!--            <div class="tweet first">-->
<!--                <p>Ice-cream trucks only play music when out of ice-cream. Well played dad. On <a class="tweet-link" href="#17">@Quora</a></p>-->
<!--                <p><a class="time-ago scnd-font-color" href="#18">3 minutes ago</a></p>-->
<!--            </div>-->
<!--            <div class="tweet">-->
<!--                <p>We are in the process of pushing out all of the new CC apps! We will tweet again once they are live <a class="tweet-link" href="#19">#CreativeCloud</a></p>-->
<!--                <p><a class="scnd-font-color" href="#20">6 hours ago</a></p>-->
<!--            </div>-->
<!--        </div>-->
    </div>

    <!-- RIGHT-CONTAINER -->
    <div class="right-container container">
        <div class="introduction block">
            <h2 class="titular">Introduction</h2>
            <ul class="introduction-list">
                <li>
                    <img src="https://www.svgrepo.com/show/26693/job-search-symbol-of-suitcase-and-curriculum-paper.svg" alt="Job Icon" style="width: 24px; vertical-align: middle;">
                    {{$job}}
                </li>
                <li>
                    <img src="https://www.svgrepo.com/show/529027/home-1.svg" alt="Home Icon" style="width: 24px; vertical-align: middle;">
                    {{$city}}
                </li>
                <li>
                    <img src="https://cdn-icons-png.flaticon.com/512/6009/6009323.png" alt="Hobbies Icon" style="width: 24px; vertical-align: middle;">
                    {{$hobby}}
                </li>
            </ul>
        </div>
    </div> <!-- end right-container -->
</div> <!-- end main-container -->
</body>

<style>
    /** Inspired by: http://graphicburger.com/flat-design-ui-components/ **/
    /** Line-chart and donut-chart made by @kseso https://codepen.io/Kseso/pen/phiyL **/


    /************************************ FONTS ************************************/
    @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);
    @import url(https://weloveiconfonts.com/api/?family=entypo|fontawesome|zocial);
    /* entypo */
    [class*="entypo-"]:before {
        font-family: 'entypo', sans-serif;
    }
    /* fontawesome */
    [class*="fontawesome-"]:before {
        font-family: 'FontAwesome', sans-serif;
    }
    /* zocial */
    [class*="zocial-"]:before {
        font-family: 'zocial', sans-serif;
    }
    @font-face {
        font-family: 'icomoon';
        src:url('https://jlalovi-cv.herokuapp.com/font/icomoon.eot');
        src:url('https://jlalovi-cv.herokuapp.com/font/icomoon.eot?#iefix') format('embedded-opentype'),
        url('https://jlalovi-cv.herokuapp.com/font/icomoon.ttf') format('truetype'),
        url('https://jlalovi-cv.herokuapp.com/font/icomoon.woff') format('woff'),
        url('https://jlalovi-cv.herokuapp.com/font/icomoon.svg#icomoon') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    [class^="icon-"], [class*=" icon-"] {
        font-family: 'icomoon';
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;

        /* Better Font Rendering =========== */
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .icon-cloudy:before {
        content: "\e60f";
    }
    .icon-sun:before {
        content: "\e610";
    }
    .icon-cloudy2:before {
        content: "\e611";
    }
    /************************************* END FONTS *************************************/

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        background: #1f253d;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding-left: 0;
    }

    h1 {
        font-size: 23px;
    }

    h2 {
        font-size: 17px;
    }

    p {
        font-size: 15px;
    }

    a {
        text-decoration: none;
        font-size: 15px;
    }
    a:hover {
        text-decoration: underline;
    }

    h1, h2, p, a, span{
        color: #fff;
    }
    .scnd-font-color {
        color: #9099b7;
    }

    .input-container {
        position: relative;
    }
    input[type=text]{
        width: 260px;
        height: 50px;
        margin-left: 20px;
        margin-bottom: 20px;
        padding-left: 45px;
        background: #50597b;
        color: #fff;
        border: solid 1px #1f253d;
        border-radius: 5px;
    }
    input[type=text]::-webkit-input-placeholder { /* WebKit browsers */
        color: #fff;
    }
    input[type=text]:-moz-input-placeholder { /* Mozilla Firefox 4 to 18 */
        color: #fff;
    }
    input[type=text]::-moz-input-placeholder { /* Mozilla Firefox 19+ */
        color: #fff;
    }
    input[type=text]:-ms-input-placeholder { /* Internet Explorer 10+ */
        color: #fff;
    }
    input[type=text]:focus {
        outline: none; /* removes the default orange border when focus */
        border: 1px solid #11a8ab;
    }
    .input-icon {
        font-size: 22px;
        position: absolute;
        left: 31px;
        top: 10px;
    }
    .input-icon.password-icon {
        left: 35px;
    }

    .horizontal-list {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
    .horizontal-list li {
        float: left;
    }

    .clear {
        clear: both;
    }

    .icon {
        font-size: 25px;
    }

    .titular {
        display: block;
        line-height: 60px;
        margin: 0;
        text-align: center;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .button {
        display: block;
        width: 175px;
        line-height: 50px;
        font-size: 16px;
        font-weight: 700;
        text-align: center;
        margin: 0 auto;
        border-radius: 5px;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .button:hover {
        text-decoration: none;
    }

    .arrow-btn-container {
        position: relative;
    }
    .arrow-btn {
        position: absolute;
        display: block;
        width: 60px;
        height: 60px;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .arrow-btn:hover {
        text-decoration: none;
    }
    .arrow-btn.left {
        border-top-left-radius: 5px;
    }
    .arrow-btn.right {
        border-top-right-radius: 5px;
        right: 0;
        top: 0;
    }
    .arrow-btn .icon {
        display: block;
        font-size: 18px;
        border: 2px solid #fff;
        border-radius: 100%;
        line-height: 17px;
        width: 21px;
        margin: 20px auto;
        text-align: center;
    }
    .arrow-btn.left .icon {
        padding-right: 2px;
    }

    .profile-picture {
        border-radius: 100%;
        overflow: hidden;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }
    .big-profile-picture {
        margin: 0 auto;
        border: 5px solid #50597b;
        width: 150px;
        height: 150px;
    }
    .small-profile-picture {
        border: 2px solid #50597b;
        width: 40px;
        height: 40px;
    }


    /** MAIN CONTAINER **/

    .main-container {
        font-family: 'Ubuntu', sans-serif;
        width: 950px;
        height: 1725px;
        margin: 6em auto;
    }
    /*********************************************** HEADER ***********************************************/
    header {
        height: 80px;
    }
    .header-menu {
        font-size: 17px;
        line-height: 80px;
    }
    .header-menu li {
        position: relative;
        -webkit-transform: translateZ(0); /** To avoid a flash when hover messages **/
    }
    .header-menu-tab {
        padding: 0 27px;
        display: block;
        line-height: 74px;
        font-size: 17px;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .header-menu-tab:hover {
        background: #50597b;
        border-bottom: 4px solid #11a8ab;
        text-decoration: none;
    }
    .header-menu-tab .icon {
        padding-right: 15px;
    }
    .header-menu-number {
        position: absolute;
        line-height: 22px;
        padding: 0 6px;
        font-weight: 700;
        background: #e64c65;
        border-radius: 100%;
        top: 15px;
        right: 2px;
        -webkit-transition: all .3s linear;
        transition: all .3s linear;
    }
    .header-menu li:hover .header-menu-number {
        text-decoration: none;
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);

    }
    .profile-menu {
        float: right;
        height: 80px;
        padding-right: 20px;
    }
    .profile-menu p {
        font-size: 17px;
        display: inline-block;
        line-height: 76px;
        margin: 0;
        padding-right: 10px;
    }
    .profile-menu a {
        padding-left: 5px;
    }
    .profile-menu a:hover {
        text-decoration: none;
    }
    .small-profile-picture {
        display: inline-block;
        vertical-align: middle;
    }
    /** CONTAINERS **/
    .container {
        float: left;
        width: 300px;
    }
    .block {
        margin-bottom: 25px;
        background: #394264;
        border-radius: 5px;
    }
    /******************************************** LEFT CONTAINER *****************************************/
    .left-container {}
    .menu-box {
        height: 120px;
    }
    .menu-box .titular {
        background: #11a8ab;
    }
    .menu-box-menu .icon {
        display: inline-block;
        vertical-align: top;
        width: 28px;
        margin-left: 20px;
        margin-right: 15px;
    }
    .menu-box-number {
        width: 36px;
        line-height: 22px;
        background: #50597b;
        text-align: center;
        border-radius: 15px;
        position: absolute;
        top: 15px;
        right: 15px;
        -webkit-transition: all .3s;
        transition: all .3s;
    }
    .menu-box-menu li{
        height: 60px;
        position: relative;
    }
    .menu-box-tab {
        line-height: 60px;
        display: block;
        border-bottom: 1px solid #1f253d;
        -webkit-transition: background .2s;
        transition: background .2s;
    }
    .menu-box-tab:hover {
        background: #50597b;
        border-top: 1px solid #1f253d;
        text-decoration: none;
    }
    .menu-box-tab:hover .icon {
        color: #fff;
    }
    .menu-box-tab:hover .menu-box-number {
        background: #e64c65;
    }

    .center-date span.scnd-font-color {
        line-height: 0;
    }

    .left-container {}
    .join-newsletter {
        height: 230px;
    }
    .join-newsletter .titular {
        padding-top: 10px;
    }
    .subscribe.button {
        background: #11a8ab;
        margin-top: 10px;
    }
    .subscribe.button:hover {
        background: #0F9295;
    }
    .account .titular {
        padding: 10px 0;
    }
    .account p {
        text-align: center;
    }

    /************************************************** MIDDLE CONTAINER **********************************/
    .middle-container {
        margin: 0 25px;
    }
    .profile {
        height: 375px;
    }
    .add-button .icon {
        float: right;
        line-height: 18px;
        width: 23px;
        border: 2px solid;
        border-radius: 100%;
        font-size: 18px;
        text-align: center;
        margin: 10px;
    }
    .add-button .icon:hover {
        color: #e64c65;
        border-color: #e64c65;
    }
    .user-name {
        margin: 25px 0 16px;
        text-align: center;
    }
    .profile-description {
        width: 210px;
        margin: 0 auto;
        text-align: center;
    }
    .profile-options {
        padding-top: 1px;
    }
    .profile-options li {
        border-left: 1px solid #1f253d;
    }
    .profile-options p {
        margin: 0;
    }
    .profile-options a {
        display: block;
        width: 99px;
        line-height: 25px;
        text-align: center;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .profile-options a:hover {
        text-decoration: none;
        background: #50597b;
    }
    .profile-options a:hover.followers .icon {
        color: #fcb150;
    }
    .profile-options a:hover.following .icon {
        color: #11a8ab;
    }
    .profile-options a:hover.posts .icon {
        color: #e64c65;
    }
    .profile-options .icon {
        padding-right: 10px;
    }
    .profile-options .followers {
        border-top: 4px solid #fcb150;
    }
    .profile-options .following {
        border-top: 4px solid #11a8ab;
    }
    .profile-options .posts {
        border-top: 4px solid #e64c65;
    }
    .tweets {
        height: 375px;
    }
    .tweets .titular {
        background: #35aadc;
    }
    .tweets .titular .icon {
        font-size: 18px;
        padding-right: 20px;
    }
    .tweet.first {
        height: 150px;
        border-bottom: 1px solid #1f253d;
    }
    .tweet p:first-child {
        margin: 0;
        padding: 30px 30px 0;
    }
    .tweet p:last-child {
        margin: 0;
        padding: 15px 30px 0;
    }
    .tweet-link {
        color: #4fc4f6;
    }
    .middle-container .social {
        height: 190px;
        background: #1f253d;
    }
    .middle-container .social li {
        margin-bottom: 12px;
    }
    .middle-container .social a {
        line-height: 60px;
    }
    .middle-container .social a:hover {
        text-decoration: none;
    }
    .middle-container .social .titular {
        border-radius: 5px;
    }
    .middle-container .social .facebook {
        background: #3468af;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .middle-container .social a:hover .facebook {
        background: #1a4e95;
    }
    .middle-container .social a:hover .icon.facebook {
        background: #3468af;
    }
    .middle-container .social .twitter {
        background: #4fc4f6;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .middle-container .social a:hover .twitter {
        background: #35aadc;
    }
    .middle-container .social a:hover .icon.twitter {
        background: #4fc4f6;
    }
    .middle-container .social .googleplus {
        background: #e64c65;
        -webkit-transition: background .3s;
        transition: background .3s;
    }
    .middle-container .social a:hover .googleplus {
        background: #cc324b;
    }
    .middle-container .social a:hover .icon.googleplus {
        background: #e64c65;
    }
    .middle-container .social .icon {
        float: left;
        width: 60px;
        height: 60px;
        text-align: center;
        font-size: 20px;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
    }

    .label {
        display: block; /* Отображать как блоковый элемент, чтобы текст был на новой строке */
        text-align: center; /* Выравнивание текста по центру */
        color: #9099b7; /* Цвет текста */
        font-size: 0.75em; /* Размер шрифта меньше, чем у числа */
        margin-top: 4px; /* Отрицательный отступ сверху, если необходимо поднять текст ближе к числу */
    }

    .profile-options a p {
        margin-bottom: 0; /* Removes the bottom margin from the <p> tag */
    }


    /********************************************* RIGHT CONTAINER ****************************************/
    .right-container {}
    .introduction {
        background: #394264; /* Цвет фона блока, соответствующий вашему дизайну */
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 25px; /* Отступ снизу для отделения блоков друг от друга */
    }

    .introduction .titular {
        color: #fff;
        margin-bottom: 15px; /* Отступ снизу заголовка */
    }

    .introduction-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .introduction-list li {
        line-height: 1.6; /* Высота строки для элементов списка */
        color: #fff; /* Цвет текста */
        padding-left: 10px; /* Отступ для иконок */
        position: relative; /* Для позиционирования иконок */
    }

    .introduction-list .icon {
        position: absolute; /* Абсолютное позиционирование иконок */
        left: 0; /* Позиция слева */
        top: 50%; /* Центрирование иконки по вертикали */
        transform: translateY(-50%); /* Точное центрирование иконки по вертикали */
        color: #11a8ab; /* Цвет иконки */
    }

    .highlight {
        color: #11a8ab; /* Цвет выделения для некоторых элементов текста */
    }


</style>