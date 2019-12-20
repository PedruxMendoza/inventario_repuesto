<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pieza_vehiculoM extends CI_Model {

	public function get_pieza_vehiculo(){
		$this->db->select('ph.id_pieza_vehiculo, p.nombre_pieza, m.nombre_modelo, ma.nombre_marca, ph.precio_ingreso, ph.precio_venta, ph.stock');
		$this->db->from('pieza_vehiculo ph');
		$this->db->join("pieza p","p.id_pieza=ph.Id_pieza");
		$this->db->join("vehiculo v","v.id_vehiculo=ph.id_vehiculo");
		$this->db->join("modelo m","m.id_modelo=v.id_modelo");
		$this->db->join("marca ma","ma.id_marca=m.id_marca");

		$exe= $this->db->get();
		return $exe->result();

	}

	public function eliminar($id){
		$this->db->where("id_pieza_vehiculo", $id);
		$this->db->delete("pieza_vehiculo");
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function get_pieza(){
		$exe=$this->db->get('pieza');
		return $exe->result();
	}

	public function get_vehiculo(){
		$this->db->select('v.id_vehiculo, m.nombre_modelo, ma.nombre_marca');
		$this->db->from('vehiculo v');
		$this->db->join("modelo m","m.id_modelo=v.id_modelo");
		$this->db->join("marca ma","ma.id_marca=m.id_marca");		
		$exe=$this->db->get();
		return $exe->result();
	}

	public function get_modelo(){
		$this->db->select('v.id_vehiculo, m.nombre_modelo');
		$this->db->from('vehiculo v');
		$this->db->join("modelo m","m.id_modelo=v.id_modelo");	
		$exe=$this->db->get();
		return $exe->result();
	}

	public function get_marca(){
		$this->db->select('v.id_vehiculo, ma.nombre_marca');
		$this->db->from('vehiculo v');
		$this->db->join("modelo m","m.id_modelo=v.id_modelo");
		$this->db->join("marca ma","ma.id_marca=m.id_marca");		
		$exe=$this->db->get();
		return $exe->result();
	}


	public function set_pieza_vehiculo($datos){
	//	$this->db->set('id_pieza_vehiculo', $datos["id_pieza_vehiculo"]);
		$this->db->set('Id_pieza', $datos["Id_pieza"]);
		$this->db->set('id_vehiculo', $datos["nombre_modelo"]);
		$this->db->set('id_vehiculo', $datos["nombre_marca"]);
		$this->db->set('precio_ingreso', $datos["precio_ingreso"]);
		$this->db->set('precio_venta', $datos["precio_venta"]);
		$this->db->set('stock', $datos["stock"]);

		$this->db->insert('pieza_vehiculo');

		if($this->db->affected_rows()>0){
			return "add";
		}

	}

	public function get_datos($id){
		$this->db->where('id_pieza_vehiculo',$id);
		$exe=$this->db->get('pieza_vehiculo');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		$this->db->set('id_pieza_vehiculo', $datos["id_pieza_vehiculo"]);

		$this->db->set('Id_pieza', $datos["Id_pieza"]);
		$this->db->set('id_vehiculo', $datos["nombre_modelo"]);
		$this->db->set('id_vehiculo', $datos["nombre_marca"]);
		$this->db->set('precio_ingreso', $datos["precio_ingreso"]);
		$this->db->set('precio_venta', $datos["precio_venta"]);
		$this->db->set('stock', $datos["stock"]);
		$this->db->where('id_pieza_vehiculo',$datos['id_pieza_vehiculo']);

		$this->db->update('pieza_vehiculo');

		if($this->db->affected_rows()>0){
			return "add";
		}

	}






}