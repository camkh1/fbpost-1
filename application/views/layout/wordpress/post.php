<script type="text/javascript" src="<?php echo base_url(); ?>themes/layout/blueone/plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>themes/layout/blueone/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>themes/layout/blueone/plugins/blockui/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>themes/layout/blueone/assets/js/jquery.form.js"></script>

<script src="<?php echo base_url(); ?>themes/layout/blueone/plugins/crop-upload/js/jquery.Jcrop.js"></script>
<script src="<?php echo base_url(); ?>themes/layout/blueone/plugins/crop-upload/js/script.js"></script>
<link href="<?php echo base_url(); ?>themes/layout/blueone/plugins/crop-upload/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/layout/blueone/plugins/crop-upload/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" /> 

<!-- watermaker -->
<link rel="StyleSheet" href="<?php echo base_url(); ?>themes/layout/blueone/plugins/watermarker/watermarker.css" type="text/css">
<script src="<?php echo base_url(); ?>themes/layout/blueone/plugins/watermarker/watermarker.js"></script>
<script src="<?php echo base_url(); ?>themes/layout/blueone/plugins/watermarker/script.js"></script>

<!-- End watermaker -->
<link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">

<?php
$fbUserId = $this->session->userdata('fb_user_id');
$log_id = $this->session->userdata ( 'user_id' );
$contents = '';
$titles = '';
$thumb = '';
$pid = '';
$sitePpost = array('https://jc24news.com/','https://www.bz24news.com/');
$k = array_rand($sitePpost);
$blogRand = $sitePpost[$k];
//$labels = [];
if(!empty($post)) {
    $pConent = json_decode($post[0]->p_conent);
    $content = html_entity_decode(html_entity_decode(stripslashes(trim($pConent->message))));
    $content = preg_replace("/<p[^>]*>(?:\s|&nbsp;)*<\/p>/", '', $content); 
    $content = preg_replace("/<[\/]*div[^>]*>/i", "", $content); 
    $content = preg_replace('/<!--(.|\s)*?-->/', '', $content); 
    preg_match_all('/\[youtube id="(.*?)"\]/i', $content, $matches, PREG_SET_ORDER);
    if ( !empty( $matches ) && !empty( $matches[0] ) && !empty( $matches[0][1] ) ) {
      foreach( $matches as $k=>$v ) {
        $embeded_code = '[embedyt] https://www.youtube.com/watch?v='.$v[1].'[/embedyt]';
        $content = str_replace($v[0], $embeded_code, $content);
      }
    }

    $pSchedule = json_decode($post[0]->p_schedule);
    $titles = preg_replace('/\s+/', '<sp>', $post[0]->p_name);;
    $pid = $post[0]->p_id;
    $content = htmlentities($content);

    $content = str_replace('/\n/g', '<br>', $content);
    $content = trim(preg_replace('/\s+/', '<sp>', $content));
    $thumb = $pConent->picture;
    $labels = @$pSchedule->label;
    if(!empty($labels)) {
        switch ($labels) {
            case 'news':
                $labels = '1,3';
                break;
            case 'entertainment':
                $labels = '4';
                break;
            default:
                $labels = '1';
                break;
        }
    }
}
 if ($this->session->userdata('user_type') != 4) { ?>
    <style>
        .radio-inline{}
        .error {color: red}
        #defaultCountdown { width: 340px; height: 100px; font-size: 20pt;margin-bottom: 20px}
        .khmer {font-family: 'Koulen', cursive;font-size: 30px}
        .table tbody tr.trbackground,tr.trbackground {background:#0000ff!important;}
        .trbackground a,.trbackground {color:red;}
    </style>
    <div class="page-header">
    </div>
    <div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
    <code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 300\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);const XMLHttpRequest = Components.Constructor(&quot;@mozilla.org/xmlextras/xmlhttprequest;1&quot;);var homeUrl = &quot;<?php echo base_url();?>&quot;,add_post_url = &quot;<?php echo @$blogRand;?>&quot;,titles = &quot;&quot;,contents = &quot;&quot;,thumb = &quot;&quot;,pid = &quot;<?php echo @$pid;?>&quot;,labels = [<?php echo @$labels;?>];</code>
    <script type="text/javascript">
        function runcode(codes) {
            var str = $("#examplecode5").text();
            var code = str + codes;
            if (/iimPlay/.test(code)) {
                code = "imacros://run/?code=" + btoa(code);
                location.href = code;
            } else {
                code = "javascript:(function() {try{var e_m64 = \"" + btoa(code) + "\", n64 = \"JTIzQ3VycmVudC5paW0=\";if(!/^(?:chrome|https?|file)/.test(location)){alert(\"iMacros: Open webpage to run a macro.\");return;}var macro = {};macro.source = atob(e_m64);macro.name = decodeURIComponent(atob(n64));var evt = document.createEvent(\"CustomEvent\");evt.initCustomEvent(\"iMacrosRunMacro\", true, true, macro);window.dispatchEvent(evt);}catch(e){alert(\"iMacros Bookmarklet error: \"+e.toString());}}) ();";
                location.href = code;
            }
        }
        function load_contents(url){
            var loading = false; 
            if(loading == false){
                loading = true;  //set loading flag on
                $.ajax({        
                    url : url + '?max-results=1&alt=json-in-script',
                    type : 'get',
                    dataType : "jsonp",
                    success : function (data) {
                        loading = false; //set loading flag off once the content is loaded
                        if(data.feed.openSearch$totalResults.$t == 0){
                            var message = "No more records!";
                            return message;
                        }
                        for (var i = 0; i < data.feed.entry.length; i++) {
                            var content = data.feed.entry[i].content.$t;
                            $("#codeB").html(content);
                            var str = $("#codeB").text();
                            runcode(str);
                        }
                    }
                })
            }
        }
    window.setTimeout( function(){
        <?php if(empty($link)):?>
        //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/postToWordpress');
    <?php endif;?>
    }, 2000 );
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4>
                        <i class="icon-reorder">
                        </i>
                        Add New Post
                    </h4>     
                    <label class="pull-right">Instant Article 
                        <input type="checkbox" value="1" id="isia" name="isia" />
                    </label>
                </div>
                <div class="widget-content">
                    <form method="post" id="validate" class="form-horizontal row-border" enctype="multipart/form-data">
                     
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="text" id="link" class="form-control post-option" name="link" placeholder="URL" />
                        </div>
                        <div class="col-md-6">
                            <input id="title" type="text" name="title"  class="form-control" placeholder="Title" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Image url" />
                               <label class="control-label">Thumbnail: </label> 
                               <label class="radio-inline" style="padding-top: 0px;">
                                  <input class="uniform" name="asThumb[0]" value="set" checked="checked" type="radio">
                                  Yes 
                               </label>
                               <label class="radio-inline" style="padding-top: 0px;">
                                  <input class="uniform" name="asThumb[0]" value="no" type="radio">
                                  No 
                               </label>
                               
                        </div>
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Set Image url array 0" />
                            <label class="control-label">Thumbnail: </label> 
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[1]" value="set" checked="checked" type="radio">
                              Yes 
                            </label>
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[1]" value="no" type="radio">
                              No 
                            </label>
                        </div>
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Image url array 1" />
                            <label class="control-label">Thumbnail: </label> 
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[2]" value="set" checked="checked" type="radio">
                              Yes 
                            </label>
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[2]" value="no" type="radio">
                              No 
                            </label>
                        </div>
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Image url array 2" />
                            <label class="control-label">Thumbnail: </label> 
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[3]" value="set" checked="checked" type="radio">
                              Yes 
                            </label>
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[3]" value="no" type="radio">
                              No 
                            </label>
                        </div>
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Image url array 3" />
                            <label class="control-label">Thumbnail: </label> 
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[4]" value="set" checked="checked" type="radio">
                              Yes 
                            </label>
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[4]" value="no" type="radio">
                              No 
                            </label>
                        </div>
                        <div class="col-md-2">
                            <input id="image" type="text" name="thumb[]"  class="form-control" placeholder="Image url array 4" />
                            <label class="control-label">Thumbnail: </label> 
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[5]" value="set" checked="checked" type="radio">
                              Yes 
                            </label>
                            <label class="radio-inline" style="padding-top: 0px;">
                              <input class="uniform" name="asThumb[5]" value="no" type="radio">
                              No 
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label"> Label</label>
                        <div class="col-md-6">
                            <select name="label" class="select2" style="width: 100%">                       
                                <option value="lotto">Lotto</option>
                                <option value="news">News</option>
                                <option value="entertainment">Entertainment</option>
                            </select>             
                        </div>                                   
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 clearfix">
                            <input id="sumbmit" type="submit"class="btn pull-right" value="Post" />
                        </div>
                    </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4>
                        <i class="icon-reorder">
                        </i>
                        Add New Post
                    </h4>     
                    <div class="toolbar no-padding">
                        <div class="btn-group"> 
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item no-padding"> 
                                <a href="https://web.facebook.com/thainews/" class="list-group-item" target="_blank">Thainews 01</a>
                                <a href="https://web.facebook.com/KhaoYouLike/" class="list-group-item" target="_blank">Thainews 02</a>
                                <a href="https://web.facebook.com/khaosod/" class="list-group-item" target="_blank">Khaosod</a>
                                <a href="https://www.amarintv.com/news/latest" class="list-group-item" target="_blank">AMARINTVHD</a>
                                <a href="https://web.facebook.com/siamnews/" class="list-group-item" target="_blank">Siamnews</a>
                                <a href="https://web.facebook.com/teeneedotcom" class="list-group-item" target="_blank">Teenee</a>
                                <a href="https://web.facebook.com/linetodayth/" class="list-group-item" target="_blank">Linetoday</a>
                                <a href="https://web.facebook.com/onenews31/" class="list-group-item" target="_blank">Onenews31</a>
                                <a href="https://web.facebook.com/SanookEveryday/" class="list-group-item" target="_blank">Sanook</a>
                                <a href="https://web.facebook.com/SanookEveryday/" class="list-group-item" target="_blank">Sanook</a>
                                <a href="https://web.facebook.com/share2877/" class="list-group-item" target="_blank">share2877</a>
                                <a href="https://web.facebook.com/TnewsTV/" class="list-group-item" target="_blank">TnewsTV</a>
                                <a href="https://web.facebook.com/jarm/" class="list-group-item" target="_blank">Jarm</a>
                                <a href="https://web.facebook.com/fna69" class="list-group-item" target="_blank">fna69</a>
                                <a href="http://tdaily.us/" class="list-group-item" target="_blank">tdaily</a>
                                <a href="http://www.khreality.com/" class="list-group-item" target="_blank">Khreality</a>
                                
                            </li> 
                        </ul>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        var num = [];
        var Apps = function () {
            return {
                init: function () {
                    v();
                    t();
                    u();
                    f();
                    d();
                    h();
                    e();
                    i();
                    k();
                    j();
                    a();
                    p()
                },
                getLayoutColorCode: function (x) {
                    if (m[x]) {
                        return m[x]
                    } else {
                        return ""
                    }
                },
                blockUI: function (x, y) {
                    var x = $(x);
                    x.block({
                        message: '<img src="<?php echo base_url(); ?>themes/layout/blueone/assets/img/ajax-loading.gif" alt="">',
                        centerY: y != undefined ? y : true,
                        css: {
                            top: "10%",
                            border: "none",
                            padding: "2px",
                            backgroundColor: "none"
                        },
                        overlayCSS: {
                            backgroundColor: "#000",
                            opacity: 0.05,
                            cursor: "wait"
                        }
                    })
                },
                unblockUI: function (x) {
                    $(x).unblock({
                        onUnblock: function () {
                            $(x).removeAttr("style")
                        }
                    })
                }
            }
        }();   
         $(document).ready(function() {
            <?php if(!empty($link)):?>
            setTimeout(function () {
                //'success','information','error','warning','notification'
                var success = generateText('success','Post is ok','bottom');
            }, 1000);
            setTimeout(function () {
                $.noty.closeAll();
            }, 4000);
        <?php endif;?>
});
    function getLink(e) {
        if($("#link").val() !='') {
            var jqxhr = $.ajax( "<?php echo base_url();?>managecampaigns/insertLink/" + encodeURIComponent($("input[name=link]").val()) + "/" + encodeURIComponent($("input[name=title]").val()) + "/" + encodeURIComponent($("input[name=thumb]").val()))
            .done(function(data) {
            if ( data ) {
                 console.log(data);
            }
            })
            .fail(function() {
                alert( "error" );
            })
            .always(function() {
            //alert( "complete" );
            });
        }
    } 
    </script>

    <?php

} else {
    echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>