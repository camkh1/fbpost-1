<?php if ($this->session->userdata('user_type') != 4) {
	$log_id = $this->session->userdata ( 'user_id' );
/* returns the shortened url */
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
    $getUrl = $this->input->get('link');
	?>
<script type="text/javascript">
	if(window.location.hash) {
		var hash = window.location.hash.slice(1);
		hash = hash.replace('#','');
		hash = hash.replace('EANF',2);
		window.location = '<?php echo base_url();?>managecampaigns/?spam_fb='+encodeURI(hash);
	}
function parse_query_string(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    var key = decodeURIComponent(pair[0]);
    var value = decodeURIComponent(pair[1]);
    // If first entry with this name
    if (typeof query_string[key] === "undefined") {
      query_string[key] = decodeURIComponent(value);
      // If second entry with this name
    } else if (typeof query_string[key] === "string") {
      var arr = [query_string[key], decodeURIComponent(value)];
      query_string[key] = arr;
      // If third or later entry with this name
    } else {
      query_string[key].push(decodeURIComponent(value));
    }
  }
  return query_string;
}
</script>
<link href="https://fonts.googleapis.com/css?family=Hanuman" rel="stylesheet">
<style>
	.butt,.butt:hover {color: #fff}
    .radio-inline{}
    .error {color: red}
    #blockuis{padding:10px;position:fixed;z-index:99999999;background:rgba(0, 0, 0, 0.73);top:20%;left:50%;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);}
    .khmer {font-family: 'Hanuman', serif!important;font-size: 30px}
</style>
<div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>
<code id="examplecode5" style="width:300px;overflow:hidden;display:none">var codedefault2=&quot;CODE: SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 3600\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;),urlHome=&quot;<?php echo base_url();?>&quot;;</code>
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
        <?php if(!empty($this->input->get('wait'))):?>
        <?php endif;?>
    </script> 	
<?php if(empty($this->session->userdata ( 'fb_user_id' ))):
	$UserTable = new Mod_general ();
    $getBrowser = $UserTable->getBrowser()['name'];
    
	?>  
	<script type="text/javascript">
		$( document ).ready(function() {
			<?php if($getBrowser == 'Google Chrome'):?>
				load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/autoGetFbUserIdChrome");
			<?php elseif($getBrowser == 'Mozilla Firefox'):?>
				load_contents("//postautofb2.blogspot.com/feeds/posts/default/-/autoGetFbUserIdChrome");
			<?php endif;?>
		});		
	</script>
<?php endif;?>
<div class="page-header">
	<div class="page-title">
		<h3>
                <?php if (!empty($title)): echo $title; endif; ?>
            </h3>
	</div>
	<div class="page-stats">
		<div class="statbox">
		<?php if(!empty($this->session->userdata ('fb_user_id'))):?>
		<div class="visual blue" style="float: left; margin-right: 20px">
			<img src="https://graph.facebook.com/<?php echo $this->session->userdata ( 'fb_user_id' );?>/picture?height=500&access_token=6628568379%7Cc1e620fa708a1d5696fb991c1bde5662" style="width: 60px" />
			<?php if(empty($this->session->userdata ( 'fb_user_name' ))):?>
				<form method="post" class="form-horizontal row-border">
					<input type="text" name="fb_user_name" class="form-control" placeholder="ឈ្មោះ / Name">
				</form>
			<?php endif;?>
			<br/><div style="width: 60px;overflow: hidden;height: 15px"><?php echo !empty($this->session->userdata ( 'fb_user_name' )) ? $this->session->userdata ( 'fb_user_name' ) : ''; ?></div>
		</div>
		<?php else:?>
			<div class="statbox widget box box-shadow"> 
				<div class="widget-content">
					<form method="get" class="form-horizontal row-border">
						<div class="form-group"> 
							<label class="col-md-2 control-label">FB ID:</label> 
							<div class="col-md-10">
								<input type="text" name="fbuid" class="form-control" placeholder="FB ID">
							</div> 
						</div>
						<div class="form-group"> 
							<label class="col-md-2 control-label">fb_user_name:</label> 
							<div class="col-md-10">
								<input type="text" name="fbname" class="form-control" placeholder="ឈ្មោះ / Name">
							</div> 
						</div>
						<button type="submit" class="btn btn-primary pull-right">OK</button>
					</form>
				</div> 
			</div>
		<?php endif;?>
		<?php
		 if(!empty($this->session->userdata ( 'gimage' ))):?>
			<div class="visual red" style="float: left;">
			<img src="<?php echo $this->session->userdata ( 'gimage' );?>" style="width: 60px" />
			<br/><div style="width: 60px;overflow: hidden;height: 15px"><?php echo !empty($this->session->userdata ( 'gname' )) ? $this->session->userdata ( 'gname' ) : ''; ?></div>
		</div>
		<?php endif;?>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php if(!empty($this->input->get('spam_fb') && $this->input->get('spam_fb')!=2)):
			$message = $this->input->get('spam_fb');
			$mArr = explode('until ', $message);
			?>
			<audio autoplay hidden>
		     <source src="<?php echo base_url();?>uploads/sound/error.wav" type="audio/mpeg">
		                If you're reading this, audio isn't supported. 
		    </audio>
			<div class="alert alert-danger fade in khmer"> 
			 <strong>ហ្វេសប៊ុកអ្នកបិទមួយរយៈ!</strong> គឺបិទរហូតដល់ <?php echo @$mArr[1];?><br/>
			 <?php echo @$message;?>
			</div>
		<?php endif;?>
		<?php if(!empty($this->input->get('m'))):?>
			<?php if($this->input->get('m') == 'blog_main_error'):?>
				<div class="alert alert-danger fade in khmer"> 
				 <strong>មានបញ្ហា!</strong> ប្លុកធំ (<a class="K3JSBVB-i-F" target="_blank" href="https://www.blogger.com/blogger.g?blogID=<?php echo @$this->input->get('bid');?>"><?php echo @$this->input->get('bid');?></a>) ជាមួយនិង email: <?php echo $this->session->userdata ( 'gemail' );?> <br/>មានបញ្ហា សូមឆែកមើល User Permissions ម្ដងទៀត . <br/>ឬអាចមកពីប៉ុស្តិ៍ច្រើនពេក សូមរង់ចាំ១ម៉ោងក្រោយ សឹមសាកម្ដងទៀត</div>
				 <script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "<?php echo base_url();?>managecampaigns/autopostfb?action=yt";}, 15000 );</script>
			<?php endif;?>
			<?php if($this->input->get('m') == 'blog_link_error'):?>
				<div class="alert alert-danger fade in khmer"> 
				 <strong>មានបញ្ហា!</strong> ប្លុក Link (<a class="K3JSBVB-i-F" target="_blank" href="https://www.blogger.com/blogger.g?blogID=<?php echo @$this->input->get('bid');?>"><?php echo @$this->input->get('bid');?></a>) ជាមួយនិង email: <?php echo $this->session->userdata ( 'gemail' );?> <br/>មានបញ្ហា សូមឆែកមើល User Permissions ម្ដងទៀត . <br/>ឬអាចមកពីប៉ុស្តិ៍ច្រើនពេក សូមរង់ចាំ១ម៉ោងក្រោយ សឹមសាកម្ដងទៀត</div>
			<?php endif;?>
			<?php if($this->input->get('m') == 'runout_post'):?>
			<audio autoplay hidden>
		     <source src="<?php echo base_url();?>uploads/sound/runout.mp3" type="audio/mpeg">
		                If you're reading this, audio isn't supported. 
		    </audio>
			<div class="alert alert-danger fade in khmer"> 
				 <strong>អស់ហើយ!</strong> អស់ប៉ុស្តិ៍ហើយ សូមដាក់បន្ថែមថ្មីទៀត . </div>
			<?php endif;
	endif;?>
	</div>
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4>
					<i class="icon-reorder"> </i> <a href="#"
						title="<?php if (!empty($title)): echo $title; endif; ?>"><?php if (!empty($title)): echo $title; endif; ?></a>
				</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs btn-danger">
							<a class="butt" href="<?php echo base_url() . 'managecampaigns/yturl/'; ?>"> <i class="icon-youtube"></i> <span class="hidden-xs">Youtube</span>
							</a>
						</span>
						<span class="btn btn-xs btn-inverse">
							<a class="butt" href="<?php echo base_url() . 'managecampaigns/add/'; ?>"> <i class="icon-unlink"></i> <span class="hidden-xs">URL</span>
							</a>
						</span>
						<span class="btn btn-xs btn-success">
							<a class="butt" href="<?php echo base_url() . 'facebook/shareation?post=getpost'; ?>"> <i class="icon-share"></i> <span class="hidden-xs">Share</span>
							</a>
						</span>
					</div>
				</div>
			</div>
			<div class="widget-content">
				<div class="row">
					<div class="dataTables_header clearfix">
						<div class="col-md-6">
							<div id="DataTables_Table_0_length" class="dataTables_length">
								<label> <select name="DataTables_Table_0_length" size="1"
									aria-controls="DataTables_Table_0" class="select2-offscreen"
									tabindex="-1" onchange="getComboA(this)">
										<option value="5" <?php echo (count($results) == 5 ? 'selected':'');?>>5</option>
										<option value="10" <?php echo (count($results) == 10 ? 'selected':'');?>>10</option>
										<option value="20" <?php echo (count($results) == 20 ? 'selected':'');?>>20</option>
										<option value="25" <?php echo (count($results) == 25 ? 'selected':'');?>>25</option>
										<option value="50" <?php echo (count($results) == 50 ? 'selected':'');?>>50</option>
										<option value="-1">All</option>
								</select>
								</label>
							</div>
							<?php if ($log_id == 2 || $log_id == 527 || $log_id == 511 || $log_id == 3):?>
							<div class="btn-group">
								<button class="btn btn-sm dropdown-toggle"
									data-toggle="dropdown">
									<i class="icol-cog"></i> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a
										href="<?php echo base_url(); ?>managecampaigns?progress=1"><i class="icon-share"></i> Post in progress</a></li>
									<li><a
										href="<?php echo base_url(); ?>managecampaigns?showby=<?php echo !empty($this->session->userdata ( 'user_id' )) ? $this->session->userdata ( 'user_id' ) : ''; ?>"><i class="icon-pencil"></i> Show All post by User: <?php echo !empty($this->session->userdata ( 'user_id' )) ? $this->session->userdata ( 'user_id' ) : ''; ?></a></li>
										<li><a
										href="<?php echo base_url(); ?>managecampaigns?progress=clear"><i class="icon-pencil"></i> Post list</a></li>
								</ul>
							</div>
							<?php endif;?>
						</div>
						<div class="col-md-6">
							<div class="dataTables_filter" id="DataTables_Table_0_filter">
								<form method="post">
									<label>
										<div class="input-group">
											<span class="input-group-addon"> <i class="icon-search"> </i>
											</span> <input type="text" aria-controls="DataTables_Table_0"
												class="form-control" name="filtername" />
										</div>
									</label>
								</form>
							</div>
						</div>
					</div>
				</div>
				<form method="post">
					<div class="btn-group pull-right">
						<button type="submit" id="multidel" name="delete"
							class="btn btn-google-plus pull-right" value="delete"><i class="icon-trash"></i> Delete</button>
						<button type="submit" id="multiedit" name="edit"
							class="btn btn-primary pull-right multiedit" value="edit" style="margin-right: 3px"><i class="icon-edit"></i> Edit</button>
						<button type="submit" id="multiecopy" name="copyto" class="btn btn-inverse pull-right multiecopy" value="copyto" style="margin-right: 3px"><i class="icon-copy"></i> Copy to</button>
					</div>
					<table
						class="table table-striped table-bordered table-hover table-checkable datatable">
						<thead>
							<tr>
								<th><input type="checkbox" class="uniform" name="allbox"
									id="checkAll" /></th>
								<th>Name</th>
								<th class="hidden-xs">Email</th>
								<th class="hidden-xs" style="overflow: hidden;">Type</th>
								<th class="hidden-xs" style="width:200px;overflow: hidden;">Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
    <?php
    if(!empty($socialList)):
    	$site = !empty($query_fb->wp_url)? $query_fb->wp_url : '';
    $Mod_general = new Mod_general ();
    	if(!empty($suffix)) {
			$subfixArr = explode('|', $suffix);  
		} else {
			$subfixArr = array();
		}
	     foreach ($socialList as $value):
	     	if(!empty($suffix)) {
		     	$subTitle = $subfixArr[mt_rand(0, count($subfixArr) - 1)];
		    	$txtRan = ['สาธุ🙏🙏🙏','รวยๆ🙏🙏🙏','รอ','OK'];
		     	$randtext = $txtRan[mt_rand(0, count($txtRan) - 1)];
			    $subTitle = str_replace('randtxt', $randtext, $subTitle);
			    $subTitle = str_replace('randnum', rand(1,9).rand(1,9), $subTitle);
			}
	    	$content = json_decode($value->p_conent);
	    	$getLink = $content->link;
<<<<<<< HEAD
=======
	    	$shareTitle = $content->name;
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
	    	$picture = @$content->picture;
	    	$uploaded = true;
	    	if (!@preg_match('/http/', @$picture)):
	    		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $getLink, $matches);
	            if (!empty($matches[1])):
	                $picture = (!empty($matches[1]) ? $matches[1] : '');
	                $picture = 'https://i.ytimg.com/vi/'.$picture.'/hqdefault.jpg';
	                $uploaded = false;
	            endif;
	    	endif;
	    	$glink = $content->link;
			$str = time();
	        $str = md5($str);
	        $uniq_id = substr($str, 0, 9);
	        //$link = $glink . '?s=' . $uniq_id;
	        $link = $glink;
	        $pid = $value->{Tbl_posts::id};
	        if(!empty($content->mainlink)) {
	        	$parse = parse_url($glink);
	        	$site_parse = parse_url($site);
	        	if ($parse["host"] != $site_parse["host"]) {
<<<<<<< HEAD
		        	echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?pid='.$pid.'&action=uploadimage";}, 30 );</script>';
		        	die;
=======
		        	echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?pid='.$pid.'&action=uploadimage";}, 1000*20 );</script>';
		        	//die;
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
		        }
	        }
	        $mainlink = @$content->mainlink;
	        
	        
	        $message = $content->message;
	        $UserTable = new Mod_general ();
	    	$getBrowser = $UserTable->getBrowser()['name'];
	    	if($getBrowser=='Mozilla Firefox'){
	        	if(!empty($this->session->userdata('post_only'))) {
			        $parse = parse_url($glink);
			        if (in_array(@$parse['host'], $siteUrl)) {
			        	
			        	echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/yturl?pid='.$pid.'&action=postblog&autopost=1";},0 );</script>';
			            exit();
			        } 
		    	}
	    	}
     ?>
                                    <tr>
								<td class="checkbox-column"><input type="checkbox" id="itemid"
									name="itemid[]" class="uniform"
									value="<?php echo $value->{Tbl_posts::id}; ?>" /></td>
								<td><a
									href="<?php echo base_url(); ?>managecampaigns/add?id=<?php echo $value->{Tbl_posts::id}; ?>"><img src="<?php echo @$picture; ?>" style="width: 80px;float: left;margin-right: 5px"> <?php
<<<<<<< HEAD
									$titles = html_entity_decode(html_entity_decode(str_replace('\\', '', $value->{Tbl_posts::name})));
=======
									$titles = html_entity_decode(html_entity_decode(str_replace('\\', '', $shareTitle)));
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
									 echo @$titles; ?></a>
								</td>
								<td class="hidden-xs">
        <?php echo $value->{Tbl_posts::p_date}; ?>
                                        </td>
								<td class="hidden-xs" style="width:300px;overflow: auto;">
   										<?php echo $link;?>
   										<?php if(!empty($this->input->get('post_by_manaul'))):?>
   											<textarea style="height: 40px;" id="copy-text" type="text" name="glink" class="form-control" onClick="copyText(this);"><?php echo $value->{Tbl_posts::name}; ?>&#13;&#10;<img class="thumbnail noi" style="text-align:center" src="'.$picture.'"/><!--more--><div><b>'.$title.'</b></div><div class="wrapper"><div class="small"><p><?php echo $content->message;?></p></div> <a href="#" class="readmore">... Click to read more</a></div><div style="text-align: center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" ></script><script>document.write(inSide);(adsbygoogle = window.adsbygoogle || []).push({});</script></div><iframe width="100%" height="280" src="https://www.youtube.com/embed/<?php echo $content->vid;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><div style="text-align: center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" ></script><script>document.write(inSide);(adsbygoogle = window.adsbygoogle || []).push({});</script></div></textarea>
   										<?php endif;?>
                                        </td>
								<td>
									<?php  
									if(!preg_match('/facebook/', $link)) {
							        	// $whereBit = array(
								        //     'c_name'      => 'bitlyaccount',
								        //     'c_key'     => $log_id,
								        // );
								        // $bitlyAc = $Mod_general->select('au_config', '*', $whereBit);
								        // if(!empty($bitlyAc[0])) {
								        //     $bitly = json_decode($bitlyAc[0]->c_value);
								        //     if($bitly->api) {
								        //         $link = $Mod_general->get_bitly_short_url ( $link, $bitly->username, $bitly->api );
								        //     } 
								        // }
							        }
						                    //$link = get_bitly_short_url( $link, BITLY_USERNAME, BITLY_API_KEY );
        									?>  		
        <?php if ($value->{Tbl_posts::status} == 1) { ?>
                                                <span
									class="label label-success"> Active </span>
        <?php } elseif ($value->{Tbl_posts::status} == 0) { ?>
                                                <span
									class="label label-danger"> Inactive </span>
        <?php  } elseif ($value->{Tbl_posts::status} == 2) { ?>
                                                <span
									class="label label-warning"> Draff </span>
        <?php } ?>
        									
                                        </td>
								<td style="width: 80px;">
									<div class="btn-group">
										<button class="btn btn-sm dropdown-toggle"
											data-toggle="dropdown">
											<i class="icol-cog"></i> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<?php if(!empty($this->session->userdata ( 'progress' ))):?>
												<li><a
												href="<?php echo base_url(); ?>managecampaigns/postprogress?pid=<?php echo $value->{Tbl_posts::id}; ?>"><i class="icon-share"></i> Share now</a></li>
											<?php else:?>
												<li><a
												href="<?php echo base_url(); ?>facebook/shareation?post=getpost&pid=<?php echo $value->{Tbl_posts::id}; ?>"><i class="icon-share"></i> Share now</a></li>
											<?php endif;?>
<<<<<<< HEAD
											<li><a data-title="<?php echo $value->{Tbl_posts::name};?>" data-mlink="<?php echo @$mainlink;?>" data-img="<?php echo $content->picture; ?>" data-pre="<?php echo @$subTitle;?>" data-link="<?php echo @$link;?>" onclick="getcode(this);" href="javascript:void(0);"><i class="icon-pencil"></i> Get Link</a></li>
=======
											<li><a data-title="<?php echo @$shareTitle;?>" data-mlink="<?php echo @$mainlink;?>" data-img="<?php echo $content->picture; ?>" data-pre="<?php echo @$subTitle;?>" data-link="<?php echo @$link;?>" onclick="getcode(this);" href="javascript:void(0);"><i class="icon-pencil"></i> Get Link</a></li>
>>>>>>> 7d0313eaab6f7d5f6e7ab7003d7e9f55b8eadca2
											<?php
											$parse = parse_url($glink);
											//$bContent = preg_replace('/\s+/', '<sp>', $message);
                                    		$bContent = str_replace('/\n/g', '<br>', $message);
		        							if (!in_array(@$parse['host'], $siteUrl)):?>
											<li><a
												href="<?php echo base_url(); ?>wordpress/autopostwp?pid=<?php echo $value->{Tbl_posts::id}; ?>&action=uploadimage"><i class="icon-pencil"></i> Repost auto</a></li>
												<li><a onclick="postManual(this);" href="javascript:void(0);" data-title="<?php echo $value->{Tbl_posts::name};?>" data-pid="<?php echo $value->{Tbl_posts::id}; ?>" data-link="<?php echo $link;?>" data-mlink="<?php echo @$mainlink;?>" data-upoaded="<?php echo $uploaded;?>" data-message="<?php echo $bContent;?>"><i class="icon-pencil"></i> Repost manually</a></li>
											<?php endif;?>
											<li><a
												href="<?php echo base_url(); ?>managecampaigns/add?id=<?php echo $value->{Tbl_posts::id}; ?>"><i class="icon-pencil"></i> Edit</a></li>
											<li><a data-modal="true"
												data-text="Do you want to delete this Blog?"
												data-type="confirm" data-class="error" data-layout="top"
												data-action="managecampaigns/delete/deletecampaigns/<?php echo $value->{Tbl_posts::id}; ?>"
												class="btn-notification"><i class="icon-remove"></i> Remove</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
    <?php endforeach;endif; ?>
                            </tbody>
					</table>

					<!-- page -->
					<div class="row">
						<div class="dataTables_footer clearfix">
							<div class="col-md-4">
								<div class="dataTables_info" id="DataTables_Table_0_info">
                                        Showing 1 to <?php echo count($results); ?> of <?php echo $total_rows; ?> entries
                                    </div>
							</div>
							<div class="col-md-4">
								<div class="dataTables_paginate paging_bootstrap">
									<ul class="pagination">
                                        <?php echo $links; ?>
                                    </ul>
								</div>
							</div>
							<div class="col-md-4">								
								<button type="submit" id="multidel" name="delete"
									class="btn btn-google-plus pull-right" value="delete"><i class="icon-trash"></i> Delete</button>
								<button type="submit" id="multiedit" name="edit"
									class="btn btn-primary pull-right multiedit" value="edit" style="margin-right: 3px"><i class="icon-edit"></i> Edit</button>
								<button type="submit" id="multiecopy" name="copyto" class="btn btn-inverse pull-right multiecopy" value="copyto" style="margin-right: 3px"><i class="icon-copy"></i> Copy to</button>
							</div>
						</div>
					</div>
				</form>
				<!-- end page -->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$( document ).ready(function(){
		$('.multiecopy').click(function () {
		     if (!$('#itemid:checked').val()) {
		            alert('please select one');
		            return false;
		    } else {
		            //return confirm('Do you want to Copy These posts?');
		    }
		 });

		$("#getImacrosID").click(function() {
			
		});
	});
		function getComboA(selectObject) {
		    var value = selectObject.value;
		    if(value) {
		    	window.location = "<?php echo base_url();?>managecampaigns/index?result=" + value;
		    }
		}
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
                            //window.location = "<?php echo base_url(); ?>user/delete/" + id;
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
function getcode(e) {
	var mlink = $(e).attr('data-mlink');
	var link = $(e).attr('data-link');
	var title = $(e).attr('data-title');
	var img = $(e).attr('data-img');
	var pre = $(e).attr('data-pre');
	//var setHTml = '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td id="bgimage" colspan="3" style="background:#000000;height: 280px;overflow: hidden;background: no-repeat center center;background-size: cover; background: #000 center center no-repeat; background-size: 100%;border: 1px solid #000;background-image:url('+img+');"><a id="main_link" href="'+mlink+'" target="_top" rel="nofollow" style="display:block;height:280px;width:100%; text-align:center; background:url(https://3.bp.blogspot.com/-3ii7X_88VLs/XEs-4wFXMXI/AAAAAAAAiaw/d_ldK-ae830UCGsyOl0oEqqwDQwd_TqEACLcBGAs/s90/youtube-play-button-transparent-png-15.png) no-repeat center center;">&nbsp;</a></td></tr><tr><td style="background:#000 url(https://2.bp.blogspot.com/-Z_lYNnmixpM/XEs6o1hpTUI/AAAAAAAAiak/uPb1Usu-F-YvHx6ivxnqc1uSTIAkLIcxwCLcBGAs/s1600/l.png) no-repeat bottom left; height:39px; width:237px;margin:0;padding:0;"><a id="main_link_a" href="'+mlink+'" target="_top" rel="nofollow" style="display:block;height:39px;width:100%;">&nbsp;</a></td><td style="background:#000 url(https://1.bp.blogspot.com/-9nWJSQ3HKJs/XEs6o7cUv2I/AAAAAAAAiag/sAiHoM-9hKUOezozem6GvxshCyAMp_n_QCLcBGAs/s1600/c.png) repeat-x bottom center; height:39px;margin:0;padding:0;">&nbsp;</td><td style="background:#000 url(https://2.bp.blogspot.com/-RmcnX0Ej1r4/XEs6o-Fjn9I/AAAAAAAAiac/j50SWsyrs8sA5C8AXotVUG7ESm1waKxPACLcBGAs/s1600/r.png) no-repeat bottom right; height:39px; width:151px;margin:0;padding:0;">&nbsp;</td></tr></table><meta content="'+img+'" property="og:image"/><img class="thumbnail noi" style="text-align:center; display:none;" src="'+img+'"/><h2>'+title+'</h2>';
	var data = title + '\n' + pre +'\n'+link;
	$("#codetext").html(data);
	$('#exampleModal').modal('show');
	// if(code) {
	// 	var dataUser = code;
	// 	$("#codetext").html(dataUser);
	// 	$('#exampleModal').modal('show');
	// }
}
function postManual(e) {
	//$(e).text('there');
	var upoaded = $(e).attr('data-upoaded');
	var mlink = $(e).attr('data-mlink');
	var link = $(e).attr('data-link');
	var title = $(e).attr('data-title');
	title = title.replace('&quot;','"');
	title = title.replace('&#39;',"'");
	title = title.replace('& # 3 9 ;',"'");
	title = title.replace('&amp; # 3 9 ;',"'");
	var pid = $(e).attr('data-pid');
	var message = $(e).attr('data-message');
	message = message.replace(/\\/g, '');
	if(!mlink && upoaded) {
		var setTitle = '<div class="form-group"><input id="post_'+pid+'" class="form-control" value="'+title+'" onClick="copyText(this);"/></div>';
		var settext = '<div class="form-group"><textarea id="text_'+pid+'" class="form-control" id="codetext" onclick="copyText(this);">'+message+'</textarea></div>';
		var setMainLink = '<div class="form-group"><input data-pid="'+pid+'" onkeyup="setMLink(this);" id="mlink_'+pid+'" class="form-control" value="" placeholder="Set main link here" /></div>';
		$("#inform").html(setTitle+settext+setMainLink);
		$("#codetext").hide();
		$('#exampleModal').modal('show');
	}
}
function setMLink(e) {
	var mlink = $(e).val();
	var pid = $(e).attr('data-pid');
	if(mlink) {
		$.get("<?php echo base_url();?>managecampaigns/postauto?pid="+pid+"&bid=&action=generate&blog_link_id=&addbloglink="+mlink, function(data, status){
			alert("Status: " + status);
		});
	}
}
function copyText(e) {
	//alert(e);
 e.select();
 //  document.execCommand('copy');
 //  	var n = noty({
	//     text: 'copyed',
	//     type: 'success',
	//     dismissQueue: false,
	//     layout: 'top',
	//     theme: 'defaultTheme'
	// });

 //    setTimeout(function () {
 //        $.noty.closeAll();
 //    }, 1000);
}
    </script>   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Get Link to share</h4>
      </div>
      <div class="modal-body">
        <form>
        	<div id="inform"></div>
          <div class="form-group">
            <textarea class="form-control" id="codetext" onClick="copyText(this);"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
} else {
	echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>
