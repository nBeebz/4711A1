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
		$this->data = array();	
		$this->data['styles'] = base_styles();
		$this->data['scripts'] = base_scripts();
		$this->data['content'] = '';
		$this->data['pages'] = array(	
				array( 'link' => anchor( "welcome", "Home") ),			
				array( 'link' => anchor( "timer", "Timer" ) ),
				array( 'link' => anchor( "job", "Jobs" ) ),
			);	
    }
    /**
     * Render this page
	 * @param boolean $locked whether this page should require authentication
     */
    function render()
    {
    	if( logged_in() )
    		array_unshift( $this->data['pages'], array( 'link' => anchor( "welcome/logout", "Logout" ) ) );
    	if( admin() )
    		array_push( $this->data['pages'], array( 'link' => anchor( "client", "Clients" ) ) );

		$this->parser->parse( 'templates/page', $this->data );
	}
	
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */