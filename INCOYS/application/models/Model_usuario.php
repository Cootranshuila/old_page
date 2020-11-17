<?php

class model_usuario extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function insert($param)
  {
    $this->db->insert('usuario', $param);
  }

  public function autenticar_login($param)
  {
    $this->db->select('*');
    $this->db->where('user_correo',$param ['user_correo']);
    $this->db->where('user_password',sha1($param ['user_password']));
    $this->db->where('user_estado', 1);
    $consulta = $this->db->get('usuario');

    if($consulta->num_rows() == 1)
    { return $consulta; }
    else
    { return false; }
  }

  public function valid_email($data)
  {
    $consulta = $this->db->get_where('usuario', array('user_correo'=>$data['user_correo']));
    if($consulta->num_rows() == 1)
    { return true; }
    else
    { return false;  }
  }

  public function load()
  {
    $this->db->select('*');
    //$this->db->join('tipo_usuario', 'tipo_usuario.tipus_id = usuario.usr_tipo_usuario','left');
    $consulta = $this->db->get('usuario')->result();
    return $consulta;
  }

  public function delete($code)
  {
    $this->db->where('user_id', $code);
    $this->db->delete('usuario');
  }

  public function change_state($param)
  {
    $data ['usr_estado'] = $param ['state'];
    $this->db->where('usr_id', $param ['user']);
    $this->db->update('usuario', $data);
  }

  public function read($data)
  {
    $this->db->select('*');
    $this->db->where('usr_id', $data);
    $this->db->join('tipo_usuario', 'tipo_usuario.tipus_id = usuario.usr_tipo_usuario','left');
    $this->db->from('usuario');
    return $this->db->get()->result();
  }

  public function update($data)
  {
    $this->db->where('user_id', $data ['user_id']);
    $this->db->update('usuario', $data);
  }

  public function update_password($param)
  {
    $id = $param ['code'];
    $data ['usr_password'] = $param ['key'];
    $this->db->where('usr_id', $id);
    $this->db->update('usuario', $data);
  }

}

?>
