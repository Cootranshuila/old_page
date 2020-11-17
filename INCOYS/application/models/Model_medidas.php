<?php

class model_medidas extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database('database1');
  }

  function insert($param)
  {
    $this->db->insert('usuario', $param);
  }

  public function consult($param)
  {
    $this->db->where('med_fecha_hora >=',$param['campo1']);
    $this->db->where('med_fecha_hora <=',$param['campo2']);    
    $this->db->where('med_tanque',$param['tanque']);
    $this->db->order_by("med_Id", "asc");
    $consulta = $this->db->get('medidas');
    $medida = array();
    $i = 0;

    foreach ($consulta->result() as $value) {
      $medida[$i]['fecha']= $value->med_fecha_hora;
      $medida[$i]['combustible']= $value->med_nivel_combustible;
      $medida[$i]['agua']= $value->med_nivel_agua;
      $medida[$i]['presion']= $value->med_presion;
      $i=$i+1;
    }

    $query['cantidad'] = $consulta->num_rows();
    $query['query'] = $medida;
    return $query;
  }

  public function consult_suspx($param)
  {

    if ($this->input->post('date2'))
    {
      $this->db->where('med_fecha >=',$param['fecha']);
      $this->db->where('med_fecha <=',$param['fecha2']);
    }
    else
    {
      $this->db->where('med_fecha',$param['fecha']);
    }
    $this->db->where('med_tanque',$param['tanque']);
    $this->db->order_by("med_Id", "asc");
    $consulta = $this->db->get('medidas');

    $medida = array();
    $i = 0;
    if ($this->input->post('hora1')==null&&$this->input->post('hora2')==null&&$this->input->post('date2')==null) {

      foreach ($consulta->result() as $value) {
        $medida[$i]['fecha']= $value->med_fecha;
        $medida[$i]['combustible']= $value->med_nivel_combustible;
        $medida[$i]['hora']= $value->med_hora;
        $medida[$i]['agua']= $value->med_nivel_agua;
        $medida[$i]['presion']= $value->med_presion;
        $i=$i+1;
      }
    }
    elseif ($this->input->post('hora1')&&$this->input->post('hora2')&&$this->input->post('date2')==null) {

      foreach ($consulta->result() as $value) {
        if ($param['hora1']<=$value->med_hora||$value->med_hora<=$param['hora2'])
        {
          $medida[$i]['fecha']= $value->med_fecha;
          $medida[$i]['combustible']= $value->med_nivel_combustible;
          $medida[$i]['hora']= $value->med_hora;
          $medida[$i]['agua']= $value->med_nivel_agua;
          $medida[$i]['presion']= $value->med_presion;
          $i=$i+1;
        }
      }
    }
    elseif ($this->input->post('hora1')&&$this->input->post('hora2')&&$this->input->post('date2')) {

      foreach ($consulta->result() as $value) {

        if ($param['fecha']==$value->med_fecha)
        {
          if ($param['hora1']<=$value->med_hora)
          {
            $medida[$i]['fecha']= $value->med_fecha;
            $medida[$i]['combustible']= $value->med_nivel_combustible;
            $medida[$i]['hora']= $value->med_hora;
            $medida[$i]['agua']= $value->med_nivel_agua;
            $medida[$i]['presion']= $value->med_presion;
            $i=$i+1;
          }
        }
        else
        {
          if ($value->med_hora<=$param['hora2'])
          {
            $medida[$i]['fecha']= $value->med_fecha;
            $medida[$i]['combustible']= $value->med_nivel_combustible;
            $medida[$i]['hora']= $value->med_hora;
            $medida[$i]['agua']= $value->med_nivel_agua;
            $medida[$i]['presion']= $value->med_presion;
            $i=$i+1;
          }
        }
      }
    }
    else {
      echo "<script>alert('Error... contacte al administrador. 4890'); history.back();</script>";
    }



    /*
    if($consulta->num_rows() >= 1)
    { $data = $consulta->result(); }
    else
    { $data = false; }
    */




    $query['cantidad'] = $consulta->num_rows();
    $query['query'] = $medida;
    return $query;
  }

  public function consult_susp($param)
  {
    /*
    if ($this->input->post('hora1')) {
      $this->db->where('med_hora>=',$param['hora1']);
    }

    if ($this->input->post('hora2')) {
      $this->db->where('med_hora<=',$param['hora2']);
    }
    */
    if ($this->input->post('date2')) {
      $this->db->where('med_fecha >=',$param['fecha']);
      $this->db->where('med_fecha <=',$param['fecha2']);
    }
    else{
      $this->db->where('med_fecha',$param['fecha']);
    }
    //$this->db->where('med_tanque',1);
    $this->db->where('med_tanque',$param['tanque']);
    //$this->db->order_by("med_hora", "asc");
    $this->db->order_by("med_Id", "asc");
    $consulta = $this->db->get('medidas');

    if($consulta->num_rows() >= 1)
    { $data = $consulta->result(); }
    else
    { $data = false; }

    $query['cantidad'] = $consulta->num_rows();
    $query['query'] = $data;
    return $query;
  }

  public function consult_bacukp($param)
  {
    $this->db->where('med_fecha',$param['fecha']);
    $this->db->where('med_hora>=',$param['hora1']);
    $this->db->where('med_hora<=',$param['hora2']);
    $consulta = $this->db->get('medidas');

    if($consulta->num_rows() >= 1)
    { $data = $consulta->result(); }
    else
    { $data = false; }

    $query['cantidad'] = $consulta->num_rows();
    $query['data'] = $data;
    return $query;
  }

  public function load_day()
  {
    //$hoy = date("Y-m-d");
    //$this->db->where('med_fecha',$hoy);
    $consulta = $this->db->get('medidas');

    return $data = $consulta->result();
  }

  public function load_day_tanque($tanque)
  {
    //$hoy = date("Y-m-d");
    $this->db->where('med_tanque',$tanque);
    $this->db->order_by("med_Id", "desc");
    $this->db->limit(1);
    $consulta = $this->db->get('medidas');
    return $data = $consulta->result();
  }

 public function get()
 {
   $fields = $this->db->field_data('medidas');
   $query = $this->db->select('*')->get('medidas')->result();
   return array("fields" => $fields, "query" => $query);
 }


 public function insert_aforo($param)
 {
     $this->db->insert('aforo', $param);
 }




}

?>
