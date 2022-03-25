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
$pid = @!empty($_GET['pid'])? $_GET['pid']:0;;

// $sitePpost = $autopost->site_to_post;
// $k = array_rand($sitePpost);
// $blogRand = $sitePpost[$k];
$blogRand = !empty($query_fb->wp_url)? $query_fb->wp_url : '';
$wp_cate = '';

<<<<<<< HEAD
// $sitePpost = $autopost->site_to_post;
// $k = array_rand($sitePpost);
// $blogRand = $sitePpost[$k];
$blogRand = !empty($query_fb->wp_url)? $query_fb->wp_url : '';
$site = @$_GET['site'];
$action = @$_GET['action'];
$imgid = @$_GET['imgid'];
=======
$site = @$_GET['site'];
$action = @$_GET['action'];
$imgid = @$_GET['imgid'];
$story_fbid = @$_GET['fbid'];

>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
if(!empty($site)) {
    $blogRand = $site;
}
//$labels = [];

if(!empty($share_mode_data->option_a)) {
    $option_a = $share_mode_data->option_a;
    $option_b = $share_mode_data->option_b;
    $option_c = $share_mode_data->option_c;
} else {
    $option_a = '';
    $option_b = '';
    $option_c = '';
}
if($action != 'shareLinkToProfile' ) {
    echo '<meta http-equiv="refresh" content="30">';
}
if($action == 'shareToGroup' ) {
    if(empty($group_list)) {
        echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/close";}, 3 );</script>';
            die;
    }
    $count = @!empty($_GET['count'])? $_GET['count']:0;
    if((count($group_list) != $count)) {
        $GroupName = $group_list[$count]->sg_name;
        $GroupID = $group_list[$count]->sg_page_id;
    }
    if(!empty($count)) {
        if((count($group_list) == $count)) {
            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/close";}, 3 );</script>';
            die;
        }
    }
}
<<<<<<< HEAD
=======
if($action == 'shareToPage' ) {
    $count = @!empty($_GET['count'])? $_GET['count']:0;
    if((count($page_list) != $count)) {
        if(@$query_fb->id == $page_list[$count]->sg_page_id && $option_a!='sh_as_business') {
            $count = $count + 1;
            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?action=shareToPage&pid='.$pid.'&fbid='.$story_fbid.'&count='.$count.'";}, 3 );</script>';
            die;
        } else {
            $pageName = $page_list[$count]->sg_name;
            $pageID = $page_list[$count]->sg_page_id;
        }
    }
    if(!empty($count)) {
        if((count($page_list) == $count)) {
            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?action=shareToGroup&pid='.$pid.'";}, 3 );</script>';
            die;
        }
    }
}
if($action == 'photopageshare' ) {
    $count = @!empty($_GET['count'])? $_GET['count']:0;
    $pageName = @$page_list[$count]->sg_name;
    $pageID = @$page_list[$count]->sg_page_id;
    if($query_fb->pageType =='profile' && $count == 1 || empty($pageID)) {
        echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?action=shareToGroup";}, 3 );</script>';
        die;
    }
    if(!empty($count)) {
        if(@$query_fb->id == $page_list[$count]->sg_page_id) {
            $count = $count + 1;
            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?action=photopageshare&count='.$count.'";}, 3 );</script>';
            die;
        } else {
            $pageName = $page_list[$count]->sg_name;
            $pageID = $page_list[$count]->sg_page_id;
        }
        if((count($page_list) == $count)) {
            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?action=shareToGroup";}, 3 );</script>';
            die;
        }
    }
}

>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
if(!empty($post)) {
    $pConent = json_decode($post[0]->p_conent);
    $content = html_entity_decode(html_entity_decode(stripslashes(trim($pConent->message))));
    $content = preg_replace("/<p[^>]*>(?:\s|&nbsp;)*<\/p>/", '', $content); 
    $content = preg_replace("/<[\/]*div[^>]*>/i", "", $content); 
    $content = preg_replace('/<!--(.|\s)*?-->/', '', $content); 
    preg_match_all('/\[youtube id="(.*?)"\]/i', $content, $matches, PREG_SET_ORDER);
    if ( !empty( $matches ) && !empty( $matches[0] ) && !empty( $matches[0][1] ) ) {
      foreach( $matches as $k=>$v ) {
        $embeded_code = '<p>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</p> <iframe width="727" height="409" src="https://www.youtube.com/embed/'.$v[1].'" title="YouTube video player" frameborder="0"></iframe> <p>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​</p>';
        $content = str_replace($v[0], $embeded_code, $content);
      }
    }

    $pSchedule = json_decode($post[0]->p_schedule);
<<<<<<< HEAD
    $titles = html_entity_decode(str_replace('\\', '', $post[0]->p_name));
    $titles = preg_replace('/\s+/', '<sp>', $titles);
    //echo $titles;die;
=======
    $pConent = json_decode($post[0]->p_conent);
    if(empty($link) && $action == 'postwp'):
        $titles = html_entity_decode(str_replace('\\', '', trim($post[0]->p_name)));
        // $titles = preg_replace('/\s+/', '<sp>', $titles);
        // $titles = preg_replace('/[\s]+/mu', '<sp>', $titles);
        // $titles = str_replace("&nbsp;", "<sp>", $titles);
        // $titles = str_replace(" ", "<sp>", $titles);
    else:
        if(!empty($pConent->name)) {
            $titles = html_entity_decode(str_replace('\\', '', trim($pConent->name)));
        } else {
            $titles = html_entity_decode(str_replace('\\', '', trim($post[0]->p_name)));
        }
        // $titles = preg_replace('/\s+/', '<sp>', $titles);
        // $titles = preg_replace('/[\s]+/mu', '<sp>', $titles);
        // $titles = str_replace("&nbsp;", "<sp>", $titles);
        // $titles = str_replace(" ", "<sp>", $titles);
    endif;
    $titles = str_replace("​&​q​u​o​t​;", '"', $titles);
    $titles = str_replace("&nbsp;", '"', $titles);
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
    $pid = $post[0]->p_id;
    $content = htmlentities($content);

    $content = str_replace('/\n/g', '<br>', $content);
    $content = trim(preg_replace('/\s+/', '<sp>', $content));    
    $thumb = $pConent->picture;
    
    $postLink = $pConent->link;
    //$content = '<p><img src="'.$thumb.'"/></p>' . $content;
<<<<<<< HEAD
    $labels = @$pSchedule->label;
=======
    $setLabels = @$pSchedule->label;
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
    if(preg_match('/บน-ล่าง/', $post[0]->p_name) || preg_match('/เลข/', $post[0]->p_name) || preg_match('/งวด/', $post[0]->p_name) || preg_match('/หวย/', $post[0]->p_name) || preg_match('/ปลดหนี้/', $post[0]->p_name) || preg_match('/Lotto/', $post[0]->p_name) || preg_match('/Lottery/', $post[0]->p_name))  {
        $setLabels = 'lotto';
    }

<<<<<<< HEAD
    if(!empty($labels)) {
        switch ($labels) {
=======
    if(!empty($setLabels)) {
        switch ($setLabels) {
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
            case 'news':
                if($blogRand == 'https://www.jc24news.com/') {
                    $labels = '1';
                } else if($blogRand == 'https://www.bz24news.com/') {
                    $labels = '2';
                } else {
                    $labels = '1';
                }
                break;
            case 'lotto':
                if($blogRand == 'https://www.jc24news.com/') {
                    $labels = '13';
                } else if($blogRand == 'https://www.bz24news.com/') {
                    $labels = '3';
                } else {
                    $labels = '13';
                }
                break;
            case 'entertainment':
                if($blogRand == 'https://www.jc24news.com/') {
                    $labels = '3';
                } else if($blogRand == 'https://www.bz24news.com/') {
                    $labels = '4';
                } else {
                    $labels = '1';
                }
                break;
            default:
                $labels = '1';
                break;
        }
    }
}


if(!empty($query_fb->wp_cate)) {
    $wp_cate = explode(',', $query_fb->wp_cate);
    if(!empty($wp_cate)) {
        for ($i=0; $i < count($wp_cate); $i++) { 
            $labelAr = explode('|', $wp_cate[$i]);
            if(@$labelAr[0] == @$setLabels) {
                $label = $labelAr[1];
            }
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

<?php if($action == 'shareToGroup'):?>
    <input type="hidden" value="<?php echo @$GroupName;?>" id="gName" />
<<<<<<< HEAD
<?php endif;?>

<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
    <code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;CODE: SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 300\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);const XMLHttpRequest = Components.Constructor(&quot;@mozilla.org/xmlextras/xmlhttprequest;1&quot;);var homeUrl = &quot;<?php echo base_url();?>&quot;,add_post_url = &quot;<?php echo @$blogRand;?>&quot;,titles = &quot;&quot;,contents = &quot;&quot;,thumb = &quot;&quot;,pid = &quot;<?php echo @$pid;?>&quot;,labels = [<?php echo @$labels;?>]<?php if(empty($link) && $action == 'uploadimage'):?>,fileupload = &quot;<?php echo @$fileupload;?>&quot;,imgname=&quot;<?php echo @$imgname;?>&quot;,imgext=&quot;<?php echo @$imgext;?>&quot;<?php endif;?>,imgid = &quot;<?php echo @$imgid;?>&quot;,fpid = &quot;<?php echo @$query_fb->id;?>&quot;,pagetype = &quot;<?php echo @$query_fb->pageType;?>&quot;<?php if($action == 'shareToGroup'):?>,count = &quot;<?php echo @$count;?>&quot;<?php endif;?>;</code>
=======
    <input type="hidden" value="<?php echo @$GroupID;?>" id="groupID" />
<?php endif;?>
<?php if($action == 'photopageshare'):?>
    <input type="hidden" value="<?php echo @$photoDetail->text;?>" id="phto_title" />
<?php endif;?>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
    <code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;CODE: SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 300\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);const XMLHttpRequest = Components.Constructor(&quot;@mozilla.org/xmlextras/xmlhttprequest;1&quot;);var homeUrl = &quot;<?php echo base_url();?>&quot;,add_post_url = &quot;<?php echo @$blogRand;?>&quot;,titles = &quot;&quot;,contents = &quot;&quot;,thumb = &quot;&quot;,pid = &quot;<?php echo @$pid;?>&quot;,labels = [<?php echo @$label;?>]<?php if(empty($link) && $action == 'uploadimage'):?>,fileupload = &quot;<?php echo @$fileupload;?>&quot;,imgname=&quot;<?php echo @$imgname;?>&quot;,imgext=&quot;<?php echo @$imgext;?>&quot;<?php endif;?>,imgid = &quot;<?php echo @$imgid;?>&quot;,fpid = &quot;<?php echo @$query_fb->id;?>&quot;,story_fbid = &quot;<?php echo @$story_fbid;?>&quot;,pagetype = &quot;<?php echo @$query_fb->pageType;?>&quot;,count = &quot;<?php echo @$count;?>&quot;,page_share_id = &quot;<?php echo @$pageID;?>&quot;,photos = &quot;<?php echo @$photoDetail->image;?>&quot;;</code>
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
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
    <?php if(empty($link) && $action == 'postwp'):?>
        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/postToWordpress');
    <?php endif;?>
<<<<<<< HEAD
    <?php if(!empty($_GET['pid']) && $action == 'shareToPage'):?>
        setTimeout(function() {
            load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage');
        }, 1000 * 10);
=======
    <?php if(!empty($_GET['pid']) && $action == 'shareLinkToProfile'):?>
        setTimeout(function() {
            <?php if(@$query_fb->pageType =='profile'):?>
            load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToProfile');
            //window.location = "<?php echo base_url();?>wordpress/autopostwp?action=shareToPage&pid=<?php echo @$pid;?>";
            <?php else:?>
                load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToProfile');
                //window.location = "<?php echo base_url();?>wordpress/autopostwp?action=shareToPage&pid=<?php echo @$pid;?>";
            //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
            <?php endif;?>
        }, 1000 * 300);
    <?php endif;?>
    <?php if(!empty($_GET['pid']) && $action == 'shareToPageAsSharer'):?>
    <?php endif;?>
    <?php if(!empty($_GET['pid']) && $action == 'shareToGroupAsSharer'):?>
    <?php endif;?>  
    <?php if(!empty($_GET['pid']) && $action == 'shareToPage'):?>
        setTimeout(function() {
            <?php if(!empty($pageID)):?>
                <?php if($option_a=='sh_as_business'):?>
                    setTimeout(function() {
                        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
                    }, 1000 * <?php if(empty(@$count)):?>3<?php else:?>3<?php endif;?>);
                <?php endif;?>
                <?php if($option_a=='sh_as_sharer'):?>
                    <?php if($option_b=='to_profile'):?>
                        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_mobile');
                    <?php endif;?>
                    <?php if($option_b=='to_group'):?>
                        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharerToGroup');
                    <?php endif;?>
                    <?php if($option_b=='to_page'):?>
                        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharerToPage');
                    <?php endif;?>
                    //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
                <?php endif;?>
                <?php if($option_a=='sh_as_page_direct'):?>
                    //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
                <?php endif;?>
            
            <?php else:?>
                window.location = "<?php echo base_url();?>wordpress/autopostwp?action=shareToGroup&pid=<?php echo @$pid;?>";
            //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
            <?php endif;?>
            //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareLinkToPage_business');
        }, 1000 * <?php if(empty(@$count)):?>3<?php else:?>3<?php endif;?>);
    <?php endif;?>
    <?php if(!empty($_GET['pid']) && $action == 'shareToMainPage'):?>
        setTimeout(function() {
            load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareToMainPage');
        }, 1000 * 3);
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
    <?php endif;?>
    <?php if($action == 'shareToGroup'):?>
        <?php if($option_c=='to_to_group' || $option_c=='to_to_page_to_group'):?>
            load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharePageLastPostToGroup');
        <?php else:?>
            window.location = "<?php echo base_url();?>wordpress/close";
        <?php endif;?>
        // setTimeout(function() {
        //     load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharePageLastPostToGroup');
        //     //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharePageLastPostToPageGroup');
        // }, 1000 * 10);
<<<<<<< HEAD
        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharePageLastPostToGroup');
=======
        //
        
        //load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/sharePageLastPostToGroup_mobile');
        
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
    <?php endif;?>
    <?php if(empty($link) && $action == 'postblog'||empty($link) && $action == 'uploadimage'):?>
        <?php if(!empty($blogRand)):?>
            load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/uploadToWordpress');
        <?php else:?>
            if (confirm('No wp site url set, please go to setting to setup url!')) {
              // Save it!
              window.location.href = '<?php echo base_url();?>/managecampaigns/setting';
            } else {
              // Do nothing!
            }
        <?php endif;?>
<<<<<<< HEAD
=======
    <?php endif;?>
    <?php if($action == 'photopageshare' && !empty($photoDetail->image)): ?>
        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/uploadPhotoToPage');
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
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
                    <input type="text" id="link_1" value="<?php echo @$postLink; ?>" class="form-control post-option" name="link[]" placeholder="URL" onchange="getLink(this);" /> 
                
                    <div class="form-group">
                        <div class="col-md-12 clearfix">
                            <input id="title" type="text" name=""  class="form-control" value="<?php echo htmlspecialchars_decode(@$titles);?>" />
                            <input id="page_title" type="hidden"  class="form-control" value="<?php echo @$query_fb->name;?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 clearfix">
                            <input id="image" onclick="this.focus(); this.select()" type="text" name=""  class="form-control" value="<?php echo @$thumb;?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 clearfix">
                            <textarea onclick="this.focus(); this.select()"  id="contents" rows="5" cols="5" rows="3" name="Prefix" class="form-control"><?php echo @$content;?></textarea>
                        </div>
                    </div>
                    </form>
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
    </script>

    <?php

} else {
    echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>