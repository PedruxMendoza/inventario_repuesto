<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_motorM extends CI_Model {

	public function get_tipo_motor(){
		$this->db->select('id_tipo_motor, nombre_tipo_motor');
		$this->db->from('tipo_motor');

		$exe= $this->db->get();

		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_tipo_motor', $id);
		$this->db->delete('tipo_motor');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function set_tipo_motor($datos){
		//$this->db->set('id_tipo_contenedor', $datos["id_tipo_contenedor"]);
		$this->db->set('nombre_tipo_motor', $datos["nombre_tipo_motor"]);

		$this->db->insert('tipo_motor');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}




	public function get_datos($id){
		$this->db->where('id_tipo_motor',$id);
		$exe = $this->db->get('tipo_motor');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		//$this->db->set('id_tipo_contenedor', $datos["id_tipo_contenedor"]);
		$this->db->set('nombre_tipo_motor', $datos["nombre_tipo_motor"]);
		$this->db->where('id_tipo_motor', $datos['id_tipo_motor']);
		$this->db->update('tipo_motor');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}


}