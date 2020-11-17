<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_login extends CI_Controller {

  function __construct()
  {
    parent::__construct ();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_usuario');
  }

	public function index()
	{
		$this->load->view('login.php');
	}

  public function autenticar()
  {
    if ($this->input->post('correo')&&$this->input->post('password'))
    {

      $param ['user_correo']   = $this->input->post('correo');
      $param ['user_password'] =  $this->input->post('password');
      //$param ['tipo']     =  1;

      $valid  = $this->model_usuario->valid_email($param);
      $autner = $this->model_usuario->autenticar_login($param);

      if ($valid==false){
        $data['mensaje'] = "Correo no existe.";
        $data['alert']   = "alert-danger";
        $this->load->view('login.php',$data);
      }
      elseif ($autner==false)
      {
        $data['mensaje'] = " Contraseña mal ingresado.";
        $data['alert']   = "alert-danger";
        $this->load->view('login.php',$data);
      }
      else
      {
        foreach($autner->result() as $datos) {
          $response["iduser"] = $datos->user_id;
          $response["nombre"] = $datos->user_nombre;
          $response["correo"] = $datos->user_correo;
          $response["tipo"]   = $datos->user_tipo;
          $response["estacion"]   = $datos->user_estacion;
        }

        $newdata = array(
              'usuario' => $response["nombre"],
              'correo'  => $response["correo"],
              'iduser'  => $response["iduser"],
              'role'    => $response["tipo"],
              'logged'  => TRUE
        );

        if ($response["tipo"]==1||$response["tipo"]==2)
        {
          $this->session->set_userdata($newdata);
          redirect(base_url('index'));
        }
        else {
          echo "Error login";
        }
      }
    }
    else {
      $this->load->view('forbidden.php');
    }
  }

}
