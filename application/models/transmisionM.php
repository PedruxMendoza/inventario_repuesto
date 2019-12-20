<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transmisionM extends CI_Model {

	public function get_transmision(){
		$this->db->select('id_transmision, tipo_transmision');
		$this->db->from('transmision');

		$exe= $this->db->get();

		return $exe->result();
	}


public function eliminar($id){
		$this->db->where('id_transmision', $id);
		$this->db->delete('transmision');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function set_transmision($datos){
		$this->db->set('tipo_transmision', $datos['tipo_transmision']);

		$this->db->insert('transmision');

		if($this->db->affected_rows()>0){
			return "add";

		}

	}

	public function get_datos($id){
		$this->db->where('id_transmision', $id);
		$exe= $this->db->get('transmision');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('id_transmision', $datos["id_transmision"]);
		$this->db->set('tipo_transmision', $datos['tipo_transmision']);
		$this->db->where('id_transmision', $datos['id_transmision']);
		$this->db->update('transmision');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}





}