<div class="page-header">
    <?php
    $blogpassword = $this->session->userdata('blogpassword');
    ?>
    <div class="page-title">
        <h3><?php
        if ($this->session->userdata('user_type') != 3) {
            if ($blogpassword) {
                echo 'អ្នកអាចធ្វើការជាមួយប្លុក​របស់អ្នកបានហើយ';
            } else {
                ?>
                សូមស្វាគមន៍ចំពោះការមកដល់របស់អ្នក<br/>
                វាយលេខកូដសម្ងាប់សម្រាប់ប្លុករបស់អ្នក
            <?php }
        } else { echo 'សូមស្វាគមន៍ចំពោះការមកដល់របស់អ្នក';}?>
        </h3>
    </div>
</div>

<div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
<code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;CODE: SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 3600\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;),urlHome=&quot;<?php echo base_url();?>&quot;,backto=&quot;<?php echo @$backto;?>&quot;;</code>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
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
    </script>   
<?php if(empty($this->session->userdata ( 'fb_user_id' ))):
    $UserTable = new Mod_general ();
    $getBrowser = $UserTable->getBrowser()['name'];
    ?>  
    <script type="text/javascript">
        $( document ).ready(function() {
            function greet() {
             <?php if($getBrowser == 'Google Chrome'):?>
                load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/autoGetFbUserIdChrome");
            <?php elseif($getBrowser == 'Mozilla Firefox'):?>
                load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/autoGetFbUserIdChrome");
            <?php endif;?>
            }
            setTimeout(greet, 3000);
            
        });     
    </script>
<?php endif;?>
<div class="row">
    <div class="col-md-12">
        <div class="widget box">
            <div class="widget-header">
                
                <h4>
                    <i class="icon-reorder">
                    </i>
                    <?php
                    if ($this->session->userdata('user_type') != 3) {
                        if (!$blogpassword) {
                            echo 'Login to your blog';
                        } else {
                            echo 'You can post to your blog rightnow';
                        }
                    }
                    ?>
                </h4>
            </div>
            <div class="widget-content">
                <?php if(!empty($blogerror)):?><div class="error" style="color:red;"><?php echo $blogerror;?><br/>សូមវាយលេខសម្ងាត់ម្ដងទៀត</div><?php endif;?>
<?php if (!$blogpassword && $this->session->userdata('user_type') != 3) { ?>
                    <form method="post">
                        <div class="input-group">
                            <?php if(!empty($_GET['backto'])) { ?><input type="password" class="form-control" name="backto" value="<?php echo $_GET['backto'];?>" /><?php } ?>
                            <input type="password" class="form-control" name="blogpass" />
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-info" name="submit">
                                    Login                           
                                </button>
                            </div>
                        </div>
                    </form><?php } else { ?>
                    Welcome to my app
                    <?php if ($this->session->userdata('user_type') == 3):
                        $user_action = @$_GET['user'];
                    if(empty($blogpassword) && empty($user_action)):
                        ?>
                <a href="<?php echo base_url() . 'home?user=publisher'; ?>"  class="btn btn-success">I'm a publisher</a>
                    <?php 
                    else:
                        echo '<span style="color:green">Thanks, You can post rightnow!</span>';
                    endif;endif;?>
<?php } ?>
            </div>
        </div>
    </div>
</div>