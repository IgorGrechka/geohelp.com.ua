<?php
class Model_Uslznaki extends Model {
	
	//Выбор всех знаков из таблицы
	public function getAllSymbols() {
		$sql = "SELECT cat_name, zn_name, description, img_sourse, id_order FROM znaki";
		$result = $this->db->query($sql);
		$symbols = $result->fetchAll(PDO::FETCH_ASSOC);
		$set = $this->getAddons($symbols);
		return $set;
	}
	
	//Поиск условных знаков по критерию
	public function search_znak($sarchtext) {
		$text = $this->db->quote("%".$sarchtext."%");
		$sql = "SELECT cat_name, zn_name, description, img_sourse, id_order FROM znaki WHERE zn_name LIKE $text";
		$result = $this->db->query($sql);
		$symbols = $result->fetchAll(PDO::FETCH_ASSOC);
		$set = $this->getAddons($symbols);
		return $set;
	}
	
	//Выбор дополнений
	public function getAddons($symbols) {
		$final_set = array();
		foreach ($symbols as $item) {
			$sql = "select add_num, add_text from znaki as z
							inner join znak_addons as za on (z.id_order = za.zn_id)
							inner join addons as a on (za.add_id = a.add_num)
							where z.id_order = {$item['id_order']}";
			$result = $this->db->query($sql);
			$item["addon"] = $result->fetchAll(PDO::FETCH_ASSOC);
			array_push($final_set, $item);
		}
		return $final_set;
	}
}