<?php
/**
 * Timer.php
 * Displays a dummy timer with drop down list of companies and description box.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Timer extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$params = array( 'clients' => $this->db->all_clients() );
		$this->data['content'] = $this->parser->parse( 'timer', $params, true );
		$this->render( current_url(), true );
	}
}
