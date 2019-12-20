<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modeloM extends CI_Model{

	public function get_modelo(){

		$this->db->select('m.id_modelo, m.nombre_modelo,ma.nombre_marca');
		$this->db->from('modelo m');
		$this->db->join('marca ma', 'ma.id_marca = m.id_marca');
		$exe = $this->db->get('');
		return $exe->result();

	}//cierre metodo get_modelo

	public function eliminar($id){

		$this->db->where('id_modelo',$id);
		$this->db->delete('modelo');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}

	}//cierre metodo eliminar

	public function get_marca(){

		$exe = $this->db->get('marca');
		return $exe->result();

	}//cierre metodo para traer las marcas de la base

	public function set_modelo($datos){

		$this->db->set('nombre_modelo', $datos['nombre_modelo']);
		$this->db->set('id_marca', $datos['nombre_marca']);
		$this->db->insert('modelo');
		
		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}//cierre de metodo set_modelo

	public function get_datos($id){

		$this->db->where('id_modelo',$id);
		$exe = $this->db->get('modelo');
		return $exe->result();

	}//cierre de metodo get_datos 

	public function actualizar($datos){

		$this->db->set('nombre_modelo', $datos['nombre_modelo']);
		$this->db->set('id_marca', $datos['nombre_marca']);
		$this->db->where('id_modelo', $datos['id_modelo']);

		$this->db->update('modelo');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}		
	}

}//cierre de clase modeloM
