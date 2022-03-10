<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="page-header">
    </div>
    <div class="row">
        <form method="post" id="validate" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4>
                            <i class="icon-reorder">
                            </i>
                            <?php echo @$title;?>
                        </h4>                     
                        <div class="toolbar no-padding">
                        </div>
                    </div>
                    <div class="widget-content">
                        <?php if(!empty($_GET['id'])):?>
                        <div class="row has-success" style="margin-bottom:10px;">
                            <div class="col-md-4">
                                <label for="imageid">ID:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" onclick="this.focus(); this.select()" class="form-control" value="<?php echo $_GET['id'];?>" />
                            </div>                         
                        </div>
                        <?php endif;?>
                        <?php if(!empty($error)):?>
                            <?php var_dump($error);?>
                        <?php endif;?>    
                            <table class="table table-striped table-condensed table-hover table-checkable datatable">
                                <thead>
                                    <tr>
                                        <th style="width:10px"><input type="checkbox" class="uniform" name="allbox"
                                            id="checkAll" /></th>
                                        <th style="width:135px">ID</th>
                                        <th>Page ID</th>
                                        <th style="width:120px">Page Name</th>
                                    </tr>
                                </thead>
                            </table>
                            <div style="height:400px;overflow: auto;">
                                <table class="table table-striped table-condensed table-hover table-checkable datatable">                                        
                                    <tbody>
                                        <div class="form-group"> 
                                            <div class="col-md-1">
                                                <input type="checkbox" id="itemid"
                                                    name="itemid[]" class="uniform"
                                                    value=""/>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="itemidall[]" class="form-control" placeholder="FB ID">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="itemname[]" class="form-control" placeholder="ឈ្មោះ / Name">
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <div class="col-md-1">
                                                <input type="checkbox" id="itemid"
                                                    name="itemid[]" class="uniform"
                                                    value=""/>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="itemidall[]" class="form-control" placeholder="FB ID">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="itemname[]" class="form-control" placeholder="ឈ្មោះ / Name">
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <div class="col-md-1">
                                                <input type="checkbox" id="itemid"
                                                    name="itemid[]" class="uniform"
                                                    value=""/>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="itemidall[]" class="form-control" placeholder="FB ID">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="itemname[]" class="form-control" placeholder="ឈ្មោះ / Name">
                                            </div>
                                        </div>
                                        </tbody>
                                </table>
                            </div>
                            <div class="form-actions"> 
                                <input type="submit" name="submit" value="Add" class="btn btn-primary pull-right"/>
                            </div> 
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>


<style>
    .radio-inline{}
    .error {color: red}
    #blockuis{padding:10px;position:fixed;z-index:99999999;background:rgba(0, 0, 0, 0.73);top:20%;left:50%;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);}
</style>
<div style="display:none;text-align:center;font-size:20px;color:white" id="blockuis">
    <div id="loaderimg" class=""><img align="middle" valign="middle" src="http://2.bp.blogspot.com/-_nbwr74fDyA/VaECRPkJ9HI/AAAAAAAAKdI/LBRKIEwbVUM/s1600/splash-loader.gif"/>
    </div>
    Please wait...
</div>
<code id="codeB" style="width:300px;overflow:hidden;display:none"></code>   
<code id="examplecode5" style="width:300px;overflow:hidden;display:none">var urlHome=&quot;<?php echo base_url();?>&quot;,datasource=&quot;C:\\myImacros\\&quot;;var codedefault1=&quot;TAB CLOSEALLOTHERS\n SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 10\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var codedefault2=&quot;SET !EXTRACT_TEST_POPUP NO\n SET !TIMEOUT_PAGE 180\n SET !ERRORIGNORE YES\n SET !TIMEOUT_STEP 0.1\n&quot;;var wm=Components.classes[&quot;@mozilla.org/appshell/window-mediator;1&quot;].getService(Components.interfaces.nsIWindowMediator);var window=wm.getMostRecentWindow(&quot;navigator:browser&quot;);var glists=null;var uid='';</code>   
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
        $(document).ready(function() {
            $("#getImacrosID").click(function() {
                var iMGroups = $('#iMacrosGroups').val();
                var obj = JSON.parse(iMGroups);
                var dataUser = "";
                for (i = 0; i < obj.length; i++) { 
                    dataUser += '<tr>';
                    dataUser += '<td style="width:10px" class="checkbox-column">';
                    dataUser += '<input type="hidden" id="itemid" name="itemidall[]" class="uniform" value="' + obj[i].gid + '||' + obj[i].gname + '||" /><input type="checkbox" id="itemid" name="itemid[]" class="uniform" value="' + obj[i].gid + '||' + obj[i].gname + '||" /></td>';
                    dataUser += '<td style="width:135px"><a href="http://fb.com/' + obj[i].gid + '" target="_blank">' + obj[i].gid + '</a></td>';
                    dataUser += '<td><a href="http://fb.com/' + obj[i].gid + '" target="_blank">' + obj[i].gname + '</a></td>';
                    dataUser += '<td style="width:100px">0</td>';
                    dataUser += '</tr>';
                }
                $("#group_from_imacros").html(dataUser);
                $("#iMacrosGroupsWrap").fadeOut();
            });
        });
    </script>  