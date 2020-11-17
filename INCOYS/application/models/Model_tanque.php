<?php

class model_tanque extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database('database1');
  }

  function insert($param)
  {
    $this->db->insert('tanques', $param);
  }

  public function load()
  {
    $this->db->select('*');
    $this->db->join('tipo_combustible', 'tipo_combustible.tc_id = tanques.tanq_tipo_combustible','left');
    $consulta = $this->db->get('tanques')->result();
    return $consulta;
  }

  public function load_avalaible()
  {
    $this->db->select('*');
    $this->db->where('tanq_est',1);
    $this->db->join('tipo_combustible', 'tipo_combustible.tc_id = tanques.tanq_tipo_combustible','left');
    $consulta = $this->db->get('tanques')->result();
    return $consulta;
  }

  public function load_tanque_id($id)
  {
    $this->db->select('*');
    $this->db->where('tanq_id',$id);
    $this->db->join('tipo_combustible', 'tipo_combustible.tc_id = tanques.tanq_tipo_combustible','left');
    $consulta = $this->db->get('tanques')->result();
    return $consulta;
  }

  public function load_oil()
  {
    $this->db->select('*');
    $query = $this->db->get('tipo_combustible')->result();
    return $query;
  }

  public function update($data)
  {
    $this->db->where('tanq_id', $data ['tanq_id']);
    $this->db->update('tanques', $data);
  }

  function delete($id)
  {
    $this->db->where('tanq_id', $id);
    $this->db->delete('tanques');
  }


}

?>
