<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('barang_masuk.*, p_item.name as item_name, supplier.name as supplier_name');
		$this->db->from('barang_masuk');
		$this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		$this->db->join('p_item', 'p_item.barcode = barang_masuk.barcode');

		if ($id != null)
		{
			$this->db->where('barcode', $id);
		}

		$query = $this->db->get();
		return $query;
	}

}