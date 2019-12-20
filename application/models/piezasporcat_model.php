<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class piezasporcat_model extends CI_Model {

	public function carroceria(){
		$this->db->select('cp.nombre_categoria, SUM(pv.stock) as piezas_carroceria');
		$this->db->from('pieza_vehiculo pv');
		$this->db->join('pieza pi','pi.Id_pieza = pv.id_pieza');
		$this->db->join('categoria_piezas cp','cp.id_categoria = pi.id_categoria');
		$this->db->where('pi.id_categoria',1);
		$exe = $this->db->get();

		foreach ($exe->result() as $piezas) {
			$total = $piezas->piezas_carroceria;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}

	public function motor(){
		$this->db->select('cp.nombre_categoria, SUM(pv.stock) as piezas_motor');
		$this->db->from('pieza_vehiculo pv');
		$this->db->join('pieza pi','pi.Id_pieza = pv.id_pieza');
		$this->db->join('categoria_piezas cp','cp.id_categoria = pi.id_categoria');
		$this->db->where('pi.id_categoria',2);
		$exe = $this->db->get();

		foreach ($exe->result() as $piezas) {
			$total = $piezas->piezas_motor;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}

	public function transmision(){
		$this->db->select('cp.nombre_categoria, SUM(pv.stock) as piezas_transmision');
		$this->db->from('pieza_vehiculo pv');
		$this->db->join('pieza pi','pi.Id_pieza = pv.id_pieza');
		$this->db->join('categoria_piezas cp','cp.id_categoria = pi.id_categoria');
		$this->db->where('pi.id_categoria',3);
		$exe = $this->db->get();

		foreach ($exe->result() as $piezas) {
			$total = $piezas->piezas_transmision;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}

	public function suspension(){
		$this->db->select('cp.nombre_categoria, SUM(pv.stock) as piezas_suspension');
		$this->db->from('pieza_vehiculo pv');
		$this->db->join('pieza pi','pi.Id_pieza = pv.id_pieza');
		$this->db->join('categoria_piezas cp','cp.id_categoria = pi.id_categoria');
		$this->db->where('pi.id_categoria',4);
		$exe = $this->db->get();

		foreach ($exe->result() as $piezas) {
			$total = $piezas->piezas_suspension;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}		

	public function electronico(){
		$this->db->select('cp.nombre_categoria, SUM(pv.stock) as piezas_electronico');
		$this->db->from('pieza_vehiculo pv');
		$this->db->join('pieza pi','pi.Id_pieza = pv.id_pieza');
		$this->db->join('categoria_piezas cp','cp.id_categoria = pi.id_categoria');
		$this->db->where('pi.id_categoria',5);
		$exe = $this->db->get();

		foreach ($exe->result() as $piezas) {
			$total = $piezas->piezas_electronico;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}

	public function total(){
		$this->db->select('SUM(stock) as total_piezas');
		$exe = $this->db->get('pieza_vehiculo');

		foreach ($exe->result() as $piezas) {
			$total = $piezas->total_piezas;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}

	public function vehiculos(){
		$this->db->select('COUNT(id_vehiculo) as vehiculos');
		$exe = $this->db->get('vehiculo');

		foreach ($exe->result() as $piezas) {
			$total = $piezas->vehiculos;
		}

		if ($total > 0) {
			return $total;
		}else{
			return 0;
		}

	}			
}

?>