<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vender_model extends CI_Model {

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


	public function get_nombre($id){
		$this->db->where('id_pieza',$id);
		$exe = $this->db->get('pieza');
		return $exe->row();
	}

	public function get_comprador($id){
		$this->db->where('dui_persona',$id);
		$this->db->select('dui_persona,CONCAT(nombre1," ",nombre2," ",apellido1," ",apellido2) as comprador');
		$this->db->from('persona');
		$exe = $this->db->get();
		return $exe->row();
	}

	public function get_vendedor1($id){
		$this->db->where('u.id_usuario',$id);
		$this->db->select('u.id_usuario,p.dui_persona,CONCAT(p.nombre1," ",p.nombre2," ",p.apellido1," ",p.apellido2) as vendedor');
		$this->db->from('usuario u');
		$this->db->join('persona p','p.dui_persona=u.dui_persona');
		$exe = $this->db->get();
		return $exe->row();
	}

	public function get_stock($id){
		$this->db->select('stock');
		$this->db->from('pieza_vehiculo');
		$this->db->where('id_pieza',$id);
		$exe = $this->db->get();
		return $exe->row();
	}

	
	public function ingresar($datos){


		//Primero ingresamos en la tabla venta------------
		$total=$this->session->userdata('total');

		$this->db->set('dui_persona',$datos['dui']);
		$this->db->set('id_usuario',$datos['usuario']);
		$this->db->set('num_factura',$datos['factura']);
		$this->db->set('fecha_hora',$datos["fecha_hora"]);
		$this->db->set('total_venta',$total);
		$this->db->insert('venta');

		$id = $this->db->insert_id();

		//Insertamos en detalle venta-*-----------------
		foreach ($this->cart->contents() AS $key =>  $v) {
			
			$this->db->set('id_venta',$id);
			$this->db->set('id_pieza',$v["id"]);
			$this->db->set('cantidad',$v["qty"]);
			$this->db->insert('detalle_venta');

			$da = $this->get_stock($v["id"]);


			$this->db->where('id_pieza',$v["id"]);
			$this->db->set('stock',($da->stock)-($v["qty"]));
			$this->db->update('pieza_vehiculo');

			
		}
		$this->cart->destroy();


		
		if ($this->db->affected_rows() > 0) {
			return 'add';
		}else{
			return false;
		}
	}
	/*public function get_factura($id){
		$this->db->select('v.id_venta,v.dui_persona, CONCAT(p.nombre1," ",p.nombre2," ",p.apellido1," ",p.apellido2) as comprador ,CONCAT(pv.nombre1," ",pv.apellido1) as vendedor,v.num_factura,v.fecha_hora,v.total_venta');
		$this->db->from('venta v');
		$this->db->join('persona p ',' p.dui_persona=v.dui_persona','left');
		$this->db->join('usuario u ',' u.id_usuario=v.id_usuario');
		$this->db->join('persona pv ',' pv.dui_persona=u.dui_persona');
		$this->db->where('v.id_venta',$id);
		$exe = $this->db->get();
		return $exe->result();
	}*/
}
