<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>ProProfs: Page Not Found!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="type" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />

    <!-- For tech du -->
    <meta name="verify-v1" content="1LaNJBSfLyMYqf52LkhNHTZwwMvB7zOHoBb1oxOya28=" >
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/api/includes/global/css/bootstrap.css?v=2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/Styles/home180513.css?v=2" media="screen" />
    <link rel="stylesheet" type="text/css" href="/api/includes/global/css/nav.css?v=56">
    <link rel="stylesheet" type="text/css" href="/api/includes/global/css/root-header.css?v=46">
    <link rel="stylesheet" type="text/css" href="/api/css/new_button_style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/api/includes/global/css/bootstrap-responsive.min.css?v=25">

    <script src="/api/includes/global/js/jquery.js"></script>

    <script type='text/javascript'>
        function loadCSS(e, t, n) { "use strict"; var i = window.document.createElement("link"); var o = t || window.document.getElementsByTagName("script")[0]; i.rel = "stylesheet"; i.href = e; i.media = "only x"; o.parentNode.insertBefore(i, o); setTimeout(function () { i.media = n || "all" }) }
        loadCSS("/api/includes/global/css/fonts.css?v=2");

    </script>
    <style>

        ul,ol,li,h1 {color: #444; margin:0;padding:0;}
        ul li, ol li {list-style: none;}


        a {text-decoration: none; color:#3B5998;}
        a:hover {color: #444;}
        a:visited {color:#3B5998;}


        /*** Header Part CSS ***/
        #header{width: 942px; margin: 0 auto; background:#fff; padding:0 10px 0 10px;}
        #login_signup{float:right; margin:25px 0 0 70px;}
        #login_signup ul li{float:left; padding: 1px 20px 1px 20px; padding: 1px 15px\0/; }
        #login_signup ul li a{font-size:1.04em;}
        #login_signup ul li a:hover{color: #444;background:#fff;}
        ul.dropdown li.root_login{font-size:12px;}

        .bodycss{width:100%; margin:0 auto !important; font-family: Helvetica,Arial,Sans-serif;  font-size: 13px; height:auto;}

        #contentcss{background: none repeat scroll 0 0 #FFFFFF; margin: 0 auto; width: 100%; font-family: Helvetica,Arial,Sans-serif;  font-size: 13px}

        .top_navcss{float:left; margin:17px 0 0 37px;}

        .bannrcss{margin-left: -15px; width: 960px; height: 310px; margin-top: 5px; background: none repeat scroll 0 0 #388BD1;}

        .quizcss{ margin-top: 45px; width: 821px; margin:0 auto;}

        .quizcss_1{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;}

        .traincss{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;}

        .pollcss{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;}

        .survcss{float: left; width: 190px; border: 1px solid #FFFFFF;}


        .pquizcss{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;}
        .ptraicss{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;}
        .ppollcss{float: left; width: 190px; margin-right: 20px; border: 1px solid #FFFFFF;;}
        .psurvcss{float: left; width: 190px; border: 1px solid #FFFFFF;}
        .pflashcss{float: left; width: 190px; margin-bottom: 50px;  margin-top: 40px; margin-right: 20px; border: 1px solid #FFFFFF;}
        .pstorecss{float: left; width: 190px; margin-bottom: 50px;  margin-top: 40px; margin-right: 20px; border: 1px solid #FFFFFF;}
        .pknowcss{float: left; width: 190px; margin-bottom: 50px;  margin-top: 40px; margin-right: 20px; border: 1px solid #FFFFFF;}


        .pgamescss{float: left; margin-right: 120px; width: 190px; border: 1px solid #F9F9F9;}
        .psatscss{float: left; width: 190px; margin-right: 125px; border: 1px solid #F9F9F9;}
        .pitcertcss{float: left; width: 190px; border: 1px solid #F9F9F9;}



        .subheadcss{text-align: center; color: #C4C2C2; font-weight: bold; width: 188px; margin-top: 3px;  font-size: 12px;}

        .singleprod_css{float: left; width: 190px; margin-bottom: 50px;  margin-top: 40px; margin-right: 20px; border: 1px solid #FFFFFF;}

        .studentcss{float: left; width: 190px; margin-bottom: 50px;  margin-top: 40px; border: 1px solid #FFFFFF;}

        .text_footr{float: left; margin-left: 88px; width: 235px;}

        .text_sty_resu{float: left; margin-left: 65px; width: 240px;}


        #footer_main {
            background: none repeat scroll 0 0 #E4E4E4;
            width: 100%;
            height:120px;

        }

        .fottr_img_hove
        {
            opacity:0.70;
            filter:alpha(opacity=40);
        }

        .fottr_img_hove:hover
        {
            opacity:1.0;
            filter:alpha(opacity=100);
        }

        .facecss_1
        {
            float: left;
            height: 30px;
            margin-left: 23px;
            margin-right: 3px;
            margin-top: 30px;
            padding: 1px 0 1px 1px;
            width: 32px;
        }

        .gmai_twit_1
        {
            float: left;
            height: 30px;
            margin-left: 10px;
            margin-right: 3px;
            margin-top: 30px;
            padding: 1px 0 1px 1px;
            width: 32px;
        }

        .top_fottr {

            color: #878585;
            float: right;
            font-size: 11px;
            font-weight: bold;
            margin-top:25px;
            width:560px\0/ !important; /*IE 8*/
            width: 560px\9;
            *width: 560px !important; /*IE 7*/
            width:560px\0/ !important; /*IE 9*/
            width: 560px\9;
            *width: 560px !important; /*IE 10*/
        }

        .down_fottr {
            color: #878585;
            font-size: 11px;
            margin-top: 15px;
        }

        .phnunbr {
            color: #000000;
            float: left;
            font-size: 12px;
            font-weight: bold;
        }

        .footer_link .foter_lnk_txt {
            color: #6D6C6C;
            text-decoration: none;
        }

        .footer_link .foter_lnk_txt:hover {
            color: #3B5998;
        }

        #powerdlnk{
            font-family: Arial Bold;
            text-decoration: none;
            color: #AAAAAA;

        }

        .new_powered{
            background: url("img/powerdby_img.png") no-repeat scroll 2px -2px transparent;
            height: 16px;
            padding: 0 0 0 15px;
            color: #AAAAAA;
            float:right;
        }

        .new_powered:hover{
            color:#3B5998;
        }
        .new_powered:hover #powerdlnk{
            color:#3B5998;
        }

        #powrdby_new_footer{
            background: none repeat scroll 0 0 #FFFFFF;
            margin: -1px auto;
            min-height: 50px;
            font-size:12px;
        }

        .footer_link a
        {
            /*font-size: 12px;*/

            color:#6D6C6C;

        }
        .top_footer_link:hover
        {
            color: #3B5998 !important;
        }



        #header_img{ float:left; cursor: pointer; width:158px;}
        #top_navigation{ float:right; margin:0px 0 0 70px;}
        #top_navigation ul li{float:left; padding: 1px 20px 1px 20px; padding: 1px 20px\0/; }
        #top_navigation ul li a{font-size:1.04em; font-weight:bold;}
        #top_navigation ul li a:hover{color: #444;}
        #top_navigation ul li.padrightnone{padding-right:0;}


        #top_navigation_new{ float:right; margin:0px 0 0 70px;}
        #top_navigation_new ul li{float:left; padding: 1px 20px 1px 20px; padding: 1px 20px\0/; }
        #top_navigation_new ul li a{font-size:1.04em; font-weight:bold;}
        #top_navigation_new ul li a:hover{color: #444;}
        #top_navigation_new ul li.padrightnone{padding-right:0;}


        #top_navigation_new_2{ float:right; margin:0px 0 0 70px;}
        #top_navigation_new_2 ul li{float:left; padding: 1px 20px 1px 20px; padding: 1px 20px\0/; }
        #top_navigation_new_2 ul li a{font-size:1.04em; font-weight:bold;}
        #top_navigation_new_2 ul li a:hover{color: #444;}
        #top_navigation_new_2 ul li.padrightnone{padding-right:0;}


        /*----------Top Navigation: Drop Down menu-------------*

        /*
            LEVEL ONE
        */
        ul.dropdown   { position: relative; }
        ul.dropdown li  { font-weight: bold; float: left; zoom: 1; background: #fff; }
        ul.dropdown a:hover { color: #3B5998; }
        ul.dropdown a:active { color: #444; }
        ul.dropdown li a { display: block; padding: 7px 5px 7px 0; color: #3B5998; text-decoration:none;}
        ul.dropdown li:last-child a { border-right: none; } /* Doesn't work in IE */
        ul.dropdown li.hover,
        ul.dropdown li:hover   { background: #fff; color: #3B5998; position: relative; } /* dropdown hover background */
        ul.dropdown li.hover a   { color: #3B5998; text-decoration: none;}
        ul.dropdown li.root{background:none;}
        ul.sub_menu{ margin-top:-5px; margin-left:15px; border:0 !important;}
        ul.sub_menu li{font-size:12px;}
        /*
            LEVEL TWO
        */
        ul.dropdown ul  { visibility: hidden; position: absolute; top: 100%; left: 0; }
        ul.dropdown ul li { font-weight: normal; width:85px; background: #fff; color: #3B5998; float: none; } /* when dropdown show then background use here */
        ul.dropdown ul li.last{}

        /* IE 6 & 7 Needs Inline Block */
        ul.dropdown ul li a { border-right: none; width: 100%; display: inline-block; }

        /*
            LEVEL THREE
        */
        ul.dropdown ul ul 					{ left: 100%; top: 0; }
        ul.dropdown li:hover > ul 			{ visibility: visible; }


        .homelogin{
            float: left; margin-top: 20px; margin-right: 40px; background: none repeat scroll 0 0 #3C8CD4; padding: 5px 12px; border-radius: 4px 4px 4px 4px;
        }

        .homelogin a{color: #3B5998; font-size: 1.04em;  font-weight: bold; text-decoration: none; color: white;}



        .new_new_awesome_sur, .new_new_awesome_sur:visited {
            background: url("../homeimages/alert-overlay.png") repeat-x scroll 0 0 #222222;
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            padding: 5px 10px 6px;
            text-decoration: none;
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
        }
        .new_awesome_sur:hover {
            background-color: #111111;
            color: #FFFFFF;
            text-decoration: none;
        }
        .new_awesome_sur:active {
            top: 1px;
        }
        .small_sur.new_awesome_sur, .small_sur.new_awesome_sur:visited {
            font-size: 11px;
            padding: 5px;
        }
        .new_awesome_sur, .new_awesome_sur:visited, .medium_sur.new_awesome_sur, .medium_sur.new_awesome_sur:visited {
            font-size: 13px;
            font-weight: bold;
            line-height: 1;
            text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
        }
        .lightgray_sur.new_awesome_sur, .lightgray_sur.new_awesome_sur:visited {
            background-color: #E4E4E4;
            border: 1px solid #CCCCCC;
        }
        .lightgray_sur.new_awesome_sur:hover {
            background-color: #F7F7F7;
            border: 1px solid #CCCCCC;
        }
        .blue_sur.new_awesome_sur, .blue_sur.new_awesome_sur:visited {
            background-color: #3C8CD4;
            border: 1px solid #3C8CD4;
        }
        .blue_sur.new_awesome_sur:hover {
            background-color: #3EA9F5;
        }

        .menuhome{ float:left;margin-top: 25px; margin-right: 40px;}

        .menuhome a{color: #3B5998; font-size: 1.04em;  font-weight: bold; text-decoration: none; }

        .menuhome a:hover{color: #444444;}

        .prod_icon{text-align: center; font-size: 17px; font-weight: bold; width: 188px; margin-top: 3px;}

        .prod_icon a{text-decoration: none; color: #6D6C6C;}

        .hoomtool:hover .prod_icon a{color:#3B5998;}

        .onhover:hover .subheadcss{color:#000;}

        .hoomtool:hover .onhoverproduct{color:#000;}

        .ponhover:hover .subheadcss{color:#000;}

        .stud_icon{text-align: left; font-size: 17px; font-weight: bold; width: 188px; margin-top: 3px;}

        .stud_icon a{text-decoration: none; color: #6D6C6C;}

        .hoomtool:hover .stud_icon a{color:#3B5998;}

        .footer_link{float:left;  margin-right: 31px;}
        .footer_link a{text-decoration: none; color: #6D6C6C;}
        .footer_link a:hover{color:#3B5998;}

        .otherlinks{text-decoration: none; color: #C4C2C2;}

        .otherlinks:hover{text-decoration: none; color:#3B5998;}


        div.testiStatement{margin-top:20px;}

        div.pr-testiLeft {float:left; width:400px; padding-left:20px;}
        div.pr-testiRight{float:right; width:400px; padding-right:10px; margin-left:40px;}
        div.pr-testimonialLeft {float:left; width:90px;}
        div.pr-testimonialRight{float:right; width:300px;}
        img.pr-testi-img {width:84px; height:113px; padding:1px; border:1px solid #ccc;}

        div.pr-tetsimonials{-moz-border-radius:8px;-webkit-border-radius:8px; padding:0px; margin-bottom:50px; background-color:#fff; float: left;}

        div.pr-testiHead {
            margin: 0; margin-bottom:10px;
            font-size: 18px; font-weight:bold;
            color: #000;
        }

        div.pr-tetsiContent {
            margin: 0;
            font-size: 13px;
            font-weight: normal;
            color: #444;
        }
        div.pr-testiContentby {
            margin: 0; margin-top:10px;
            font-size: 14px; font-weight:bold;
            text-align:right;
        }

        .testiStatementnew{
            margin-left: 75px;
            margin-top: 30px;
        }

        .sturesource a{
            color: #878585;
            text-decoration: none;
            font-weight:bold;
        }
        .sturesource a:hover{
            color: #3B5998;
        }


        .studentbodycss{background: none repeat scroll 0 0 #E5ECF3; color: #444444;  font-family: Helvetica,Arial,Sans-serif;  font-size: 13px;}
        .studentcontcss{background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #DDDDDD;  margin: 0 auto;  padding: 10px 15px 15px; width: 930px;}
        .studentheadcss{background: none repeat scroll 0% 0% rgb(56, 139, 209); height: 85px; width: 100%; margin-top: 15px;}


        .studmainheadcss{font-size: 29px; font-weight: bold; margin-top: 7px; text-align: center; width: 204px; margin-left: 14px; color: rgb(255, 255, 255);}

        .studmainheadcss_abt{font-size: 29px; font-weight: bold; margin-top: 7px; text-align: center; width: 240px; color: rgb(255, 255, 255);}


        .studsubheadcss{margin-left: 62px; margin-right: 68px; margin-top: 45px; width: 821px;}
        .studsubhead2css{color: #6D6C6C; margin-top: 3px; text-align: justify; margin-right: 18px;  margin-top: 3px;}
        .studentbodyareacss{width: 830px; height: 150px; margin-left: 61px; margin-top: 30px;}
        .studentgamescss{float: left; margin-right: 20px; width: 190px;}
        .studentsatcss{float: left; width: 190px; margin-left: 106px;}

        .onhoverchange{border: 1px solid #FFF;}
        .onhoverchange a{color: #6D6C6C;text-decoration: none;}
        .onhoverchange:hover{border: 1px solid #3B5998;}



        .stud_icon_stu{text-align: left; font-size: 17px; font-weight: bold; width: 188px; margin-top: 3px;}
        .studentgamescss:hover a{color: #3B5998;}
        .studentsatcss:hover a{color: #3B5998;}

        .studentbodyfottr{height: 240px; background-color: #F9F9F9; margin-left: -15px; width: 960px; border-top: 1px solid #CCCCCC;}
        .studentotherfottr{text-align: left; font-size: 17px; font-weight: bold; width: 188px; margin-top: 25px; margin-left: 76px;}
        .studentotheroptn{width: 830px; height: 150px; margin-left: 75px; margin-top: 14px;}

        .studentflashcrd{float: left; margin-right: 20px; width: 190px;}
        .studentflashcrdsub{text-align: center; color: #C4C2C2; font-weight: bold; width: 188px; margin-top: 3px;  font-size: 12px;}


        .studentpollsbot{float: left; width: 190px; margin-left: 106px;}

        .hoomtool{border: 1px solid #F9F9F9;}
        .hoomtool:hover{border: 1px solid #3B5998;}

        .facecss:hover{border: 1px solid #3B5998;}
        .gmai_twit:hover{border: 1px solid #3B5998;}

        .aboutgamecss{float: left; margin-left: 20px; width: 126px; border: 1px solid  #FFFFFF; height: 110px;}

        .aboutsurvcss{float: left; width: 126px; border: 1px solid #FFFFFF; height: 110px;}
        .aboutsurvcsssub{width:125px; height:66px; margin-top:7px;}

        .aboutsurproduct{border: 1px solid #FFFFFF;height: 112px;width: 125px;}
        .aboutsurproductpoll{border: 1px solid #FFFFFF; float: left; height: 112px; width: 125px;}

        .aboutsurproduct:hover{border: 1px solid #3B5998;}
        .aboutsurproductpoll:hover{border: 1px solid #3B5998;}
        .aboutsurvcss:hover{border: 1px solid #3B5998;}
        .aboutgamecss:hover{border: 1px solid #3B5998;}

        .onabthover:hover a{color: #3B5998;}

        .hoomtool_studnt{border: 1px solid #F9F9F9;}
        .hoomtool_studnt:hover{border: 1px solid #3B5998;}
        .hoomtool_studnt:hover .onhoverproduct{color: #444;}
        .hoomtool_studnt:hover a{color: #3B5998;}



        /*------------------------------New Css-------------------------------*/

    </style>
</head>

<body class="bodycss">
<header class="header">
    <div class="navbar-inner">
        <div class="container">
            <div class="logo">
                <a href="http://www.proprofs.com/" title="ProProfs - Delightfully Smart Tools" class="logo"><img src="/pp_responsive_home/img/proprofs-logo-2.png?v=5" alt="proprofs-logo"></a>
            </div>
            <div class="collapse-btn">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span></span>
                </button>
            </div>
            <a href="http://www.proprofs.com/" title="Sign Up Free" class="login-sign-btn btn-blue create-signup">Sign Up Free</a>
            <div class="nav-menu menu slide-menu-right">
                <div class="links" id="cssmenu">
                    <ul class="nav navbar">
                        <li class="dropdown">
                            <a data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" href="/products/">Products <b class="caret mr-lt10"></b></a>
                            <div class="dropdown-menu">
                                <ul class="products">
                                    <li id="quiz"><a title="ProProfs Quiz Maker" href="/quiz-school/">Quiz Maker</a></li>
                                    <li id="training"><a title="ProProfs Training Maker" href="/training/">Training Maker</a></li>
                                    <li id="knowledge"><a title="ProProfs Knowledge Base" href="/knowledgebase/">Knowledge Base</a></li>
                                    <li id="survey"><a title="Survey Maker" href="/survey/">Survey Maker</a></li>
                                    <li id="chat"><a href="https://www.live2support.com/" title="Live Chat Software">Live Chat</a></li>
                                    <li id="project"><a href="http://www.proprofs.com/project/" title=" ProProfs Project">Project</a></li>
                                    <li id="cards"><a title="ProProfs Flashcards" href="/flashcards/">Flashcards</a></li>
                                    <li id="discuss"><a href="http://www.proprofs.com/discuss/" title="ProProfs Discuss">Discuss</a></li>
                                    <li id="games"><a title="ProProfs Brain Games" href="/games/">Brain Games</a></li>
                                    <li id="showcase"><a title="See All" href="/products/">See All</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://www.proprofs.com">ProProfs.com</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a title="Pricing" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" href="pricing.php">Pricing <b class="caret mr-lt10"></b></a>
                            <div class="  dropdown-menu ">
                                <ul>
                                    <li><a title="Quiz" href="/quiz-school/signup/business/">Quiz</a></li>
                                    <li><a title="Quiz + Training" href="/training/signup/business/">Quiz + Training</a></li>
                                    <li><a title="Survey" href="/survey/signup/business/">Survey</a></li>
                                    <li><a title="Knowledge Base" href="/knowledgebase/signup/business/">Knowledge Base</a></li>
                                    <li><a href="https://www.live2support.com/pricing.php" title="Live Chat ">Live Chat</a></li>
                                    <li><a href="http://www.proprofs.com/project/pricing/" title=" ProProfs Project">Project</a></li>
                                    <li><a title="Flashcards" href="/flashcards/signup/business/">Flashcards</a></li>
                                    <li><a title="Polls" href="/polls/signup/business/">Polls</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" title="Solutions">Solutions <b class="caret mr-lt0"></b></a>
                            <div class="solutions dropdown-menu">
                                <div class="dropdwn-row soln-drp sln-lt">
                                    <ul>
                                        <li class="soln-actv"><a href="http://www.proprofs.com/training/solutions/" title="Training"> Training</a></li>
                                        <li><a href="http://www.proprofs.com/training/software/lms-software/" title="Learning Management">Learning Management</a></li>
                                        <li><a href="http://www.proprofs.com/training/software/e-learning-authoring/" title="eLearning">eLearning</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/" title="Employee">Employee</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/online-compliance-training-software/" title="Compliance">Compliance</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/osha-safety-compliance-training/" title="OSHA"> OSHA</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/online-HR-training-course-software/" title="HR">HR</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/online-sexual-harassment-training/" title="Sexual Harassment">Sexual Harassment</a></li>
                                        <li><a href="http://www.proprofs.com/training/employee-training/online-customer-service-training/" title="Customer Service"> Customer Service</a></li>
                                    </ul>
                                </div>
                                <div class="dropdwn-row soln-drp sln-rt">
                                    <ul>
                                        <li class="soln-actv"><a href="http://www.proprofs.com/quiz-school/markets/" title="Quiz"> Quiz</a></li>
                                        <li><a href="http://www.proprofs.com/quiz-school/testing/online-test-maker/" title="Online Test"> Online Test</a></li>
                                        <li><a href="http://www.proprofs.com/quiz-school/exam/online-exam-software/" title="Exam Software">Exam Software</a></li>
                                        <li><a href="http://www.proprofs.com/quiz-school/assessment/online-assessment-software/" title="Online Assessment"> Online Assessment</a></li>
                                        <li><a href="http://www.proprofs.com/quiz-school/markets/education/" title="Teaching">Teaching</a></li>
                                        <li><a href="http://www.proprofs.com/quiz-school/support/how-to/how-to-create-a-personality-quiz/" title="Personality">Personality</a></li>
                                    </ul>
                                </div>
                                <div class="dropdwn-row soln-drp sln-last">
                                    <ul>
                                        <li class="soln-actv"><a href="http://www.proprofs.com/knowledgebase/solutions/" title="Knowledge Base"> Knowledge Base</a></li>
                                        <li><a href="/knowledgebase/integrations/" title="Easily Integrate ProProfs With Other Tools">Integrations</a></li>
                                        <li><a href="/knowledgebase/online-help-authoring-software/" title="Help Authoring Tools">Help Authoring Tools</a></li>
                                        <li><a href="/knowledgebase/context-sensitive-help-software/" title="Context Sensitive Help">Context Sensitive Help</a></li>
                                        <li><a href="/knowledgebase/online-software-documentation/" title="Online Documentation">Online Documentation</a></li>
                                        <li><a href="/knowledgebase/knowledge-management-software/" title="Knowledge Management">Knowledge Management</a></li>
                                        <li><a href="/knowledgebase/wiki-software/" title="Wiki Software">Wiki Software</a></li>
                                        <li><a href="/knowledgebase/self-service-help-center/" title="Self Service Help Center">Self Service Help Center</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" href="http://www.proprofs.com/c/" title="Blogs">Blogs <b class="caret mr-lt10"></b></a>
                            <div class="dropdown-menu ">
                                <ul>
                                    <li><a title="News and Updates" href="/blog/">News and Updates</a></li>
                                    <li><a title="Customer Support" href="/c/category/live-chat/">Customer Support</a></li>
                                    <li><a title="Knowledge Management" href="/c/category/knowledge-base/">Knowledge Management</a></li>
                                    <li><a title="Learning &amp; Training" href="/c/category/lms/">Learning &amp; Training</a></li>
                                    <li><a title="Project Management" href="/c/category/project/">Project Management</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" title="About Us" href="http://www.proprofs.com/about.php">About Us <b class="caret mr-lt10"></b> </a>
                            <div class="dropdown-menu ">
                                <ul>
                                    <li><a title="About" href="http://www.proprofs.com/about.php">About</a></li>
                                    <li><a title="Press" href="http://www.proprofs.com/media/">Press</a></li>
                                    <li><a title="Trust" href="http://www.proprofs.com/trust/">Trust</a></li>
                                    <li><a title="Awards" href="http://www.proprofs.com/awards/">Awards</a></li>
                                    <li><a title="Advertise" href="http://www.proprofs.com/advertise.php">Advertise</a></li>
                                    <li><a title="Why ProProfs" href="http://www.proprofs.com/whyproprofs/">Why ProProfs</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle disabled" title="Contact Us" href="http://www.proprofs.com/contact.php">Contact Us <b class="caret mr-lt10"></b> </a>
                            <div class="dropdown-menu ">
                                <ul>
                                    <li><a title="Contact Us" href="http://www.proprofs.com/contact.php">Contact Us</a></li>
                                    <li><a title="Help" href="http://www.proprofs.com/help/">Help</a></li>
                                    <li><a title="Suggestions" href="http://www.proprofs.com/suggestions/">Suggestions</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btns-top pull-right">
                    <a href="http://www.proprofs.com/" class="login-sign-btn btn-orange" id="login" title="Login">Login</a>

                    <span id="close">
               <img src="/api/includes/global/images/close-btn.png" alt="">
               </span>
                </div>
                <div class="login-info pull-left">
                    <a href="http://www.proprofs.com/" class="login-sign-btn btn-orange"  title="Login">Login</a>
                    <a href="http://www.proprofs.com/"  title="Sign Up Free" class="login-sign-btn btn-blue">Sign Up Free</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="clear"></div>
<div id="contantcss" style="min-height:610px;">

    <div class="studentheadcss" style="background-color: #eeeeee;">
        <br/>
        <div class="container">
            <div class="studmainheadcss_abt" style="width:320px; padding-left:-7px;color: #4d4d4d;">404: Page not Found!</div>
        </div>
    </div>

    <div class="container">
        <div >
            <div style="margin-left:51px;">
                <div style="height: 190px; margin:35px auto 0px;" >

                    <div style="font-family:Arial, Helvetica, sans-serif; font-size:17px;!important">Sorry, that page doesn&rsquo;t exist!<br><br/ >
                        You can try our:<br />
                        <a href="/quiz-school/" title="ProProfs Quiz Maker">Quizzes</a> &nbsp;&bull;&nbsp; <a href="/training/" title="ProProfs Training Maker">Courses &amp; Training</a> &nbsp;&bull;&nbsp; <a href="/polls/" title="ProProfs Poll Maker">Polls</a> &nbsp;&bull;&nbsp; <a href="/survey/" title="ProProfs Survey Maker">Surveys</a>&nbsp;&bull;&nbsp; <a href="http://www.live2support.com/" title="Live Chat">Live Chat</a> &nbsp;&bull;&nbsp; <a href="/project/" title="Project">Project</a> &nbsp;&bull;&nbsp;<a href="/flashcards/" title="ProProfs Flashcard Maker">Flashcards</a>
                        <br /><br />
                    </div>

                </div>

                <br /><br />

                <div id="main_box_area" style="border-bottom: medium none; font-family:Arial, Helvetica, sans-serif; font-size: 17px ! important; line-height: 25px; margin:0 auto; margin-top:-120px;">

                    <script type="text/javascript">
                        var GOOG_FIXURL_LANG = 'en';
                        var GOOG_FIXURL_SITE = 'http://www.proprofs.com/'
                    </script>

                    <script type="text/javascript" src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>

                    <div class="clear"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Footer Start -->
<div id="footer_main ">
    <div class="container">
        <div style="float: left;width: 161px;" class="social">

            <div class="facecss_1 fottr_img_hove">
                <a class="fb" target="_blank" href="http://www.facebook.com/pages/ProProfscom/169501759780505" title="Follow us on facebook"><img src="/homeimages/facebook.png" alt ="facebook" style="border:none;" /></a>
            </div>

            <div class="gmai_twit_1 fottr_img_hove">
                <a class="fb" target="_blank" href="https://plus.google.com/u/0/100447387323693383255/posts" title="Follow us on Google+"><img src="/homeimages/gplus-29.png" alt="google plus" style=" border-radius: 14px 13px 14px 13px; border:none;" /></a>

            </div>



            <div class="gmai_twit_1 fottr_img_hove">
                <a href="http://twitter.com/proprofs" target="_blank" title="Follow us on twitter" class="tt"><img src="/homeimages/twitter.png" alt="twitter" style="border:none;" /></a>
            </div>

        </div>

        <div class="top_fottr">


            <div style="float:left;" class="new_product_txt" ><p><a  class="top_footer_link" href="http://www.proprofs.com/products.shtml" style="text-decoration: none; color:#6D6C6C;" title="Products">Products</a></p>
            </div>

            <div class="footer_link "><p><a  class="top_footer_link" href="http://www.proprofs.com/blog/" style="text-decoration: none; color:#6D6C6C;" title="Blog">Blog</a></p>
            </div>

            <div class="footer_link "><p><a  class="top_footer_link" href="/about.shtml" style="text-decoration: none; color:#6D6C6C;" title="About Us">About Us</a></p>
            </div>

            <div class="footer_link"><p><a  class="top_footer_link" href="/contact.shtml" style="text-decoration: none; color:#6D6C6C;" title="Contact Us">Contact Us</a></p>
            </div>

            <div class="footer_link"><p><a class="top_footer_link" href="http://www.proprofs.com/media/" style="text-decoration: none; color:#6D6C6C;" title="Press">Press</a></p>
            </div>

            <div  class="footer_link"><p><a class="top_footer_link" href="/sitemap.shtml" style="text-decoration: none; color:#6D6C6C;" title="Sitemap">Sitemap</a></p>
            </div>

            <div class="footer_link"><p><a class="top_footer_link" href="/privacy.shtml" style="text-decoration: none; color:#6D6C6C;" title="Privacy and Terms">Privacy and Terms</a></p>
            </div>

            <div class="clear"></div>
            <div class="down_fottr">

                <div style="float: left; "><span style="font-weight:normal;">Copyright &copy; 2005-2013 ProProfs.com</span><span style="border: 1px solid; visibility: hidden;">, Hotchalk Partner </span></div>

                <!--<div style="float: left; margin-right: 10px; visibility:hidden;"><p>Question?</p></div>-->

                <div class="phnunbr" style="float:right; margin-right:28px;"><p>1-855-776-7763</p></div>

            </div>
            <div class="clear"></div>
        </div>

        <div class="clear"></div>



    </div>
</div>
<div class="clear"></div>
<!-- Footer End -->
<div class="clear"></div>
<script src="/api/includes/global/js/jquery.magnific-popup.min.js?v=2"></script>
<script src="/api/includes/global/js/bootstrap.js?v=4"></script>
<script src="/api/includes/global/js/jquery.bxslider.min.js?v=3"></script>
<script src="/api/includes/global/js/header.js?v=38"></script>
<!--For GA Web Page Track-->
<script src="/js/pageTrackerEvent.js"  type="text/javascript" language="javascript" charset="utf-8"></script>
<!--For Form Validation -->
<script src="/api/includes/global/js/header.js?v=38"></script>
<script>
    function redirect_url()
    {
        var target = document.getElementById("redirect").value;
        if(target=='quiz')
        {
            var uri = "/quiz-school/login.php?return=/quiz-school/";
            window.location.href = uri;
        }

        else if(target=='training')
        {
            var uri = "/training/login/?return=/training/";
            window.location.href = uri;
        }

        else if(target=='polls')
        {
            var uri = "/polls/login/";
            window.location.href = uri;
        }

        else if(target=='survey')
        {
            var uri = "/survey/login.php?return=/survey/";
            window.location.href = uri;
        }

        else if(target=='flashcards')
        {
            var uri = "/flashcards/login.php?return=/flashcards/";
            window.location.href = uri;
        }

        else if(target=='games')
        {
            var uri = "/games/login/";
            window.location.href = uri;
        }

        else if(target=='store')
        {
            var uri = "/store/login.php?return=/store/";
            window.location.href = uri;
        }

        else if(target=='knowledgebase')
        {
            var uri = "/knowledgebase/login/?return=/knowledgebase/";
            window.location.href = uri;
        }

        else if(target=='suggestions')
        {
            var uri = "/suggestions/login/?return=/suggestions/";
            window.location.href = uri;
        }

        else
        {

            var uri = "http://www.proprofs.com/";
            window.location.href = uri;
        }
    }

    //alert(document.URL);

    var str=document.URL;
    var quiz = str.search("quiz-school");
    var training = str.search("training");
    var polls = str.search("polls");
    var survey = str.search("survey");
    var flashcards = str.search("flashcards");
    var games = str.search("games");
    var store = str.search("store");
    var knowledgebase = str.search("knowledgebase");
    var suggestions = str.search("suggestions");

    if(quiz>=0)
    {
        document.getElementById("redirect").value='quiz';
    }

    else if(training>=0)
    {
        document.getElementById("redirect").value='training';
    }

    else if(polls>=0)
    {
        document.getElementById("redirect").value='polls';
    }

    else if(survey>=0)
    {
        document.getElementById("redirect").value='survey';
    }

    else if(flashcards>=0)
    {
        document.getElementById("redirect").value='flashcards';
    }

    else if(games>=0)
    {
        document.getElementById("redirect").value='games';
    }

    else if(store>=0)
    {
        document.getElementById("redirect").value='store';
    }

    else if(knowledgebase>=0)
    {
        document.getElementById("redirect").value='knowledgebase';
    }

    else if(suggestions>=0)
    {
        document.getElementById("redirect").value='suggestions';
    }
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-250464-1']);
    _gaq.push(['_trackPageview','/404error/?url=' + document.location.pathname + document.location.search + '&ref=' + document.referrer]);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

</body>
</html>



