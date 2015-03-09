<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$results = $this->jobs->all();
		$jobs = array();
		foreach( $results as $result )
		{
			$job = get_object_vars($result);
			$client = $this->clients->get($job['clientId']);
			$job['company'] = $client->company;
			$job['rate'] = $client->rate;
			$job['total'] = floatval($job['rate']) * floatval($job['hours']);

		}
		$params = array(
			'jobs' => $jobs
		);

		$this->data['content'] = $this->parser->parse( 'jobs', $params, true ) ;
		$this->render();
	}

}
