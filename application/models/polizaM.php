<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class polizaM extends CI_Model {

	public function get_poliza(){
		$this->db->select('p.id_poliza, c.nombre_contenedor, p.cantidad, p.peso, p.doc_transporte');
		$this->db->from('poliza p');
		$this->db->join('tipo_contenedor c', 'c.id_tipo_contenedor = p.id_tipo_contenedor');

		$exe = $this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_poliza', $id);
		$this->db->delete('poliza');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function get_tipo_contenedor(){
		$exe = $this->db->get('tipo_contenedor');
		return $exe->result();
	}
	public function set_poliza($datos){
		$this->db->set('id_poliza', $datos["id_poliza"]);
		$this->db->set('id_tipo_contenedor', $datos["tipo_contenedor"]);
		$this->db->set('cantidad', $datos["cantidad"]);
		$this->db->set('peso', $datos["peso"]);
		$this->db->set('doc_transporte', $datos["doc_transporte"]);

		$this->db->insert('poliza');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}
	public function get_datos($id){
		$this->db->where('id_poliza',$id);
		$exe = $this->db->get('poliza');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}
	public function actualizar($datos){
		$this->db->set('id_poliza', $datos["id_poliza"]);
		$this->db->set('id_tipo_contenedor', $datos["tipo_contenedor"]);
		$this->db->set('cantidad', $datos["cantidad"]);
		$this->db->set('peso', $datos["peso"]);
		$this->db->set('doc_transporte', $datos["doc_transporte"]);
		$this->db->where('id_poliza',$datos['id_poliza']);
		$this->db->update('poliza');
		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
	


}