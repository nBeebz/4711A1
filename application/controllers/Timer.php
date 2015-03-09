<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Timer.php
 * Displays a timer and allows recorded times to be saved to the database
 */
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
		$this->data['content'] .= "Click the stop button to reveal a save dialog with a list of employers";
		$this->data['content'] .= "<br/>Timer starts at 15m internally to facilitate debugging";
		$this->render();
	}

	/**
	 * Saves the current recorded time to the database along with the selected clientId
	 */
	public function save()
	{
		$clientId = 0;
		$hours = 0;
		$note = '';
		$image = '';
		if (isset($_POST)) {
 			$clientId = intval($this->input->post('client'));
  			$hours = floatval($this->input->post('hours'));
  			$note = $this->input->post('note');
  			if( $hours != 0 && $clientId != 0 )
  				$this->jobs->saveJob( $clientId, $hours, $note );
 		}
 		redirect( "timer" );
	}
}
