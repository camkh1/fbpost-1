<?php if ($this->session->userdata('user_type') != 4) { ?>
 <style>
    .butt,.butt:hover {color: #fff}
    .radio-inline{}
    .error {color: red}
    #blockuis{padding:10px;position:fixed;z-index:99999999;background:rgba(0, 0, 0, 0.73);top:20%;left:50%;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);}
    .khmer {font-family: 'Hanuman', serif;font-size: 30px}
</style>
<link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet"> 
<div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<?php
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(!empty($bloglinkA[0])) {
    $bLink = array();
    foreach ($bloglinkA as $key => $bloglink) {
        if($bloglink->meta_value ==1) {
            $bLink[] = $bloglink->object_id;
        }
        // echo '<pre>'; 
        // print_r($bloglink);                               
        // echo '</pre>';   
        // $twoDaysAgo = new DateTime(date('Y-m-d H:i:s', strtotime('-1 days')));
        // $dateModify = new DateTime(date('Y-m-d H:i:s', strtotime($bloglink->date)));
        // /*if video date is >= before yesterday*/
        // //today
        // if($dateModify < $twoDaysAgo) {
        //     if($bloglink->c_value ==1) {
        //         $bLink[] = $bloglink;
        //     }
        // } else if($dateModify > $twoDaysAgo) {
        //     $bLink[] = $bloglink;
        // }                  
    }
    if(!empty($bLink)) {
        $brand = mt_rand(0, count($bLink) - 1);
        $blogRand = $bLink[$brand];
        $bName = generateRandomString(1).'1';
        $bLinkID = $blogRand;
        $createNewBlog = false;
    } else {
        $createNewBlog = true;
        $bNewName = generateRandomString(1).'1';
    }
    
} else {
    $createNewBlog = true;
    $bNewName = generateRandomString(1).'1';
}
$btemplate = "D:&bsol;&bsol;PROGRAM&bsol;&bsol;templates&bsol;&bsol;";
?>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
<code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 300\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);var homeUrl = &quot;<?php echo base_url();?>&quot;;</code>
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
        function createblog() {
            load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/autoCreateBlogger");
        }
        function getbloglink() {
            load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/getbloglink");
        }
        function checkBloggerPost(gettype) {
            $.ajax({        
                url : 'https://www.blogger.com/feeds/<?php echo @$bLinkID;?>/posts/default?max-results=1&alt=json-in-script',
                type : 'get',
                dataType : "jsonp",
                success : function (data) {
                    loading = false; //set loading flag off once the content is loaded
                    var totalResults = data.feed.openSearch$totalResults.$t,posturl='';
                    for (var i = 0; i < data.feed.entry.length; i++) {
                        var content = data.feed.entry;
                        for (var j = 0; j < content[i].link.length; j++) {
                            if (content[i].link[j].rel == "alternate") {
                                posturl = content[i].link[j].href;
                            }
                        }
                    }
                    // if(totalResults>15) {
                    //     //check link 
                    // }
                    // if(totalResults<15) {
                    //     //post
                    // }
                }
            })
        }
        <?php if(!empty($this->input->get('startpost'))):?>
            <?php if(!empty($createNewBlog)):?>
                createblog();
            <?php endif;?>
            <?php if(empty($createNewBlog)):?>
                checkBloggerPost();
            <?php endif;?>
        <?php endif;?>
    </script>    
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <!-- body -->
                    <div class="col-md-4">
                        <form class="form-horizontal row-border" action="" method="post"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget box">
                                        <div class="widget-header">
                                            <input name="submit" type="submit" value="Add" class="btn btn-primary pull-right" /><h4><i class="icon-reorder"></i> Add blog</h4>
                                        </div>
                                        <div class="widget-content">
                                            <div class="form-group">
                                                <label class="col-md-6 control-label"> ប្រភេទប្លុក / Blog type</label>
                                                <div class="col-md-6">
                                                    <select name="blogtype" class="select2" style="width: 100%" required>
                                                        <option value="" selected>Select Type one</option>
                                                        <option value="blogger_id" <?php echo (@$this->input->get('blog_post') == 1 ? 'selected' :'');?>>Blogs Post</option>
                                                        <option value="blog_linkA">blog link</option>
                                                        <option value="blog_link">blog random link</option>
                                                    </select>             
                                                </div>                                   
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6 control-label"> Post Type</label>
                                                <div class="col-md-6">
                                                    <select name="blog_set_type" class="select2" style="width: 100%">
                                                        <option <?php echo (@$this->input->get('p_type') == 'p_manual' ? 'selected' :'');?> value="p_manual">Post Manual</option>
                                                        <option <?php echo (@$this->input->get('p_type') == 'p_random' ? 'selected' :'');?> value="p_random">Post random</option>
                                                    </select>             
                                                </div>                                   
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Blog ID:</label>              
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="blogID" value="<?php echo @$this->input->get('bid');?>" required />
                                                </div>              
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Blog Name:</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="blogTitle" class="form-control" value="<?php echo @$this->input->get('title');?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3"><input type="text" name="bads" class="form-control" value="<?php echo @$this->input->get('ads');?>" placeholder="ads ID"/></div>
                                                <div class="col-md-3">
                                                    <input type="text" name="bslot" class="form-control" value="<?php echo @$this->input->get('sl');?>" placeholder="ads slot"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="burl" class="form-control" value="<?php echo @$this->input->get('url');?>" placeholder="URL"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="btype" class="select2" style="width: 100%">
                                                        <option value="" selected>Select Type of Ads</option>
                                                        <option <?php echo (@$this->input->get('type') == 'amp' ? 'selected' :'');?> value="amp">amp</option>
                                                        <option <?php echo (@$this->input->get('type') == 'javascript' ? 'selected' :'');?> value="javascript">Javascript</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Yengo:</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="yengo" class="form-control" value="<?php echo @$this->input->get('yengo');?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input name="submit" type="submit" value="Add" class="btn btn-primary pull-right" />
                                                </div>
                                            </div>             

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="col-md-8">
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Blog post</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($bloglist)):
                                            foreach ($bloglist as $key => $value):?>
                                        <tr>
                                            <td><?php echo $key;?></td>
                                            <td><a href="https://www.blogger.com/blogger.g?blogID=<?php echo $value->bid;?>#allposts/src=sidebar" target="_blank"><?php echo $value->bid;?></a></td>
                                            <td style="width: 50%"><a href="https://www.blogger.com/blogger.g?blogID=<?php echo $value->bid;?>#allposts/src=sidebar" target="_blank"><?php echo $value->title;?></a></td>
                                            <td><span class="label label-success"><?php echo $value->status;?></span></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?blog_post=1&bid=<?php echo @$value->bid;?>&title=<?php echo $value->title;?>&ads=<?php echo @$value->bads;?>&sl=<?php echo @$value->bslot;?>&url=<?php echo @$value->burl;?>&type=<?php echo @$value->blogtype;?>&yengo=<?php echo @$value->yengo;?>&p_type=<?php echo @$value->post_type;?>" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a> </li>
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?del=<?php echo $value->bid;?>&type=blogger_id" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>

                                        
                    
                    <!-- End body -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- blog link -->
                        <div class="widget box" id="blogLink">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Blog Link</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> 
                                        <a href="<?php echo base_url();?>managecampaigns/autopost?stoppost=1" class="btn btn-xs btn-google-plus">stop Post</a>
                                        <a href="<?php echo base_url();?>managecampaigns/autopost?uncreate=1" class="btn btn-xs btn-google-plus">stop C blog</a>
                                        <a href="<?php echo base_url();?>managecampaigns/autopost?createblog=1&backto=<?php echo urlencode (base_url().'managecampaigns/autopost?createblog=1');?>&recreate=1" class="btn btn-xs btn-primary">C blog</a>
                                        <a href="javascript:;" onclick="getbloglink()" class="btn btn-xs btn-success">Get Blog Link</a>
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($this->session->userdata ('guid'))):
                                            foreach ($bloglinkA as $key => $linkA):
                                                $linkAID = (int) $linkA->meta_id;
                                                ?>
                                        <tr>
                                            <td><?php echo $key;?></td>
                                            <td><a class="blog-link" data-id="<?php echo $linkA->object_id;?>" href="https://www.blogger.com/blogger.g?blogID=<?php echo $linkA->object_id;?>#basicsettings" target="_blank"><?php echo $linkA->object_id;?></a></td>
                                            <td style="width: 50%"><a href="https://www.blogger.com/blogger.g?blogID=<?php echo $linkA->object_id;?>#allposts/src=sidebar" target="_blank"><?php echo $linkA->object_id;?></a></td>
                                            <td>
                                                <?php
                                                $dataJon = json_decode($linkA->meta_value);
                                                $status = $dataJon->status;
                                                $dates = $dataJon->date;
                                                $post = $dataJon->post;
                                                if($status ==1 && $post == date('Y-m-d', strtotime('-2 days', strtotime(date('Y-m-d'))))):?>
                                                    <span class="label label-success"><?php echo $dates;?> <?php echo $post;?></span>
                                                <?php else:?>
                                                <span class="label label-warning"><?php echo $dates;?> <?php echo $post;?></span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?blog_link_a=1&bid=<?php echo $linkA->object_id;?>&title=&status=1" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a> </li>
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?del=<?php echo $linkAID;?>&type=blog_linkA" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End blog link -->

                        <!-- splogr -->
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Splogr</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group"> 
                                        <div class="col-md-12"> 
                                            <input class="form-control required" name="next link" type="text"> 
                                            <span class="help-block">Enter Next link.</span> 
                                        </div> 
                                    </div>
                                    <div class="form-actions"> 
                                        <input type="submit" value="Save" class="btn btn-primary pull-right"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End splogr -->

                        <!-- Email config -->
                        <div class="widget box widget-closed" id="Emailconfig">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Email posts config</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group"> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="emailcf[]" type="text" value="<?php echo !empty($query_ec[0])? $query_ec[0]->email : $this->session->userdata ( 'gemail' );?>"> 
                                            <span class="help-block">Email 01</span> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="ecpw[]" type="text" value="<?php echo !empty($query_ec[0])? $query_ec[0]->pass : '';?>"> 
                                            <span class="help-block">Pass 01</span> 
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="emailcf[]" type="text" value="<?php echo !empty($query_ec[1])? $query_ec[1]->email : '';?>"> 
                                            <span class="help-block">Email 02</span> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="ecpw[]" type="text" value="<?php echo !empty($query_ec[1])? $query_ec[1]->pass : '';?>"> 
                                            <span class="help-block">Pass 02</span> 
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="emailcf[]" type="text" value="<?php echo !empty($query_ec[2])? $query_ec[2]->email : '';?>"> 
                                            <span class="help-block">Email 03</span> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="ecpw[]" type="text" value="<?php echo !empty($query_ec[2])? $query_ec[2]->pass : '';?>"> 
                                            <span class="help-block">Pass 03</span> 
                                        </div> 
                                    </div>
                                    <div class="form-actions"> 
                                        <input type="submit" value="Save" class="btn btn-primary pull-right" name="embtb"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Email config -->
                    </div>

                    <div class="col-md-6">
                        <!-- blog link -->
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Blog link (Random Image)</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($bloglink)):
                                            foreach ($bloglink as $key => $link):?>
                                        <tr>
                                            <td><?php echo $key;?></td>
                                            <td><a href="https://www.blogger.com/blogger.g?blogID=<?php echo $link->bid;?>#allposts/src=sidebar" target="_blank"><?php echo $link->bid;?></a></td>
                                            <td style="width: 50%"><a href="https://www.blogger.com/blogger.g?blogID=<?php echo $link->bid;?>#allposts/src=sidebar" target="_blank"><?php echo $link->title;?></a></td>
                                            <td><span class="label label-success"><?php echo $link->status;?></span></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a> </li>
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?del=<?php echo $link->bid;?>&type=blog_link" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End blog link -->
                        <!-- fb account counfig -->
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Each account config</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group"> 
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="fbconfig" type="text" value="<?php echo !empty($query_fb)? $query_fb->id : '';?>"> 
                                            <span class="help-block">fb Page ID</span> 
                                        </div>
                                        <div class="col-md-6"> 
                                            <input class="form-control required" name="fbPName" type="text" value="<?php echo !empty($query_fb)? $query_fb->name : '';?>"> 
                                            <span class="help-block">fb Page Name</span> 
                                        </div>
                                        <div class="col-md-12">
                                            <label class="radio-inline">
                                                <input type="radio" value="normal" name="pageType" <?php echo (@$query_fb->pageType =='normal') ? 'checked': '';?> />
                                                <i class="subtopmenu hangmeas">Normal</i>
                                            </label> 
                                            <label class="radio-inline">
                                                <input type="radio" value="profile" name="pageType" <?php echo (@$query_fb->pageType =='profile') ? 'checked': '';?>/>
                                                <i class="subtopmenu hangmeas">Profile</i>
                                            </label>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-md-12"> 
                                            <input class="form-control" name="fbgconfig" type="text" value="<?php echo !empty($query_fbg[0])? $query_fbg[0]->meta_value : '';?>"> 
                                            <span class="help-block">fb Group to post.</span> 
                                        </div> 
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-md-12"> 
                                            <input class="form-control" name="sitepost" type="text" value="<?php echo !empty($query_fb->wp_url)? $query_fb->wp_url : '';?>"> 
                                            <span class="help-block">URL site to wp post.</span> 
                                            <input class="form-control" name="sitecate" type="text" value="<?php echo !empty(@$query_fb->wp_cate)? $query_fb->wp_cate : '';?>"> 
                                            <span class="help-block">Category: lotto|1,news|2,entertainment|3,otherlotto|4</span> 
                                        </div> 
                                    </div>

                                    <div class="form-actions"> 
                                        <input type="submit" value="Save" class="btn btn-primary pull-right" name="fbbtb"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End fb account counfig -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Share mode config -->
                        <div class="widget box" id="share_config">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Share mode</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group">
                                        <div class="col-md-3"> 
                                            <label class="radio"> 
                                                <input class="uniform" id="post_wp" name="post_wp" value="1" type="checkbox" <?php echo !empty($share_mode_data->post_wp)? 'checked':'';?>> Post to WP 
                                            </label>
                                            <label class="radio"> 
                                                Post to WP2 Backup
                                                <input class="form-control" name="post_wp_backup" type="text" value="<?php echo !empty($share_mode_data->post_wp_backup)? $share_mode_data->post_wp_backup:'';?>" placeholder='Post to WP2 Backup'> 
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="post_wp_save_link" name="post_wp_save_link" value="1" type="checkbox" <?php echo !empty($share_mode_data->post_wp_save_link)? 'checked':'';?>> Save WP Link 
                                            </label>
                                        </div>
                                        <div class="col-md-3"> 
                                            <label class="radio"> 
                                                <input class="uniform" id="share_as_bus" name="shopA" value="sh_as_business" type="radio"> To Bussiness 
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="share_as_sharer" name="shopA" value="sh_as_sharer" type="radio"> Sharer Mode
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="share_as_page_direct" name="shopA" value="sh_as_page_direct" type="radio"> Page 
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="share_none" name="shopA" value="share_none" type="radio"> None 
                                            </label>
                                        </div> 
                                        <div class="col-md-3"> 
                                            <label class="radio"> 
                                                <input class="uniform" id="to_page_opb" name="shopB" value="to_page" type="radio"> to Pages
                                            </label> 
                                            <label class="radio"> 
                                                <input class="uniform" id="to_group_opb" name="shopB" value="to_group" type="radio"> to Groups
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="to_profile_opb" name="shopB" value="to_profile" type="radio"> to Profile
                                            </label>
                                        </div>
                                        <div class="col-md-3"> 
                                            <label class="radio"> 
                                                <input class="uniform" id="to_page_opc" name="shopC" value="to_to_page_to_group" type="radio" <?php if(!empty($share_mode_data->option_c)): if($share_mode_data->option_c =='to_to_page_to_group'): echo 'checked';else: echo '';endif;endif;?>> to Pages => Groups
                                            </label> 
                                            <label class="radio"> 
                                                <input class="uniform" id="to_group_opc" name="shopC" value="to_to_group" type="radio" <?php if(!empty($share_mode_data->option_c)): if($share_mode_data->option_c =='to_to_group'): echo 'checked';else: echo '';endif;endif;?>> to Groups
                                            </label>
                                            <label class="radio"> 
                                                <input class="uniform" id="to_none_opc" name="shopC" value="to_to_none" type="radio" <?php if(!empty($share_mode_data->option_c)): if($share_mode_data->option_c =='to_to_none'): echo 'checked="checked"';else: echo '';endif;endif;?>> None
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions"> 
                                        <input type="submit" value="Save" class="btn btn-primary pull-right" name="sharemode"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Share mode config -->
                    </div>
                </div>

                <!-- Prefix and Subfix -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Prefix for Random Title</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group">
                                        <div class="col-md-12 clearfix">
                                            <label>អត្ថបទបន្ថែម ពីមុខ / Prefix</label>
                                        <textarea rows="1" cols="5" rows="3" name="Prefix" class="form-control" placeholder="1234|1234|1234"><?php echo @$prefix_title;?></textarea>
                                        បើចង់ថែម ឬដាក់ថ្មី សូមដាក់ដូចខាងក្រោមៈ<br/>Ex: xxxx|xxxx|xxxx|xxxx
                                        </div>                                
                                    </div>
                                    <div class="form-actions"> 
                                        <input type="submit" name="postprefix" value="Save" class="btn btn-primary pull-right"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- End Prefix and Subfix -->

                <!-- Prefix and Subfix -->
                    <div class="col-md-6">
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Suffix for Random Title</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" action="" method="post">
                                    <div class="form-group">
                                        <div class="col-md-12 clearfix">
                                            <label>អត្ថបទបន្ថែម ពីក្រោយ / Suffix</label>
                                            <textarea rows="1" cols="5" name="Suffix" class="form-control" placeholder="1234|1234|1234"><?php echo @$suffix_title;?></textarea>
                                            បើចង់ថែម ឬដាក់ថ្មី សូមដាក់ដូចខាងក្រោមៈ<br/>Ex: xxxx|xxxx|xxxx|xxxx
                                        </div>                                
                                    </div>
                                    <div class="form-actions"> 
                                        <input type="submit" value="Save" class="btn btn-primary pull-right"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Prefix and Subfix -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Autopost</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="autopost" method="post">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="radio-inline">
                                                    <input type="radio" value="1" name="autopost" <?php echo !empty($autopost) ? 'checked': '';?> />
                                                    <input type="hidden" name="setLink" value="1"/>
                                                    <i class="subtopmenu hangmeas">Yes</i>
                                                </label> 
                                                <label class="radio-inline">
                                                    <input type="radio" value="0" name="autopost" <?php echo empty($autopost) ? 'checked': '';?>/>
                                                    <i class="subtopmenu hangmeas">No</i>
                                                </label>                                
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <?php if(!empty($autopost)):?>
                                        <div class="form-actions" style="padding: 10px 20px 10px">
                                            <a href="javascript:;" onclick="createblog()" class="btn btn-primary pull-right">Start now</a>
                                        </div>
                                        <?php endif;?>
                                </form>
                            </div>
                        </div>
                        <!-- end autopost -->

                        <div class="widget box widget-closed">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Random post?</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="randomLink" method="post">

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="radio-inline">
                                                    <input type="radio" value="1" name="randomLink"  <?php echo !empty($randdom_link) ? 'checked': '';?> />
                                                    <input type="hidden" name="setLink" value="1"/>
                                                    <i class="subtopmenu hangmeas">Yes</i>
                                                </label> 
                                                <label class="radio-inline">
                                                    <input type="radio" value="0" name="randomLink" <?php echo empty($randdom_link) ? 'checked': '';?>/>
                                                    <i class="subtopmenu hangmeas">No</i>
                                                </label>                                
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                </form>
                            </div>
                        </div>

                        <!-- bitly -->
                        <div class="widget box widget-closed">
                            <div class="widget-header"><h4> Bitly account</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="bitly" method="post">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="buserid" class="form-control" style="width: 100%" placeholder="USER NAME (Bitly)" value="<?php echo @$bitly->username;?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="bapi" class="form-control" style="width: 100%" placeholder="API KEY (Bitly)" value="<?php echo @$bitly->api;?>" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input name="bitly" type="submit" value="Save" class="btn btn-primary pull-right" />
                                </div> 
                                </form>  
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <!-- Endbitly -->

                        <!-- upload to blog -->
                        <div class="widget box widget-closed">
                            <div class="widget-header"><h4> Blog ID to upload img</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-up"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="bitly" method="post">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="uploadb" class="form-control" style="width: 100%" placeholder="Blog ID for upload image" value="<?php echo @$blogupload;?>" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input name="imgupload" type="submit" value="Save" class="btn btn-primary pull-right" />
                                </div> 
                                </form>  
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <!-- End upload to blog -->
                    </div>

                    <div class="col-md-9">
                        <!-- youtube -->
                        <div class="widget box widget-closed" id="YoutubeChannel">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Youtube Channel</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <form class="form-horizontal row-border" id="ytid" method="post">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="text" name="ytid" class="form-control" style="width: 100%" placeholder="Channel ID" value="<?php echo @$bitly->username;?>" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="ytname" class="form-control" style="width: 100%" placeholder="Channel Name" value="<?php echo @$bitly->api;?>" required />
                                    </div>
                                </div>
                                <div class="form-actions" style="padding: 10px 20px 10px">
                                    <input name="bitly" type="submit" value="Save" class="btn btn-primary pull-right" />
                                </div> 
                                </form> 

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($ytdata)):
                                            foreach ($ytdata as $key => $yt):?>
                                        <tr>
                                            <td><?php echo $key;?></td>
                                            <td style="width: 10%"><a href="https://www.youtube.com/channel/<?php echo $yt->ytid;?>/videos" target="_blank"><?php echo $yt->ytid;?></a></td>
                                            <td style="width: 30%"><?php echo $yt->ytname;?></td>
                                            <td style="width: 80px"><?php echo $yt->status;?></td>
                                            <td><?php 
                                            $newformat = date('Y-m-d',$yt->date);
                                            echo $newformat;?></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?del=<?php echo $yt->ytid;?>&type=youtubeChannel" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End youtube -->

                        <div class="widget box  widget-closed" id="multifb">
                            <form method="post">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Facebook Accounts</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <button type="submit" id="multidelfb" name="delete"
                            class="btn btn-xs btn-google-plus" value="delete"><i class="icon-trash"></i> Delete</button> 
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="uniform" name="allbox"
                                    id="checkFbAll" /> #</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($facebook)):
                                            foreach ($facebook as $key => $fb):?>
                                        <tr>
                                            <td><input type="checkbox" id="fbitemid"
                                    name="fbitemid[]" class="uniform itemid"
                                    value="<?php echo @$fb->u_id;?>" /> <?php echo $key;?></td>
                                            <td><a href="https://mobile.facebook.com/<?php echo $fb->u_id;?>" target="_blank"><?php echo $fb->u_provider_uid;?></a></td>
                                            <td style="width: 50%"><img src="https://graph.facebook.com/<?php echo $fb->u_provider_uid;?>/picture" style="width: 60px;float: left" /><a href="https://mobile.facebook.com/<?php echo $fb->u_id;?>" target="_blank"><?php echo $fb->u_name;?></a></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a> </li>
                                                    <li><a href="<?php echo base_url();?>managecampaigns/setting?del=<?php echo $fb->u_id;?>&type=fb" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    </div>
    <script>
        $( document ).ready(function() {
            function sh_as_business() {
                $('#to_page_opb').prop("checked", true);
                $('#to_group_opb').attr("disabled",true);
                $('#to_profile_opb').attr("disabled",true);
                $('#to_page_opb').attr("disabled",false);
                $('#to_page_opc').attr("disabled",true);
                $('#to_group_opc').attr("disabled",false);
                $('#to_none_opc').attr("disabled",false);
            }
            function sh_as_sharer() {
                $('#to_page_opb').attr("disabled",false);
                $('#to_group_opb').attr("disabled",false);
                $('#to_profile_opb').attr("disabled",false);
                $('#to_page_opc').attr("disabled",false);
                $('#to_group_opc').attr("disabled",false);
                var valb = $('input[name=shopB]:checked').val();
                if(valb =='to_group') {
                    $('#to_page_opc').attr("disabled",true);
                    $('#to_group_opc').attr("disabled",true);
                } 
                if(valb =='to_page') {
                    $('#to_page_opc').attr("disabled",true);
                    $('#to_group_opc').attr("disabled",false);
                }
            }
            function sh_as_page_direct() {
                $('#to_page_opc').attr("disabled",true);
                $('#to_group_opc').attr("disabled",false);
                $('#to_profile_opb').attr("disabled",true);
                $('#to_page_opb').attr("disabled",true);
                $('#to_group_opb').attr("disabled",true);
                $('#to_group_opb').prop("checked", true);
            }
            function to_page() {
                $('#to_page_opc').attr("disabled",true);
                $('#to_group_opc').attr("disabled",false);
            }
            function to_group() {
                $('#to_page_opc').attr("disabled",true);
                $('#to_group_opc').attr("disabled",true);
            }
            function to_profile() {
                $('#to_page_opc').attr("disabled",false);
                $('#to_group_opc').attr("disabled",false);
            }
            function share_none() {
                $('#to_page_opb').prop("checked", false);
                $('#to_page_opb').attr("disabled",true);
                $('#to_page_opc').prop("checked", false);
                $('#to_page_opc').attr("disabled",true);
                $('#to_group_opb').prop("checked", false);
                $('#to_group_opb').attr("disabled",true);
                $('#to_profile_opb').attr("disabled",true);
                $('#to_profile_opb').prop("checked", false);
                $('#to_page_opc').attr("disabled",true);
                $('#to_page_opc').prop("checked", false);
                $('#to_group_opc').attr("disabled",true);
                $('#to_group_opc').prop("checked", false);
                $('#to_none_opc').attr("disabled",true);
                $('#to_none_opc').prop("checked", false);
            }
            function post_wp(e) {
                if(e) {
                    $('input[name=post_wp_backup]').attr("disabled",true);
                    $('input[name=post_wp_save_link]').attr("disabled",true);
                } else {
                    $('input[name=post_wp_backup]').attr("disabled",false);
                    $('input[name=post_wp_save_link]').attr("disabled",false);
                }
            }
            <?php if(!empty($share_mode_data->post_wp)):?>post_wp(false);<?php else:?>post_wp(true);<?php endif;?>
            <?php if(!empty($share_mode_data->option_a)): if($share_mode_data->option_a =='sh_as_business'):?>$('#share_as_bus').click();sh_as_business();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_a)): if($share_mode_data->option_a =='sh_as_sharer'):?>$('#share_as_sharer').click();sh_as_sharer();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_a)): if($share_mode_data->option_a =='sh_as_page_direct'):?>$('#share_as_page_direct').click();sh_as_page_direct();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_a)): if($share_mode_data->option_a =='share_none'):?>$('#share_none').click();share_none();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_b)): if($share_mode_data->option_b =='to_page'):?>$('#to_page_opb').click();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_b)): if($share_mode_data->option_b =='to_group'):?>$('#to_group_opb').click();<?php endif;endif;?>
            <?php if(!empty($share_mode_data->option_b)): if($share_mode_data->option_b =='to_profile'):?>$('#to_group_opb').click();<?php endif;endif;?>
            $("input[name=post_wp]").on('click', function() {
                if($('#post_wp').is(":checked")) {
                    post_wp(false);
                }
                if(!$('#post_wp').is(":checked")) {
                    post_wp(true);
                }  
            });
            $("input[name=shopA]").on('change', function() {
                var vals = $('input[name=shopA]:checked').val();
                if(vals =='sh_as_business') {
                    sh_as_business();
                }
                if(vals =='sh_as_sharer') {
                     sh_as_sharer();
                }
                if(vals =='sh_as_page_direct') {
                    sh_as_page_direct();
                }
                if(vals =='share_none') {
                    share_none();
                }
            });

            $("input[name=shopB]").on('change', function() {
                var valb = $('input[name=shopB]:checked').val();
                if(valb =='to_group') {
                    to_group();
                }
                if(valb =='to_page') {
                    to_page();
                }
                if(valb =='to_profile') {
                    to_profile();
                }
            });

            $("input[name=randomLink]").click(function(){
                var values = $('#randomLink').serialize();
                $.ajax({
                    url: "<?php echo base_url();?>managecampaigns/setting",
                    type: "post",
                    data: values ,
                    success: function (response) {
                       alert('Saved!');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });

            /*autopost*/
            $("input[name=autopost]").click(function(){
                var values = $('#autopost').serialize();
                $.ajax({
                    url: "<?php echo base_url();?>managecampaigns/setting",
                    type: "post",
                    data: values ,
                    success: function (response) {
                       alert('Saved!');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            });

            $('#checkFbAll').click(function () {
                 $('input:checkbox.itemid').not(this).prop('checked', this.checked);
             });
             $('#multidelfb').click(function () {
                 if (!$('#fbitemid:checked').val()) {
                        alert('please select one');
                        return false;
                } else {
                        return confirm('Do you want to delete all?');
                }
             });

        });


        function getattra(e) {
            $("#singerimageFist").val(e);
            $("#imageviewFist").html('<img style="width:100%;height:55px;" src="' + e + '"/>');
        }
    </script>

    <?php

} else {
    echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>