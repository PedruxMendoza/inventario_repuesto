<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoriaM extends CI_Model {

	public function get_categoria(){
		$this->db->select("id_categoria, nombre_categoria");
		$this->db->from("categoria_piezas");

		$exe=$this->db->get();

		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where("id_categoria",$id);
		$this->db->delete("categoria_piezas");

		if($this->db->affected_rows()>0){
			return true;
		}else
		{
			return false;
		}
	}

	public function set_categoria($datos){
		$this->db->set('id_categoria', $datos["id_categoria"]);
		$this->db->set('nombre_categoria', $datos["nombre_categoria"]);

		$this->db->insert('categoria_piezas');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	public function get_datos($id){
		$this->db->where('id_categoria',$id);
		$exe = $this->db->get('categoria_piezas');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
	//	$this->db->set('id_categoria', $datos["id_categoria"]);
		$this->db->set('nombre_categoria', $datos["nombre_categoria"]);
		
		$this->db->where('id_categoria',$datos['id_categoria']);
		$this->db->update('categoria_piezas');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
	




}