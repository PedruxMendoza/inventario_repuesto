<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona_model extends CI_Model {

	public function get_persona(){
		$this->db->select('per.dui_persona, per.nombre1, per.nombre2, per.apellido1, per.apellido2, s.sexo, per.direccion');
		$this->db->from('persona per');
		$this->db->join('sexo s','s.id_sexo=per.id_sexo');


		$exe = $this->db->get();

		return $exe->result();
}//fin del metodo mostrar


//inicio del metodo eliminar
public function eliminar($id){
	$this->db->where('dui_persona',$id);
	return ($this->db->delete('persona'));
}//fin del metodo eliminar
public function get_sexo(){
	$exe = $this->db->get('sexo');
	return $exe->result();
}

public function set_persona($datos){
	$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('nombre1',$datos['nombre1']);
	$this->db->set('nombre2',$datos['nombre2']);
	$this->db->set('apellido1',$datos['apellido1']);
	$this->db->set('apellido2',$datos['apellido2']);

	$this->db->set('id_sexo',$datos['id_sexo']);
	$this->db->set('direccion',$datos['direccion']);
	$this->db->set('telefono',$datos['telefono']);
	$this->db->insert('persona');
}

public function get_datos($id){
	$this->db->where('dui_persona',$id);
	$exe = $this->db->get('persona');
	return $exe->result();
}

public function set_personaAct($datos){
	//$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('nombre1',$datos['nombre1']);
	$this->db->set('nombre2',$datos['nombre2']);
	$this->db->set('apellido1',$datos['apellido1']);
	$this->db->set('apellido2',$datos['apellido2']);

	$this->db->set('id_sexo',$datos['id_sexo']);
	$this->db->set('direccion',$datos['direccion']);
	$this->db->set('telefono',$datos['telefono']);
	$this->db->where('dui_persona',$datos['dui_persona']);
	$this->db->update('persona');
}
}
