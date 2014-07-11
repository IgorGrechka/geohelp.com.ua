<?php
class Model_Admin extends Model {
	
	public function isAdminUser() {
		if ($this->isAdmin()) {
			return true;
		}else{
			return false;
		}
	}
	
	public function add_znak($data, $img_data) {
		if ($data) {
			
			//Добавление знака в базу данных
			if ($data['cat_name'] and $data['zn_name'] and $data['description'] and $data['scale'] and $data['id_order']) {
				if (!($this->add_image($img_data))) return "IMAGE_ERROR";
				$img_sourse = "/upload/img/".basename($img_data['symbol_file']['name']);
				$cat_name = $this->clearStr($data['cat_name']);
				$zn_name = $this->clearStr($data['zn_name']);
				$description = $this->clearStr($data['description']);
				$scale = $this->clearInt($data['scale']);
				$id_order = trim($data['id_order']);
				if (!$this->isCorrectSqlDouble($id_order)) return "SYMBOL_NUM_ERROR";
				$sql = "INSERT INTO znaki (cat_name, zn_name, description, scale, img_sourse, id_order)
											VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(array($cat_name, $zn_name, $description, $scale, $img_sourse, $id_order));
				return "OPERATION_SCCESS";
			}elseif ($data['add_num'] and $data['add_zn_num'] and $data['add_text']) {
			
			//Добавление дополнения в базу данных
				$add_text = $this->clearStr($data['add_text']);
				$add_num = $this->clearInt($data['add_num']);
				$add_zn_num = trim($data['add_zn_num']);
				if (!$this->isCorrectSqlDouble($add_zn_num)) return "SYMBOL_NUM_ERROR";
			
			//Проверка наличия условного знака с указанным номером
				$sql = "SELECT * FROM znaki WHERE id_order = ?";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(array($add_zn_num));
				if ($stmt->fetch() != ""){
					
					//Запись дополнения в таблицу
					$sql = "INSERT INTO addons (add_text, add_num)
										VALUES (?, ?)";
					$stmt = $this->db->prepare($sql);
					$stmt->execute(array($add_text, $add_num));
							
					//Запись в связующую таблицу
					$sql = "INSERT INTO znak_addons (zn_id, add_id)
												VALUES (?, ?)";
					$stmt = $this->db->prepare($sql);
					$stmt->execute(array($add_zn_num, $add_num));
					return "OPERATION_SCCESS";
				}else{
				return "SYMBOL_NOT_FOUND";
				}
			}else{	
			return "DATA_ERROR";
			}
		}else{
		return "DATA_ERROR";
		}
	}
	
	public function add_image($img) {
		if ($img['symbol_file']['name'] == "") return false;
		$uploadfile = "upload/img/".basename($img['symbol_file']['name']);
		if (move_uploaded_file($img['symbol_file']['tmp_name'], $uploadfile)) {
			return true;
		}else{
			return false;
		}
	}
}