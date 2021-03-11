<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="page-header">
    </div>
    <div class="row"> 
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget box">
                                    <div class="widget-content">
                                        <form class="form-horizontal row-border" action="" method="post"> 
                                        <div class="ribbon-wrapper ribbon-top-right"> <div class="ribbon orange">add</div> </div>
                                        <p class="khmer">បន្ថែមក្រុមតម្កល់</p>                                        
                                        <div class="form-group">
                                            <div class="col-md-5"><input type="text" name="gid" class="form-control" value="<?php echo @$this->input->get('gid');?>" placeholder="Group ID"/></div>
                                            <div class="col-md-4">
                                                <input type="text" name="gname" class="form-control" value="<?php echo @$this->input->get('gname');?>" placeholder="Group Name"/>
                                            </div>                                            
                                            <div class="col-md-3">
                                                <select name="gtype" class="select2" style="width: 100%" required>
                                                    <option value="" selected>Select</option>
                                                    <option value="Public" <?php echo (@$this->input->get('Public') == 1 ? 'selected' :'');?>>Public</option>
                                                    <option value="Private"  <?php echo (@$this->input->get('Private') == 1 ? 'selected' :'');?>>Private</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input name="submit" type="submit" value="Addg" class="btn btn-primary pull-right" />
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>                                
                            <div class="col-md-8">
                                <div class="widget box">
                                    <div class="widget-content">
                                        <div class="ribbon-wrapper ribbon-top-right"> 
                                            <div class="ribbon orange">groups list</div> 
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Suorce code</label>
                                            <div class="col-md-10">
                                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($list)):
                                            $i = 1;
                                            foreach ($list as $key => $value):?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><a href="https://facebook.com/groups/<?php echo $value->object_id;?>" target="_blank"><?php echo $value->object_id;?></a></td>
                                            <td><a href="https://facebook.com/groups/<?php echo $value->object_id;?>" target="_blank"><?php echo $value->meta_name;?></a></td>
                                            <td><span class="label label-success"><?php echo $value->meta_value;?></span></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="<?php echo base_url();?>facebook/setting?group=<?php echo @$value->meta_id;?>" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a> </li>
                                                    <li><a href="<?php echo base_url();?>facebook/setting?del=<?php echo $value->meta_id;?>&type=blogger_id" class="bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash" style="color: red"></i></a> </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                         endforeach; endif;?>                                        
                                    </tbody>
                                </table>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="submit" type="submit" value="Submit" class="btn btn-primary pull-right" />
                                </div>
                            </div> 
                        </div>

                            
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
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
  