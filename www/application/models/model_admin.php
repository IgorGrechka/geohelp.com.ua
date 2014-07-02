<?php
class Model_Admin extends Model {
	
	public function isAdminUser() {
		if ($this->isAdmin()) {
			return true;
		}else{
			return false;
		}
	}
	
	public function add_znak($data) {
		if ($data) {
			//Добавление знака в базу данных
			if ($data['cat_name'] and $data['zn_name'] and $data['description'] and $data['scale'] and $data['id_order']) {
				$cat_name = $this->clearStr($data['cat_name']);
				$zn_name = $this->clearStr($data['zn_name']);
				$description = $this->clearStr($data['description']);
				$scale = $this->clearInt($data['scale']);
				$id_order = $this->clearInt($data['id_order']);
				$sql = "INSERT INTO znaki (cat_name, zn_name, description, scale, id_order)
											VALUES (?, ?, ?, ?, ?)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(array($cat_name, $zn_name, $description, $scale, $id_order));
				$zn_id = $this->db->lastInsertId();
			
			//Проверка наличия дополнения к добавляемому знаку (при нахождении дополнение добавляет связь в "znak_addons")
				$sql = "SELECT id FROM addons WHERE add_zn_num = '$id_order'";
				$result = $this->db->query($sql);
				if ($result <> "") { 
					foreach ($result as $row) {
						$sql = "INSERT INTO znak_addons (zn_id, add_id) VALUES ($zn_id, {$row["id"]})";
						$this->db->exec($sql);
					}
				}
			
			}elseif ($data['add_num'] and $data['add_zn_num'] and $data['add_text']) {
			
			//Добавление дополнения в базу данных
				$add_text = $this->clearStr($data['add_text']);
				$add_num = $this->clearInt($data['add_num']);
				$add_zn_num = $this->clearInt($data['add_zn_num']);
			
			//Проверка наличия условного знака с указанным номером
				$sql = "SELECT * FROM znaki WHERE id_order = ?";
				$stmt = $this->db->prepare($sql);
				$stmt->execute(array($add_zn_num));
				if (!is_NULL($stmt->fetchAll())){
					
					//Запись дополнения в таблицу
					$sql = "INSERT INTO addons (add_text, add_num, add_zn_num)
										VALUES (?, ?, ?)";
					$stmt = $this->db->prepare($sql);
					$stmt->execute(array($add_text, $add_num, $add_zn_num));
							
					//Выборка для связывающей таблицы
					$sql = "SELECT zn_temp.id, addons.id
								FROM (SELECT id, id_order FROM znaki WHERE id_order = ?) AS zn_temp, addons
								WHERE (zn_temp.id_order = addons.add_zn_num) AND (add_num = ?)";
					$stmt = $this->db->prepare($sql);
					$stmt->execute(array($add_zn_num, $add_num));
					$result = $stmt->fetchAll(PDO::FETCH_NUM);
					
					//Запись id в связующую таблицу
					foreach ($result as $value) {
						$sql = "INSERT INTO znak_addons (zn_id, add_id)
												VALUES ($value[0], $value[1])";
						$this->db->query($sql);
					}
					return "OPERATION_SCCESS";
				}else{
				return "SYMBOL_NOT_FOUND";
				}
			}else{	
			return "DATA_ERROR";
			}
		}
	}
}