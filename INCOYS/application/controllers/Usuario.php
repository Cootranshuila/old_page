<?php

  /**
   *
   */
  class Usuario extends CI_Controller
  {

    function __construct()
    {
      parent::__construct ();
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('model_usuario');
      $this->load->library('form_validation');
      $this->load->library('encrypt');
    }

    public function index(){
      $this->very_session();
      $this->load->view('component/header.php');
      //
      $data['info'] = $this->model_usuario->load();
      $this->load->view('usuario/index',$data);
      $this->load->view('component/footer.php');
    }

    public function delete()
    {
      if ($this->input->post('safety')) {
        $id = $this->input->post('id');
        $this->model_usuario->delete($id);
        $response["message"] = "Eliminado exitosamente!";
        $response["success"] = true;
        echo json_encode($response);
      }
      else{
        $response["message"] = "Error 408";
        $response["success"] = false;
        echo json_encode($response);
      }
    }

    public function change_state()
    {
      if ($this->input->post('safety'))
      {
        $param["user_id"] = $this->input->post('id');
        $param["user_estado"] = $this->input->post('state');
        $this->model_usuario->update($param);
        $response["message"] = "Actualizado exitosamente!";
        $response["success"] = true;
        echo json_encode($response);
      }
      else{
        $response["message"] = "Error 408";
        $response["success"] = false;
        echo json_encode($response);
      }
    }

    public function register()
    {
      $response = array();

      if ($this->input->post('nombre')==null) {
        $response["message"] = "Introduce nombre";
        $response["success"] = false;
        echo json_encode($response);
      }
      elseif ($this->input->post('email')==null)  {
        $response["message"] = "Introduce Email";
        $response["success"] = false;
        echo json_encode($response);
      }
      elseif ($this->input->post('identificacion')==null)  {
        $response["message"] = "Introduce Identificación";
        $response["success"] = false;
        echo json_encode($response);
      }
      elseif ($this->validar_clave($this->input->post('key'),$this->input->post('key2'))){
        $response["message"] = "Error, la Contraseña no es igual a confirmar Contraseña. ";
        $response["success"] = false;
        echo json_encode($response);
      }
      else{

        $param ['user_nombre']    = $this->input->post('nombre');
        $param ['user_identificacion']   = $this->input->post('identificacion');
        $param ['user_tipo']      =  $this->input->post('tipo');
        $param ['user_correo']    =  $this->input->post('email');
        $param ['user_password']  =  sha1($this->input->post('key'));
        $param ['user_estacion']  =  $this->input->post('estacion');
        $param ['user_estado']    =  1;


        $valid_correo = $this->model_usuario->valid_email($param);

        $validate = $this->isValidEmail($param ['user_correo']);

        if ($valid_correo==true)
        {
          $response["message"] = "Ya existe Email";
          $response["success"] = false;
          echo json_encode($response);
        }
        elseif ($validate==false) {
          $response["message"] = "Escribe un correo valido";
          $response["success"] = false;
          echo json_encode($response);
        }
        else{
          // inserta pedidos
          $this->model_usuario->insert($param);
          $response["message"] = "Registrado exitosamente";
          $response["success"] = true;
          echo json_encode($response);
        }
      }
  }

  public function validar_clave($key1,$key2)
  {
    if (sha1($key1)==sha1($key2)) {
      return false;
    }
    else{
      return true;
    }
  }


  

  public function logout(){
    $array_items = array('usuario', 'correo', 'iduser', 'logged');
    $this->session->unset_userdata($array_items);
    header("Location:".base_url());
  }


  function isValidEmail($email){
	    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}


  function very_session()
  {
    if (!$this->session->userdata('logged')==TRUE) {
      header("Location:".base_url());
    }
  }
}
  ?>
