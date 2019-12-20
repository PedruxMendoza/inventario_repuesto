<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioM extends CI_Model {

	public function get_usuario(){
		$this->db->select('u.id_usuario, u.correo, u.clave, per.dui_persona, per.nombre1, per.nombre2, per.apellido1,per.apellido2, r.nombre_rol');
		$this->db->from('usuario u');
		$this->db->join('persona per','per.dui_persona=u.dui_persona');
		$this->db->join('rol r','r.id_rol=u.id_rol');



		$exe = $this->db->get();

		return $exe->result();
}//fin del metodo mostrar


public function get_persona(){
	$exe = $this->db->get('persona');
	return $exe->result();
}

public function get_rol(){
	$exe = $this->db->get('rol');
	return $exe->result();
}



public function eliminar($id){
	$this->db->where('id_usuario', $id);
	$this->db->delete('usuario');

	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}




public function set_usuario($datos){
	$this->db->set('correo',$datos['correo']);
	$this->db->set('clave',$datos['clave']);
	$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('id_rol',$datos['id_rol']);

	$this->db->insert('usuario');

	if($this->db->affected_rows()>0){
		return "add";
	}
}

// public function get_datos($id){
// 	$this->db->select('u.id_usuario, u.correo, u.clave, per.dui_persona, per.nombre1, per.nombre2, per.apellido1,per.apellido2, r.nombre_rol');
// 	$this->db->from('usuario u');
// 	$this->db->join('persona per','per.dui_persona=u.dui_persona');
// 	$this->db->join('rol r','r.id_rol=u.id_rol');

// 	$this->db->where('id_usuario',$id);

// 	$exe = $this->db->get();

// 	if($exe->num_rows()>0){
// 			return $exe->row();
// 		}else{
// 			return false;
// 		}
// 	}
public function get_datos($id){
	$this->db->where('id_usuario',$id);
	$exe = $this->db->get('usuario');

	if($exe->num_rows()>0){
		return $exe->row();
	}else{
		return false;
	}
}





public function actualizar($datos){
	$this->db->set('correo',$datos['correo']);
	$this->db->set('dui_persona',$datos['dui_persona']);
	$this->db->set('id_rol',$datos['id_rol']);
	$this->db->where('id_usuario',$datos['id_usuario']);
	$this->db->update('usuario');

	if($this->db->affected_rows()>0){
		return "edi";
	}
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
