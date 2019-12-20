<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_contenedorM extends CI_Model {

	public function get_tipo_contenedor(){
		$this->db->select('id_tipo_contenedor, nombre_contenedor');
		$this->db->from('tipo_contenedor');

		$exe= $this->db->get();

		return $exe->result();
	}


public function eliminar($id){
		$this->db->where('id_tipo_contenedor', $id);
		$this->db->delete('tipo_contenedor');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function set_tipo_contenedor($datos){
		//$this->db->set('id_tipo_contenedor', $datos["id_tipo_contenedor"]);
		$this->db->set('nombre_contenedor', $datos["nombre_contenedor"]);

		$this->db->insert('tipo_contenedor');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

		public function get_datos($id){
		$this->db->where('id_tipo_contenedor',$id);
		$exe = $this->db->get('tipo_contenedor');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		//$this->db->set('id_tipo_contenedor', $datos["id_tipo_contenedor"]);
		$this->db->set('nombre_contenedor', $datos["nombre_contenedor"]);
		$this->db->where('id_tipo_contenedor', $datos['id_tipo_contenedor']);
		$this->db->update('tipo_contenedor');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}



}

