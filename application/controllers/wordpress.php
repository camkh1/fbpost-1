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
        if(!empty($getPost[0])) {
            $data['post']= $getPost;
            // $pConent = json_decode($getPost[0]->p_conent);
            // $pOption = json_decode($getPost[0]->p_schedule);
            // var_dump($pConent);
        }
        if(!empty($getPost[0]) && strlen($link)>20) {
            /*update post*/
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
                    'p_progress' => 1,
                );
                $updates = $this->Mod_general->update( Tbl_posts::tblName,$dataPostInstert, $whereUp);
                if($updates) {
                    $setUrl = base_url() . 'wordpress/wait';
                    redirect($setUrl);
                }
            }
            /*End update post*/
        } else if(!empty($data['link']) && strlen($data['link'])<20) {

            echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'wordpress/autopostwp?pid='.$pid.'&action=postblog";}, 3000 );</script>';
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
            $link = $this->input->post ( 'link' );
            $title = @$this->input->post ( 'title' );
            $thumb = @$this->input->post ( 'thumb' );
            require_once(APPPATH.'controllers/managecampaigns.php');
            $Managecampaigns =  new Managecampaigns();
            $getdata = $Managecampaigns->insertLink($link,$title,$thumb);
            if(!empty($getdata)) {
                //echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/autopostfb?action=post&pid='.$getdata.'";}, 10 );</script>';
                echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/yturl?pid='.$getdata.'&action=postblog";}, 10 );</script>';
                exit();
            }
        }
        $this->load->view('wordpress/post', $data);
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

}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
