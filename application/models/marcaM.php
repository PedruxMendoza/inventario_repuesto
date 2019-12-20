<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class marcaM extends CI_Model {


	public function get_marca(){

		$exe = $this->db->get('marca');
		return $exe->result();

	}//cierre metodo get_marca

	public function eliminar($id){


		$this->db->where('id_marca',$id);

		$this->db->delete('marca');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}

	}//cierre metodo eliminar

	public function set_marca($datos){

		$this->db->set('nombre_marca', $datos['nombre_marca']);
		$this->db->insert('marca');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}

	}//cierre metodo set_marca

	public function get_datos($id){

		$this->db->where('id_marca',$id);
		$exe = $this->db->get('marca');
		return $exe->result();

	}//cierre metodo get_datos

	public function actualizar($datos){


		$this->db->set('nombre_marca', $datos['nombre_marca']);
		$this->db->where('id_marca',   $datos['id_marca']);

		$this->db->update('marca');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}

	}//cierre metodo actualizar

}
