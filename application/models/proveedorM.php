<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedorM extends CI_Model {

	public function get_proveedor(){
		$this->db->select('p.id_proveedor, per.dui_persona, per.nombre1, per.nombre2, per.apellido1, per.apellido2, p.telefono, p.correo');
		$this->db->from('proveedor p');
		$this->db->join('persona per', 'per.dui_persona = p.dui_persona');

		$exe = $this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_proveedor', $id);
		$this->db->delete('proveedor');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function get_persona(){
		$exe = $this->db->get('persona');
		return $exe->result();
	}

	public function set_proveedor($datos){
	//	$this->db->set('id_poliza', $datos["id_poliza"]);
		$this->db->set('dui_persona', $datos["dui_persona"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('correo', $datos["correo"]);
		
		$this->db->insert('proveedor');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	public function get_datos($id){
		$this->db->where('id_proveedor',$id);
		$exe = $this->db->get('proveedor');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('id_proveedor', $datos["id_proveedor"]);
		$this->db->set('dui_persona', $datos["dui_persona"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('correo', $datos["correo"]);
		$this->db->where('id_proveedor',$datos['id_proveedor']);
		$this->db->update('proveedor');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}


}