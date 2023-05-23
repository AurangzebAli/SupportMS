<?php
require_once('dbConnection.php');
if(isset($_POST['Login']))
{

	$query = "SELECT * from user WHERE Username = '".$_POST['username']."' and Password = MD5('".$_POST['password']."')";	
	$resource = mysql_query($query);	
	while($array = mysql_fetch_assoc($resource))
	{
		$userarray[] = $array;
	}
	
	
	
	if(!empty($userarray))
	{
		if($userarray[0]['UserId'] == 2)
		{
			
				@session_start();
				$_SESSION["PCIadmin"] = "PCIadmin";
				
				header('location:pcinventoryview.php');
			
		}
		else{
				@session_start();
				$_SESSION["admin"] = "admin";
				
				header('location:view.php');
		}
	}
	else
	{
		
		header('location:login.php');
		
	}
	
	
}
if(isset($_POST['logout']))
{
	@session_start();
	if($_SESSION['admin'])
	{
			
		
		unset($_SESSION['admin']);
		header('location:login.php');
		
	}
	else
	{
		
		unset($_SESSION['PCIadmin']);
		header('location:login.php');
	}
	
	
	
	
}

/****  Save PC INVENTORY  ******/
if(isset($_POST['savepcinventory']))
{

 $curentdate = date('Y-m-d');//GetCurrentDate(getdate());

		$query = "INSERT INTO `tblpcinventory`( `OfficerName`, `Wing`, `Description`, `BrandName`, `MsOfficeOrOtherSoftware`, `LCD`, `Printer`, `Scanner`, `UPS`, `Network`, `IP`,`Date`) VALUES ('".$_POST['requestedOfname']."','".$_POST['ddlwing']."','".$_POST['Description']."','".$_POST['brandname']."','".$_POST['msofficeothersoftware']."','".$_POST['lcd']."','".$_POST['printer']."','".$_POST['Scanner']."','".$_POST['UPS']."','".$_POST['network']."','".$_POST['IP']."','".$curentdate."' )";																							
																										
	//$query = "INSERT INTO `tblsupport`(`RequestedDAte` ,`ROName`,  `Wing` , `TelNumber` , `ExtNo`, `ProblemOccur`, `ProblemStatus`,`PrbDesc`) VALUES ('".$curentdate."','".$_POST['requestedOfname']."','".$_POST['ddlwing']."','".$_POST['TelNo']."','".$_POST['ExtNo']."','".$_POST['ddlproblem']."','0','".$_POST['Description']."')";
	mysql_query($query);
	@session_start();
	echo $_SESSION['SaveSuccessfully'] = "Request Raise Successfully";
	header('location:index.php');
}

if(isset($_POST['save']))
{

 $curentdate = GetCurrentDate($_POST['datepicker']);

 
																																						
	$query = "INSERT INTO `tblsupport`(`RequestedDAte` ,`ROName`,  `Wing` , `TelNumber` , `ExtNo`, `ProblemOccur`, `ProblemStatus`,`PrbDesc`) VALUES ('".$curentdate."','".$_POST['requestedOfname']."','".$_POST['ddlwing']."','".$_POST['TelNo']."','".$_POST['ExtNo']."','".$_POST['ddlproblem']."','0','".$_POST['Description']."')";

	mysql_query($query);
	@session_start();
	echo $_SESSION['SaveSuccessfully'] = "Request Raise Successfully";
	header('location:index.php');
}

/**** For CheckBox Not in use NOw **********/
if(isset($_POST['stauschange']))
{

	
	$query = "UPDATE `tblsupport` SET `problemstatus`= ".$_POST["status"]."  WHERE  supportId = " .$_POST["supportid"];

	mysql_query($query);

}

/******  FeedBack Form  **************/
if(isset($_POST['DDLfeedbackData']))
{

	 $suppoortid =$_POST['supportiddd'];
	
	
	
	$query = " SELECT p.problemname , t.PrbDesc FROM  `tblsupport` t
				INNER JOIN `tblproblem` p ON 
				t.problemoccur = p.problemId 
				WHERE t.supportid = " .$suppoortid. "";
		
		
	
	
	$ddlOffName  = mysql_query($query);
	$result =array();
	while($array = mysql_fetch_assoc($ddlOffName))
	{
		
		$result[] = $array;
	}
	
	//$arr = array_map('utf8_encode', $result);
	echo  json_encode($result);
	
	 //$json;
		
					
}

if(isset($_POST['Resolved']))
{
	
	$query = "UPDATE `tblsupport` SET `problemstatus`= '1' , Remarks = '".$_POST["Remarks"]."'  WHERE  supportId = " .$_POST["ddlSelect"];
	mysql_query($query) or die("".mysql_error());
	@session_start();
	echo $_SESSION['ProblemResolved'] = "ProblemResolved";
	header('location:feedback.php');



}






/********* Get Current Date According to mysql *************/
function GetCurrentDate($date)
{
	$arr = (explode("/",$date));
	$currentdate = $arr[2]."-".$arr[0]."-".$arr[1];
	
	return $currentdate;
}



?>