<?php
	ob_start();
	session_start();
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if($_SESSION[$counterSessionName]['designation_id']==1)
		{
			$role = $_POST['role'];

			if($role=="addMenuCategory")
			{
				$menuCategoryName = $_POST['menuCategoryName'];
				$menuCategoryName = mysqli_real_escape_string($conn,str_replace("~","&",$menuCategoryName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuCategoryTbl." where menu_category_name='".$menuCategoryName."'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterMenuCategoryTbl." set menu_category_name='".$menuCategoryName."',status='1'");
					if($insert)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			}
			else if($role=="editMenuCategory")
			{
				$valueId = $function->dataDecryption($_POST['valueId']); 
				$menuCategoryName = $_POST['menuCategoryName'];
				$menuCategoryName = mysqli_real_escape_string($conn,str_replace("~","&",$menuCategoryName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuCategoryTbl." where menu_category_name='".$menuCategoryName."' and menu_category_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterMenuCategoryTbl." set menu_category_name='".$menuCategoryName."' where menu_category_id='".$valueId."'");
					if($update)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			}
			else if($role=="addMenu")
			{
				$selectMenuCategory = $_POST['selectMenuCategory'];
				$menuName = $_POST['menuName'];
				$menuName = mysqli_real_escape_string($conn,str_replace("~","&",$menuName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." where menu_category_id='".$selectMenuCategory."' and module_name='".$menuName."' and parent_module_id='0'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterMenuModuleTbl." set menu_category_id='".$selectMenuCategory."',module_name='".$menuName."',parent_module_id='0',status='1'");
					if($insert)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			}
			else if($role=="editMenu")
			{
				$valueId = $function->dataDecryption($_POST['valueId']); 
				$selectMenuCategory = $_POST['selectMenuCategory'];
				$menuName = $_POST['menuName'];
				$menuName = mysqli_real_escape_string($conn,str_replace("~","&",$menuName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." where module_name='".$menuCategoryName."' and menu_category_id='".$selectMenuCategory."' and parent_module_id='0' and module_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterMenuModuleTbl." set menu_category_id='".$selectMenuCategory."',module_name='".$menuName."' where module_id='".$valueId."'");
					if($update)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			}
			else if($role=="getMainMenu")
			{
				$selectMenuCategory = $_POST['selectMenuCategory'];

				echo '<option value="">Select Main Menu</option>';
				$selectMainMenu = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." where parent_module_id='0' and menu_category_id='".$selectMenuCategory."'");
				while($rowMainMenu = mysqli_fetch_array($selectMainMenu))
				{
					echo '<option value="'.$rowMainMenu['module_id'].'">'.$rowMainMenu['module_name'].'</option>';
				}
			}
			else if($role=="addSubMenu")
			{
				$selectMenuCategory = $_POST['selectMenuCategory'];
				$menuName = $_POST['menuName'];
				$menuSubName = $_POST['menuSubName'];
				$menuSubName = mysqli_real_escape_string($conn,str_replace("~","&",$menuSubName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." where menu_category_id='".$selectMenuCategory."' and module_name='".$menuSubName."' and parent_module_id='".$menuName."'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterMenuModuleTbl." set menu_category_id='".$selectMenuCategory."',module_name='".$menuSubName."',parent_module_id='".$menuName."',status='1'");
					if($insert)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			} 
			else if($role=="editSubMenu")
			{
				$valueId = $function->dataDecryption($_POST['valueId']); 
				$selectMenuCategory = $_POST['selectMenuCategory'];
				$menuName = $_POST['menuName'];
				$menuSubName = $_POST['menuSubName'];
				$menuSubName = mysqli_real_escape_string($conn,str_replace("~","&",$menuSubName));

				$numRows = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." where module_name='".$menuSubName."' and menu_category_id='".$selectMenuCategory."' and parent_module_id='".$menuName."' and module_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterMenuModuleTbl." set menu_category_id='".$selectMenuCategory."',module_name='".$menuSubName."',parent_module_id='".$menuName."' where module_id='".$valueId."'");
					if($update)
					{
						echo "1";
					}
					else
					{
						echo "5";
					}
				}
				else
				{
					echo "6";
				}
			}
			else
			{
				echo "4";
			}
		}
		else
		{
			echo "3";
		}
	}
	else
	{
		echo "0";
	}
?>  