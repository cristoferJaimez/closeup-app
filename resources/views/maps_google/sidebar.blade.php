@if (auth()->user()->id === 1)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/data_mercado/index.js') }}"></script>
    <style>
        body {
            overflow: hidden;
        }

        .sidr {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgb(255, 255, 255);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidr a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidr a:hover,
        .offcanvas a:focus {
            color: #f1f1f1;
        }

        .sidr .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .sidr .sidr-inner {
            padding: 0 0 15px
        }

        .sidr .sidr-inner>p {
            margin-left: 15px;
            margin-right: 15px
        }

        .sidr.right {
            left: auto;
            right: -260px
        }

        .sidr.left {
            right: auto
        }

        .sidr h1,
        .sidr h2,
        .sidr h3,
        .sidr h4,
        .sidr h5,
        .sidr h6 {
            font-size: 18px;
            font-weight: normal;
            margin: 0 0 10px;
            color: #fff;
            line-height: 24px;
            text-transform: uppercase;
        }

        .sidr .sidr-widgets {
            float: left;
            width: 100%;
            padding: 0 15px;
        }

        .sidr p {
            font-size: 13px;
            margin: 0 0 12px
        }

        .sidr p a {
            color: rgba(87, 86, 86, 0.9)
        }

        .sidr>p {
            margin-left: 15px;
            margin-right: 15px
        }

        .sidr ul {
            display: block;
            margin: 0 0 15px;
            padding: 0;
        }

        .sidr ul li {
            display: block;
            margin: 0;
        }

        .sidr ul li:hover,
        .sidr ul li.active,
        .sidr ul li.sidr-class-active {}

        .sidr ul li:hover>a,
        .sidr ul li:hover>span,
        .sidr ul li.active>a,
        .sidr ul li.active>span,
        .sidr ul li.sidr-class-active>a,
        .sidr ul li.sidr-class-active>span {
            color: #fff
        }

        .sidr ul li a,
        .sidr ul li span {
            display: block;
            text-decoration: none;
            color: rgb(3, 3, 3);
            font-weight: normal;
            text-transform: capitalize;
            line-height: normal;
        }

        .sidr ul li ul {
            border-bottom: none;
            margin: 0;
            background: rgba(0, 0, 0, 0.3)
        }

        .sidr ul li ul li {
            line-height: 40px;
            font-size: 13px
        }

        .hide-dl-submenu>li {
            display: none;
        }
    </style>
    <div id="sidr" class="sidr left">
        <div class="clearfix clear closebtn">
            <a id="responsive-menu-button2" style="" class="btn" onclick="closeNav()">
                &times;
            </a>
        </div>
        <div id="mobile-header2">

        </div>
        <div class="clearfix clear"></div>

        <div class="kf-sidebar">
            <div class="row">
                <!--DL Menu Start-->
                <div id="kode-responsive-navigation" class="dl-menuwrapper ">
                    <img class="img-thumbnail rounded mx-auto d-block" src="{{ auth()->user()->avatar }}"
                        alt="{{ auth()->user()->name }}" width="120" height="120">
                    <div class="text-center">
                        <p><i>{{ auth()->user()->name }}</i></p>
                    </div>
                    <ul class="dl-menu hide-dl-submenu">
                        <li class="submenu ">
                            <h6><a class="text-left fs-5 text-info" style="cursor: pointer"><i
                                        class="fa-solid fa-circle-info"></i> GEO<i class="fa-solid fa-globe"></i>UTC</a>
                            </h6>
                            <ul>
                                <li><a id="btn_datos" href="#" class="fs-6"
                                        onclick="show_datos_mercado();return false;"> <i class="fa-solid fa-store"></i>
                                        Dastos del Mercado</a></li>
                                <li><a id="btn_datos" href="#" class="fs-6"> <i
                                            class="fa-solid fa-layer-group"></i> Capa de Calor</a>

                                </li>
                                <li><a id="btn_datos" href="#" class="fs-6"
                                        onclick="show_datos_mercado();return false;"> <i
                                            class="fa-solid fa-layer-group"></i> Capa UTC</a></li>
                            </ul>
                        </li>
                    </ul>



                </div>
                <!--DL Menu END-->
            </div>
        </div>
    </div>

    <div id="mobile-header" style="margin: 1px" class="btn" onclick="openNav()">
        <i id="responsive-menu-button"
            style="background-color: #ffffff; border: 1px solid #818181;padding: 7px;-moz-border-radius: 3px;-webkit-border-radius: 3px;"
            class="fa-solid fa-bars"></i>
    </div>

    <script>
        function openNav() {
            document.getElementById("sidr").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("sidr").style.width = "0";
        }
        $("li.submenu > ul").hide()
        $('li.submenu').click(function() {
            $('ul.submenu').not(this).find('ul').hide();
            $(this).find('ul').slideToggle();
        });
        $('li.submenu > ul > li').click(function(e) {
            e.stopImmediatePropagation();
        });
    </script>
@endif
