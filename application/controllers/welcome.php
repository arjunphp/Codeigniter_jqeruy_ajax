<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        // overrding parent controller constructor with local controller constructor 
        parent::__construct();
        // load CI's helper 
        $this->load->helper(array('html','url'));
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function page($page_id = FALSE) 
	{
         if(!$page_id) show_404();
         sleep(2);
         
         // check for ajax request
         if($this->input->is_ajax_request()) {
            
            $this->data['response_from'] = 'From normal request';
            $this->_render($page_id,$this->data,'ajax');

         } else {

          $this->data['response_from'] = 'From normal request';
          $this->_render($page_id,$this->data);

         }

	}

	private function _render($page_id,$data,$type = 'full_page') 
	{
		if($type == 'ajax') {
         	
            $this->load->view('pages/'.$page_id,$data);            

		} else {

            $this->load->view('common/header_view');
            $this->load->view('pages/'.$page_id,$data);
            $this->load->view('common/footer_view');


		} 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */