<?php
/**
 * core/Application.php
 *
 * Default application controller. Loads needed modules and injects header and footer templates.
 */
class Application extends CI_Controller {
    protected $data;      // parameters for view components

    /**
     * Constructor.
     * Establish view header and footer. 
	 * Load url and common helpers. 
	 * Load parser library functions.
	 * Load database model.
     */
    function __construct()
    {
		parent::__construct();
		$this->load->model('database', 'db');
		$this->data = array();
		$this->data['header'] = $this->load->view('modules/_header', '', true);
		$this->data['footer'] = $this->load->view('modules/_footer', '', true);
    }
    /**
     * Render this page
	 * @param boolean $locked whether this page should require authentication
     */
    function render( $locked = false )
    {
		if( $locked && !logged_in() )
			$this->data['content'] = $this->parser->parse( 'modules/_validation', array( 'url' => current_url() ), true );
		
		$this->parser->parse( 'templates/page', $this->data );
	}
	
	// renders this page if user is successfully validated
	public function validate()
	{
		//TODO: ACCESS DB AND VALIDATE PASSWORD
		$_SESSION['logged'] = true;
		$this->index();
	}
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */