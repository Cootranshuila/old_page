<?php

class model_aforo extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database('database1');
  }

  public function insert_aforo($param)
  {
     $this->db->insert('aforo', $param);
  }

  function delete($id)
  {
    $this->db->where('id_tanque', $id);
    $this->db->delete('aforo');
  }

  public function load_per_tanque($consult)
  {
    $this->db->order_by("altura", "asc");
    $this->db->where('altura<=',$consult['combustible']);
    $this->db->where('id_tanque',$consult['tanque']);
    $consulta = $this->db->get('aforo');
    return $consulta->result();
  }

  public function load_per_tanque_details($consult)
  {
    $galon = 0;
    $alt =" - nada ".$consult['combustible'];
    $number = substr($consult['combustible'], 3);

    if ($number==3||$number==4||$number==5||$number==6||$number==7) {
      $this->db->order_by("altura", "asc");
      $this->db->where('altura<=',$consult['combustible']);
    }
    else{
      $this->db->order_by("altura", "desc");
      $this->db->where('altura>=',$consult['combustible']);
    }

    $this->db->where('id_tanque',$consult['tanque']);
    $consulta = $this->db->get('aforo')->result();

    foreach ($consulta as $datax1) {
      $galon = $datax1->galones;
      $alt = $datax1->altura;
      $alt = "- la altura es $alt ";
    }

    echo $alt;

    return $galon;
  }

  public function read_tanque_up($consult)
  {
    $galon = 0;
    $alt =" - nada ".$consult['combustible'];
    $number = substr($consult['combustible'], 3);

    $this->db->order_by("altura", "desc");
    $this->db->where('altura>=',$consult['combustible']);
    $this->db->where('id_tanque',$consult['tanque']);
    $consulta = $this->db->get('aforo')->result();

    foreach ($consulta as $datax1) {
      $galon = $datax1->galones;
      $alt = $datax1->altura;
      $alt = "- la altura es $alt ";
    }
    //  echo $alt;
    return $galon;
  }

  public function read_tanque_down($consult)
  {
    $galon = 0;
    $alt =" - nada ".$consult['combustible'];
    $number = substr($consult['combustible'], 3);

    $this->db->order_by("altura", "asc");
    $this->db->where('altura<=',$consult['combustible']);
    $this->db->where('id_tanque',$consult['tanque']);
    $consulta = $this->db->get('aforo')->result();

    foreach ($consulta as $datax1) {
      $galon = $datax1->galones;
      $alt = $datax1->altura;
      $alt = "- la altura es $alt ";
    }

    //echo $alt;
    return $galon;
  }

  public function calculate_gallon($data)
  {
    $number = $data['combustible']%5;
    $gallon = 0;

    //echo "el numero modulo es $number ";

    if ($number==0)
    {
      $galonup 	 = $this->read_tanque_up($data);
      $gallon = $galonup;
    }
    else
    {
      $galonup 	 = $this->read_tanque_up($data);
      $galondown = $this->read_tanque_down($data);

      $operation = $galonup - $galondown;

      $onegallon = $operation/5;

      $gallon = ($number*$onegallon)+$galondown;
    }



    return $gallon;


  }



  public function load_tanque($param)
  {
    $this->db->order_by("altura", "asc");
    $this->db->where('id_tanque',$param['tanque']);
    $consulta = $this->db->get('aforo');
    if($consulta->num_rows() >= 1)
    { $data = $consulta->result(); }
    else
    { $data = false; }

    $query['cantidad'] = $consulta->num_rows();
    $query['query'] = $data;
    return $query;
  }




}

?>
