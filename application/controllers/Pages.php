<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    /**
     * Read a static page
     * @param string $page
     * @return void
     */
    public function view($page = 'hoofdranking')
    {
        // echo PUBLICPATH;
        if( !file_exists(VIEWPATH . 'pages/' . $page . '.php'))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}