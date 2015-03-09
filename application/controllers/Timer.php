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
		$this->data['content'] = jumbotron( $this->load->view( 'timer', '', true ) );
		$this->render();
	}
}
