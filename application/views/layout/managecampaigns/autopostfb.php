<?php if ($this->session->userdata('user_type') != 4) { ?>
 <style>
    .butt,.butt:hover {color: #fff}
    .radio-inline{}
    .error {color: red}
    #blockuis{padding:10px;position:fixed;z-index:99999999;background:rgba(0, 0, 0, 0.73);top:20%;left:50%;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);}
    .khmer {font-family: 'Hanuman', serif;font-size: 30px}
</style>
<div class="page-header">
    <div class="page-title">
        <h3>
                <?php if (!empty($title)): echo $title; endif; ?>
            </h3>
    </div>
</div>
<div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
<?php
if(!empty($post)) {
    $pConent = json_decode($post->p_conent);
    $gArr = ['2114780255405136','232929570754486','252902385537984'];
    $k = array_rand($gArr);
    $gid = $gArr[$k];
}
?>
<script type="text/javascript">
        function runcode(codes,action) {
            if(!action) {
                var str = $("#examplecode5").text();
            }
            if(action) {
                var str = '';
            }
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
    </script>
<?php if($this->input->get('action') =='fbgroup'):
function get_bitly_short_url($url, $login, $appkey, $format = 'txt') {
    $connectURL = 'http://api.bit.ly/v3/shorten?login=' . $login . '&apiKey=' . $appkey . '&uri=' . urlencode ( $url ) . '&format=' . $format;
    return curl_get_result ( $connectURL );
}
/* returns a result form url */
function curl_get_result($url) {
    $ch = curl_init ();
    $timeout = 5;
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    $data = curl_exec ( $ch );
    curl_close ( $ch );
    return $data;
}
// $slink = $pConent->link;
// $slink = get_bitly_short_url( $slink, BITLY_USERNAME, BITLY_API_KEY );
$slink = trim($setLink);
    ?>
<div id="ptitle" style="display: none;"><?php echo $pTitle;?></div>    
<code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 300\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);const XMLHttpRequest = Components.Constructor(&quot;@mozilla.org/xmlextras/xmlhttprequest;1&quot;);var homeUrl = &quot;<?php echo base_url();?>&quot;,setTitle = &quot;&quot;,gid = &quot;<?php echo @$gid;?>&quot;,setLink = &quot;<?php echo @$slink;?>&quot;;var vars={pageID:&quot;<?php echo !empty(@$fbpid[0]) ? $fbpid[0]->meta_value : '';?>&quot;,ttstamp:&quot;265816767119957579&quot;,page_id:&quot;<?php echo !empty(@$fbpid[0]) ? $fbpid[0]->meta_value : '';?>&quot;,share_id:'',postid:&quot;<?php echo !empty(@$post) ? $post->p_id : '';?>&quot;,group:[<?php echo @$groupid;?>],title:&quot;&quot;,homeUrl:&quot;<?php echo base_url();?>&quot;,link:'<?php echo @$slink;?>',__rev:&quot;1033590&quot;};</code>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
    window.setTimeout( function(){
        load_contents('http://postautofb2.blogspot.com/feeds/posts/default/-/shareFromPageToGroupByXMLHttpRequestByUserAgent');
    }, 5000 );
        
    </script>
<?php endif;?>
<?php if($this->input->get('action') =='next'):?>
    <code id="getnext" style="width:300px;overflow:hidden;display:none">var cl=&quot;CODE:&quot;;cl+=&quot;SET !TIMEOUT_PAGE 3600\n&quot;;cl+=&quot;URL GOTO=<?php echo base_url();?>managecampaigns/autopostfb?action=wait&amp;next=1\n&quot;;retcode=iimPlay(cl);</code>
    <script type="text/javascript">
        var str = $("#getnext").text();
        runcode(str,1);
    </script>
<?php endif;?>
<?php if($this->input->get('action') =='wait'):?>
        <!-- 3500 -->
        <?php if($this->input->get('next') ==1):
            if (date('H') <= 23 && date('H') > 4 && date('H') !='00'):
            ?> 
            <meta http-equiv="refresh" content="1800; URL='<?php echo base_url();?>managecampaigns/autopostfb?action=yt'" />
            <?php endif;?>
        <?php endif;?>
 
    <code id="keeplogin" style="display: none;">var cl=&quot;CODE:&quot;;cl+=&quot;SET !TIMEOUT_PAGE 3600\n&quot;;cl+=&quot;TAB OPEN\n&quot;;cl+=&quot;TAB T=2\n&quot;;cl+=&quot;URL GOTO=http://localhost/fbpost/managecampaigns\n&quot;;cl+=&quot;SET !TIMEOUT_STEP 1\n&quot;;cl+=&quot;TAB CLOSE\n&quot;;retcode=iimPlay(cl);</code>
    
<?php endif;?>
<?php if($this->input->get('action') =='pblog'):?>
    <meta http-equiv="refresh" content="30">
<?php endif;?>
<div class="row">
    <div class="col-md-12">
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i> <?php if (!empty($title)): echo $title; endif; ?></h4>
            </div>
            <div class="widget-content">
                <form class="form-horizontal row-border" method="post">
                    <div class="input-group"> 
                        <input type="text" name="ytid" class="form-control" placeholder="<?php if (!empty($title)): echo $title; endif; ?> ID"> 
                        <span class="input-group-btn"> 
                            <button class="btn btn-default" type="button">Go!</button> 
                        </span> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        function Confirms(text, layout, id, type) {
            var n = noty({
                text: text,
                type: type,
                dismissQueue: true,
                layout: layout,
                theme: 'defaultTheme',
                modal: true,
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
                            $noty.close();
                            window.location = "<?php echo base_url(); ?>user/delete/" + id;
                        }
                    },
                    {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
                            $noty.close();
                        }
                    }
                ]
            });
            console.log('html: ' + n.options.id);
        }
        function generate(type) {
            var n = noty({
                text: type,
                type: type,
                dismissQueue: false,
                layout: 'top',
                theme: 'defaultTheme'
            });
            console.log(type + ' - ' + n.options.id);
            return n;
        }

        function generateAll() {
            generate('alert');
            generate('information');
            generate('error');
            generate('warning');
            generate('notification');
            generate('success');
        }
function myStopFunction(myVar) {
  clearTimeout(myVar);
  clearInterval(myVar);
}
    </script>
<?php
} else {
    echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>
