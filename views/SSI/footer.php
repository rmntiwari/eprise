      <div style="clear:both"></div>

      <script src="/api/includes/global/popup/survey/js/custom.js?v=11"></script>
      <?php
      if (strpos($_SERVER['REQUEST_URI'], '/survey/folder') !== false) {
      ?>
          <script type="text/javascript" src="/flashcards/js/jquery.qtip-1.0.0-rc3.min.js?v=1"></script>
          <script src="/survey/httpdocs/static/js/org_folder.js?v=70"></script>
      <?php
      }
      ?>
      <?PHP
       if ( (strpos($_SERVER['REQUEST_URI'], '/survey/recent') !== false)) {
    ?>
           <script src="//code.jquery.com/jquery-migrate-1.3.0.js"></script>
           <script type="text/javascript" src="/api/fancybox2/jquery.mousewheel-3.0.6.pack.js"></script>
           <script type="text/javascript" src="/api/fancybox2/jquery.fancybox.pack.js?v=2.0.4"></script>
           <link rel="stylesheet" type="text/css" href="/api/fancybox2/jquery.fancybox.css?v=2.0.4" media="screen" />
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />
           <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
           <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
           <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
           <script type="text/javascript" src="/survey/js/jquery.alerts_animate.js?v=4"></script>
           <link type="text/css" rel="stylesheet" media="screen" href="/survey/css/jquery.alerts_animate.css?v=1" />

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <script>
               $("#keyword").keypress(function(){
                   if($(this).val().length+1 > 0)
                   {
                       $("#searchMe").css("display","none");
                       $("#resetSearch").css("display","block");

                   }
               });
               $("#keyword").keydown(function(){
                   if($(this).val().length-1 == 0){
                       $("#searchMe").css("display","block");
                       $("#resetSearch").css("display","none");
                   }
               });
               $("#keyword" ).focus(function() {
                   if($(this).val().length > 0)
                   {
                       $("#searchMe").css("display","none");
                       $("#resetSearch").css("display","block");
                   }
                   $("#keyword").css("background", "#fff");
                   $("#keyword").css("border-right", "0px");
                   $("#searchMe").css("border-left", "0px");
                   $("#resetSearch").css("border-left", "0px");
                   $("#keyword").css( "color", "#5d5d5d");
               });

               $("#keyword").blur(function() {
                   $("#keyword").css( "border", "1px solid #eee" );
                   $("#keyword").css( "border-right", "0px" );
                   $("#searchMe").css( "border", "1px solid #eee" );
                   $("#searchMe").css( "border-left", "0px" );
                   $("#resetSearch").css( "border", "1px solid #eee" );
                   $("#resetSearch").css( "border-left", "0px" );
                   $("#keyword").css( "color", "#c6c6c6" );
               });
               $(function () {
                   $('#keySuccess').click(function ()
                   {
                       $("tr[data-ss-key]").hide();
                       superText = $('#keySuccess').text();
                       $('#dropdownMenu1').html(superText+' <span class="caret"></span>');
                       $('#dropdownMenu1').css('background','#03a678');
                       $("tr[data-ss-key=success]").show();
                   });
                   $('#keyDanger').click(function () {
                       $("tr[data-ss-key]").hide();
                       superText = $('#keyDanger').text();
                       $('#dropdownMenu1').html(superText+' <span class="caret"></span>');
                       $('#dropdownMenu1').css('background','#ef4836');
                       $("tr[data-ss-key=danger]").show();
                   });
                   $('#keyWarning').click(function () {
                       $("tr[data-ss-key]").hide();
                       superText = $('#keyWarning').text();
                       $('#dropdownMenu1').html(superText+' <span class="caret"></span>');
                       $('#dropdownMenu1').css('background','#f39c12');
                       $("tr[data-ss-key=warning]").show();
                   });
                   $('#keyAll').click(function () {
                       superText = $('#keyAll').text();
                       $('#dropdownMenu1').html('Filter supervisions by status'+' <span class="caret"></span>');
                       $('#dropdownMenu1').css('background','none');
                       $("tr[data-ss-key]").show();
                   });
               });
               jQuery.browser = {};
               (function () {
                   jQuery.browser.msie = false;
                   jQuery.browser.version = 0;
                   if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                       jQuery.browser.msie = true;
                       jQuery.browser.version = RegExp.$1;
                   }
               })();
               function over_tt(num)
               {
                   $("#view_icon_change_"+num).attr("src", "/survey/report/images/view_repoet_eye.png");
               }
               function out_tt(num)
               {
                   $("#view_icon_change_"+num).attr("src", "/survey/report/images/view_repoet_eye_hover.png");
               }
               $(function () {
                   $('[data-toggle="tooltip"]').tooltip()
               })
               $(document).on('click','.delete_taken_record',function (){
                   if($('.delete_taken_record:checked').length !=0)
                   {
                       $('.delete_confirm').show();
                   }
                   else
                   {
                       $('.delete_confirm').hide();
                   }

               });
               //Delete icon **##ss
               function confirm_record()
               {
                   var count    =    0;
                   $.each($('.delete_taken_record'), function() {
                       if($(this).is(':checked'))
                       {
                           count++;
                       }

                   });
                   if(count > 0)
                   {
                       showConfirmPop('Deleting a report is permanent!', 'Once deleted, you won\'t be able to get it back.');
                       $(".proceed-btn").click(function()
                       {
                           $.ajax({
                               url:'/survey/recent/delete_report',
                               type:'POST',
                               cache:false,
                               data:$('#recent_report').serialize(),
                               beforeSend:function()
                               {

                               },
                               success:function(data)
                               {
                                  // console.log(data);
                                   var obj = jQuery.parseJSON(data);
                                   $.each(obj, function( index) {
                                      var item= obj[index];
                                       $("#delete_row_"+item).parent().parent().css({"display": "none"});
                                   });

                               },
                               error: function(XMLHttpRequest, exception)
                               {
                                   if (XMLHttpRequest.status == 404)
                                   {
                                       alert('404: Requested page not found.\nPlease try to submit again.');
                                   }
                                   else if (XMLHttpRequest.status == 500)
                                   {
                                       alert('500: Internal Server Error.\nPlease try to submit again.');
                                   }
                                   else if (exception === 'parsererror')
                                   {
                                       alert('Parse error has been occurred.\nPlease try to submit again.');
                                   }
                                   else if (exception === 'timeout')
                                   {
                                       alert("Server detected connection problem.\nPlease try to submit again.");
                                   }
                                   else if (exception === 'abort')
                                   {
                                       alert('Asynchronous request aborted.\nPlease try to submit again.');
                                   }
                                   else  if (XMLHttpRequest.status === 0)
                                   {
                                       alert('Network connection failed.\nPlease try to submit again.');
                                   }
                                   else
                                   {
                                       alert('Uncaught Exception.\nPlease try to submit again.');
                                   }
                               }
                           });
                       });
                   }
                   else
                   {
                       alert("Select atleast one record to delete");
                   }

               }

               $('#resetSearch').on('click', function() {
                   $("#keyword").val("");
                   $("#searchMe").css("display","block");
                   $("#resetSearch").css("display","none");
               });

               //Delete icon **##ss
               $(document).ready(function(){

                   var Otable = $('#employee_grid').DataTable({
                       "bProcessing": true,
                       "serverSide": true,
                       "aoColumnDefs" : [ {
                           'bSortable' : false,
                           'aTargets' : [0,3,6]
                       } ],
                       "oLanguage": {"sProcessing": "Loading...<img src='/survey/report/images/loader.gif' border='0'>"},
                       "columnDefs": [
                           {"className": "dt-center", "targets": "_all"}
                       ],
                       "columns": [
                           { "width": "1%" },
                           { "width": "16%" },
                           null,
                           null,
                           null,
                           null,
                           null
                       ],
                       "ajax":{
                           url:"/survey/recent/recentResponse/<?=$username;?>/<?=$days;?>/",
                           type: "post",
                           dataFilter: function(response){
                               // this to see what exactly is being sent back
                               //console.log(response);
                               return response
                           },
                           error: function(text){
                               $("#employee_grid_processing").css("display","none");
                           }
                       },
                       'order': [[1, 'desc']]
                   });
                   $('#keyword').on('keyup', function () {
                       Otable.search(this.value).draw();
                   });

                   $('#resetSearch').on('click', function() {
                       $("#keyword").val("");
                       $("#keyword").trigger("keyup");
                       $("#searchMe").css("display","block");
                       $("#resetSearch").css("display","none");

                   });

                   $("#chk0").change(function()
                   {
                       var status = this.checked;
                       $('.delete_taken_record').each(function()
                       {
                           if(status==true)
                           {
                               $("#delete_survey").css("display", "block");
                           }
                           else{
                               $('#delete_survey').hide();
                           }
                           this.checked = status;
                       });
                   });

                   $('#download_icon').mouseover(function(){
                       $('#download_icon').css('background-position', '9px -170px');

                   });
                   $('#download_icon').mouseout(function(){
                       $('#download_icon').css('background-position', '9px -137px');

                   })

                   $("#keyword").on('click',function()
                   {
                       $("#keyword").css('border-width','0px 0px 0px 0px !important;');
                       $("#keyword").css('border-style','solid;');
                       $("#keyword").css('border-color','rgb(238, 238, 238)');
                       $("#Search_container_div").css('border-top','1px solid #59a4de');
                       $("#Search_container_div").css('border-right','1px solid #59a4de');
                       $("#Search_container_div").css('border-bottom','1px solid #59a4de');
                       $("#Search_container_div").css('border-left','1px solid #59a4de');
                       $("#Search_container_div").css('margin','0px 0px 0px -4px');

                   });
                   $("#Search_container_div").on('focusout',function()
                   {
                       $("#Search_container_div").css('border-top','1px solid #eee');
                       $("#Search_container_div").css('border-right','1px solid #eee');
                       $("#Search_container_div").css('border-bottom','1px solid #eee');
                       $("#Search_container_div").css('border-left','1px solid #eee');
                   });

                   $("#keyword").css('border-top','1px solid #eee');
                   $("#keyword").css('border-left','1px solid #eee');
                   $("#keyword").css('border-bottom','1px solid #eee');
                   $("#searchMe").css('border-top','1px solid #eee');
                   $("#searchMe").css('border-right','1px solid #eee');
                   $("#searchMe").css('border-bottom','1px solid #eee');
                   $("#searchMe").css('margin','0px 0px 0px -4px');
                   $("#resetSearch").css('border-top','1px solid #eee');	 //border-top-right-radius: 0px;
                   $("#resetSearch").css('border-right','1px solid #eee');
                   $("#resetSearch").css('border-bottom','1px solid #eee');
                   $("#resetSearch").css('margin','0px 0px 0px -4px');
               });
           </script>
           <script type="text/javascript" src="https://malsup.github.io/jquery.blockUI.js"></script>
    <?PHP
    }
    ?>
      <?php include $_SERVER['DOCUMENT_ROOT']."/api/alert-popup/index.php"; ?>
          <script language="javascript" type="text/javascript">
          function checksearch()
          {
              if (document.getElementById('searchsite').value.length == 0)
              {
                  alert('Please enter something to search');
                  return false;
              }
              else
              {   var search = $('#searchsite').val();

                  window.location.href = "<?= base_url('search')?>/"+search;
              }
          }
          $(document).ready(function() {
              $("#searchsite").bind("keydown", function(event) {
                  // track enter key
                  var keycode = (event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode));
                  if (keycode == 13) { // keycode for enter key
                      var search = $('#searchsite').val();
                      window.location.href = "<?= base_url('search')?>/" + search;
                      return false;
                  } else {

                      return true;
                  }
              });
              $("#hsearchsite").bind("keydown", function(event) {
                  // track enter key
                  var keycode = (event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode));
                  if (keycode == 13) { // keycode for enter key
                      var search = $('#hsearchsite').val();
                      window.location.href = "<?= base_url('search')?>/"+search;
                      return false;
                  } else  {
                      return true;
                  }
              }); // end of function
          }); // end of document ready
          </script>

      <div class="main-con bg-dk-grey">
          <footer>
              <div class="container">
                  <div class="footer">
                      <div class="row-fluid">
                          <div class="span8">
                              <div class="footer-menu wd-eihty" style="width: 100%;">
                                  <h3>Quick Access</h3>
                                  <!--<ul>
                                      <li><a href="/products.shtml" title="Products">Products</a></li>
                                      <li><a href="https://www.proprofs.com/c/category/lms/" title="Blog">Blog</a></li>
                                      <li><a href="/about.shtml" title="About Us">About Us</a></li>
                                      <li><a href="/contact.shtml" title="Contact Us">Contact Us</a></li>
                                      <li><a href="/media/" title="Press">Press</a></li>
                                      <li><a href="/sitemap.shtml" title="Sitemap">Sitemap</a></li>
                                      <li><a href="/privacy.shtml" title="Privacy and Terms">Privacy and Terms</a></li>
                                  </ul>-->
								  
									<ul>
										<li><a href="https://www.proprofs.com/quiz-school/online-test-maker/" title="Products">Test Maker</a></li>
										<li><a href="https://www.proprofs.com/quiz-school/online-assessment-software/" title="Blog">Assessment Software</a></li>
										<li style="border-right: 1px solid #898889;"><a href=" https://www.proprofs.com/quiz-school/online-exam-software/" title="Blog">Exam Software</a></li>
										<li><a href="https://www.proprofs.com/survey/" title="Contact Us">Survey Maker</a></li>
										<li><a href="https://www.proprofs.com/survey/net-promoter-score-survey/" title="Press">Net Promoter Score</a></li>
										<li style="border-right: 1px solid #898889;"><a href="https://www.proprofs.com/c/category/lms/" title="Blog">Blog</a></li>
										<li><a href="/policies/privacy/" title="Privacy">Privacy</a></li>
										<li><a href="/policies/terms/" title="Terms">Terms</a></li>
									</ul>

                              </div>
                          </div>

                          <!--<div class="span4">
                              <div class="footer-menu wd-eihty solutions">
                                  <h3>Solutions</h3>
                                  <ul>
                                      <li><a href="/survey/online-questionnaire-software/" title="Online Questionnaire">Online Questionnaire</a></li>
                                  </ul>
                              </div>
                          </div>-->

                          <div class="span4">
                              <div class="footer-menu">
                                  <h3>Newsletter</h3>
                                  <p>ProProfs newsletter brings you helpful articles, free resources, as well news & updates about our products and services. By clicking submit below, you give us your express consent to receive these emails.</p>
                                  <div class="newsletter-srch">
                                      <input type="text" class="news-search" id="news-search" placeholder="Email Address...">
                                      <button class="news-search-btn" id="newslatter_button">Submit</button>
                                      <div class="loder" style="float: right; margin-top: 10px; margin-right: -17px; display: none;">
                                          <img alt="loader" src="/api/includes/global/images/blue_loader.GIF?v=1">
                                      </div>
                                  </div>
                                  <div style="display: none;" class="arrow_box">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="footer-device"></div>
                  </div>
              </div>
              <div class="copyright-bg">
                  <div class="container">
                      <div class="cpyright-con">
                          <p>Copyright &copy; 2005 -
                              2018 ProProfs.com</p>
                          <ul class="social-links">
                              <li><a href="https://www.facebook.com/proprofs" target="_blank" title="Follow us on facebook" class="fb-bg"><i class="icon-facebook55"></i></a></li>
                              <li><a href="https://twitter.com/proprofs" target="_blank" title="Follow us on twitter" class="tweet-bg"><i class="icon-social"></i></a></li>
                              <li><a href="https://plus.google.com/u/0/+proprofs/posts" target="_blank" title="Follow us on Google+" class="google-bg"><i class="icon-google10"></i></a></li>
                              <li><a href="https://www.linkedin.com/company/proprofs" target="_blank" title="Follow us on linkedIn" class="pininterest"><i class="icon-pinterest4"></i></a></li>
                              <li>
                                  <a href="https://www.youtube.com/user/proprofs1" target="_blank" title="Follow us on Youtube" class="youtube-bg"><img src="/api/includes/global/images/youtube.png" class="img_size"></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </footer>
      </div>
      <div id="popup-code"></div>

      <script type="text/javascript">
          [
              '/api/includes/global/js/bootstrap.js?v=4',
              '/api/includes/global/js/jquery.bxslider.min.js?v=3',
              '/api/includes/global/js/survey-header.js?v=2',
          ].forEach(function(src) {
              var script = document.createElement('script');
              script.src = src;
              script.async = false;
              document.head.appendChild(script);
          });
          var solutionlist = $("#Solutions .dropdown-menu").children("li"),
              solutionLinks = [],
              currentWindowLocation = window.location.pathname;
          $.each(solutionlist, function () {
              solutionLinks.push($(this).children("a").attr("href"));
          });

          solutionLinks.push("/survey/tour/"),solutionLinks.push("/survey/"),solutionLinks.push("/survey/online-questionnaire-software/");

          if ((solutionLinks.indexOf(currentWindowLocation)) != -1) {
              $("#popup-code").load('/api/includes/global/popup/survey/index.php');
          }

          if (window.location.pathname.indexOf("/survey/integrations/") > -1) {
              $("#popup-code").load('/api/includes/global/popup/survey/index.php');
          }

          var pageURL = document.referrer;
          if(pageURL != "" && pageURL.indexOf("proprofs.com") == -1){
              setCookie("pp_lpname", "SM", 1);
              setCookie("pp_lpurl", location.pathname, 1);
          }

          function validateEmail(email) {
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
              if( !emailReg.test( email ) ) {
                  return false;
              } else {
                  return true;
              }
          }
          $("#news-search").keypress(function(e)
          {
              if(e.keyCode == 13)
              {
                  $("#newslatter_button").click();
              }
          });
      </script>

      <?PHP
      if ( (strpos($_SERVER['REQUEST_URI'], '/survey/recent') !== false) || (strpos($_SERVER['REQUEST_URI'], '/survey/report/?title') !== false) || (strpos($_SERVER['REQUEST_URI'], '/survey/report1/?title') !== false)) {
      ?>

      <?php }else{?>
      <div id="l2s_trk" style="z-index:99;"></div><script type="text/javascript">   var l2slhight=400; var l2slwdth=350; var l2slay_mnst="#l2snlayer {}"; var l2sminimize=true;    var l2senblyr=true; var l2s_pht=escape(location.protocol); if(l2s_pht.indexOf("http")==-1) l2s_pht='http:'; (function () { document.getElementById('l2s_trk').style.visibility='hidden'; var l2scd = document.createElement('script'); l2scd.type = 'text/javascript'; l2scd.async = true; l2scd.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 's01.live2support.com/js/lsjs1.php?stid=1&jqry=Y&l2stxt='; var l2sscr = document.getElementsByTagName('script')[0]; l2sscr.parentNode.insertBefore(l2scd, l2sscr); })();  </script>
<?php } ?>
      <script>
          (function(h,o,t,j,a,r){
              h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
              h._hjSettings={hjid:666109,hjsv:6};
              a=o.getElementsByTagName('head')[0];
              r=o.createElement('script');r.async=1;
              r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
              a.appendChild(r);
          })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
      </script> <!--<script src="/survey/js/survey-lp.js"></script>-->
      </body>
      </html>