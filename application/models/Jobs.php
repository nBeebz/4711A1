<?php
 
class Jobs extends MY_Model {

    function __construct()
    {
        parent::__construct( 'jobs' );
    }
	
	function saveJob( $clientId, $hours, $note = "HELLO WORLD" )
	{
		$record = array(
			'id' => $this->highest()+1,
			'note' => $note,
			'clientId' => $clientId,
			'hours' => $hours
		);

		$this->add($record);
	}

}