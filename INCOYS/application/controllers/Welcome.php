<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
  {
    parent::__construct ();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_usuario');
		$this->load->model('model_medidas');
		$this->load->model('model_tanque');
		$this->load->model('model_aforo');
  }

	public function leer_numero()
	{
		$year = substr(1992, 3);
		echo $year;
	}

	public function test_levep()
	{
		$nivel = $this->uri->segment(3);
		$datos['combustible'] = $nivel;
		$datos['tanque'] = 'F0F1';
		$galon 	 = $this->model_aforo->calculate_gallon($datos);
		echo "El galon de $nivel es $galon ";
	}

	public function index()
	{
		$this->very_session();
		//$data['codegas'] = $this->model_medidas->load_day();
		$data['tanque'] = $this->model_tanque->load_avalaible();
		$this->load->view('component/header.php');
		//$this->load->view('component/sidebar.php');
		$this->load->view('component/main.php',$data);
		$this->load->view('component/footer.php');
	}

	function very_session()
	{
		if (!$this->session->userdata('logged')==TRUE) {
			redirect(base_url());
		}
	}

}
