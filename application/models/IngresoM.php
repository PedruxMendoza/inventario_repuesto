<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IngresoM extends CI_Model {

	public function get_ingresos()
	{
		$this->db->select('i.id_ingreso, p.dui_persona ,CONCAT(pe.nombre1," ",pe.nombre2," ",pe.apellido1," ",pe.apellido2) as proveedor, i.fecha_hora, i.num_comprobante, i.total_compra, e.estado');
		$this->db->from('ingreso i');
		$this->db->join('proveedor p','p.id_proveedor = i.id_proveedor');
		$this->db->join('persona pe','pe.dui_persona = p.dui_persona');
		$this->db->join('estado e','e.id_estado = i.id_estado');
		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id)
	{
		$this->db->where('id_ingreso', $id);
		$this->db->delete('ingreso');

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function get_proveedor(){
		$this->db->select('pro.id_proveedor, pro.dui_persona, CONCAT(pe.nombre1, " ", pe.nombre2 ," ", pe.apellido1, " ", pe.apellido2) as proveedor');
		$this->db->from('proveedor pro');
		$this->db->join('persona pe','pe.dui_persona = pro.dui_persona');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function get_estado(){
		$exe=$this->db->get('estado');
		return $exe->result();
	}

	public function set_ingreso($datos){
		//setemos los campos de la tabla e indicamos el valor que se guardara en esa posicion
		$this->db->set('id_proveedor',      $datos['proveedor']);
		$this->db->set('fecha_hora',    	$datos['fecha_hora']);
		$this->db->set('num_comprobante', 	$datos['num_comprobante']);
		$this->db->set('total_compra',      $datos['total_compra']);
		$this->db->set('id_estado',     	$datos['estado']);

		//indicamos el tipo de accion que vamos a realizar y a que tabla se realizara
		$this->db->insert('ingreso');

		if ($this->db->affected_rows() > 0) {
			return "add";
		}
	}

	public function get_datos($id){
		$this->db->where('id_ingreso',$id);
		$exe = $this->db->get('ingreso');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

public function actualizar($datos){
	$this->db->set('id_proveedor',      $datos['proveedor']);
	$this->db->set('num_comprobante', 	$datos['num_comprobante']);
	$this->db->set('total_compra',      $datos['total_compra']);
	$this->db->set('id_estado',     	$datos['estado']);
	$this->db->where('id_ingreso',$datos['id_ingreso']);
	$this->db->update('ingreso');

	if($this->db->affected_rows()>0){
			return "edi";
		}
}	

}
