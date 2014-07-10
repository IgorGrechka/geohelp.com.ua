<?php
class Model_Uslznaki extends Model {
	
	public function getAllSymbols() {
		$sql = "SELECT cat_name, zn_name, description, img_sourse FROM znaki";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function search_znak($sarchtext) {
		$text = $this->db->quote("%".$sarchtext."%");
		$sql = "SELECT cat_name, zn_name, description, img_sourse FROM znaki WHERE zn_name LIKE $text";
		$result = $this->db->query($sql);
		return $result;
	}
}