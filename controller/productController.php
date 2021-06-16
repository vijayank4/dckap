<?php
Class productController Extends baseController 
{
	public function index() 
	{
		echo 'Page was not found';
		exit;
	}
	public function productlist() 
	{
		$obj = new product();
		$obj->db = $this->registry->db;
		$categorylistArr = product::getProduct($this->registry->db);
		$productArr = array();
		$categoryArr = array();
		if(!file_exists('productjson/productdetails.json'))
		{
			if(is_dir('productjson')){
			}else{
				mkdir('productjson',0777, true);
			}
			$fp = fopen('productjson/productdetails.json', 'w');
			fwrite($fp,'null');
			fclose($fp);
		}
		for($i=0;$i<count($categorylistArr);$i++)
		{
		  	$productArr[$categorylistArr[$i]['dp_product_id']]['pname'] = $categorylistArr[$i]['dp_product_name'];
		  	$productArr[$categorylistArr[$i]['dp_product_id']]['psdesc'] = $categorylistArr[$i]['dp_short_description'];
		  	$productArr[$categorylistArr[$i]['dp_product_id']]['pdesc'] = $categorylistArr[$i]['dp_product_description'];
		  	$productArr[$categorylistArr[$i]['dp_product_id']]['images'] = $categorylistArr[$i]['dp_images'];
		  	$productArr[$categorylistArr[$i]['dp_product_id']]['price'] = $categorylistArr[$i]['dp_price'];
		  	$categoryArr[$categorylistArr[$i]['dp_product_id']][$categorylistArr[$i]['dpc_category_name']]['category'] = $categorylistArr[$i]['dpc_category_name'];
		  	$categoryArr[$categorylistArr[$i]['dp_product_id']][$categorylistArr[$i]['dpc_category_name']]['categoryvalue'] = $categorylistArr[$i]['dpc_category_value'];
		}
		$this->registry->template->productArr = $productArr;
		$this->registry->template->categoryArr = $categoryArr;
		$this->registry->template->show('product_view');
	}
	public function createjson()
	{
		if(isset($_REQUEST['addCartProductArr']) && $_REQUEST['addCartProductArr']!='')
		{
			$addCartProductArr = $_REQUEST['addCartProductArr'];
			if(is_dir('productjson')){
			}else{
				mkdir('productjson',0777, true);
				// mkdir(USERJSONPATH, 0700);
			}
			$fp = fopen('productjson/productdetails.json', 'w');
			fwrite($fp,json_encode($addCartProductArr));
			fclose($fp);
			echo 1;
			exit;
		}
		else
		{
			echo 2;
			exit;
		}
	}
	public function deletejson()
	{
		unlink('productjson/productdetails.json');
		if(!file_exists('productjson/productdetails.json'))
		{
			if(is_dir('productjson')){
			}else{
				mkdir('productjson',0777, true);
			}
			$fp = fopen('productjson/productdetails.json', 'w');
			fwrite($fp,'null');
			fclose($fp);
		}
		echo 1;
	}
	function orderstatus()
	{
		if(isset($_REQUEST['name']) && $_REQUEST['name']!='')
		{
			$obj = new product();
			$obj->db = $this->registry->db;
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$phonenumber = $_REQUEST['phonenumber'];
			$address = $_REQUEST['address'];
			$orderDetails = json_decode(file_get_contents('productjson/productdetails.json'),true);
			foreach($orderDetails as $key => $value)
			{
				$insertQry = "INSERT INTO `dkp_order_details`
											(
												`dod_product_id`,
												`dod_product_name`,
												`dod_category_name`,
												`dod_name`,
												`dod_email`,
												`dod_phone_number`,
												`dod_address`,
												`dod_date`,
												`dod_date_time`
											) 
											VALUES 
											(
												'".$value['pid']."',
												'".$value['pname']."',
												'".$value['brand']."',
												'".$name."',
												'".$email."',
												'".$phonenumber."',
												'".mysql_real_escape_string($address)."',
												NOW(),
												NOW()
											)";
				$obj->runUpdate($insertQry); 							
			}
			unlink('productjson/productdetails.json');
			if(!file_exists('productjson/productdetails.json'))
			{
				if(is_dir('productjson')){
				}else{
					mkdir('productjson',0777, true);
				}
				$fp = fopen('productjson/productdetails.json', 'w');
				fwrite($fp,'null');
				fclose($fp);
			}
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}
?>
