<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_pageTitle; ?></title>
    <meta name="description" content="<?php echo $_pageDescr; ?>"/>
    <meta name="keywords" content="<?php echo $_pageKeywords; ?>"/>
    <link rel="shortcut icon" type="image/ico" href="/quiz-school/qm_header_footer/img/favicon.ico">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no,width=device-width"/>
    <meta property="og:site_name" content="ProProfs Survey Maker">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@proprofs"/>
    <meta property="fb:app_id" content="245239755671229"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();
    </script>
    <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="/api/includes/global/css/bootstrap-min.css?v=58">
    <?php

      if(strpos($_SERVER['REQUEST_URI'], '/survey/browse') !== false) {

        echo '<link rel="canonical" href="https://www.proprofs.com/survey/browse/" />';

        $total_pages=ceil($total_row/$page_size);
        if($this->uri->segment(2,0) == 0)
        {
            echo "<link rel='next' href='https://www.proprofs.com/survey/browse/2' />";
        }elseif($this->uri->segment(2,0)==2){
            echo "<link rel='prev' href='https://www.proprofs.com/survey/browse/' />";
            echo "<link rel='next' href='https://www.proprofs.com/survey/browse/".($this->uri->segment(2,0)+1)."' />";
        }elseif($this->uri->segment(2,0)==$total_pages){
            echo "<link rel='prev' href='https://www.proprofs.com/survey/browse/".($this->uri->segment(2,0)-1)."' />";
        }else{
            echo "<link rel='prev' href='https://www.proprofs.com/survey/browse/".($this->uri->segment(2,0)-1)."' />";
            echo "<link rel='next' href='https://www.proprofs.com/survey/browse/".($this->uri->segment(2,0)+1)."' />";
        }

        echo link_tag('httpdocs/static/css/browse.css?v=1');
    }

    if (strpos($_SERVER['REQUEST_URI'], '/survey/search') !== false) {

        $total_pages=ceil($total_row/$page_size);

        if($this->uri->segment(3,0) == 0)
        {
            echo "<link rel='next' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."/2' />";
        }elseif($this->uri->segment(3,0)==2){
            echo "<link rel='prev' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."' />";
            echo "<link rel='next' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."/".($this->uri->segment(3,0)+1)."' />";
        }elseif($this->uri->segment(3,0)==$total_pages){
            echo "<link rel='prev' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."/".($this->uri->segment(3,0)-1)."' />";
        }else{
            echo "<link rel='prev' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."/".($this->uri->segment(3,0)-1)."' />";
            echo "<link rel='next' href='https://www.proprofs.com/survey/search/".$this->uri->segment(2,0)."/".($this->uri->segment(3,0)+1)."' />";
        }

        echo '<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">';

        echo link_tag('httpdocs/static/css/browse.css?v=1');
    }

    if (strpos($_SERVER['REQUEST_URI'], '/survey/folder') !== false) {
        echo link_tag('httpdocs/static/css/organize_folder.css?v=29');
    }

    if ( (strpos($_SERVER['REQUEST_URI'], '/survey/recent') !== false)) {
    ?>




    <?PHP
    }

    ?>
    <link rel="stylesheet" type="text/css" href="/survey/css/survey-style-all.css?v=13;">
    <a rel="author" href="https://plus.google.com/115671742810361589850/?rel=author"></a>
    <?php //echo link_tag('httpdocs/static/css/bootstrap.min.css?v=1') ?>
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-D2VF" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-D2VF');</script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type='text/javascript'>
        function loadCSS(e, t, n) {
            "use strict";
            var i = window.document.createElement("link");
            var o = t || window.document.getElementsByTagName("script")[0];
            i.rel = "stylesheet";
            i.href = e;
            i.media = "only x";
            o.parentNode.insertBefore(i, o);
            setTimeout(function () {
                i.media = n || "all"
            })
        }

        loadCSS("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,500,700");
        loadCSS("/api/includes/global/popup/survey/css/custom.css?v=11");

    </script>
    <style type="text/css">

    </style>
</head>
<body>
<nav class="header">
    <?php $br_style = ''; $ser_style = '';
    if(strpos($_SERVER['REQUEST_URI'], '/survey/browse') !== false){$br_style = "style='color: #1f1f1f;background-color: #d1d1d1;border-radius: 5px;'"; } else if(strpos($_SERVER['REQUEST_URI'], '/survey/search') !== false) { $ser_style = "style='display:none'";}else{ ?>
    <div class="grey-bg">
        <div class="container">
            <div class="header">
                <div class="quizmenu">
                    <a title="Quiz Maker" href="/quiz-school/">Quiz Maker</a>
                </div>
                <div class="training">
                    <a title="Training Maker" href="/training/">Training Maker</a>
                </div>
                <div class="product-drop">
                    <ul class="nav navbar">
                        <li class="dropdown1">
                            <a class="dropdown-toggle disabled" id="propdown_menu_top">More <span class="caret"></span></a>
                            <ul id="product-menu" class="dropdown-menu1 products" aria-labelledby="propdown_menu_top">

                                <li class="cardspp"><a title="Flashcards" href="/flashcards/"><i class="icon-prds"></i>Flashcards</a>
                                </li>
                                <li class="polls"><a title="polls" href="/poll/"><i class="icon-poll"></i>Poll</a>
                                </li>
                                <li class="showcasepp"><a title="See All" href="/products/"><i class="icon-prds"></i>See
                                        All</a>
                                </li>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="contact-header contact-inter pull-right">
                    <div class="phone-contact grey_bckgd">
                        <span>(855) 776-7763</span>
                        <a href="https://calendly.com/proprofs/survey" target="_blank" class="scheduledemo">Get a
                            Demo</a>
                    </div>
                    <?php
                    if($this->input->cookie('ppUser', false))
                    {
                    ?>
                        <div class="product-drop" style="margin: 0px;">
                            <ul class="nav navbar">
                                <li class="dropdown1">
                                    <a class="dropdown-toggle disabled" id="propdown_menu_top"><?php echo $this->input->cookie('ppUser', false);?><span class="caret"></span></a>
                                    <ul id="product-menu" class="dropdown-menu1 products" aria-labelledby="propdown_menu_top" style="min-width: 160px;">
                                        <li class="myacc"><a title="My Account" href="/survey/myaccount/?login=<?php echo $this->input->cookie('ppUser', false);?>"><i class="myaccimg"></i>&nbsp;&nbsp;My Account</a>
                                        </li>
                                        <li class="logu"><a title="Logout" href="/survey/login.php?op=logout&return=/survey/"><i class="logoutimg"></i>&nbsp;&nbsp;Logout</a>
                                        </li>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    <?php
                    }
                   else{
                    ?>
                        <div class="login-info pull-left">
                            <a href="/survey/login.php?return=/survey/" class="login-sign-btn btn-orange 1" title="Login">Login</a>
                            <a href="/survey/register/" title="Sign Up Free" class="login-sign-btn btn-blue">Sign Up
                                Free</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="navbar-inner">
        <div class="container">
            <div id="logo" class="logo" itemscope="" itemprop="organization" itemtype="https://schema.org/Organization">
                <a href="/survey/" itemprop="url">
                    <img src="/api/includes/global/images/allproductlogo/SURVEY.png" alt="ProProfs Survey Maker"
                         itemprop="image">
                </a>
                <a itemprop="sameAs" href="https://plus.google.com/u/0/+proprofs/posts"></a>
                <a itemprop="sameAs" href="https://www.facebook.com/proprofs"></a>
                <a itemprop="sameAs" href="https://twitter.com/proprofs"></a>
                <a itemprop="sameAs" href="https://www.linkedin.com/company/proprofs"></a>
                <a itemprop="sameAs" href="https://www.youtube.com/user/proprofs1"></a>
                <a itemprop="sameAs" href="https://en.wikipedia.org/wiki/ProProfs"></a>
                <a itemprop="sameAs" href="https://www.wikidata.org/wiki/Q24895697"></a>
            </div>
            <div class=collapse-btn>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span></span>
                </button>
            </div>
            <?php
            if(!$this->input->cookie('ppUser', false))
            {
            ?>
                <a href="/survey/create-a-survey.php" title="Try it Free" class="login-sign-btn btn-blue tryit-free">Try it
                    Free</a>
                <a href="/survey/register/" title="Sign Up Free" class="login-sign-btn btn-blue create-signup">Sign Up
                    Free</a>
            <?php
            }
            ?>
            <style>.help-ask a,.help-fq a,.help-suggestion a,.hlpbu-icon-blog a{border:none;box-sizing:border-box;margin-bottom:6px!important;margin-top:6px!important;padding-left:30px!important;width:100%}.help-fq a{background:url(/api/includes/global/images/qm_help_menu.png) -12px -17px no-repeat rgba(0,0,0,0)}.help-fq a:hover{background:url(/api/includes/global/images/qm_help_menu.png) -12px -64px no-repeat rgba(0,0,0,0)}.help-suggestion a{background:url(/api/includes/global/images/qm_help_menu.png) -12px -300px no-repeat rgba(0,0,0,0)}.help-suggestion a:hover{background:url(/api/includes/global/images/qm_help_menu.png) -12px -347px no-repeat rgba(0,0,0,0)}.help-ask a{background:url(/api/includes/global/images/qm_help_menu.png) -12px -390px no-repeat rgba(0,0,0,0)}.help-ask a:hover{background:url(/api/includes/global/images/qm_help_menu.png) -12px -437px no-repeat rgba(0,0,0,0)}.hlpbu-icon-blog a{background:url(/api/includes/global/images/qm_help_menu.png) -12px -670px no-repeat rgba(0,0,0,0)}.hlpbu-icon-blog a:hover{background:url(/api/includes/global/images/qm_help_menu.png) -12px -717px no-repeat rgba(0,0,0,0)}</style>
            <?php
            if(false)//if($this->input->cookie('ppUser', false))//
            {
            ?>
                <div class="nav-menu menu slide-menu-right">
                    <div class="links" id="cssmenu">
                        <ul class="nav navbar">

                            <li class="dropdown">
                                <a style="margin: 0" class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   title="Help" id="Help" href="https://survey.proprofs.com/home">Help <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Help" style="padding: 0 0 0 12px;margin: 0 0 0 -111px;">
                                    <li class="help-fq"><a href="https://survey.proprofs.com" title="Frequently Asked Questions"> FAQ</a></li>


                                    <li class="help-suggestion"><a href="/suggestions/browse/?category=Survey+Maker" tar="_blank" title="Suggestion Box">Suggestion Box</a></li>
                                    <li class="help-ask"><a href="https://support.proprofs.com/kb/contact.php" title="Ask A Question">Ask A Question</a></li>
                                    <li class="hlpbu-icon-blog"><a href="https://www.proprofs.com/c/category/lms/" target="_blank" title="Blog">Blog</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
            <?php
            } else if( (strpos($_SERVER['REQUEST_URI'], '/survey/report/?title') !== false) || (strpos($_SERVER['REQUEST_URI'], '/survey/report1/?title') !== false) ){
            ?>
                <div class="nav-menu menu slide-menu-right">
                    <div id="create_div" style="float:left; margin-top: 13px; font-size: 14px;">
                        <a href="/survey/manage/?sid=<?=$survey_id?>">
                            <div style="margin-right: 13px;margin-left: 0px;">
                                <span class="new_rcreate_icon"></span>
                                Create
                            </div>
                        </a>
                    </div>
                    <div style="float:left; margin-top: 13px; font-size: 14px;">
                        <a href="/survey/survey_settings.php?id=<?=$survey_id?>">
                            <span style="margin-right: 13px;margin-left: 0px;">
                            <span class="new_rsetting_icon"></span>
                            Settings
                            </span>
                        </a>
                    </div>
                    <div style="float:left; margin-top: 13px; font-size: 14px;">
                        <a href="javascript:void(0)" onclick="Share_info()">
                            <span style="margin-right: 13px;margin-left: 0px;">
                            <span class="new_rshare_icon"></span>
                            Send
                            </span>
                        </a>
                    </div>

                    <div style="float:left; margin-top: 13px; font-size: 14px; width: 88px;margin-right: 8px;">
                        <a href="javascript:void(0)">
                            <span style="margin-right: 13px;margin-left: 0px; color:#4d4d4d ! important;font-weight:bold;">
                            <span class="new_report_icon_blue"></span>
                            Reports
                            </span>
                        </a>
                    </div>
                    <div style="float:left; margin-top: 13px; font-size: 14px;">
                        <a href="/survey/preview.php?title=<?=$requestTitle?>" target="_blank">
                            <span style="margin-right: 13px;margin-left: 0px;">
                            <span class="new_rpreview_icon"></span>
                            Preview
                            </span>
                        </a>
                    </div>
                    <div class="links" id="cssmenu">
                        <ul class="nav navbar" style="padding: 4px 0;">
                            <li class="dropdown">
                                <a style="margin: 0" class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   title="Help" id="Help" href="https://survey.proprofs.com/home">Help <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Help" style="padding: 0 0 0 12px;margin: 0 0 0 -111px;">
                                    <li class="help-fq"><a href="https://survey.proprofs.com" title="Frequently Asked Questions"> FAQ</a></li>

                                    <li class="help-suggestion"><a href="/suggestions/browse/?category=Survey+Maker" tar="_blank" title="Suggestion Box">Suggestion Box</a></li>
                                    <li class="help-ask"><a href="https://support.proprofs.com/kb/contact.php" title="Ask A Question">Ask A Question</a></li>
                                    <li class="hlpbu-icon-blog"><a href="https://www.proprofs.com/c/category/lms/" target="_blank" title="Blog">Blog</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
             <?php
            }else{
            ?>
                <div class="nav-menu menu slide-menu-right">
                    <div class="links" id="cssmenu">
                        <ul class="nav navbar">
                            <li class="lim"><a href="/survey/create-a-survey.php" title="Create A Survey"> Create A Survey</a></li>
                            <li class="dropdown lim">
                                <a <?=$br_style;?> class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                                   title="Browse" id="Browse" href="/survey/browse/">Browse<span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Browse">
                                    <li><a href="/survey/templates/" title="Survey Templates & Examples">Templates</a></li>
                                </ul>
                            </li>
                            <li class="dropdown lim">
                                <a class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   title="Tour" id="Tour" href="/survey/tour/">Tour<span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Tour">
                                    <li><a href="/survey/integrations/" title="Integrations">Integrations</a></li>
                                </ul>
                            </li>
                            <li class="lim"><a href="/survey/signup/business/" title="Pricing">Pricing</a></li>
                            <li class="dropdown lim">
                                <a class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   title="Solutions" id="Solutions" href="/survey/online-questionnaire-software/">Solutions
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Solutions">
                                    <li><a href="/survey/net-promoter-score-survey/" title="NPS Software">NPS Software</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown lim">
                                <a class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   title="Clients" id="Clients" href="/survey/clients/">Clients <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Clients">
                                    <li><a href="/survey/clients/" title="Featured Clients"> Featured Clients</a></li>
                                    <li><a href="/survey/testimonials/" title="Testimonials"> Testimonials</a></li>
                                </ul>
                            </li>
                            <!--<li><a href="https://survey.proprofs.com/home" title="Help">Help</a></li>-->
                            <li class="dropdown">
                                <a style="margin: 0" class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown" title="Help" id="Help" href="https://survey.proprofs.com/home">Help <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="Help" style="padding: 0 0 0 12px;margin: 0 0 0 -2px;">
                                    <li class="help-fq"><a href="https://survey.proprofs.com" title="Frequently Asked Questions"> FAQ</a></li>
                                    <li class="help-suggestion"><a href="/suggestions/browse/?category=Survey+Maker" tar="_blank" title="Suggestion Box">Suggestion Box</a></li>
                                    <li class="help-ask"><a href="https://support.proprofs.com/kb/contact.php" title="Ask A Question">Ask A Question</a></li>
                                    <li class="hlpbu-icon-blog"><a href="https://www.proprofs.com/c/category/lms/" target="_blank" title="Blog">Blog</a></li>
                                </ul>
                            </li>
                            <li class="dropdown products-mobile">
                                <a class="dropdown-toggle disabled" data-hover="dropdown" data-toggle="dropdown"
                                   id="propdown_menu_top2">Products <span class=caret></span></a>
                                <ul id="product_mobile_menu" class="dropdown-menu products"
                                    aria-labelledby="propdown_menu_top2">
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="btns-top pull-right">
                        <?php if($this->input->cookie('ppUser', false)){ ?>
                            <a title="Logout" href="/survey/login.php?op=logout&amp;return=/survey/" class="login-sign-btn btn-orange">Logout</a>
                        <?php } else{ ?>
                            <a href="/survey/login.php?return=/survey/" class="login-sign-btn btn-orange" title="Login">Login</a>
                        <?php } ?>

                        <span id="close"><img src="/chat/img/close-btn.png" alt="close"></span>
                    </div>

                    <div class="search-submit srch-desk" <?=$ser_style;?>>
                        <form method="get" action="/survey/search/" name="searchForm" class="search-box"
                              id="serchsite">
                            <input id="hsearchsite" class="search-txt"
                                   onfocus="if (this.value=='Search Surveys')this.value=''" maxlength="120"
                                   value="Search Surveys" name="search" placeholder="Search Surveys" type="text">
                            <button id="bg-img" class="search-btn" title="Search" type="button" rel="desk" style="margin-left: 0px; width: auto"><img
                                        src="/api/includes/global/images/search.png" class="search-img" alt="search"> <img
                                        src="/api/includes/global/images/close_search.png" class="cross-img" alt="close">
                            </button>
                        </form>
                    </div>

                </div>
            <?php
            }
            ?>

        </div>
    </div>
</nav>
<div style=" border-bottom: 1px solid #EEEEEE;"></div>