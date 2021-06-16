<!-- saved from url=(0022)http://internet.e-mail -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Product</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
      <link href="css/bootstrap-select.css" rel="stylesheet">
      <style>
         .alert{display:none}
		 .mimages{padding: 15px;
			display: block;
			margin: 0 auto;
			width: 100%;
			height: auto;
		}
		.ul-disp{display: inline-flex;}
		.li-disp{list-style: none;width:65px;height:64px;border:1px solid #e6e6e6;margin:2px;cursor:pointer}
		.imgactive{border: 2px solid #0800ff !important;}
		.form-error{font-size:10px;float:right;color:red}
		.page-ploader{width:100%;background-color: rgba(40, 40, 40, 0.5);z-index:1;position:absolute;top:0;height:100%;}
		.ploader-container {
			height: 100%;
			position: absolute;
			width: 100%;
			left: 0;
			top: 0;
		}
		.pg-loader {border:5px solid #fff;border-radius:50%;border-top:5px solid #495684;width:40px;height:40px;-webkit-animation: spin 2s linear infinite;
		  animation: spin 2s linear infinite;}
      </style>
   <body>
	 <!--<div class="ploader-container" id="pageloader">
		<div class="page-ploader">
			<div class="pg-loader full-ploader-A p-fullloader-A"></div>
		</div>
	 </div>-->
      <div id="wrapper">
		 <div class="navbar-fixed-top">
			<nav class="navbar navbar-static-top head1">
			  <div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbar">
				  <ul class="nav navbar-nav navbar-right sm-nav">
				   <li> <a data-toggle="modal" data-target="#myModal" href="#" onclick="showCardList()"><i class="fa fa-shopping-cart" id="adcartcnt"> Cart  </i></a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		  </div>
		<div id="page-wrapper">
		   <input style="display:none;" type="text" class="form-control" name="selserviceid" id="selserviceid" value="<?php echo $_REQUEST['selserviceid'];?>"></input>
		   <input style="display:none;" type="text" class="form-control" name="selectassettype" id="selectassettype" value="<?php echo $opexflag;?>"></input>
		   <div class="mrgn-tp60">
			  <div class="saved_alert alert alert-success alert-mrgn" role="alert" id='errspan'> </div>
			  <div class="row saved_row">
				 <div class="mbl-mrgnht">
					<?php 
						if(count($productArr) > 0)
						{
							foreach($productArr as $pid => $pvalue)
							{
								?>				
								<div class="col-md-4">
								   <div class="bx bx-B">
									  <div class="dep-nme">
										 <span class="itm-pic img-pic-<?php echo $pid;?>"></span>
										 <h3 class="dep-hdtxt"></h3>
										 <ul class="ul-disp">
										 <?php
										 $imageArr = explode(",",$pvalue['images']);
										 foreach($imageArr as $img => $imgval)
										 {
											 $activeClass = '';
											 if($img == 0)
											 {
												  $activeClass = 'imgactive';
											 }
											?>
											<li class="li-disp li-disp-<?php echo $pid;?> li-disp-<?php echo $pid;?>-<?php echo $img;?> <?php echo $activeClass;?>" data-irunid="<?php echo $img;?>" data-pid="<?php echo $pid;?>" data-url="<?php echo $imgval;?>" onClick="showimage('<?php echo $imgval;?>','<?php echo $pid;?>','<?php echo $img;?>')"><img class="mimages" src="<?php echo $imgval;?>"></li>
											<?php
										 }
										 ?>
										 </ul>
									  </div>
									  <div class="row bx-A">
										 <div class="col-md-6 col-xs-6">
											<?php
											if($categoryArr[$pid] != '')
											{
												$i = 0;
												$dataStr = '';
												foreach($categoryArr[$pid] as $cid => $cvalue)
												{
													if ($i < 2) 
													{
														?>	
														<ul>
														   <li><small><?php echo $cvalue['category'];?></small>
															  <b id="<?php echo str_replace(' ', '', $cvalue['categoryvalue']).$cid;?>"><?php echo $cvalue['categoryvalue'];?></b>
														   </li>
														</ul>
														<?php
														$i++;
													}
													else 
													{
														$i = 0;
														?>
														</div>
														<div class="col-md-6 col-xs-6">
														<ul>
														   <li><small><?php echo $cvalue['category'];?></small><b id="<?php echo str_replace(' ', '', $cvalue['categoryvalue']).$cid;?>"><?php echo $cvalue['categoryvalue'];?></b></li>
														</ul>
														<?php
														   $i++;
													}
												}
												$xmlstr .= '<price>'.$pvalue['price'].'</price>';	
											}
											?>
											<ul>
											   <li><small>Price</small>
												  <b id="<?php echo str_replace(' ', '', $pvalue['price']).$cid;?>"><?php echo $pvalue['price'];?></b>
											   </li>
											</ul>													
											</div>
											<div class="col-md-6 col-xs-6">
											<ul>
											   <li><small>Short Description</small>
												  <b id="<?php echo str_replace(' ', '', $pvalue['psdesc']).$cid;?>"><?php echo $pvalue['psdesc'];?></b>
											   </li>
											</ul>
											</div>
										</div>
										<div class="row mrgn-tp30 cat-btm">	
											<div class="col-md-12 col-xs-12 addtocart"><button  class="add-crt-btn addcart" data-pid="<?php echo $pid;?>">Add Cart</button></div>
										</div>
									</div>
								</div>
							<?php
						}
					}	
					else
					{
						echo "No Items Found belong this team";
					}
					?>
				 </div>
			  </div>
			</div>
         </div>
      </div>
	  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" data-backdrop="static">
	   <div class="modal-dialog modal-lg pop-mdl" role="document">
		  <div class="modal-content">
			 <div class="modal-header pop-hed">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Checkout Page</h4>
				<div style="float:right"><span id="errorspan1" style="color:red"></span></div>
			 </div>
			 <div class="modal-body row">
				<div class="col-md-8 cartdetails">
				   <div class="table-responsive">
					  <table class="table table-striped border tblborder" id="add_cart_table"> 
					  </table>
				   </div>
				</div>
				<div class="col-md-4 cusdetails" style="display:none">
					<div class="col-md-12 col-sm-12">
						<div class="form-group frm-padbtm">
						<label><span class="fheadcolor">Customer Details : </span></label>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group frm-padbtm">
						<label><span class="fheadcolor">Name <span style="color:red">*</span></label><p class="form-error name"></p>
						<input type="text" value="" class="form-control" id="name" name="name">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group frm-padbtm">
						<label><span class="fheadcolor">Email <span style="color:red">*</span></span></label><p class="form-error email"></p>
						<input type="text" value="" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group frm-padbtm">
						<label><span class="fheadcolor">Phone Number <span style="color:red">*</span></span></label><p class="form-error phonenumber"></p>
						<input type="text" value="" class="form-control" id="phonenumber" name="phonenumber">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group frm-padbtm">
						<label><span class="fheadcolor">Address <span style="color:red">*</span></span></label><p class="form-error address"></p>
						<textarea type="text" value="" class="form-control" id="address" name="address"></textarea>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<button class="add-crt-btn placeorder" style="width:100%">Place Order</button>
					</div>
				</div>
			 </div>
		  </div>
		  <!-- /.modal-content -->
	   </div>
	   <!-- /.modal-dialog -->
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script>
		
		var addCartProductArr = {};
		var pindex = 1;
		$(document).ready(function(e)
		{
			readProductJson();
			$('.imgactive').each(function(e)
			{
				showimage($(this).data('url'),$(this).data('pid'),$(this).data('irunid'))
			});
			$('.addcart').on('click',function(e)
			{
				// $("#pageloader").show();
				var pid = $(this).data('pid');	
				var productArr = JSON.parse(JSON.stringify(<?php echo json_encode($productArr);?>));
				var categoryArr = JSON.parse(JSON.stringify(<?php echo json_encode($categoryArr);?>));
				if(productArr[pid]!=undefined)
				{
					if(addCartProductArr[pindex] == undefined)
					{
						addCartProductArr[pindex] = {}
					}
					addCartProductArr[pindex]['pid'] = $(this).data('pid');
					addCartProductArr[pindex]['pname'] = productArr[pid]['pname'];
					addCartProductArr[pindex]['psdesc'] = productArr[pid]['psdesc'];
					addCartProductArr[pindex]['pdesc'] = productArr[pid]['pdesc'];
					addCartProductArr[pindex]['price'] = productArr[pid]['price'];
					addCartProductArr[pindex]['imageurl'] = $('.li-disp-'+pid+':first').data('url');
					addCartProductArr[pindex]['brand'] = categoryArr[pid]['Brand']['categoryvalue'];
					addCartProductArr[pindex]['quantity'] = 1;
					console.log(addCartProductArr)
					saveToJsonFile(addCartProductArr);
				}
			})
		})
		function showimage(url,pid,irunid)
		{
			$('.li-disp-'+pid).removeClass('imgactive');
			$('.img-pic-'+pid).html('<img id="pimage-'+pid+'" src="'+url+'"/>');
			$('.li-disp-'+pid+'-'+irunid).addClass('imgactive');
		}
		function saveToJsonFile(addCartProductArr)
		{
			var ajaxurl = "index.php?rt=product/createjson";
			$.ajax({
				url: ajaxurl,
				type: 'post',
				dataType: "json",
				data: {addCartProductArr:addCartProductArr},
				async: false,
				cache: false,
				success: function(response) 
				{
					readProductJson();	
				},
				error: function()
				{	
					alert('500 Internal server error..!');
				}
			})
		}
		function readProductJson()
		{
			var jsonDataURL = 'productjson/productdetails.json';
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", jsonDataURL, false);
			xhttp.setRequestHeader("Cache-Control", "no-cache");
			xhttp.setRequestHeader("Pragma", "no-cache");
			xhttp.send();
			if(xhttp.responseText != 'null' && xhttp.responseText != null)
			{
				addCartProductArr = JSON.parse(xhttp.responseText);
				pindex = Object.keys(addCartProductArr).length + 1;
				$('#adcartcnt').text(' Cart ('+Object.keys(addCartProductArr).length+')')
			}
			else
			{
				addCartProductArr = {};
				$('#adcartcnt').text(' Cart');
				pindex = 1;
			}
			// $("#pageloader").hide();
		}
		function showCardList()
		{
			var showcart = '';
			// alert(Object.keys(addCartProductArr).length)
			if(Object.keys(addCartProductArr).length > 0)
			{
				showcart +='<thead><tr><th>Item</th><th>Unit Price</th><th>Qty</th> <th>Total Price</th><th>Delete</th></tr></thead>';
				showcart +='<tbody class="request-table">';
				var product_price = 0;
				var tot_price = 0;
				$.each(addCartProductArr,function(index,value)
				{
					product_price = parseInt(product_price) + parseInt(value['price']);
				    tot_price = parseInt(tot_price) + parseInt(value['quantity']*value['price']);
					showcart +='<tr id=tr'+index+'>';
						showcart +='<td><span class="pull-left"><img src="'+value['imageurl']+'" width="50" height="50"></span><div class="pull-left tbl-lst"><b>'+value['pname']+'</b><span>'+value['brand']+'</span></div></td>';
						showcart += '<td id="unitprice'+index+'">'+value['price'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>';      
						showcart +='<td><div class="crt-dta "> <a href="#" onclick="lessminus('+index+')" class="crt-min crt-min-A"><i class="fa fa-minus" aria-hidden="true"></i></a>';                
						showcart += '<input value="'+value['quantity']+'" readonly id="prcount'+index+'" class="crt-ipt crt-ipt-A additemkeyup" data-rid='+index+' type="text">';    
						showcart += '<a href="#" onclick="addplus('+index+')" class="crt-pls crt-pls-A"><i class="fa fa-plus" aria-hidden="true"></i></a> </div></td>'; 
						showcart += '<td class="tltprice" id="tprice'+index+'">'+(parseInt(value['quantity']) * value['price']).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>';      
						showcart += '<td><a class="rbin-clr" href="#" onclick="deletecart('+index+')"><i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>';
					showcart +='</tr>';
				})
				showcart += '<tr><td><div class="tbl-lst"><b class="tot-ttl">Total</b></div></td>';
				showcart +='<td id="prprice"><div class="crt-dta tot-nbr prprice" id="tprprice">'+product_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</div></td>';
				showcart +='<td></td><td colspan="2" class="tot-nbr totalprice" id="tmprprice"><div class="crt-dta tot-nbr prprice" id="tmprprice">'+tot_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</div></td></tr>'; 
				showcart +='</tbody>';
				$('.cusdetails').show();
				$('.cartdetails').removeClass('col-md-12');
				$('.cartdetails').removeClass('col-md-8');
				$('.cartdetails').addClass('col-md-8');
			}
			else
			{
				showcart +='<thead><tr><th>Check</th><th>Item</th> <th>Unit Price</th> <th>Qty</th> <th>Price</th> <th>Delete</th> </tr> </thead>';
				showcart += '<tbody class="request-table">';
				showcart += '<tr><th style=text-align:center colspan=10>There is no records available..</th></tr>';
				showcart += '</tbody>';
				$('.cartdetails').removeClass('col-md-8');
				$('.cartdetails').removeClass('col-md-12');
				$('.cartdetails').addClass('col-md-12');
				$('.cusdetails').hide();
			}
			$('#add_cart_table').html(showcart)
		}
		function addplus(index)
		{
			var inpvalue = $('#prcount'+index).val();
			var tmprprice = $('#tmprprice').text();
			var count = parseInt(inpvalue) + parseInt(1);
			var unitprice = $('#unitprice'+index).text().replace(/,/, '');
			var calupric =  parseInt(unitprice) * parseInt(count);
			$("#tprice"+index).text(calupric.toLocaleString());
			$("#prcount"+index).val(count);
			var caltmprprice = parseInt(unitprice) + parseInt(tmprprice.replace(/,/, ''));
			$("#tmprprice").text(caltmprprice.toLocaleString());
			addCartProductArr[index]['quantity'] = count;
			saveToJsonFile(addCartProductArr)
		}
		function lessminus(index)
		{
			var inpvalue = $('#prcount'+index).val();
			var count = parseInt(inpvalue) - parseInt(1);
			if(count > parseInt(0))
			{
				var unitprice = $('#unitprice'+index).text().replace(/,/, '');
				var calupric = parseInt(count) * parseInt(unitprice);
				var tmprprice = $('#tmprprice').text();
				$("#tprice"+index).text(calupric.toLocaleString(undefined,{ minimumFractionDigits: 0}));	
				$("#prcount"+index).val(count);
				var caltmprprice = parseInt(tmprprice.replace(/,/, '')) - parseInt(unitprice);
				$("#tmprprice").text(caltmprprice.toLocaleString());
				addCartProductArr[index]['quantity'] = count;
				saveToJsonFile(addCartProductArr)
			}	
		}
		function deletecart(index)
		{
			delete addCartProductArr[index];
			var newaddCartProductArr = {};
			if(Object.keys(addCartProductArr).length > 0)
			{
				var i = 1;
				$.each(addCartProductArr,function(index,value)
				{
					newaddCartProductArr[i] = value;
					i++;					
				})
				saveToJsonFile(newaddCartProductArr);
			}
			else
			{
				var jsonDataURL = 'index.php?rt=product/deletejson';
				var xhttp = new XMLHttpRequest();
				xhttp.open("GET", jsonDataURL, false);
				xhttp.setRequestHeader("Cache-Control", "no-cache");
				xhttp.setRequestHeader("Pragma", "no-cache");
				xhttp.send();
				readProductJson();
			}
			showCardList();	
		}
		$('body').on('click','.placeorder',function(e)
		{
			var numeric =/^[A-Za-z]+$/;
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			var alphanumeric = /^[A-Za-z0-9]+$/;
			var errorCnt = 0;
			var name = $('#name').val();
			var email = $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var address = $('#address').val();
			if($('#name').val() == "")
			{
				errorCnt++;
				$(".name").show();
				$("#name").css("border-color","red");
				$(".name").html("Name is requried");
			}
			else
			{
				$("#name").css("border-color","");
				$(".name").html("");
				$(".name").hide();
			}
			if($('#email').val() == "")
			{
				errorCnt++;
				$(".email").show();
				$("#email").css("border-color","red");
				$(".email").html("Email is requried");
			}
			else if($('#email').val().match(mailformat) == null)
			{
				errorCnt++;
				$(".email").show();
				$("#email").css("border-color","red");
				$(".email").html("Please enter the valid email");
			}
			else
			{
				$("#email").css("border-color","");
				$(".email").html("");
				$(".email").hide();
			}
			if($('#phonenumber').val() == "")
			{
				errorCnt++;
				$(".phonenumber").show();
				$("#phonenumber").css("border-color","red");
				$(".phonenumber").html("Phone number is requried");
			}
			else
			{
				$("#phonenumber").css("border-color","");
				$(".phonenumber").html("");
				$(".phonenumber").hide();
			}
			if($('#address').val() == "")
			{
				errorCnt++;
				$(".address").show();
				$("#address").css("border-color","red");
				$(".address").html("Address is requried");
			}
			else
			{
				$("#address").css("border-color","");
				$(".address").html("");
				$(".address").hide();
			}
			if(errorCnt == 0)
			{
				// $("#pageloader").show();
				$.ajax(
				{
					type: "POST",
					url: 'index.php?rt=product/orderstatus',
					dataType: "JSON",
					data: {name:name,email:email,phonenumber:phonenumber,address:address},
					async: false,
					cache: false,
					success: function(response)
					{
						alert('Product ordered successfully..!')	
						readProductJson();
						showCardList();
					},
					error: function()
					{
						alert('500 Internal server error..!');
					}
				})
			}
		})
	</script>
   </body>
</html>
