<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class piezaM extends CI_Model {

	public function get_pieza(){
		$this->db->select('p.Id_pieza, p.nombre_pieza, ca.nombre_categoria');
		$this->db->from('pieza p');
		$this->db->join('categoria_piezas ca','ca.id_categoria=p.id_categoria');
		

		$exe = $this->db->get();

		return $exe->result();


	}
	public function get_categoria(){
		$exe = $this->db->get('categoria_piezas');
		return $exe->result();
	}



	public function eliminar($id){
		$this->db->where('Id_pieza', $id);
		$this->db->delete('pieza');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function set_pieza($datos){
		$this->db->set('nombre_pieza', $datos["nombre_pieza"]);
		$this->db->set('id_categoria', $datos["id_categoria"]);


		$this->db->insert('pieza');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

		public function get_datos($id){
		$this->db->where('Id_pieza',$id);
		$exe = $this->db->get('pieza');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		$this->db->set('Id_pieza', $datos["Id_pieza"]);
		$this->db->set('nombre_pieza', $datos["nombre_pieza"]);
		$this->db->set('id_categoria', $datos["id_categoria"]);
		$this->db->where('Id_pieza', $datos['Id_pieza']);
		$this->db->update('pieza');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}




}