<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculoM extends CI_Model {

	public function get_vehiculo(){
		$this->db->select('id_clase, nombre_clase');
		$this->db->from('clase_vehiculo');

		$exe=$this->db->get();
		return $exe->result();

	}

	public function eliminar($id){
		$this->db->where('id_clase',$id);
		$this->db->delete('clase_vehiculo');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function set_vehiculo($datos){
		$this->db->set('nombre_clase', $datos['nombre_clase']);

		$this->db->insert('clase_vehiculo');

		if($this->db->affected_rows()>0){
			return "add";

		}

	}

	public function get_datos($id){
		$this->db->where('id_clase', $id);
		$exe= $this->db->get('clase_vehiculo');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('id_clase', $datos["id_clase"]);
		$this->db->set('nombre_clase', $datos["nombre_clase"]);
		$this->db->where('id_clase', $datos['id_clase']);
		$this->db->update('clase_vehiculo');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}



}

