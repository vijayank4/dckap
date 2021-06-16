<?PHP
	class product
	{
    	public function getProduct($db)
		{
			$selectPdtQry = "SELECT dp_product_id,dp_product_name,
									dp_short_description,
									dp_product_description,
									dp_images,dp_price,
									dpc_category_name,
									dpc_id,
									dpc_category_value
								FROM `dkp_product`,dkp_product_category 
								WHERE dp_status = '1'
								AND dp_product_id = dpc_product_id
								ORDER BY dp_product_id,dpc_id";
			$selectPdtRst = $db->query($selectPdtQry);
			$productArr = $selectPdtRst->fetchAll(PDO::FETCH_ASSOC);
			return $productArr;
		}
		public function runInsert($insertQry)
		{
			$this->db->exec('SET NAMES utf8');
			$this->db->query($insertQry);
			return $this->db->lastInsertId();
		}	
		public function runSelect($selectQry)
		{
			$this->db->exec('SET NAMES utf8');
			$status = $this->db->query($selectQry);
			$response = $status->fetchAll(PDO::FETCH_ASSOC);
			return $response;
		}
		public function runDelete($deleteQry)
		{
			$this->db->query($deleteQry);
			return 1;
		}
		public function runUpdate($updateQry)
		{
			$this->db->exec('SET NAMES utf8');
			$this->db->query($updateQry);
			return 1;	
		}
	}
?>