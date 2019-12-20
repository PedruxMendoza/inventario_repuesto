<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class venta_model extends CI_Model {

	public function get_venta(){
		$this->db->select('v.id_venta,v.dui_persona, CONCAT(p.nombre1," ",p.nombre2," ",p.apellido1," ",p.apellido2) as comprador ,CONCAT(pv.nombre1," ",pv.apellido1) as vendedor,v.num_factura,v.fecha_hora,v.total_venta');
		$this->db->from('venta v');
		$this->db->join('persona p ',' p.dui_persona=v.dui_persona','left');
		$this->db->join('usuario u ',' u.id_usuario=v.id_usuario');
		$this->db->join('persona pv ',' pv.dui_persona=u.dui_persona');
		$exe = $this->db->get();
		return $exe->result();
	}

	/*public function eliminar($id){
		$this->db->where('id_venta',$id);
		$this->db->delete('venta');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}*/

	public function get_persona(){
		$exe = $this->db->get('persona');
		return $exe->result();
	}

	public function get_vendedor(){
		$this->db->select('u.id_usuario,p.dui_persona,CONCAT(p.nombre1," ",p.nombre2," ",p.apellido1," ",p.apellido2) as vendedor');
		$this->db->from('usuario u');
		$this->db->join('persona p','p.dui_persona=u.dui_persona');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function get_pieza(){
		$exe = $this->db->get('pieza');
		return $exe->result();
	}

	public function get_precio($id){
		$this->db->where('id_pieza',$id);
		$exe = $this->db->get('pieza_vehiculo');
		return $exe->row();
	}

	/*public function ingresar($datos){
		$this->db->set('dui_persona',$datos['dui']);
		$this->db->set('id_usuario',$datos['usuario']);
		$this->db->set('num_factura',$datos['factura']);
		$this->db->set('fecha_hora',$datos["fecha_hora"]);
		$this->db->set('total_venta',$datos['total_venta']);
		$this->db->insert('venta');
		$id = $this->db->insert_id();
		$this->db->set('id_venta',$id);
		$this->db->set('id_pieza',$datos['pieza']);
		$this->db->set('cantidad',$datos['cantidad']);
		$this->db->insert('detalle_venta');

		if ($this->db->affected_rows() > 0) {
			return 'add';
		}else{
			return false;
		}
	}*/

	public function get_detalle($id){
		$this->db->select('v.id_venta, v.num_factura, p.nombre_pieza, dv.cantidad, pv.precio_venta, v.total_venta ');
		$this->db->from('detalle_venta dv');
		$this->db->join('venta v ',' v.id_venta=dv.id_venta');
		$this->db->join('pieza p ',' p.Id_pieza=dv.id_pieza');
		$this->db->join('pieza_vehiculo pv ',' pv.id_pieza=dv.id_pieza');
		$this->db->where('v.id_venta',$id);
		$exe = $this->db->get();
		return $exe->result();
	}
}
