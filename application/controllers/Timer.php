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
		$params = array(
			'open_form' => form_open( "timer/save" ),
			'clients' => $this->clients->all()
		);
		$this->data['content'] = jumbotron( $this->parser->parse( 'timer', $params, true ) );
		$this->render();
	}

	public function save()
	{
		$clientId = 0;
		$hours = 0;
		$note = '';
		$image = '';
		if (isset($_POST)) {
 			$clientId = intval($this->input->post('client'));
  			$hours = floatval($this->input->post('hours'));
  			$note = floatval($this->input->post('note'));
  			if( $hours != 0 && $clientId != 0 )
  				$this->jobs->saveJob( $clientId, $hours, $note );
 		}
 		$this->render();
	}
}
