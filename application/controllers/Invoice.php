<?php
/**
 * Invoice.php
 * Displays a dummy button to generate invoice with drop down list of companies to invoice to.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$params = array( 'clients' => $this->db->all_clients() );
		$this->data['content'] = $this->parser->parse( 'invoice', $params, true );
		$this->render( current_url(), true );
	}
}
