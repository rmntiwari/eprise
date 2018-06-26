<?php

if(isset($_COOKIE['ppUser']))
{
	header("Location: https://proprofs.com/survey/user.php?login=".$_COOKIE['ppUser']);
}

$data['_pageTitle'] = 'ProProfs Survey Software - Create Online Surveys';
$data['_pageDescr'] = 'ProProfs Survey Software to create free online surveys. Ideal survey maker with powerful tracking and reporting features.';
$data['_pageKeywords'] = 'survey maker, create a survey, create online surveys, make your own survey, survey questions, survey creator';

$this->load->view('SSI/header', $data);


?>



    <link href="/survey/sm_home_v2/css/style.css?v=28" rel="stylesheet" type="text/css" />
    <link href="/survey/sm_home_v2/css/bootstrap-responsive.css?v=28" rel="stylesheet" type="text/css"/>
<style>
    .banner-con .banner-con-lt {margin-left: auto!important;float: left!important;top: 15px !important;width: auto!important;}
    .banner-bg .banner-img {position: absolute!important;height: 354px!important;bottom: 0!important;left: 30px!important;right: 30px!important;}
    .work-con {width: 100%!important;}
    .about-con { width: 100%!important;}
    .quiz-soft-con {width: 100%!important;}
    .feature-con {width: 100%!important;}
    .banner-con h2 { margin-bottom: 38px!important;}
    .video-btn {top: 25%!important;}
    @media (min-width: 768px){.banner-con .banner-con-rt { margin-top: 55px !important; }}

</style>
<div class="main_con banner-bg">
    <div class="banner-img"> </div>
    <div class="container">
        <div class="banner-con">
            <h1>Create Free Online Survey</h1>
            <h2>Over 50,000+ surveys created. Over 4 million respondents</h2>
            <div class="banner-cn">
                <div class="banner-con-lt">
                    <div class="laptp-desk"> <img src="/survey/sm_home_v2/img/laptop_screen.png" alt="laptop_screen"/></div>
                    <div class="laptp-mob"><img src="/survey/sm_home_v2/img/laptop_tab.png" alt="laptop_tab" class="laptp-tab"/> <img src="/survey/sm_home_v2/img/laptop_mobile.png" alt="" class="laptp-mobile"/></div>
                    <div class="video-frame">
                        <div class="tint"><img src="/survey/sm_home_v2/img/screen_bg.jpg?v=3" alt="screen_bg"/>
                            <div class="ab"></div>
                        </div>
                        <div class="video-btn"><a href="https://www.youtube.com/watch?v=wC7eg6g1WrE" class="popup-youtube" title="ProProfs Survey Maker"><span></span> </a></div>
                    </div>
                </div>
                <div class="banner-con-rt">
                    <ul>
                        <li>Create branded web surveys</li>
                        <li>Analytics and reporting</li>
                        <li>Videos, images and graphics</li>
                        <li>Facebook, Twitter, mobile, iPads</li>

                    </ul>
                    <div class="banner-btn btn-desk"> <a href="http://www.proprofs.com/survey/create-a-survey.php" class="try-btn" title="Try it Free" onClick="$('#loader').show()">Try it Free<span></span></a> <a href="http://www.proprofs.com/survey/tour/" class="tour-btn" title="Take A Tour" style="margin-top:13px;">Take A Tour</a> <img id="loader" src="img/layout/ajax-loader.gif" alt="loading..." style="vertical-align:middle; margin-top:-8px; display:none"> </div>
                    <div class="banner-btn btn-mob"> <a class="try-btn" title="Browse Surveys" href="http://www.proprofs.com/survey/browse/" onClick="$('#loader2').show()">Browse Surveys<span></span> </a> <a class="tour-btn" title="Create A Survey" href="http://www.proprofs.com/survey/create-a-survey.php">Create A Survey</a> <img id="loader2" src="/api/includes/global/images/blue_loader.GIF?v=1" alt="loading..." style="vertical-align:middle; margin-top:-8px; display:none"> </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main_con bdr-e0e0">
    <div class="container">
        <div class="brand-con brands-desk">
            <ul class="bxslider2">
                <li><img src="/survey/sm_home_v2/img/sony.png" alt="sony"/></li>
                <li><img src="/survey/sm_home_v2/img/dell.png" alt="dell"/></li>
                <li><img src="/survey/sm_home_v2/img/cisco.png" alt="cisco"/></li>
                <li><img src="/survey/sm_home_v2/img/dhl.png" alt="dhl"/></li>
                <li><img src="/survey/sm_home_v2/img/yale.png" alt="yale"/></li>
                <li><img src="/survey/sm_home_v2/img/phoenix.png" alt="phoenix"/></li>
                <li><img src="/survey/sm_home_v2/img/sony.png" alt="sony"/></li>
                <li><img src="/survey/sm_home_v2/img/dell.png" alt="dell"/></li>
                <li><img src="/survey/sm_home_v2/img/cisco.png" alt="cisco"/></li>
                <li><img src="/survey/sm_home_v2/img/dhl.png" alt="dhl"/></li>
                <li><img src="/survey/sm_home_v2/img/yale.png" alt="yale"/></li>
                <li><img src="/survey/sm_home_v2/img/phoenix.png" alt="phoenix"/></li>
            </ul>
        </div>
        <div class="brand-con brands-tab">
            <ul>
                <li><img src="/survey/sm_home_v2/img/sony.png" alt="sony"/></li>
                <li><img src="/survey/sm_home_v2/img/dell.png" alt="dell"/></li>
                <li><img src="/survey/sm_home_v2/img/cisco.png" alt="cisco"/></li>
                <li><img src="/survey/sm_home_v2/img/dhl.png" alt="dhl"/></li>
                <li><img src="/survey/sm_home_v2/img/yale.png" alt="yale"/></li>
                <li><img src="/survey/sm_home_v2/img/phoenix.png" alt="phoenix"/></li>
            </ul>
        </div>
    </div>
</div>


<div class="main_con ">
    <div class="container">
        <div class="work-con">
            <h2 class="" style="margin-bottom:0px !important">How it Works</h2>
            <div class="heading-line line" style="width:17%">
                <div class="head-sty"><span></span></div>
            </div>
            <div class="work-flow">
                <div class="row-fluid">
                    <div class="span4">
                        <div class="work-rpt">
                            <div class="work-icon creat-mrg"> <img class="tab-img" src="/survey/sm_home_v2/img/Create_A_Quiz_tab.png" alt="create-quiz"/><img class="desktp-img" src="/survey/sm_home_v2/img/create-quiz.png" alt="create-quiz"/></div>
                            <div class="work-cont">
                                <h4>Create a Survey</h4>
                                <ul>
                                    <li>Select a survey template</li>
                                    <li>Add video, images, graphics</li>
                                    <li>Brand with your logo/colors</li>
                                    <li>Security options</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="work-rpt">
                            <div class="work-icon share-mrg"><img class="tab-img" src="/survey/sm_home_v2/img/Share_Your_Quiz_tab.png" alt="Share_Your_Quiz"/><img class="desktp-img" src="/survey/sm_home_v2/img/share-quiz.png" alt="Share_Your_Quiz"/></div>
                            <div class="work-cont">
                                <h4>Share Your Survey</h4>
                                <ul>
                                    <li>Share on Facebook/Twitter</li>
                                    <li>Embed on your website</li>
                                    <li>Post on blogs</li>
                                    <li>Email/print surveys</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="work-rpt">
                            <div class="work-icon analyz-rslt"> <img class="tab-img" src="/survey/sm_home_v2/img/Analyze_Results_tab.png" alt="Analyze_Results_tab"/><img class="desktp-img" src="/survey/sm_home_v2/img/analyze-result.png" alt="Analyze_Results_tab"/></div>
                            <div class="work-cont">
                                <h4>Analyze Results</h4>
                                <ul>
                                    <li>Survey stats & reports </li>
                                    <li>Instant answers </li>
                                    <li>Visual charts and graphs </li>
                                    <li>Download results </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main_con bg-flwr-pt">
    <div class="container">
        <div class="perfect-con effect7">
            <h2 style="margin-bottom:0px !important">Perfect For</h2>
            <div class="heading-line line" style="width:14%">
                <div class="head-sty" style="background: #f8f8f8 none repeat scroll 0 0 !important;"><span></span></div>
            </div>
            <div class=" row-fluid">
                <div class="perfect-wrap">
                    <div class="span4">
                        <div class="perfect-rpt">
                            <div class="perfct-img1"><img src="/survey/sm_home_v2/img/Business-Surveys.jpg?v=1" alt="Business Surveys"/></div>
                            <div class="perfct-cont">
                                <h5 style="color:#67666a;">Business Surveys</h5>
                                <p>Create online surveys to conduct market research, assess employee feedback, and measure customer satisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="perfect-rpt">
                            <div class="perfct-img1"><img src="/survey/sm_home_v2/img/Classroom-Surveys.jpg" alt="Classroom Surveys"/></div>
                            <div class="perfct-cont">
                                <h5 style="color:#67666a;">Classroom Surveys</h5>
                                <p>Create classroom surveys to gather feedback from students, parents, colleagues and administrators. </p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="perfect-rpt">
                            <div class="perfct-img1"><img src="/survey/sm_home_v2/img/Event-Surveys.jpg?v=1" alt="Event Surveys"/></div>
                            <div class="perfct-cont">
                                <h5 style="color:#67666a;">Event Surveys</h5>
                                <p>Conduct a post event survey to find out if attendees liked the conference, workshop or trade show. </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="main_con ">
    <div class="container">
        <div class="about-con">
            <h2 class="" style="margin-bottom:0px !important">What is ProProfs Survey Maker?</h2>
            <div class="heading-line line" style="width:45%">
                <div class="head-sty"><span></span></div>
            </div>
            <p>ProProfs is a powerful survey tool that can be used by educators, instructors, online marketers and organizations to gather customer feedback, conduct market and demographic research, evaluate course efficacy, and much more. Our Survey Maker supports advanced features such as response grading, detailed survey stats, multiple question types, cross-device compatibility, survey embed facilities, and more. With its simple drag and drop survey creation interface, you can easily edit and reorder survey questions. With ProProfs Survey Maker you can <a href="http://www.proprofs.com/survey/create-a-survey.php" title="create online surveys">create online surveys</a> tailored to the needs of your respondents and get detailed reports that help you to accurately interpret the results. Sharing the report with managers and other stakeholders is also extremely easy. Marketers can use the survey embed code we provide to post the surveys to their blogs or websites. Along with surveys, online marketers can also <a href="http://www.proprofs.com/quiz-school/create-a-quiz.php" title="create online quizzes">create a quiz </a> or <a href="http://www.proprofs.com/polls/create-a-poll.php" title="create online polls">create a poll </a> to boost their marketing efforts. </p>
            <div class="btn-11oader" style="position:relative;"> <a href="http://www.proprofs.com/survey/create-a-survey.php" class="try-btn" title="Try it Free" onClick="$('#loader1').show()">Try it Free</a><a href="http://www.proprofs.com/survey/tour/" class="tour-btn" title="Take A Tour">Take A Tour</a><img id="loader1" src="/api/includes/global/images/blue_loader.GIF?v=1" alt="loading..." style="vertical-align:middle; margin-top:14px;position: absolute;margin-left: 10px; display:none"> </div>
        </div>
    </div>
</div>


<div class="main_con ">
    <div class="container">
        <div class="testimonial-con ">
            <h2 class="" style="margin-bottom:0px !important">Testimonials</h2>
            <div class="heading-line line" style="width:15%">
                <div class="head-sty"><span></span></div>
            </div>
            <div class="main-slider">
                <ul class="bxslider4" data-call="bxslider4" data-options="slideMargin:8, autoReload:true" data-breaks="[{screen:0, slides:1, pager:false}, {screen: 600, slides:2}, {screen: 980, slides:3, moveSlides:1}]">
                    <li>
                        <div class="customer-rpt">
                            <div class="cust-testimonial">
                                <div class="cust-heading">
                                    <blockquote><span>Perfect for Online Market Research </span></blockquote>
                                </div>
                                <div class="cust-review">
                                    <blockquote><span>ProProfs lets you easily add a survey to your website, blog or facebook page. I used it for online market research and it generated valuable data & an ongoing conversation across platforms.</span></blockquote>
                                </div>
                                <a href="/survey/testimonials/" title="Read More" class="read-stdy">Read More</a></div>
                            <div class="arrow-down"></div>
                            <div class="customer-inn-rpt">
                                <div class="customer-inn-img"> <span> <img src="http://www.proprofs.com/survey/sm_home/img/proprofsimage.jpg?v=2" alt="Susan Emmer"/></span></div>
                                <div class="customer-inn-cont">
                                    <h6>Susan Emmer,</h6>
                                    <p>Startup Marketing and Branding Expert</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="customer-rpt">
                            <div class="cust-testimonial">
                                <div class="cust-heading">
                                    <blockquote><span>Impressed with ProProfs Survey Maker!</span></blockquote>
                                </div>
                                <div class="cust-review">
                                    <blockquote><span>I am most impressed with the product. It is simple to use. Everyone should give it a try! </span></blockquote>
                                </div>
                                <a href="/survey/testimonials/" title="Read More" class="read-stdy">Read More</a></div>
                            <div class="arrow-down"></div>
                            <div class="customer-inn-rpt">
                                <div class="customer-inn-img"> <span><img src="http://www.proprofs.com/survey/sm_home/img/spacel.jpg?v=2" alt="Daniel Stein"/></span></div>
                                <div class="customer-inn-cont">
                                    <h6>Prof. Daniel Stein, </h6>
                                    <p>Director of Technology, Touro College</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="customer-rpt">
                            <div class="cust-testimonial">
                                <div class="cust-heading">
                                    <blockquote><span> Excellent Customer Service </span></blockquote>
                                </div>
                                <div class="cust-review">
                                    <blockquote><span>I've been very pleased with the customer service of ProProfs. The customer service executives have always been friendly, understanding and professional in their interactions. Highly recommend their service! </span></blockquote>
                                </div>
                                <a href="/survey/testimonials/" title="Read More" class="read-stdy">Read More</a></div>
                            <div class="arrow-down"></div>
                            <div class="customer-inn-rpt">
                                <div class="customer-inn-img"> <span><img src="/survey/sm_home_v2/img/Bill-Wisell.jpg" alt="Bill-Wisell"/> </span></div>
                                <div class="customer-inn-cont">
                                    <h6>Bill Wisell, </h6>
                                    <p>Health Licensing Coordinator, Nebraska Department of Human and Health Services </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="main_con ">
    <div class="container">
        <div class="quiz-soft-con">
            <h2 style="margin-bottom:0px !important">Online Survey Software</h2>
            <h5 style="background-image:none !important;padding-bottom:0px !important">The World’s Leading Software to Create Online Surveys</h5>
            <div class="heading-line line" style="width:45%">
                <div class="head-sty"><span></span></div>
            </div>
            <div class="quiz-rpt">
                <ul>
                    <li>
                        <div class="quiz-soft-rpt"> <span><img src="/survey/sm_home_v2/img/simple-icon.png?v=3" alt="simple-icon"/></span>
                            <h4>Free & Simple</h4>
                            <p>For all skill levels. No HTML experience or software download required to create questionnaire.</p>
                            <span class="ion-plus "></span> </div>
                    </li>

                    <li class="">
                        <div class="quiz-soft-rpt"> <span><img src="/survey/sm_home_v2/img/brand-icon.png" alt="brand-icon"/></span>
                            <h4>Customize Your Brand</h4>
                            <p>Host surveys on ProProfs or customize with your logo and colors or embed on your website. </p>
                            <span class="ion-plus desk-plus"></span> </div>
                    </li>
                    <li class="">
                        <div class="quiz-soft-rpt bdr-nt"> <span><img src="/survey/sm_home_v2/img/security-icon.png" alt="security-icon"/></span>
                            <h4>Security Controls</h4>
                            <p>Keep your online surveys secure and confidential with passwords, privacy controls and more. </p>
                        </div>
                    </li>

                    <li class="mr-tp10">
                        <div class="quiz-soft-rpt bdr-bt-nt"> <span><img src="/survey/sm_home_v2/img/Analytics_icon1.png" alt="analytics-icon"/></span>
                            <h4>Superb Analytics</h4>
                            <p>Get real time data collection, generate detailed reports, and track results. </p>
                            <span class="ion-plus mob-plus"></span> </div>
                    </li>
                    <li class="mr-tp10">
                        <div class="quiz-soft-rpt bdr-bt-nt"> <span><img src="/survey/sm_home_v2/img/share_icon.png" alt="prevent-icon"/></span>
                            <h4>Easily Share Questionnaires </h4>
                            <p>Online surveys are all Facebook, Twitter, iPad and mobile compliant. Share across one or all social networks and platforms. </p>
                        </div>
                    </li>
                    <li class="mr-tp10">
                        <div class="quiz-soft-rpt bdr-nt bdr-bt-nt"> <span><img src="/survey/sm_home_v2/img/quiz-template-icon.png" alt="survey-template-icon"/></span>
                            <h4>Templates & Question Types</h4>
                            <p>Easily <a href="/survey/create-a-survey.php">create online surveys</a> in minutes with our many professional templates and large variety of question types.</p>
                        </div>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="main_con bg-f5f5f5">
    <div class="container">
        <div class="feature-con">
            <h3>We've Received Great Press & Awards!</h3>
            <ul class="press-con">
                <li><img src="/survey/sm_home_v2/img/mashable-press.png" alt="mashable-press"/></li>
                <li><img src="/survey/sm_home_v2/img/journal.png" alt="journal"/></li>
                <li><img src="/survey/sm_home_v2/img/sej.png" alt="sej"/></li>
                <li><img src="/survey/sm_home_v2/img/yahoo-news.png" alt="yahoo-news"/></li>
                <li><img src="/survey/sm_home_v2/img/killer-start.png" alt="killer-start"/></li>
            </ul>
        </div>
    </div>
</div>
    <script>
       /* checkCookie();
        function checkCookie() {
            var username=getCookie("ppUser");
            console.log("Welcome again " + username);
            if (username!="") {
                window.location = "http://proprofs.com/survey/user.php?login="+username;
            }
        }
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }*/
    </script>

<?php $this->load->view('SSI/footer'); ?>