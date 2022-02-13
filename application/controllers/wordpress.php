<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Wordpress extends CI_Controller
{
    protected $mod_general;
    const Day = '86400';
    const Week = '604800';
    const Month = '2592000';
    const Year = '31536000';
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'Mod_general' );
        $this->load->library ( 'dbtable' );
        $this->load->theme ( 'layout' );
        $this->mod_general = new Mod_general ();
        TIME_ZONE;
        $this->load->library('Breadcrumbs');

        if (!$this->session->userdata ( 'user_id' )) {
            redirect(base_url() . '?continue=' . urlencode(base_url().'managecampaigns/index'));
        } 
    }
    public function index() {
        $data['title'] = 'Autopost';
        $this->load->view('layout/wordpress/index', $data);
    }

    public function autopostwp() {
        date_default_timezone_set("Asia/Phnom_Penh");
        $log_id = $this->session->userdata ( 'user_id' );
        $user = $this->session->userdata ( 'email' );
        $provider_uid = $this->session->userdata ( 'provider_uid' );
        $provider = $this->session->userdata ( 'provider' );
        $gemail = $this->session->userdata ('gemail');
        $fbUserId = $this->session->userdata('fb_user_id');
        $sid = $this->session->userdata ( 'sid' );
        $post_only = $this->session->userdata ( 'post_only' );
        header("Access-Control-Allow-Origin: *");
        $action = $this->input->get('action');

        $this->load->theme ( 'layout' );
        $data ['title'] = 'Auto Post to Wordpress';

        /*breadcrumb*/
        $this->breadcrumbs->add('<i class="icon-home"></i> Home', base_url());
        if($this->uri->segment(1)) {
            $this->breadcrumbs->add('blog post', base_url(). $this->uri->segment(1)); 
        }
        $this->breadcrumbs->add('Setting', base_url().$this->uri->segment(1));
        $data['breadcrumb'] = $this->breadcrumbs->output();  
        /*End breadcrumb*/
        $pid = $this->input->get('pid');
        $link = $data['link'] = $this->input->get('link');
        $wPost = array (
            'user_id' => $log_id,
            'p_id' => $pid,
        );
        $getPost = $this->Mod_general->select ( Tbl_posts::tblName, '*', $wPost );

        /*show fbconfig*/
        $wFbconfig = array(
            'meta_name'      => 'fbconfig',
            'object_id'     => $log_id,
            'meta_key'     => $sid,
        );
        $query_fb = $this->Mod_general->select('meta', '*', $wFbconfig);
        $data['query_fb'] = $accounts = json_decode($query_fb[0]->meta_value);
        /*End show fbconfig*/

        $action = $this->input->get('action');
        if($action == 'shareToGroup') {
            /*get group*/
            // $wGList = array (
            //     'lname' => 'post_progress',
            //     'l_user_id' => $log_id,
            //     'l_sid' => $sid,
            // );
            // $geGList = $this->Mod_general->select ( 'group_list', '*', $wGList );
            // if(empty($geGList)) {
            //     $wGList = array (
            //         'l_user_id' => $log_id,
            //         'l_sid' => $sid,
            //     );
            //     $geGList = $this->Mod_general->select ( 'group_list', '*', $wGList );
            // }
            $where_uGroup = array (
                    Tbl_social_group::socail_id => $sid,
                    Tbl_social_group::status => 1,
                    Tbl_social_group::type => 'groups' 
            );
            $data['group_list'] = $this->Mod_general->select ( Tbl_social_group::tblName, '*', $where_uGroup );
            /*End get group*/
        }
                    

        if(!empty($getPost[0])) {
            if(!empty($this->input->get('unlink'))) {
                $unfile = FCPATH . 'uploads/image/'.$this->input->get('unlink');
                @unlink($unfile);
            }
            $data['post']= $getPost;
            if($action == 'uploadimage') {                
                $pConent = json_decode($getPost[0]->p_conent);
                $thumb = $pConent->picture;
                $ext = pathinfo($thumb, PATHINFO_EXTENSION);
                if (preg_match('/fbpost\\\uploads/', $thumb)) {
                    //@copy($thumb, $fileName);
                    $file_titles = basename($thumb);
                    $file_titles = explode('.', $file_titles);
                    $file_title = $file_titles[0];
                    $fileName = $thumb;
                    //@unlink($thumb);
                } else {
                    $file_title = strtotime(date('Y-m-d H:i:s'));
                    $fileName = FCPATH . 'uploads/image/'.$file_title.'.'.$ext;
                    $ch = curl_init($thumb);
                    $fp = fopen($fileName, 'wb');
                    curl_setopt($ch, CURLOPT_FILE, $fp);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_exec($ch);
                    curl_close($ch);
                    fclose($fp);
                }
                $str = str_replace('/', '\\', $fileName);
                $str = str_replace('\\', '\\\\', $str);
                $data['fileupload'] = $str;
                $data['imgname'] = $file_title;
                $data['imgext'] = $ext;
            }
            // $pConent = json_decode($getPost[0]->p_conent);
            // $pOption = json_decode($getPost[0]->p_schedule);
            // var_dump($pConent);
        }
        if(!empty($getPost[0]) && !empty($this->input->get('img'))) {
            $img = $this->input->get('img');
            $img = str_replace('http:', 'https:', $img);
            $site = $this->input->get('site');
            $imgid = $this->input->get('imgid');
            $whereUp = array('p_id' => $pid);
            /*update post*/
            $pConent = json_decode($getPost[0]->p_conent);
            $content = array (
                'name' => $pConent->name,
                'message' => $pConent->message,
                'caption' => $pConent->caption,
                'link' => $pConent->link,
                'mainlink' => $pConent->mainlink,
                'picture' => $img,                            
                'vid' => $pConent->vid,                            
            );
            $dataPostInstert = array (
                Tbl_posts::conent => json_encode ( $content )
            );
            $updates = $this->Mod_general->update( Tbl_posts::tblName,$dataPostInstert, $whereUp);
            if($updates) {
                @unlink($this->input->get('unlink'));
                $setUrl = base_url() . 'wordpress/autopostwp?pid='.$pid.'&action=postwp&imgid='.$imgid.'&site='.$site;
                redirect($setUrl);
            }
            /*End update post*/
        }
        if(!empty($getPost[0]) && strlen($link)>20) {
            /*update post*/
            if($post_only) {
                $p_progress = 1;
            } else {
                $p_progress = 0;
            }
            $pConent = json_decode($getPost[0]->p_conent);
            if(!empty($link)) {
                $whereUp = array('p_id' => $pid);
                $links = @str_replace('?preview=true', '', $link);
                $content = array (
                    'name' => $pConent->name,
                    'message' => $pConent->message,
                    'caption' => $pConent->caption,
                    'link' => $links,
                    'mainlink' => $links,
                    'picture' => $pConent->picture,                            
                    'vid' => $pConent->vid,                            
                );
                $dataPostInstert = array (
                    Tbl_posts::conent => json_encode ( $content ),
                    'p_post_to' => 0,
                    'p_progress' => $p_progress,
                );
                $updates = $this->Mod_general->update( Tbl_posts::tblName,$dataPostInstert, $whereUp);
                if($updates) {
                    if(!empty($accounts->id)) {
                        echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?pid='.$pid.'&action=shareToPage";}, 5 );</script>';
                        die;
                    } else {
                        echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/close";}, 5 );</script>';
                        die;
                    }


                    

                    //  /*check next post*/
                    // $whereNext = array (
                    //     'user_id' => $log_id,
                    //     'u_id' => $sid,
                    //     'p_post_to' => 1,
                    // );
                    // $nextPost = $this->Mod_general->select ( Tbl_posts::tblName, 'p_id', $whereNext );
                    // if(!empty($nextPost[0])) {
                    //     $p_id = $nextPost[0]->p_id;
                    //     echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/yturl?pid='.$p_id.'&action=postblog";}, 30 );</script>'; 
                    //         die;
                    // } else {
                    //     $setUrl = base_url() . 'managecampaigns';
                    //     redirect($setUrl);                        
                    // }
                    // /*End check next post*/
                }
            }
            /*End update post*/
        } else if(!empty($data['link']) && strlen($data['link'])<20) {

            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?pid='.$pid.'&action=uploadimage";}, 3000 );</script>';
            exit();
        }

        /*AutoPost*/
        $whereShowAuto = array(
            'c_name'      => 'autopost',
            'c_key'     => $log_id,
        );
        $autoData = $this->Mod_general->select('au_config', '*', $whereShowAuto);
        if(!empty($autoData[0])) {
            $data['autopost'] = json_decode($autoData[0]->c_value);
        }

        /*End AutoPost*/
        $data['userrole'] = $this->Mod_general->userrole('uid');
        $this->load->view('wordpress/autopostwp', $data);
    }

    public function post()
    {
        $log_id = $this->session->userdata ( 'user_id' );
        $user = $this->session->userdata ( 'email' );
        $provider_uid = $this->session->userdata ( 'provider_uid' );
        $provider = $this->session->userdata ( 'provider' );
        $gemail = $this->session->userdata ('gemail');
        $fbUserId = $this->session->userdata('fb_user_id');
        $sid = $this->session->userdata ( 'sid' );
        $post_only = $this->session->userdata ( 'post_only' );
        $this->load->theme ( 'layout' );
        $data ['title'] = 'Post to Wordpress by Manual';
        if ($this->input->post ( 'link' )) {
            $this->session->set_userdata('pia', 1);
            $link = trim($this->input->post ( 'link' ));
            $title = trim(@$this->input->post ( 'title' ));
            $thumbs = @$this->input->post ( 'thumb' );
            $asThumb = @$this->input->post ( 'asThumb' );
            $label = @$this->input->post ( 'label' );
            $addvideo = @$this->input->post ( 'addvideo' );
            if($label == 'lotto') {
                $thumb = $this->imageMerge($thumbs,$asThumb);
            }
            if(empty($thumb)) {
                $thumb = '';
            }
            require_once(APPPATH.'controllers/managecampaigns.php');
            $Managecampaigns =  new Managecampaigns();
            $getdata = $Managecampaigns->insertLink($link,$title,$thumb,$label,$thumbs,$addvideo);
            if(!empty($getdata)) {
                //echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/autopostfb?action=post&pid='.$getdata.'";}, 10 );</script>';
                echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/yturl?pid='.$getdata.'&action=postblog";}, 10 );</script>';
                exit();
            }
        }
        $this->load->view('wordpress/post', $data);
    }
    public function imageMerge($thumbs=array(),$asThumb=array())
    {
        $setArr = array();
        if(!empty($thumbs[0])) {
            for ($i=0; $i < count($thumbs); $i++) { 
                if(!empty($thumbs[$i])) {
                    if($asThumb[$i] == 'set') {
                        array_push($setArr, $thumbs[$i]);
                    }
                }
            }
            $count = count($setArr);
            $setWeight = 1200;
            $setHeight = 635;
            $thumb = '';
            for ($j=0; $j < count($setArr); $j++) {
                if(!empty($setArr[$j])) {
                    switch ($count) {
                        case 1:
                            $thumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],$setWeight,($setHeight-95)),'lt');
                            $textPosition = 45;
                            $bgPosition = 'cb';
                            break;
                        case 2:
                            if($j==0) {
                                $setThumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],($setWeight/2)-1,$setHeight),'lt');
                            } else {
                                $thumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],($setWeight/2)-1,$setHeight),'rb');
                            }
                            $textPosition = 30;
                            $bgPosition = 'cb';
                            break;
                        case 3:
                            if($j==0) {
                                $setThumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],($setWeight/3)-1,$setHeight),'lt');
                            } else if($j==1) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],($setWeight/3)-1,$setHeight),'cc');
                            } else {
                                $thumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],($setWeight/3)-1,$setHeight),'rt');
                            }
                            $textPosition = 30;
                            $bgPosition = 'cb';
                            break;
                        case 4:
                            if($j==0) {
                                $setThumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-1)),'lt');
                            } else if($j==1) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-1)),"rt");
                            } else if($j==2) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-1)),'lb');
                            }  else {
                                $thumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-1)),'rb');
                            }
                            $textPosition = 30;
                            $bgPosition = 'cb';
                            break;
                        case 5:
                            $padding = 1;
                            // $w = array();
                            // $l = array_rand($RanChoose);
                            // $getChoose = $RanChoose[$l];
                            if($j==0) {
                                $setThumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-$padding)),'lt');
                            } else if($j==1) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/2)-1),(($setHeight/2)-$padding)),'ct');
                            } else if($j==2) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-$padding)),'rt');
                            }  else if($j==3) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-$padding)),'lb');
                            } else {
                                $thumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-$padding)),'rb');
                            }
                            $textPosition = 30;
                            $bgPosition = 'cb';
                            break;
                        case 6:
                            if($j==0) {
                                $setThumb = $this->mod_general->mergeImages('',$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'lt');
                            } else if($j==1) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'ct');
                            } else if($j==2) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'rt');
                            } else if($j==3) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'lb');
                            } else if($j==4) {
                                $setThumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'cb');
                            } else {
                                $thumb = $this->mod_general->mergeImages($setThumb,$this->mod_general->crop_image($setArr[$j],(($setWeight/3)-1),(($setHeight/2)-1)),'rb');
                            }
                            $textPosition = 30;
                            $bgPosition = 'cb';
                            break;
                        default:
                            # code...
                            break;
                    }
                    
                }
            }
            if(!empty($thumb)) {
                $thumb = $this->mod_general->watermarktextAndLogo($thumb,$bgPosition,$textPosition);
            }
        }
        return @$thumb;
    }
    public function wait()
    {
        date_default_timezone_set("Asia/Phnom_Penh");
        $log_id = $this->session->userdata ( 'user_id' );
        $user = $this->session->userdata ( 'email' );
        $provider_uid = $this->session->userdata ( 'provider_uid' );
        $provider = $this->session->userdata ( 'provider' );
        $gemail = $this->session->userdata ('gemail');
        $fbUserId = $this->session->userdata('fb_user_id');
        $sid = $this->session->userdata ( 'sid' );
        $post_only = $this->session->userdata ( 'post_only' );
        header("Access-Control-Allow-Origin: *");

        $this->load->theme ( 'layout' );
        $data ['title'] = 'Auto Post to Wordpress';

        /*breadcrumb*/
        $this->breadcrumbs->add('<i class="icon-home"></i> Home', base_url());
        if($this->uri->segment(1)) {
            $this->breadcrumbs->add('blog post', base_url(). $this->uri->segment(1)); 
        }
        $this->breadcrumbs->add('Setting', base_url().$this->uri->segment(1));
        $data['breadcrumb'] = $this->breadcrumbs->output();  
        /*End breadcrumb*/
        $data['postAto'] = $this->Mod_general->getActionPost();
        $this->load->view('wordpress/wait', $data);
    }
    public function close()
    {
        date_default_timezone_set("Asia/Phnom_Penh");
        $log_id = $this->session->userdata ( 'user_id' );
        $user = $this->session->userdata ( 'email' );
        $provider_uid = $this->session->userdata ( 'provider_uid' );
        $provider = $this->session->userdata ( 'provider' );
        $gemail = $this->session->userdata ('gemail');
        $fbUserId = $this->session->userdata('fb_user_id');
        $sid = $this->session->userdata ( 'sid' );
        $post_only = $this->session->userdata ( 'post_only' );
        header("Access-Control-Allow-Origin: *");

        $this->load->theme ( 'layout' );
        $data ['title'] = 'Auto Post to Wordpress';

        /*breadcrumb*/
        $this->breadcrumbs->add('<i class="icon-home"></i> Home', base_url());
        if($this->uri->segment(1)) {
            $this->breadcrumbs->add('blog post', base_url(). $this->uri->segment(1)); 
        }
        $this->breadcrumbs->add('Setting', base_url().$this->uri->segment(1));
        $data['breadcrumb'] = $this->breadcrumbs->output();  
        /*End breadcrumb*/
        $this->load->view('wordpress/close', $data);
    }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
