<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Main Index pages. Displays welcome message generated from database.php model file.
	 */
	public function index()
	{
		var_dump($this->session->userdata());
		$params = array(
			'form_open'	=> form_open( 'welcome/login' )
		);
		$this->data['content'] = jumbotron( $this->parser->parse( 'welcome', $params, true ) );
		$this->data['content'] .= 'Login with the username "admin" and password "P@$$w0rd" to access admin options' ;
		$this->data['content'] .= 'Login with the username "jlparry" and password "P@$$w0rd" to view as a normal user' ;
		$this->data['content'] .= logged_in();
		
		$this->render();
	}

	public function login()
	{
		if( isset($_POST) )
		{
			$name = $this->input->post("username");
			$user = $this->users->get($name);
			if( $this->input->post("password") == $user->password )
			{
				$this->session->set_userdata(get_object_vars($user));
				$this->data['content'] = "Welcome $name! Click the above links to get started";
			}
			else
				$this->data['content'] = "Sorry that username/password pair is incorrect";
			$this->render();
		}
		else
			redirect("welcome");
	}

	public function logout()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("password");
		$this->session->unset_userdata("type");
		redirect("welcome");
	}
}
