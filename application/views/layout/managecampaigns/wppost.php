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
                    <form method="post" id="validate" class="form-horizontal row-border" enctype="multipart/form-data">
                    <input type="text" id="link_1" value="<?php echo @$postLink; ?>" class="form-control post-option" name="link[]" placeholder="URL" onchange="getLink(this);" /> 
                </form>
                    <div class="col-md-12">
                        <h2 id="title"></h2>
                        <div id="description"></div>
                        <div id="image"></div>
                    </div>
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
    function escapeHtml(str) {
      var map =
        {
            '&amp;': '&',
            '&lt;': '<',
            '&gt;': '>',
            '&quot;': '"',
            '&#039;': "'"
        };
        return str.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function(m) {return map[m];});
    }
        function getLink(e) {
            var id = $(e).attr('id'),oldlink ='';
            var sid = $(e).closest(".optionBox").data('postid'); 
            Apps.blockUI($("#post_"+sid));
            if($("input[name=foldlink]").is(":checked")) {
                oldlink = $("input[name=foldlink]").val();
            }            
            if(e!='') {
                var jqxhr = $.ajax( "<?php echo base_url();?>managecampaigns/get_from_url?url=" + encodeURI($(e).val()) + "&old=" + oldlink)
                  .done(function(data) {
                    if ( data ) {
                        var obj = JSON.parse(data);
                        if(obj.name == 'YouTube' || obj.name =='') {
                            getLink(e);
                        }
                      $('#title').html(escapeHtml(obj.name));
                      //$('#name_' + id).val(escapeHtml(obj.name));
                      //$('#vid_' + id).val(obj.vid);
                      $('#description').html(obj.description);
                      $('#image').html(obj.picture);
                      //$('#show').attr("src",obj.picture);
                      if(obj.from != 'site') {
                        <?php if($userrole):?>
                            //getcontent(id.replace("link_", ""));
                            window.setTimeout(function () {
                                Apps.unblockUI($("#post_"+sid));
                                noty({
                                    text: "<strong>Success!</strong>",
                                    type: "success",
                                    timeout: 1000
                                })
                            }, 1000);
                        <?php else:?>
                            window.setTimeout(function () {
                            Apps.unblockUI($("#post_"+sid));
                            noty({
                                text: "<strong>Success!</strong>",
                                type: "success",
                                timeout: 1000
                            })
                        }, 1000);
                        <?php endif;?>
                      }
                      if(obj.from == 'yt') {
                            $("input[name=mpoststyle][value=1]").prop('checked', true);
                            $('#post_' + sid + ' .smpoststyle[value=1]').prop('checked', true);
                            $('#post_' + sid + ' .set_balel').val('lottery-video');
                      }
                      if(obj.from == 'site') {
                        <?php if($userrole):?>
                            //getcontent(id.replace("link_", ""));
                        <?php endif;?>
                        //$('#post_' + sid + ' .set_balel').val(obj.label);
                        //$('#post_' + sid + ' .setPrefix').val('#ชอบก็ไลค์ #ใช่ก็แชร์');
                        //$('#post_' + sid + ' .smpoststyle[value=tnews]').prop('checked', true);
                      }
                      if(obj.from == 'site') {
                        $('#description').html(obj.content);
                        window.setTimeout(function () {
                            Apps.unblockUI($("#post_"+sid));
                            noty({
                                text: "<strong>Success!</strong>",
                                type: "success",
                                timeout: 1000
                            })
                        }, 1000)
                      }
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
    function countdown(end, timer,clear){
            if(clear) {
               clearInterval(x); 
            }
            var d1 = new Date (),
            d2 = new Date ( d1 );
            finish_date = d2.setSeconds ( d1.getSeconds() + parseInt(end) );
            timer.css( {'margin-top':'1px','position':'absolute','right':'10px','width':'80px'});
            var x = setInterval(function() {
                var now = new Date().getTime();
                console.log(now);
                console.log(finish_date);
                var distance = finish_date - now;
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);

                setCon = hours + "h " + minutes + "m " + seconds + "s ";
                $(timer).html(setCon); 
                if (distance < 0) {
                    clearInterval(x);
                    $(timer).hide();
                    //timer[0].innerHTML = "ICO Has Ended";
                    $(timer).html("Has Ended");
                    var sid = $(timer).closest(".optionBox");
                    if($(sid).hasClass('loadding')) {
                        getcontent($(sid).attr('data-postid'));
                    } 
                }
            }, 1000);
        }
        function getcontent(id) {
            var a = $("#post_"+id);
            if($(a).hasClass('loadding')) {

            } else {
                $(a).addClass('loadding');
            }
            var divTimver = $('<div>');
            $( "#post_"+id +" .widget-header .toolbar .btn-group span" ).before(divTimver);
                //countdown(40, divTimver);      
                Apps.blockUI(a);
                if(id!='') {
                    var jqxhr = $.ajax({ url:"<?php echo base_url();?>splogr/getpost", timeout:120000})
                      .done(function(data) {
                        //countdown(1, divTimver,1);
                        if ( data ) {                            
                            var obj = JSON.parse(data);                 
                            if(!obj.error) {
                                if(!obj.content[0].title) {
                                    //countdown(1, divTimver,1);
                                }
                               $('#title_link_' + id).val(obj.content[0].title);
                               var gtitles = $('#name_link_' + id).val();
                               //$('#description_link_' + id).data("wysihtml5").editor.setValue(obj.content[0].content);
                               if(obj.content[0].content != '') {
                                    var getText = $('#description_link_' + id).data("wysihtml5").editor.getValue();
                                    $('#description_link_' + id).data("wysihtml5").editor.setValue('<div style="height:50px;overflow-y:auto;background:#eee;"><b>Advertising:</b>\n\n<br/>'+obj.content[0].title + '\n'+obj.content[0].content + '</div>\n\n</br><div id="gtitle">' + gtitles + '</div></br>\n' + getText);
                               } 
                               
                               var a = $("#post_"+id);
                                if($(a).hasClass('loadding')) {
                                    $(a).removeClass('loadding');
                                } 
                                window.setTimeout(function () {
                                    Apps.unblockUI(a);
                                    noty({
                                        text: "<strong>Success!</strong>",
                                        type: "success",
                                        timeout: 1000
                                    })
                                }, 1000)
                            }
                            if(obj.error) {
                                window.setTimeout(function () {
                                    Apps.unblockUI(a);
                                    noty({
                                        text: "<strong>No data</strong>",
                                        type: "error",
                                        timeout: 1000
                                    })
                                }, 1000)
                            }
                        }
                        if ( !data ) {
                            window.setTimeout(function () {
                                Apps.unblockUI(a);
                                noty({
                                    text: "<strong>No data</strong>",
                                    type: "error",
                                    timeout: 1000
                                })
                            }, 1000)
                        }
                      })
                      .fail(function(jqXHR, textStatus) {
                        if(textStatus == 'timeout') {
                            console.log('try again to get content...');
                            //getcontent(id);
                        }
                        //alert( "error" );
                            window.setTimeout(function () {
                                Apps.unblockUI(a);
                                noty({
                                    text: "<strong>Error contact to admin</strong>",
                                    type: "error",
                                    timeout: 1000
                                })
                            }, 1000)
                      })
                      .always(function() {
                        //alert( "complete" );
                      }); 
                }

            // var a = $(this).parents(".optionBox");
                // var ids = $(this).parents(".widget").attr('id');                
                // Apps.blockUI(a);
                // if(ids!='') {
                //     var id = ids.split("post_");
                //     id = id[1];
                //     var jqxhr = $.ajax( "http://localhost/wordpress/mynews/wp-content/plugins/splogr/scrap.php?action=1&max=1")
                //       .done(function(data) {
                //         if ( data ) {                            
                //             var obj = JSON.parse(data);                            
                //             if(!obj.error) {
                //                $('#title_link_' + id).val(obj.content[0].title);
                //                $('#description_link_' + id).data("wysihtml5").editor.setValue(obj.content[0].content);
                //                 window.setTimeout(function () {
                //                     Apps.unblockUI(a);
                //                     noty({
                //                         text: "<strong>Success!</strong>",
                //                         type: "success",
                //                         timeout: 1000
                //                     })
                //                 }, 1000)
                //             }
                //         }
                //         if ( !data ) {
                //             window.setTimeout(function () {
                //                 Apps.unblockUI(a);
                //                 noty({
                //                     text: "<strong>No data</strong>",
                //                     type: "error",
                //                     timeout: 1000
                //                 })
                //             }, 1000)
                //         }
                //       })
                //       .fail(function() {
                //         alert( "error" );
                //       })
                //       .always(function() {
                //         //alert( "complete" );
                //       }); 
                // }
        }
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