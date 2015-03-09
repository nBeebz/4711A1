<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Client.php
 * Displays and implements CRUD methods for the clients in the database
 */
class Client extends Application {

	function __construct(){
		parent::__construct();
		$config['upload_path'] = 'assets/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$this->load->library('upload', $config );
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		if( admin() ){
			$results = $this->clients->all();
			$clients = array();
			foreach ($results as $result ) {
				$client = get_object_vars($result);
				$client['edit_link'] = anchor( 'client/edit/'.$client['id'], "Edit" );
				$client['delete_link'] = anchor( 'client/delete/'.$client['id'], "Delete" );
				array_push($clients, $client);
			}

			$params = array(
				'clients' => $clients,
				'add_link' => anchor("client/add", "Add New Client" )
			);

			$this->data['content'] = $this->parser->parse( 'client', $params, true );
			$this->data['content'] .= "</br>This page is only viewable by an admin"; 
		}
		$this->render();
	}

	/**
	 * Page to add a new client 
	 */
	public function add(){
		$params['open_form'] = form_open( "client/create"  );
		$this->data['content'] = $this->parser->parse( 'edit', $params, true );
		$this->render();
	}

	/**
	 * Creates client and adds them to the database
	 */
	public function create()
	{
		if(isset($_POST))
		{
			$record = array();
			$record['id'] =  $this->clients->highest()+1;
			$record['name'] = $this->input->post('name');
			$record['company'] = $this->input->post('company');
			$record['email'] = $this->input->post('email');
			$record['rate'] = floatval( $this->input->post('rate') );
			$record['description'] = $this->input->post('description');
			if( isset( $_FILES['image'] )){
				$record['image'] = file_get_contents($_FILES['image']['tmp_name']);
				$record['img_name'] = $_FILES['image']['name'];
			}
			$this->clients->add($record);
		}
		redirect( "users" );
	}


	/**
	 * Deletes client
	 */
	public function delete( $id ){ $this->clients->delete($id); $this->render(); }

	/**
	 * Page to edit clients in the database
	 */
	public function edit( $id )
	{
		$params = get_object_vars($this->clients->get($id) );
		$params['open_form'] = form_open_multipart( "client/save", array( 'id'=> 'save' ) );
		$this->data['content'] = $this->parser->parse( 'edit', $params, true );
		$this->data['content'] .= "</br>Theoretically, image uploads should work, but they currently cause a database length error"; 
		$this->render();
	}

	/**
	 * Saves edited client to the database
	 */
	public function save()
	{
		if(isset($_POST))
		{
			$record = array();
			$record['id'] =  $this->input->post('id');
			$record['name'] = $this->input->post('name');
			$record['company'] = $this->input->post('company');
			$record['email'] = $this->input->post('email');
			$record['rate'] = floatval( $this->input->post('rate') );
			$record['description'] = $this->input->post('description');
			if( isset( $_FILES['image'] )){
				$record['image'] = file_get_contents($_FILES['image']['tmp_name']);
				$record['img_name'] = $_FILES['image']['name'];
			}
			$this->clients->update($record);
		}
		redirect( "users" );
	}

}
