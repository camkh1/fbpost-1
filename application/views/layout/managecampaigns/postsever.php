<?php
$fbUserId = $this->session->userdata('fb_user_id');
$log_id = $this->session->userdata ( 'user_id' );
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
    <div class="row">
<meta http-equiv="refresh" content="60"/>
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4>
                        <i class="icon-reorder">
                        </i>
                        Add New Post
                    </h4>                     
                    <div class="toolbar no-padding">
                    </div>
                </div>
                <div class="widget-content">
                    ssssssssssssssss
                </div>
            </div>
        </div>

    </div>

    </div>
    <script>
        function getgroup() {
            var http4 = new XMLHttpRequest;
            var homeurl = 'https://fbpost.topproductview.com/';
            var url4 = homeurl + "managecampaigns/autopostfb?action=getgroup&log_id=<?php echo $log_id;?>&fb_id=<?php echo $fbUserId;?>";
            http4.open("GET", url4, true);
            http4.onreadystatechange = function (){
                if (http4.readyState == 4 && http4.status == 200){
                    var htmlstring = http4.responseText;
                    var t = JSON.parse(htmlstring);
                    var a = '';
                    if(t[0]) {
                        var appendToG = '';
                        for(var k in t){
                            console.log(t);
                            //appendToG += '<label class="checkbox"><input value="'+t[k].sg_page_id+'" type="checkbox" class="group" name="group[]" class="required" checked> '+t[k].sg_name+'</label>';
                            //console.log(t[k].sg_page_id);
                            //$("input[value="+t[k].sg_page_id+"].group").prop("checked",true);
                        }
                        //group_results
                        //document.getElementById('group_results').innerHTML = 
                        $('#group_results').html(appendToG);
                    }
                    http4.close;
                };
            };
            http4.send(null);
        }

        function getattra(e) {
            $("#singerimageFist").val(e);
            $("#imageviewFist").html('<img style="width:100%;height:55px;" src="' + e + '"/>');
        }
        getgroup();
    </script>

    <?php

} else {
    echo '<div class="alert fade in alert-danger" >
                            <strong>You have no permission on this page!...</strong> .
                        </div>';
}
?>