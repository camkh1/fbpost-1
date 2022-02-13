<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Getcontent extends CI_Controller
{
    protected $mod_general;
    public function __construct() {
        parent::__construct();
        $this->load->model('Mod_general');
        $this->load->library('dbtable');
        $this->load->theme('layout');
        $this->mod_general = new Mod_general();
        TIME_ZONE;
        $this->load->library('Breadcrumbs');
    }
    public function index() {
        $data['title'] = 'Autopost';
        $this->load->view('layout/splogr/index', $data);
    }
    public function getLinkFromSite($url='')
    {
        $log_id = $this->session->userdata ( 'user_id' );
        /*clean*/
        $oneDaysAgo = date('Y-m-d', strtotime('-30 days', strtotime(date('Y-m-d'))));
        $where_pro = array('meta_name' => $log_id . 'sitelink','meta_key <= '=> $oneDaysAgo);
        $getProDel = $this->Mod_general->select('meta', '*', $where_pro);
        foreach ($getProDel as $prodel) {
            @$this->Mod_general->delete ( 'meta', array (
                'meta_id' => $prodel->meta_id,
            ) );
        }
        /*End clean*/

        $this->load->library ( 'html_dom' );
        // $headers = @get_headers($url);
        // if(strpos($headers[0],'404') === false)
        // {

        // } else {
        //     if(is_connected) {
        //         $cleanUrl = $this->mod_general->delete(
        //             'meta', 
        //             array(
        //                 'object_id'      => $url,
        //                 'meta_name'     => $log_id . 'sitelink',
        //             )
        //         );
        //         if($cleanUrl) {
        //             redirect(base_url().'managecampaigns/autopostfb?action=site');
        //         }
        //     } else {
        //         redirect(base_url().'managecampaigns/autopostfb?action=site');
        //     }
        // }
        
        $obj = new stdClass();
        $parse = parse_url($url);
        $parse['host'];


        switch ($parse['host']) {
            case 'www.siamnews.com':
                $html = file_get_html ( 'https://www.siamnews.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.siamstreet.com':
                $html = file_get_html ( 'https://www.siamstreet.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.dailyliveexpress.com':
                $html = file_get_html ( 'https://www.dailyliveexpress.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.siamvariety.com':
                $html = file_get_html ( 'https://www.siamvariety.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.siamtopic.com':
                $html = file_get_html ( 'https://www.siamtopic.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.mumkhao.com':
                $html = file_get_html ( 'https://www.mumkhao.com/archive.php' );
                $sectionA = $html->find('#main .news-lay-3',0);
                $article = $sectionA->find('article');
                shuffle($article);
                foreach($article as $index => $slink) {
                    $link = $slink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.xn--42c2dgos8bxc2dtcg.com':
                $html = file_get_html ( $url );
                $sectionA = $html->find('.bdaia-blocks-container article .block-article-img-container a');
                shuffle($sectionA);
                foreach($sectionA as $index => $clink) {
                    $linkc = $clink->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $linkc,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blogC = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $linkc,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blogC);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'board.postjung.com':
                $html = file_get_html ( $url );
                $sectionA = $html->find('#listbox a');
                shuffle($sectionA);
                foreach($sectionA as $index => $clink) {
                    $linkc = 'https://board.postjung.com/'.$clink->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $linkc,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blogC = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $linkc,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blogC);
                        break;
                    }
                    /*End check duplicate link*/
                }
                die;
                break;
            case 'www.tnews.co.th':
                $html = file_get_html ( $url );
                $sectionA = $html->find('.bdaia-blocks-container article .block-article-img-container a');
                break;
            case 'huaythai.me':
                $html = file_get_html ( $url );
                $sectionA = $html->find('#content_box article');
                shuffle($sectionA);
                foreach($sectionA as $index => $clink) {
                    //$linkc = $clink->href;
                    $linkc = $clink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $linkc,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blogC = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $linkc,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blogC);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.huaythaitoday.com':
                $html = file_get_html ( $url );
                $sectionA = $html->find('#main .entry-content');
                shuffle($sectionA);
                foreach($sectionA as $index => $clink) {
                    $linkc = $clink->find('a',0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $linkc,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blogC = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $linkc,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blogC);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            case 'www.huayhot.com':
                $html = file_get_html ( $url );
                $sectionA = $html->find('#content_box .post h2.title a');
                shuffle($sectionA);
                foreach($sectionA as $index => $clink) {
                    if(!empty($clink->href)) {
                        /*check duplicate link*/
                        $linkc = $clink->href;
                        $whereDupA = array(
                            'object_id'      => $linkc,
                            'meta_name'     => $log_id . 'sitelink',
                            'meta_key'      => date('Y-m-d'),
                        );
                        $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                        if(empty($queryCheckDup[0])) {
                            $data_blogC = array(
                                'meta_key'      => date('Y-m-d'),
                                'object_id'      => $linkc,
                                'meta_value'     => 0,
                                'meta_name'     => $log_id . 'sitelink',
                            );
                            $lastID = $this->Mod_general->insert('meta', $data_blogC);
                            break;
                        }
                        /*End check duplicate link*/
                    }
                }
                break;
            case 'www.susee.supipernews.com':
                //$html = file_get_html ( $url );
                $this->session->set_userdata('post_all', 1);
                $url = 'http://www.blogger.com/feeds/223969614858217340/posts/default?max-results=10';
                $id1 = simplexml_load_file($url);
                $sectionA = $id1->entry;
                shuffle($sectionA);
                $i = 0;
                foreach ($sectionA as $value) {
                    $xmlns = $value->children('http://www.w3.org/2005/Atom');
                    // get tilte
                    $title = (string) $value->title;
                    foreach ($value->link as $links) {
                        //var_dump($links);
                        if($links['rel'] == 'alternate' ) {
                            $link = (string) $links['href'];
                        }
                    }
                    $linkc = $link;
                    $whereDupA = array(
                        'object_id'      => $linkc,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        if($i<3) {
                            $content = (string) $value->content;
                            $image = $value->children('http://search.yahoo.com/mrss/')->thumbnail->attributes();
                            $thumbnail = (string) $image['url'];
                            $iamges = $this->mod_general->resize_image($thumbnail, 0);
                            $gLabel = 'News';
                            if(preg_match('/บน-ล่าง/', $title) || preg_match('/เลข/', $title) || preg_match('/งวด/', $title) || preg_match('/หวย/', $title) || preg_match('/ปลดหนี้/', $title) || preg_match('/Lotto/', $title) || preg_match('/Lottery/', $title))  {
                                $gLabel = 'lotto';
                            }
                            
                            /*preparepost*/
                             $sid = $this->session->userdata ( 'sid' );
                            $fbUserId = $this->session->userdata('fb_user_id');
                            $tmp_path = './uploads/'.$log_id.'/'. $fbUserId . '_tmp_action.json';
                            $string = file_get_contents($tmp_path);
                            $json_a = json_decode($string);
                            $schedule = array (                    
                                'start_date' => $json_a->start_date,
                                'start_time' => $json_a->start_time,
                                'end_date' => $json_a->end_date,
                                'end_time' => $json_a->end_time,
                                'loop' => $json_a->loop,
                                'loop_every' => $json_a->loop_every,
                                'loop_on' => $json_a->loop_on,
                                'wait_group' => $json_a->wait_group,
                                'wait_post' => $json_a->wait_post,
                                'randomGroup' => $json_a->randomGroup,
                                'prefix_title' => $json_a->prefix_title,
                                'suffix_title' => $json_a->suffix_title,
                                'short_link' => $json_a->short_link,
                                'check_image' => $json_a->check_image,
                                'imgcolor' => $json_a->imgcolor,
                                'btnplayer' => $json_a->btnplayer,
                                'playerstyle' => $json_a->playerstyle,
                                'random_link' => $json_a->random_link,
                                'share_type' => $json_a->share_type,
                                'share_schedule' => $json_a->share_schedule,
                                'account_group_type' => $json_a->account_group_type,
                                'txtadd' => $json_a->txtadd,
                                'blogid' => $json_a->blogid,
                                'blogLink' => $json_a->blogLink,
                                'main_post_style' => 'tnews',
                                'userAgent' => $json_a->userAgent,
                                'checkImage' => $json_a->checkImage,
                                'ptype' => $json_a->ptype,
                                'img_rotate' => $json_a->img_rotate,
                                'filter_contrast' => $json_a->filter_contrast,
                                'filter_brightness' => $json_a->filter_brightness,
                                'post_by_manaul' => $json_a->post_by_manaul,
                                'foldlink' => $json_a->foldlink,
                                'gemail' => $json_a->gemail,
                                'label' => @$gLabel,
                            );

                            $content = array (
                                    'name' => @htmlentities(htmlspecialchars(str_replace($title))),
                                    'message' => @htmlentities(htmlspecialchars(addslashes($content))),
                                    'caption' => '',
                                    'link' => @$link,
                                    'mainlink' => '',
                                    'picture' => @$iamges,                            
                                    'vid' => '',                          
                            );
                            /*End preparepost*/
                            $dataPostInstert = array (
                                Tbl_posts::name => $title,
                                Tbl_posts::conent => json_encode($content),
                                Tbl_posts::p_date => date('Y-m-d H:i:s'),
                                Tbl_posts::schedule => json_encode($schedule),
                                Tbl_posts::user => $sid,
                                'user_id' => $log_id,
                                Tbl_posts::post_to => 1,
                                'p_status' => 1,
                                'p_progress' => 1,
                                Tbl_posts::type => 'Facebook' 
                            );
                            $AddToPost = $this->Mod_general->insert ( Tbl_posts::tblName, $dataPostInstert );
                            if(@$AddToPost) {
                                /*check duplicate link*/
                                    $data_blogC = array(
                                        'meta_key'      => date('Y-m-d'),
                                        'object_id'      => $linkc,
                                        'meta_value'     => 1,
                                        'meta_name'     => $log_id . 'sitelink',
                                    );
                                    $lastID = $this->Mod_general->insert('meta', $data_blogC);
                                /*End check duplicate link*/
                            }
                        }
                        $i++;
                    }
                    $fbUserId = $this->session->userdata ( 'sid' );
                    $whereNext = array (
                        'user_id' => $log_id,
                        'u_id' => $fbUserId,
                        'p_post_to' => 1,
                    );
                    $nextPost = $this->Mod_general->select ( Tbl_posts::tblName, '*', $whereNext );
                    if(!empty($nextPost[0])) {
                        $p_id = $nextPost[0]->p_id;
                        echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/autopostfb?action=post&pid='.$p_id.'";}, 30 );</script>';
                        exit();
                    }
                    break;
                }

                
                // if(!empty($AddToPost)) {
                //     //echo '<script language="javascript" type="text/javascript">window.setTimeout( function(){window.location = "'.base_url().'managecampaigns/autopostfb?action=post&pid='.$AddToPost.'";}, 30 );</script>';
                //     redirect('managecampaigns/posttotloglink', 'location');
                //     exit();
                // }
                //redirect('managecampaigns/posttotloglink', 'location');
                break;
            case 'www.tdaily.us':
                $this->session->set_userdata('post_all', 1);
                $this->load->library ( 'html_dom' );
                $id1 = file_get_html('http://www.tdaily.us/feed');
                foreach($id1->find('channel item') as $e) {
                    $title = $e->find('title', 0)->plaintext;
                    

                    $description = $e->find('description', 0)->plaintext;
                    $description = $this->strip_cdata($description);
                    $str = <<<HTML
$description
HTML;
$desc = str_get_html($str);
$link =  $desc->find('a', 0)->href;
                    /*check duplicate link*/
                    $whereDupA = array(
                        'object_id'      => $link,
                        'meta_name'     => $log_id . 'sitelink',
                        'meta_key'      => date('Y-m-d'),
                    );
                    $queryCheckDup = $this->Mod_general->select('meta', '*', $whereDupA);
                    if(empty($queryCheckDup[0])) {
                        $data_blog = array(
                            'meta_key'      => date('Y-m-d'),
                            'object_id'      => $link,
                            'meta_value'     => 0,
                            'meta_name'     => $log_id . 'sitelink',
                        );
                        $lastID = $this->Mod_general->insert('meta', $data_blog);
                        break;
                    }
                    /*End check duplicate link*/
                }
                break;
            default:
                # code...
                break;
        }
    }

    function strip_cdata($string)
    {    
        preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $string, $matches);
        return str_replace($matches[0], $matches[1], $string);
    }

    function getConentFromSite($url,$oldurl='')
    {
        $log_id = $this->session->userdata ( 'user_id' );

        $this->load->library ( 'html_dom' );
        $headers = @get_headers($url);
        if(strpos($headers[0],'404') === false)
        {

        } else {
            if(is_connected) {
                $cleanUrl = $this->mod_general->update(
                    'meta', 
                    array('meta_value'=>1),
                    array(
                        'object_id'      => $url,
                        'meta_name'     => $log_id . 'sitelink',
                    )
                );
                if($cleanUrl) {
                    redirect(base_url().'managecampaigns/autopostfb?action=site');
                }
            }
        }
        if (preg_match ( '/เลขเด็ด/', $url )) {
            $url = str_replace('เลขเด็ด', 'xn--22c0ba9d0gc4c', $url);
        }
        $html = file_get_html ( $url );
        $obj = new stdClass();
        $obj->description = '';
        //$obj->title = @$html->find ( 'title', 0 )->innertext;
        $obj->title = @$html->find ( 'meta[property=og:title]', 0 )->content;
        if(empty($obj->title)) {
            $obj->title = @$html->find ( 'title', 0 )->innertext;
        }
        if(preg_match ( '/ - /', $obj->title )){
            $setitle = explode(' - ', $obj->title);
            if(!empty($setitle[0])) {
                $obj->title = $setitle[0];
            }
        }
        if(preg_match ( '/ – /', $obj->title )){
            $setitle = explode(' – ', $obj->title);
            if(!empty($setitle[0])) {
                $title = explode(' – ', $obj->title);
                $obj->title = @$title[0];
            }
        }
        $og_image = @$html->find ( 'meta [property=og:image]', 0 )->content;
        $image_src = @$html->find ( 'link [rel=image_src]', 0 )->href;
        if (! empty ( $image_src )) {
            $thumb = $image_src;
        } elseif (! empty ( $html->find ( 'meta [property=og:image]', 0 )->content )) {
            $thumb = $html->find ( 'meta [property=og:image]', 0 )->content;
        } else {
            $thumb = '';
        }
        $obj->thumb = $thumb;
        $parse = parse_url($url);
        //echo $parse['host'];
        $checkSite = $html->find('#main #Blog1 .post');
        $siam = $html->find('#article-post .data_detail');
        if(count($checkSite)==1) {
            $setHost = 'blogspot';
        } else if(preg_match ( '/wp-includes/', $html ) && preg_match ( '/wp-content/', $html )){
            $setHost = 'wp';
        } else if(count($siam)==1) {
            $setHost = 'www.siamnews.com';
        } else {
            $setHost = $parse['host'];
        }
        switch ($setHost) {
            case 'www.siamnews.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamtoday.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamstreet.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
               
                //$html->save();
                $content = $this->gEntry($html,'#article-post .data_detail');
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamtoday.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
               
                //$html->save();
                $content = $this->gEntry($html,'#article-post .data_detail');
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.dailyliveexpress.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
               
                //$html->save();
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamvariety.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#article-post .data_detail');
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.viralsfeedpro.com':
                foreach($html->find('.line_view') as $item) {
                    $item->outertext = '';
                }
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
               
                //$html->save();
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamweek.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                 $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.siamtopic.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#article-post .data_detail');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.teededdee.com':
                /*get label*/
                $obj->label = $html->find('.entry-crumbs a.entry-crumb',1)->plaintext;
                /*End get label*/
                $content = $this->gEntry($html,'.td-ss-main-content .td-post-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'jarm.com':
               
                //$html->save();
                $content = $this->gEntry($html,'.news-detail');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.thaismilevariety.com':
                /*get label*/
                foreach($html->find('.seed-social') as $item) {
                    $item->outertext = '';
                }foreach($html->find('.td-a-rec') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $label = $html->find('a.entry-crumb',1)->plaintext;
                switch ($label) {
                    case 'ข่าวสังคม-โซเชียล':
                        $obj->label = 'ข่าว,ข่าวโซเชียล';
                        break;
                    case 'ข่าวบันเทิง':
                        $obj->label = 'ข่าว,ข่าวบันเทิง';
                        break;  
                    
                    default:
                        $obj->label = $label;
                        break;
                }
                /*End get label*/
                $content = $this->gEntry($html,'article .td-post-content');
                $obj->vid = '';

                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case '108resources.com':
                /*get label*/
                $label = [];
                $label = $html->find('span[typeof=v:Breadcrumb]',1)->plaintext;
                if($label == 'ดวงและความเชื่อ') {
                    $obj->label = 'ศรัทธา - ความเชื่อ';
                } else if($label == 'สูตรอาหาร') {
                    $obj->label = 'อาหารการกิน';
                } else if($label == 'อาหารและสุขภาพ') {
                    $obj->label = 'อาหารการกิน,สุขภาพ';
                } else {
                    $obj->label = $label;
                }
                /*End get label*/
                $content = $this->gEntry($html,'.bdaia-post-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'lahbey.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.td-crumb-container span')) - 1;
                foreach($html->find('.td-crumb-container span') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'.td-ss-main-content .td-post-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'deejaiplus.com':
                /*get label*/
                $label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = $label;
                /*End get label*/
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.robots-nocontent') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'#main .entry-content');  
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                // echo $content;
                // die;
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.deemindplus.com':
                /*get label*/
                $label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = $label;
                /*End get label*/

                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.robots-nocontent') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.code-block') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'#main .entry-content'); 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'sabidee.com':
                /*get label*/
                $label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = $label;
                /*End get label*/

                // foreach($html->find('.sharedaddy') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = $this->gEntry($html,'#content .entry-content'); 
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.huayhot.com':
                /*get label*/
                $label = [];
                //$last = count($html->find('.thecategory a')) - 1;
                foreach($html->find('.thecategory a') as $index => $labels) {
                    $label[] = $labels->plaintext;
                }
                $obj->label = 'lotto'.','.implode(',', $label);
                /*End get label*/
                foreach($html->find('.post-single-content .tags') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'#content .entry-content'); 
                // $regex = '~<img.*?src=["\']+(.*?)["\']+~';
                // preg_match_all( $regex, $content, $matches );
                // $ImgSrc = array_pop($matches);

                // // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     $images = explode('_n-', $ImgSrc[0]);
                //     $exten = pathinfo($ImgSrc[0]);
                //     $thumb = $images[0].'_n.'.$exten['extension'];

                //     $file_title = basename($thumb);
                //     $fileName = FCPATH . 'uploads/image/'.$file_title;
                //     @copy($thumb, $fileName);   
                //     $thumb = $this->mod_general->uploadMedia($fileName);
                //     if(empty($thumb)) {
                //         $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //         $thumb = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //         if($gimage) {
                //             @unlink($fileName);
                //         }
                //     }
                // }
                $obj->thumb = $thumb;
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'deesoulmuch.com':
                /*get label*/
                $label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = $label;
                /*End get label*/

                // foreach($html->find('.sharedaddy') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = $this->gEntry($html,'#main .entry-content');                 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'deejunglife.com':
                /*get label*/
                $label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = $label;
                /*End get label*/
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.shared-counts-wrap') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.robots-nocontent') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'#main .entry-content');                 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'muangthainews.com':
                /*get label*/
                // $label = $html->find('.cat-links a',0)->plaintext;
                // $obj->label = $label;
                // /*End get label*/
                // foreach($html->find('.sharedaddy') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.shared-counts-wrap') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.robots-nocontent') as $item) {
                //     $item->outertext = '';
                // }
                $html->save();
                $content = $this->gEntry($html,'.td-post-content');                 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.tnews.co.th':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                foreach($html->find('#read-complete') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.side-article') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('ul') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $obj->label = implode(',', $label);
                /*End get label*/
                //$content = $this->gEntry($html,'#contents .content-detail');
                $content = '';
                foreach($html->find('.content-detail') as $index => $contents) {
                    if($index != $last && $index !=0) {
                        $content = $content. $contents->innertext;
                    } 
                }            
                $htmlContent = str_get_html($content);
                foreach($htmlContent->find('.row') as $item) {
                    $item->outertext = '';
                }
                foreach($htmlContent->find('.text-left') as $item) {
                    $item->outertext = '';
                }
                foreach($htmlContent->find('blockquote') as $item) {
                    $item->outertext = '';
                }
                foreach($htmlContent->find('#hastag-txt') as $item) {
                    $item->outertext = '';
                }
                foreach($htmlContent->find('.news-word') as $item) {
                    $item->outertext = '';
                }
                foreach($htmlContent->find('.hastag-topic') as $item) {
                    $item->outertext = '';
                }
                $htmlContent->save();
                $htmlContent = str_replace('data-cfsrc','src',$htmlContent);
                $htmlContent = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $htmlContent);

                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $htmlContent = str_replace($image,$gimage,$htmlContent);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $htmlContent;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.tpolitic.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/
                foreach($html->find('.text-left') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.text-center') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.tag') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.ads-1') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'.container .col-md-8');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.xn--42c2dgos8bxc2dtcg.com':
                /*get label*/
                $label = $html->find('.bdaia-crumb-container a',1)->plaintext;
                if($label == 'ดูดวง') {
                    $obj->label = 'ศรัทธา - ความเชื่อ,ดูดวง';
                } else if($label == 'สูตรอาหาร') {
                    $obj->label = 'อาหารการกิน';
                } else if($label == 'อาหารและสุขภาพ') {
                    $obj->label = 'อาหารการกิน,สุขภาพ';
                } else {
                    $obj->label = $label;
                }
                /*End get label*/
                // foreach($html->find('.text-left') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.text-center') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.tag') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.ads-1') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = $this->gEntry($html,'.hentry .bdaia-post-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.77jowo.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $contents = @$html->find ( '#content-detail', 0 );
                $content = '';
                foreach($contents->find("div[class^='detail-']") as $item) {
                    $content .= $item;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.one31.net':
                /*get label*/
                $obj->label = 'ข่าว';
                //$html = str_replace('\u003Cp\u003E','',$html);
                preg_match_all('/null,1,"https:([^>]+)",0,"og:type"/', $html, $thumMatch);
                //var_dump($thumMatch);
                if(!empty($thumMatch[1])) {
                    if(!empty($thumMatch[1][0])) {
                        $thumbs = $thumMatch[1][0];
                        $thumbs = str_replace('u002F','/',$thumbs);
                        $thumbs = str_replace('\\','',$thumbs);
                        $thumbs = 'https:'.$thumbs;
                        $obj->thumb = $thumbs;
                    }
                }
                
                preg_match_all('/content:\"([^>]+)",thumbnail/', $html, $match);
                if(!empty($match[1])) {
                    if(!empty($match[1][0])) {
                        $content = (string) $match[1][0];
                        $content = html_entity_decode($content);
                        $content = str_replace('\u003Cp\u003E','',$content);
                        $content = str_replace('u002F','/',$content);
                        $content = str_replace('\u003C','<',$content);
                        $content = str_replace('\u003E','>',$content);
                        $content = str_replace('\u003E','>',$content);
                        $content = str_replace('\r\n','<br/>',$content);
                        $content = str_replace('\\','',$content);
                        $str = <<<HTML
$content
HTML;
$desc = str_get_html($str);
                        foreach($desc->find('ul') as $item) {
                            $item->outertext = '';
                        }
                        $desc->save();
                        //$content = html_entity_decode(html_entity_decode(stripslashes(trim($content))));
                        $obj->conent = $desc;
                    }
                }
                //$content = $this->gEntry($html,'.news-detail');

                $obj->vid = '';
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                if(!empty($obj->conent)) {
                    return $obj;
                } else {
                    return array();
                }
                break;
            case 'www.thaismiletopic.com':
                /*get label*/
                $content = $this->gEntry($html,'.hentry .entry-content');
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'xn--y3ccoob3d.com':
                /*get label*/
                //$label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = 'Lott';
                $obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                $content = $this->gEntry($html,'.hentry .entry-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.007lotto.net':
                /*get label*/
                //$label = $html->find('.cat-links a',0)->plaintext;
                $obj->label = 'Lott';
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                foreach($html->find('#share-this') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.addthis_sharing_toolbox') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'#main .entry-content'); 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.mumkhao.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.breadcrumb li')) - 1;
                foreach($html->find('.breadcrumb li') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $label[] = $labels->plaintext;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/
                $content = $this->gEntry($html,'#main .data_detail'); 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'tnews.teenee.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.post-header .post-author a')) - 1;
                foreach($html->find('.post-header .post-author a') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $setNewLabel = trim($labels->plaintext);
                        if($setNewLabel == 'ข่าวเด่นประเด็นร้อน') {
                            $label[] = 'ข่าว';
                        } else {
                            $label[] = $setNewLabel;
                        }
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $content = '';
                foreach($html->find ('#main div[itemprop=articleBody]') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);

                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);

                // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");

                //         if(!preg_match('/^(http)/', $imagedd)){
                //             $imagedd = 'http://tnews.teenee.com/crime/'.$imagedd;
                //         }
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'variety.teenee.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.post-header .post-author a')) - 1;
                foreach($html->find('.post-header .post-author a') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $setNewLabel = trim($labels->plaintext);
                        if($setNewLabel == 'ข่าวเด่นประเด็นร้อน') {
                            $label[] = 'ข่าว';
                        } else {
                            $label[] = $setNewLabel;
                        }
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $content = '';
                foreach($html->find ('#main div[itemprop=articleBody]') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);

                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
               
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'entertain.teenee.com':
                $path = parse_url($url, PHP_URL_PATH);
                /*get label*/
                $getpath = explode('/', $path);
                $parsed_url = parse_url($url);
                $domain = $parsed_url['scheme'] . "://" . $parsed_url['host'];
                $setup = '';
                if(!empty($getpath[1])) {
                    $setup = $domain.'/'.$getpath[1] . '/';
                }
                $label = [];
                $last = count($html->find('.post-header .post-author a')) - 1;
                foreach($html->find('.post-header .post-author a') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $setNewLabel = trim($labels->plaintext);
                        if($setNewLabel == 'ข่าวเด่นประเด็นร้อน') {
                            $label[] = 'ข่าว';
                        } else {
                            $label[] = $setNewLabel;
                        }
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $content = '';
                foreach($html->find ('#Blog1 div[itemprop=articleBody]') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace("/img src='/", "img src='".$setup, $content);
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'socialnews.teenee.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.post-header .post-author a')) - 1;
                foreach($html->find('.post-header .post-author a') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $setNewLabel = trim($labels->plaintext);
                        if($setNewLabel == 'ข่าวเด่นประเด็นร้อน') {
                            $label[] = 'ข่าว';
                        } else {
                            $label[] = $setNewLabel;
                        }
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $content = '';
                foreach($html->find ('#main div[itemprop=articleBody]') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);

                
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'horo.teenee.com':
                /*get label*/
                $label = [];
                $last = count($html->find('.post-header .post-author a')) - 1;
                foreach($html->find('.post-header .post-author a') as $index => $labels) {
                    if($index != $last && $index !=0) {
                        $setNewLabel = trim($labels->plaintext);
                        if($setNewLabel == 'ดูดวง') {
                            $label[] = 'ดูดวง';
                            $label[] = 'ไลฟ์สไตล์';
                        } else {
                            $label[] = $setNewLabel;
                        }
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/


                $content = '';
                foreach($html->find ('#main div[itemprop=articleBody]') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);


                
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'board.postjung.com':
                /*get label*/
                $obj->label = 'ข่าว';
                $label = $html->find('.mainbox .spboard a',0)->plaintext;
                if($label == 'ข่าววันนี้') {
                    $obj->label = 'ข่าว';
                }
                
                /*End get label*/

                $content = '';
                foreach($html->find ('#maincontent') as $item) {
                    $content .= $item->innertext;
                }
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'chikng.com':
                // foreach($html->find('.post .post-meta a') as $item) {
                //     $item->outertext = '';
                // }
                /*get label*/
                 $label = @$html->find ( '.post .post-meta a', 0 )->plaintext;
                 if($label == 'เลขเด็ด') {
                    $label = 'เสี่ยงดวง - หวย';
                 }
                 $obj->label = $label;

                /*End get label*/

                $obj->title = @$html->find ( '.post .entry h2.has-text-align-center', 0 )->innertext;;
                //$html->save();
                $content = $this->gEntry($html,'.post .entry');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.khreality.com':
                /*get label*/
                $label = $html->find('#main-navigation .current-post-parent a',0)->plaintext;
                if($label == 'ข่าวทั่วไป') {
                    $obj->label = 'ข่าว';
                } else if($label == 'ข่าวต่างประเทศ') {
                    $obj->label = 'ข่าว,ข่าวต่างประเทศ';
                } else if($label == 'ข่าวบันเทิง') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else if($label == 'สุขภาพ') {
                    $obj->label = 'ไลฟ์สไตล์,สุขภาพ';
                } else {
                    $obj->label = $label;
                }
                
                /*End get label*/
                $content = $this->gEntry($html,'.single-container .entry-content');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.sanook.com':
                /*get label*/
                $label = $html->find('nav.nav li.active a span',0)->plaintext;
                if($label == 'กีฬา') {
                    $obj->label = 'ข่าว,ข่าวกีฬา';
                } else if($label == 'ข่าวบันเทิง') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else if($label == 'ไอที') {
                    $obj->label = 'ข่าว,ข่าวไอที';
                } else if($label == 'รถยนต์') {
                    $obj->label = 'ข่าว,ข่าวยานยนต์';
                } else if($label == 'ดูดวง') {
                    $obj->label = 'ไลฟ์สไตล์,ดูดวง';
                } else if($label == 'สุขภาพ') {
                    $obj->label = 'ไลฟ์สไตล์,สุขภาพ';
                } else {
                    $obj->label = $label;
                }
                
                /*End get label*/
                foreach($html->find('.EntryShare') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.infoRight') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.infoLeft') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.EntryHeading') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.partner') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.pagination') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.tags .SectionItem') as $item) {
                    $item->outertext = '';
                }
                $content = $this->gEntry($html,'.container .EntryBody');                
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.khaosod.co.th':
                /*get label*/
                $label = @$html->find('.entry-crumbs span',1)->plaintext;
                if($label == 'กีฬา') {
                    $obj->label = 'ข่าว,ข่าวกีฬา';
                } else if($label == 'บันเทิง') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else if($label == 'ไอที') {
                    $obj->label = 'ข่าว,ข่าวไอที';
                } else if($label == 'ยานยนต์') {
                    $obj->label = 'ข่าว,ข่าวยานยนต์';
                } else if($label == 'ดวง') {
                    $obj->label = 'ไลฟ์สไตล์,ดูดวง';
                } else if($label == 'สุขภาพ') {
                    $obj->label = 'ไลฟ์สไตล์,สุขภาพ';
                } else if($label == 'การเมือง') {
                    $obj->label = 'ข่าว,ข่าวการเมือง';
                } else if($label == 'เศรษฐกิจ') {
                    $obj->label = 'ข่าว,เศรษฐกิจ';
                } else if($label == 'ทุกทิศทั่วไทย') {
                    $obj->label = 'ข่าว,ทุกทิศทั่วไทย';
                } else if($label == 'ตรวจหวยกับข่าวสด') {
                    $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                } else {
                    $obj->label = $label;
                }
                
                /*End get label*/

                $contents = @$html->find ( '.container .udsg__content', 0 );
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $contents);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                // $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                // preg_match_all( $regex, $content, $matches );
                // $ImgSrc = array_pop($matches);
                // // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'ball76.com':
                $obj->label = '';
                $iframeCheck = @$html->find ( '.su-youtube iframe', 0 );
                $obj->title = $html->find ( 'title', 0 )->innertext;
                if(!empty($iframeCheck)) {
                    $iframe = @$iframeCheck->src;
                    // $html1 = file_get_html ( $iframeCheck->src );
                    // $obj->title = $html1->find ( 'title', 0 )->innertext;
                    $vid = $this->Mod_general->get_video_id($iframe);
                    $obj->vid = $vid['vid'];
                    $obj->thumb = 'https://i.ytimg.com/vi/'.$obj->vid.'/hqdefault.jpg';
                }
                $obj->conent = '';
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'casa982.com':
                $obj->label = '';
                $obj->title = @$html->find ( 'meta[name=description]', 0 )->content; 
                $contents = @$html->find ( '#main .entry-content', 0 );
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $contents);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.kiddee.welovemyking.com':
                foreach($html->find('.seed-social') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $label = $html->find('.tt_cat_single a',0)->plaintext;
                $obj->label = $label;
                $obj->title = @$html->find ( 'title', 0 )->plaintext; 
                $contents = @$html->find ( '.thaitheme_read', 0 );
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $contents);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'siamama.com':
                // foreach($html->find('.seed-social') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $obj->thumb = @$html->find ( '.np-article-thumb img', 0 )->src; 
                /*get label*/
                $label = [];
                foreach($html->find('.post-cats-list a') as $index => $labels) {
                    $setNewLabel = trim($labels->plaintext);
                    if($setNewLabel == 'ดูดวงรายวัน') {
                        $label[] = 'ดูดวง';
                        $label[] = 'ไลฟ์สไตล์';
                    } else if($setNewLabel == 'สาระน่ารู้') {
                        $label[] = 'เรื่องน่ารู้';
                    } else {
                        $label[] = $setNewLabel;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $obj->title = @$html->find ( 'title', 0 )->plaintext; 
                $contents = @$html->find ( '#main .entry-content', 0 );
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $contents);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.seesuttho.com':
                foreach($html->find('.code-block') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('.wp-post-author-wrap') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $obj->thumb = @$html->find ( '.image-link img.attachment-hitmag-featured', 0 )->src; 
                /*get label*/
                $label = [];
                foreach($html->find('.post-cats-list a') as $index => $labels) {
                    $setNewLabel = trim($labels->plaintext);
                    if($setNewLabel == 'ดูดวงรายวัน') {
                        $label[] = 'ดูดวง';
                        $label[] = 'ไลฟ์สไตล์';
                    } else if($setNewLabel == 'สาระน่ารู้') {
                        $label[] = 'เรื่องน่ารู้';
                    } else {
                        $label[] = $setNewLabel;
                    } 
                }
                $obj->label = implode(',', $label);
                /*End get label*/

                $obj->title = @$html->find ( 'title', 0 )->plaintext; 
                $contents = @$html->find ( '#main .entry-content', 0 );
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $contents);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);

                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                $obj->conent = $content;
                $obj->fromsite = '';
                $obj->site = 'site';
                return $obj;
                break;
            case 'guruthainews.com':
                /*get label*/
                $label = $html->find('.post .entry-crumbs a',1)->plaintext;
                if($label == 'หวย') {
                    $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                } else if($label == 'บันเทิง') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else {
                    $obj->label = $label;
                }
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                foreach($html->find('.td-post-featured-image') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = @$html->find ( '.post .td-post-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.amarintv.com':
                /*get label*/
                $label = [];
                foreach($html->find('.tags .body a') as $index => $labels) {
                    $setNewLabel = trim($labels->plaintext);
                    if($setNewLabel == 'หวย') {
                        $label[] = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                    } else if($setNewLabel == 'ENTERTAINMENT UPDATE') {
                        $label[] = 'ข่าว,ข่าวบันเทิง';
                    } else if($setNewLabel == 'NEWS UPDATE') {
                        $label[] = 'ข่าว,ข่าวด่วน';
                    } else if($setNewLabel == 'NEWS UPDATE') {
                        $label[] = 'ข่าว,ข่าวด่วน';
                    } else if($setNewLabel == 'LIFESTYLE UPDATE') {
                        $label[] = 'ไลฟ์สไตล์';
                    } else {
                        $label[] = $setNewLabel;
                    }
                }

                $obj->label = implode(',', $label);
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.td-post-featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = @$html->find ( '.news-detail .body', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.facedara.com':
                /*get label*/
                // $label = trim($html->find('.entry-header .nav-wrapper a',1)->plaintext);
                // if($label == 'หวย') {
                //     $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                // } else if($label == 'ENTERTAINMENT UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวบันเทิง';
                // } else if($label == 'NEWS UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวด่วน';
                // } else if($label == 'NEWS UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวด่วน';
                // } else if($label == 'LIFESTYLE UPDATE') {
                //     $obj->label = 'ไลฟ์สไตล์';
                // } else {
                //     $obj->label = $label;
                // }
                $obj->label = 'ข่าว';
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.td-post-featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $obj->thumb = @$html->find ( '.post_thumb img', 0 )->src;
                $content = @$html->find ( '.post-detail .the_content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                // $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                // preg_match_all( $regex, $content, $matches );
                // $ImgSrc = array_pop($matches);
                // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.amarintv.com':
                /*get label*/
                $label = trim($html->find('.entry-header .nav-wrapper a',1)->plaintext);
                if($label == 'หวย') {
                    $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                } else if($label == 'ENTERTAINMENT UPDATE') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else if($label == 'NEWS UPDATE') {
                    $obj->label = 'ข่าว,ข่าวด่วน';
                } else if($label == 'NEWS UPDATE') {
                    $obj->label = 'ข่าว,ข่าวด่วน';
                } else if($label == 'LIFESTYLE UPDATE') {
                    $obj->label = 'ไลฟ์สไตล์';
                } else {
                    $obj->label = $label;
                }
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.td-post-featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = @$html->find ( '#main #content-inner', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        $imagedd = strtok($image, "?");
                        $file_title = basename($imagedd);
                        $fileName = FCPATH . 'uploads/image/'.$file_title;
                        @copy($imagedd, $fileName);   
                        $images = $this->mod_general->uploadtoImgur($fileName);
                        if(empty($images)) {
                            $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                            $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                            if($images) {
                                @unlink($fileName);
                            }
                        } else {
                            $gimage = @$images; 
                            @unlink($fileName);
                        }
                        if(!empty($gimage)) {
                            $content = str_replace($image,$gimage,$content);
                        }
                    }
                }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'ploynaphas.com':
                /*get label*/
                $label = trim($html->find('.bdaia-crumb-container span a',1)->plaintext);
                if($label == 'หวย') {
                    $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                } else if($label == 'ENTERTAINMENT UPDATE') {
                    $obj->label = 'ข่าว,ข่าวบันเทิง';
                } else if($label == 'NEWS UPDATE') {
                    $obj->label = 'ข่าว,ข่าวด่วน';
                } else if($label == 'NEWS UPDATE') {
                    $obj->label = 'ข่าว,ข่าวด่วน';
                } else if($label == 'LIFESTYLE UPDATE') {
                    $obj->label = 'ไลฟ์สไตล์';
                } else {
                    $obj->label = $label;
                }
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.td-post-featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = @$html->find ( '#content #wtr-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                // $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                // preg_match_all( $regex, $content, $matches );
                // $ImgSrc = array_pop($matches);
                // // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.tdaily.us':
                /*get label*/
                // $label = trim($html->find('.bdaia-crumb-container span a',1)->plaintext);
                // if($label == 'หวย') {
                //     $obj->label = 'ไลฟ์สไตล์,เสี่ยงดวง - หวย';
                // } else if($label == 'ENTERTAINMENT UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวบันเทิง';
                // } else if($label == 'NEWS UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวด่วน';
                // } else if($label == 'NEWS UPDATE') {
                //     $obj->label = 'ข่าว,ข่าวด่วน';
                // } else if($label == 'LIFESTYLE UPDATE') {
                //     $obj->label = 'ไลฟ์สไตล์';
                // } else {
                //     $obj->label = $label;
                // }
                //$obj->title = str_replace('หมีหวย.com', '', $obj->title);
                /*End get label*/

                // foreach($html->find('#share-this') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('.td-post-featured-image') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $obj->label = 'ข่าว';
                $content = @$html->find ( '#main .entry-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                // $regex = '/< *img[^>]*src *= *["\']?([^"\']*)/';
                // preg_match_all( $regex, $content, $matches );
                // $ImgSrc = array_pop($matches);
                // // reversing the matches array
                // if(!empty($ImgSrc)) {
                //     foreach ($ImgSrc as $image) {
                //         $imagedd = strtok($image, "?");
                //         $file_title = basename($imagedd);
                //         $fileName = FCPATH . 'uploads/image/'.$file_title;
                //         @copy($imagedd, $fileName);   
                //         $images = $this->mod_general->uploadtoImgur($fileName);
                //         if(empty($images)) {
                //             $apiKey = '76e9b194c1bdc616d4f8bb6cf295ce51';
                //             $images = $this->Mod_general->uploadToImgbb($fileName, $apiKey);
                //             if($images) {
                //                 @unlink($fileName);
                //             }
                //         } else {
                //             $gimage = @$images; 
                //             @unlink($fileName);
                //         }
                //         if(!empty($gimage)) {
                //             $content = str_replace($image,$gimage,$content);
                //         }
                //     }
                // }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'huaythai.me':
                //$obj->thumb = @$html->find ( '.image-link img.attachment-hitmag-featured', 0 )->src; 
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = @$html->find ( '#content_box .post-single-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) src=".*?"/i', "", $content );
                $content = preg_replace( '/(<[^>]+) data-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-src=".*?"/i', "src=\"$1\"", $content );
                $content = str_replace('--Advertisement--', '', $content);

                $regex = '/< *img[^>]*data-src=*["\']?([^"\']*)/';
                preg_match_all( $regex, $content, $matches );
                $ImgSrc = array_pop($matches);
                // reversing the matches array
                if(!empty($ImgSrc)) {
                    foreach ($ImgSrc as $image) {
                        var_dump($image);die;
                        //$content = str_replace($image,$gimage,$content);
                    }
                }

                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.lekdedruay.com':
                foreach($html->find('.td-post-content .td-a-rec') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = @$html->find ( '.td-ss-main-content .td-post-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'today.line.me':
                foreach($html->find('#container #related_container') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('#container .include-image') as $item) {
                    $item->outertext = '';
                }
                foreach($html->find('#container .bx-share') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = @$html->find ( '#container .article-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'sharesod.com':
                // foreach($html->find('#container #related_container') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('#container .include-image') as $item) {
                //     $item->outertext = '';
                // }
                // foreach($html->find('#container .bx-share') as $item) {
                //     $item->outertext = '';
                // }
                // $html->save();
                $content = @$html->find ( '.td-post-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'oknewsok.com':
                $obj->title = @$html->find ( '.entry .entry-title', 0 )->innertext;
                $obj->thumb = @$html->find ( '.entry .tp-post-thumbnail img', 0 )->src;
                $content = @$html->find ( '.entry .entry-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'burmese.dvb.no':
                $obj->title = @$html->find ( '.entry .entry-title', 0 )->innertext;
                $obj->thumb = @$html->find ( '.entry .entry-thumb img', 0 )->src;
                $content = @$html->find ( '.entry .text', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'sb.in.th':
                $obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.entry .entry-thumb img', 0 )->src;
                $content = @$html->find ( '.post .bdaia-post-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.postsod.com':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.entry .entry-thumb img', 0 )->src;
                $content = @$html->find ( '.post .td-post-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.xn--22c0ba9d0gc4c.news':
                $obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.entry .entry-thumb img', 0 )->src;
                $content = @$html->find ( '.post .entry-content', 0 )->innertext;
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'news.ch3thailand.com':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                $obj->thumb = @$html->find ( '.content-img-all .img-hi-news img', 0 )->src;
                $content = @$html->find ( '.content-detail .content-news', 0 )->innertext;

                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $content = str_replace('"alt="', '" alt="', $content);
                $content = $content . @$html->find ( '.content-img-all .content-img-gall', 0 )->innertext;
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.huaythaitoday.com':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                $obj->thumb = @$html->find ( '#main .entry-content img', 0 )->{'data-src'};
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = @$html->find ( '#main .entry-content', 0 )->innertext;

                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $content = str_replace('"alt="', '" alt="', $content);                
                $content = $content . @$html->find ( '.content-img-all .content-img-gall', 0 )->innertext;
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'blogspot':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.content-img-all .img-hi-news img', 0 )->src;
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                $html->save();

                $content = @$html->find ( '#Blog1 .entry-content', 0 );
                $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
                $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
                $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
                $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
                $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
                $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
                $content = str_replace('--Advertisement--', '', $content);
                $obj->title = @htmlspecialchars_decode($html->find ( 'meta[property=og:title]', 0 )->content); 
                if(!empty($oldurl)) {
                    $dataA = @$html->find ( '#main .post', 0 );
                    $checked = @$html->find ( '#Blog1 .youtube_link', 0 );
                    $iframeCheck = @$html->find ( '#Blog1 iframe', 0 );
                    $iframeCheckH2 = @$html->find ( '#Blog1 h2', 0 );
                    $regex = '~var customcode = ({(.*?)(?=};)};)~';
                    preg_match_all($regex, $dataA, $matches);

                    $dataA = @$html->find ( '#main .post', 0 );
                    $checked = @$html->find ( '#Blog1 .youtube_link', 0 );
                    $iframeCheck = @$html->find ( '#Blog1 iframe', 0 );
                    $iframeCheckH2 = @$html->find ( '#Blog1 h2', 0 );
                    $regex = '~var customcode = ({(.*?)(?=};)};)~';
                    preg_match_all($regex, $dataA, $matches);

                    $found = false;
                    if(!empty($iframeCheck)) {
                        $iframe = @$html->find ( '#Blog1 iframe', 0 )->src;
                        if(!empty($iframe)) {
                            $html1 = file_get_html ( $iframe );
                            $obj->title = htmlspecialchars_decode($html1->find ( 'title', 0 )->innertext);
                            $found = true;
                            //$obj->vid = $this->mod_general->get_video_id($iframe)['vid'];
                        }
                    }
                    if (!empty($checked) && empty($found)) {
                        $iframe = @$checked->href;
                        $html1 = file_get_html ( $iframe );
                        $obj->title = @htmlspecialchars_decode($html1->find ( 'meta[property=og:title]', 0 )->content); 
                        $found = true;
                        //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
                        //$obj->vid = $this->mod_general->get_video_id($iframe)['vid'];
                    } 
                    if(!empty($matches[0][0]) && empty($found)) {
                        $json = $matches[0][0];
                        $jsonArr = explode('"', $json);
                        $html1 = file_get_html ( 'https://www.youtube.com/watch?v='.$jsonArr[11] );
                        $title = @htmlspecialchars_decode($html1->find ( 'meta[property=og:title]', 0 )->content);
                        $found = true; 
                        //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
                        //$obj->vid = $jsonArr[11];
                    }
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $dataA, $match) && empty($found)) {
                        $obj->vid = $match[1];
                        $html1 = file_get_html ( 'https://www.youtube.com/watch?v='.$obj->vid );
                        $obj->title = @htmlspecialchars_decode($html1->find ( 'meta[property=og:title]', 0 )->content); 
                        $found = true;
                    }
                }
                $obj->thumb = $this->mod_general->resize_image($obj->thumb,0);
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'wp':
                foreach(@$html->find('.td-default-sharing') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.ud-line-friend') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.td_block_related_posts') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('footer') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.dpsp-content-wrapper') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.sd-social') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.quads-location') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.shareit') as $item) {
                    $item->outertext = '';
                }

                $html->save();

                $content = $this->gEntry($html,'.entry-content');
                if(empty($content)) {
                    $content = $this->gEntry($html,'.td-post-content');
                }
                if(empty($content)) {
                    $content = $this->gEntry($html,'.post');
                }
                if (preg_match ( '/huaythai.me/', $url )) {
                    $content = preg_replace('/<iframe\b[^>]*(.*?)iframe>/is', "", $content);
                }               
                if(empty($obj->thumb)) {
                    $obj->thumb = @$html->find('.wp-post-image',0)->src;
                    if(empty($obj->thumb)) {
                        $obj->thumb = @$html->find('.post-thumbnail img',0)->src;
                    }
                    if(empty($obj->thumb)) {
                        $obj->thumb = @$this->get_the_image($content)['url'];
                        
                    }
                }
                $title = @explode('–', $obj->title);
                if(!empty($title[0])) {
                    $title = $title[0];
                }
                
                if (preg_match ( '/&#8211;/', $obj->title )) {
                    $obj->title = explode('&#8211;', $obj->title)[0];
                }
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'www.recoed.tech':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.content-img-all .img-hi-news img', 0 )->src;
                foreach($html->find('.sharedaddy') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.td-default-sharing') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.ud-line-friend') as $item) {
                    $item->outertext = '';
                }
                foreach(@$html->find('.td_block_related_posts') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'.entry-content');                 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            case 'plus-newsth.com':
                //$obj->title = @$html->find ( '.post .entry-title', 0 )->plaintext;
                //$obj->thumb = @$html->find ( '.content-img-all .img-hi-news img', 0 )->src;
                foreach($html->find('.post-share') as $item) {
                    $item->outertext = '';
                }
                $html->save();
                $content = $this->gEntry($html,'.single-post-content');                 
                $obj->vid = '';
                $obj->conent = $content;
                $obj->fromsite = $parse['host'];
                $obj->site = 'site';
                return $obj;
                break;
            default:
                if (preg_match ( '/blogspot/', $url ) && empty($oldurl)) {
                    $obj->thumb = $this->mod_general->resize_image($obj->thumb,0);
                    $obj->label = '';
                    foreach($html->find('#share-this') as $item) {
                        $item->outertext = '';
                    }
                    foreach($html->find('.td-post-featured-image') as $item) {
                        $item->outertext = '';
                    }
                    foreach($html->find('.article-share-cont') as $item) {
                        $item->outertext = '';
                    }
                    foreach($html->find('form') as $item) {
                        $item->outertext = '';
                    }
                    $html->save();
                    $content = $this->gEntry($html,'.entry-content');                     
                    $obj->conent = $content;
                    $obj->fromsite = $parse['host'];
                    $obj->site = 'site';
                    return $obj;
                    break;
                } else {
                    $obj->label = '';
                    $dataA = @$html->find ( '#main .post', 0 );
                    $checked = @$html->find ( '#Blog1 .youtube_link', 0 );
                    $iframeCheck = @$html->find ( '#Blog1 iframe', 0 );
                    $iframeCheckH2 = @$html->find ( '#Blog1 h2', 0 );
                    $regex = '~var customcode = ({(.*?)(?=};)};)~';

                    preg_match_all($regex, $dataA, $matches);

                    if(!empty($matches[0][0])) {
                        $json = $matches[0][0];
                        $jsonArr = explode('"', $json);
                        $html1 = file_get_html ( 'https://www.youtube.com/watch?v='.$jsonArr[11] );
                        $obj->title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
                        //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
                        $obj->vid = $jsonArr[11];
                    } else if (!empty($checked)) {
                        $iframe = @$checked->href;
                        $html1 = file_get_html ( $iframe );
                        $obj->title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
                        //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
                        $obj->vid = $iframe;
                    } else if(!empty($iframeCheck)) {
                        $iframe = @$html->find ( '#Blog1 iframe', 0 )->src;
                        $html1 = file_get_html ( $iframe );
                        $obj->title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
                        $obj->vid = $iframe;
                    } else {
                        //$obj->title = $html->find ( 'title', 0 )->innertext;
                        $obj->title = @$html->find ( 'meta[property=og:title]', 0 )->content; 
                    }

                    $obj->conent = '';
                    $obj->fromsite = '';
                    $obj->site = 'old';
                    return $obj;
                    break;
                }
        }
    }
    public function gEntry($html,$gcontent='')
    {
        $content = @$html->find ( $gcontent, 0 )->innertext;
        $content = preg_replace('/<center\b[^>]*>(.*?)<\/center>/is', "", $content);
        $content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $content);
        $content = preg_replace('/<ins\b[^>]*>(.*?)<\/ins>/is', '<div class="setAds"></div>', $content);
        $content = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $content);
        $content = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $content);
        $content = preg_replace( '/(<[^>]+) srcset=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-src=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-srcset=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-sizes=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-pagespeed-url-hash=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-lazy-srcset=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-lazy-sizes=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-lazy-src=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-recalc-dims=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-large-file=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-medium-file=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-image-meta=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-image-description class=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-orig-file=".*?"/i', "$1", $content );
        $content = preg_replace( '/(<[^>]+) data-permalink=".*?"/i', "$1", $content );
        $content = str_replace('--Advertisement--', '', $content);
        $content = str_replace("facebook.com/groups/websiamplaza", "facebook.com/groups/2114780255405136", $content);
        foreach($html->find('img') as $iitem) {
            $src = $iitem->src;
            $datasrc =  @$iitem->attr['data-src'];
            if(!empty($datasrc)) {
                $content = str_replace($src,$datasrc,$content);
            }
        }
        return $content;
    }
    public function BloggerYtInside($url='')
    {
        //echo $url;
        $obj = new stdClass();
        $this->load->library ( 'html_dom' );
        $headers = @get_headers($url);
        if(strpos($headers[0],'404') === false)
        {
            $html = file_get_html ( $url );
        } else {
            if(is_connected) {
                $html = file_get_html ( $url );
            }
        }
        $dataA = @$html->find ( '#main .post', 0 );
        if (preg_match("/main_link =/", $dataA)) {
            $glink = explode('main_link = "', $dataA);
            if(!empty($glink[1])) {
                $glinks = explode('";', $glink[1]);
                if(!empty($glinks[0])) {
                    $setUrl = $glinks[0];
                    return $this->BloggerYtInside($setUrl);
                }
            }
        }

        $checked = @$html->find ( '#Blog1 .youtube_link', 0 );
        $iframeCheck = @$html->find ( '#Blog1 iframe', 0 );
        $iframeCheckH2 = @$html->find ( '#Blog1 h2', 0 );
        $regex = '~var customcode = ({(.*?)(?=};)};)~';
        preg_match_all($regex, $dataA, $matches);


        if(!empty($iframeCheck)) {
            $iframe = @$html->find ( '#Blog1 iframe', 0 )->src;
            if(!empty($iframe)) {
                $html1 = file_get_html ( $iframe );
                $obj->title = $html1->find ( 'title', 0 )->innertext;
                $obj->vid = $this->mod_general->get_video_id($iframe)['vid'];
                return $obj;
            }
        }
        if (!empty($checked)) {
            $iframe = @$checked->href;
            $html1 = file_get_html ( $iframe );
            $obj->title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
            //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
            $obj->vid = $this->mod_general->get_video_id($iframe)['vid'];
            return $obj;
        } 
        if(!empty($matches[0][0])) {
            $json = $matches[0][0];
            $jsonArr = explode('"', $json);
            $html1 = file_get_html ( 'https://www.youtube.com/watch?v='.$jsonArr[11] );
            $title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
            //$title = $html1->find ( 'tit.youtube_linkle', 0 )->innertext;
            $obj->vid = $jsonArr[11];
            return $obj;
        }
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $dataA, $match)) {
            $obj->vid = $match[1];
            $html1 = file_get_html ( 'https://www.youtube.com/watch?v='.$obj->vid );
            $obj->title = @$html1->find ( 'meta[property=og:title]', 0 )->content; 
            return $obj;
        }
        if (preg_match("/w9oibJcPAsANiy8cERHjhWmV-087tWJ-QCLcBGAsYHQ/", $dataA)) {
            $getAgain = @$dataA->find ( 'table a[target="_top"]', 0 )->href; 
            return $this->BloggerYtInside($getAgain);
        }
    }

    public function getMyOldLink($url='')
    {
        $obj = new stdClass();
        $this->load->library ( 'html_dom' );
        $headers = @get_headers($url);
        if(strpos($headers[0],'404') === false)
        {
            $html = file_get_html ( $url );
        } else {
            if(is_connected) {
                $html = file_get_html ( $url );
            }
        }
        $og_image = @$html->find ( 'meta [property=og:image]', 0 )->content;
        $dataA = @$html->find ( '#main .post', 0 );
        if (preg_match("/main_link =/", $dataA)) {
            $glink = explode('main_link = "', $dataA);
            if(!empty($glink[1])) {
                $glinks = explode('"', $glink[1]);
                if(!empty($glinks[0])) {
                    $data = array(
                        'url'=>$glinks[0],
                        'image'=>$og_image,
                    );
                }
            }
        } else {
            $data = array(
                'url'=>$url,
                'image'=>$og_image,
            );
        }
        return $data;
    }

    function get_the_image($args) {
        /* Search the post's content for the <img /> tag and get its URL. */
        preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $args, $matches);

        /* If there is a match for the image, return its URL. */
        if (isset($matches) && @$matches[1][0])
            return array('url' => @$matches[1][0]);
        return false;
    }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
