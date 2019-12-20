<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model {

	public function get_usuario(){
		$this->db->select('u.id_usuario, u.correo, u.clave, per.dui_persona, r.nombre_rol');
		$this->db->from('usuario u');
		$this->db->join('persona per','per.dui_persona=u.dui_persona');
		$this->db->join('rol r','r.id_rol=u.id_rol');



		$exe = $this->db->get();

		return $exe->result();
}//fin del metodo mostrar


//inicio del metodo eliminar
public function eliminar($id){
	$this->db->where('id_usuario',$id);
	return ($this->db->delete('usuario'));
}//fin del metodo eliminar

public function get_persona(){
	$exe = $this->db->get('persona');
	return $exe->result();
}

public function get_rol(){
	$exe = $this->db->get('rol');
	return $exe->result();
}


public function set_usuario($datos){
	$this->db->set('correo',$datos['correo']);
	$this->db->set('clave',$datos['clave']);
	$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('id_rol',$datos['id_rol']);
	$this->db->insert('usuario');
}

public function get_datos($id){
	$this->db->where('id_usuario',$id);
	$exe = $this->db->get('usuario');
	return $exe->result();
}

public function set_usuarioAct($datos){
	$this->db->set('correo',$datos['correo']);
	$this->db->set('clave',$datos['clave']);
	$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('id_rol',$datos['id_rol']);
	$this->db->where('id_usuario',$datos['id']);
	$this->db->update('usuario');
}

public function validarCorreo($correo){

	$this->db->where('correo',$correo);
	$this->db->get('usuario');

	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
}
