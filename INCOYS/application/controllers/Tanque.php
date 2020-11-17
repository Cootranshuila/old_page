<?php

  /**
   *
   */
  class Tanque extends CI_Controller
  {

    function __construct()
    {
      parent::__construct ();
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('model_tanque');
      $this->load->library('form_validation');
      $this->load->library('encrypt');
    }

    public function index()
    {
      $this->very_session();
      $this->load->view('component/header.php');
      $data['info'] = $this->model_tanque->load();
      $this->load->view('tanque/index',$data);
      $this->load->view('component/footer.php');
    }

    public function form()
    {
      $this->very_session();
      $data['oil'] = $this->model_tanque->load_oil();
      $this->load->view('component/header.php');
      //
      $this->load->view('tanque/form',$data);
      $this->load->view('component/footer.php');
    }

    public function create()
    {
      $this->very_session();
      $this->form_validation->set_rules('tipo', 'Tipo', 'required');
      $this->form_validation->set_rules('codigo', 'codigo', 'required');
      $this->form_validation->set_rules('nombre', 'nombre', 'required');
      $this->form_validation->set_rules('capacidad', 'capacidad', 'required', 'numeric');

      if ($this->form_validation->run() == FALSE)
      {
        $this->load->view('component/header.php');
        //
        $this->load->view('tanque/form');
        $this->load->view('component/footer.php');
      }
      else
      {
        $param ['tanq_codigo']           =  $this->input->post('codigo');
        $param ['tanq_nombre']           =  $this->input->post('nombre');
        $param ['tanq_tipo_combustible'] =  $this->input->post('tipo');
        $param ['tanq_capacidad']        =  $this->input->post('capacidad');
        $param ['tanq_max_comb']        =  $this->input->post('max_comb');
        $param ['tanq_min_comb']        =  $this->input->post('min_comb');
        $param ['tanq_alt_agua']        =  $this->input->post('alt_agua');
        $param ['tanq_color']           =  $this->input->post('color');
        $param ['tanq_est']        =  1;
        $this->model_tanque->insert($param);
        $this->session->set_flashdata('correcto', 'Se ha guardó exitosamente!');
        redirect(base_url('Tanque/index'), 'refresh');

      }
    }

    public function change_state()
    {
      if ($this->input->post('change'))
      {
        $param["tanq_id"] = $this->input->post('id');
        $param["tanq_est"] = $this->input->post('state');
        $this->model_tanque->update($param);
        $response["message"] = "Actualizado exitosamente! ".$param["tanq_est"] ;
        $response["success"] = true;
        echo json_encode($response);
      }
      else{
        $response["message"] = "Error 408";
        $response["success"] = false;
        echo json_encode($response);
      }
    }

    public function edit()
    {
      if ($this->uri->segment(3)==null) {
        echo "Error";
      }
      else
      {
        $this->very_session();
        $id = $this->uri->segment(3);
        $this->load->view('component/header.php');
        //
        $data['info'] = $this->model_tanque->load_tanque_id($id);
        $data['oil'] = $this->model_tanque->load_oil();
        $this->load->view('tanque/edit',$data);
        $this->load->view('component/footer.php');
      }
    }

    public function update()
    {
      if ($this->input->post('update')==true)
      {
        $this->very_session();
        $param ['tanq_id']               =  $this->input->post('id');
        $param ['tanq_codigo']           =  $this->input->post('codigo');
        $param ['tanq_nombre']           =  $this->input->post('nombre');
        $param ['tanq_tipo_combustible'] =  $this->input->post('tipo');
        $param ['tanq_capacidad']        =  $this->input->post('capacidad');
        $param ['tanq_max_comb']         =  $this->input->post('max_comb');
        $param ['tanq_min_comb']         =  $this->input->post('min_comb');
        $param ['tanq_alt_agua']         =  $this->input->post('alt_agua');
        $param ['tanq_color']            =  $this->input->post('color');

        $this->model_tanque->update($param);
        redirect('Tanque/index');
      }
      else
      {
        echo "jajajaja";
      }
    }

  public function delete()
  {
    if($this->input->post('delete')==true)
    {
      $id     = $this->input->post('id');
      $this->model_tanque->delete($id);
      $response["message"] = 'Eliminado exitosamente. ';
      $response["success"] = true;
      echo json_encode($response);
    }
    else
    {
      echo "Safety BlackTurpial ";
    }
  }


  function very_session()
  {
    if (!$this->session->userdata('role')==1) {
      redirect(base_url());
    }
  }
}
  ?>
