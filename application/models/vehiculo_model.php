<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculo_model extends CI_Model {

	public function get_vehiculo(){
		$this->db->select('v.id_vehiculo, m.nombre_modelo, v.anio, v.color, v.fecha_ingreso, v.VIN,
			po.cantidad, po.peso, po.doc_transporte, c.nombre_clase, v.millas, v.serie, tra.tipo_transmision, mo.nombre_tipo_motor, v.serial, ing.fecha_hora, ing.num_comprobante, ing.total_compra, v.precio_ingreso, v.id_poliza');
		$this->db->from('vehiculo v');
		$this->db->join('modelo m','m.id_modelo=v.id_modelo');
		$this->db->join('poliza po','po.id_poliza=v.id_poliza');
		$this->db->join('clase_vehiculo c','c.id_clase=v.id_clase');
		$this->db->join('transmision tra','tra.id_transmision=v.id_transmision');
		$this->db->join('tipo_motor mo','mo.id_tipo_motor=v.id_tipo_motor');
		$this->db->join('ingreso ing','ing.id_ingreso=v.id_ingreso');

		$exe = $this->db->get();

		return $exe->result();
}//fin del metodo mostrar


//inicio del metodo eliminar
public function eliminar($id){

	$this->db->where('id_vehiculo',$id);
	$this->db->delete('vehiculo');

	if ($this->db->affected_rows() > 0) {
		return 'successE';
	}else{
		return 'errorE';
	}
}//fin del metodo eliminar

public function get_modelo(){
	$exe = $this->db->get('modelo');
	return $exe->result();
}
public function get_poliza(){
	$exe = $this->db->get('poliza');
	return $exe->result();
}
public function get_clase_vehiculo(){
	$exe = $this->db->get('clase_vehiculo');
	return $exe->result();
}
public function get_transmision(){
	$exe = $this->db->get('transmision');
	return $exe->result();
}
public function get_tipo_motor(){
	$exe = $this->db->get('tipo_motor');
	return $exe->result();
}
public function get_ingreso(){
	$exe = $this->db->get('ingreso');
	return $exe->result();
}


public function set_vehiculo($datos){
	$this->db->set('id_modelo',$datos['nombre_modelo']);
	$this->db->set('anio',$datos['anio']);
	$this->db->set('color',$datos['color']);
	$this->db->set('fecha_ingreso',$datos['fecha_ingreso']);

	$this->db->set('VIN',$datos['VIN']);
	$this->db->set('id_poliza',$datos['id_poliza']);
	// $this->db->set('id_poliza',$datos['peso']);
	// $this->db->set('id_poliza',$datos['doc_transporte']);

	$this->db->set('id_clase',$datos['nombre_clase']);
	$this->db->set('millas',$datos['millas']);
	$this->db->set('serie',$datos['serie']);
	$this->db->set('id_transmision',$datos['tipo_transmision']);

	$this->db->set('id_tipo_motor',$datos['nombre_tipo_motor']);
	$this->db->set('serial',$datos['serial']);
	//$this->db->set('id_ingreso',$datos['fecha_hora']);
	$this->db->set('id_ingreso',$datos['num_comprobante']);

	//$this->db->set('id_ingreso',$datos['total_compra']);
	$this->db->set('precio_ingreso',$datos['precio_ingreso']);
	$this->db->insert('vehiculo');

	if ($this->db->affected_rows() > 0) {
		return 'success';
	}
}

public function get_datos($id){
	$this->db->where('id_vehiculo',$id);
	$exe = $this->db->get('vehiculo');
	return $exe->result();
}

public function set_vehiculoAct($datos){
	$this->db->set('id_modelo',$datos['nombre_modelo']);
	$this->db->set('anio',$datos['anio']);
	$this->db->set('color',$datos['color']);
	$this->db->set('fecha_ingreso',$datos['fecha_ingreso']);

	$this->db->set('VIN',$datos['VIN']);
	// $this->db->set('id_poliza',$datos['cantidad']);
	// $this->db->set('id_poliza',$datos['peso']);
	// $this->db->set('id_poliza',$datos['doc_transporte']);

	$this->db->set('id_clase',$datos['nombre_clase']);
	$this->db->set('millas',$datos['millas']);
	$this->db->set('serie',$datos['serie']);
	$this->db->set('id_transmision',$datos['tipo_transmision']);

	$this->db->set('id_tipo_motor',$datos['nombre_tipo_motor']);
	$this->db->set('serial',$datos['serial']);
	//$this->db->set('id_ingreso',$datos['fecha_hora']);
	$this->db->set('id_ingreso',$datos['num_comprobante']);

	//$this->db->set('id_ingreso',$datos['total_compra']);
	$this->db->set('precio_ingreso',$datos['precio_ingreso']);
	$this->db->where('id_vehiculo',$datos['id']);
	$this->db->update('vehiculo');

	if ($this->db->affected_rows() > 0) {
		return 'modi';
	}
}
}
