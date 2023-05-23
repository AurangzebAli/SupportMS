<?php
Include_Once('dbConnection.php');
@session_start();
if(isset($_SESSION["admin"]))
{
if($_SESSION["admin"] == "admin")
{
	
/************** Get Records According to DropDown Dates  *********************/
if(isset($_POST['datepickerfrom']) && isset($_POST['datepickerto']) && isset($_POST['ddlwing']))
{
		
	$datefrom =	GetCurrentDate($_POST['datepickerfrom']);
	$dateto =	GetCurrentDate($_POST['datepickerto']);
	$wing =	$_POST['ddlwing'];
	
	
	if($wing == "All" &&  !empty($datefrom) && !empty($dateto))
	{
		$query = "SELECT s.*,w.*,p.*
		FROM `tblsupport` s
		INNER JOIN tblwing w ON s.wing = w.wingid
		INNER JOIN tblproblem  p ON s.ProblemOccur = p.problemId  
		WHERE s.RequestedDAte >= '".$datefrom."' and s.RequestedDAte <= '".$dateto."'
		order by s.RequestedDAte desc 
		limit 500";

		
		$resource =	mysql_query($query);
		while($array = mysql_fetch_assoc($resource)) 
		{
			$viewarray[] = $array;
		}
		
		
	}
	else if(!empty($datefrom) && !empty($dateto) && !empty($wing) )
	{
		
		$query = "SELECT s.*,w.*,p.*
		FROM `tblsupport` s
		INNER JOIN tblwing w ON s.wing = w.wingid
		INNER JOIN tblproblem p ON s.ProblemOccur = p.problemId  
		where s.RequestedDAte >= '".$datefrom."' and s.RequestedDAte <= '".$dateto."' and w.wingid = '".$wing."' order by s.RequestedDAte desc ";

		$resource =	mysql_query($query);
		while($array = mysql_fetch_assoc($resource)) 
		{
			$viewarray[] = $array;
		}
	}
	// else if(!empty($datefrom) && !empty($dateto))
	// {

		// $datefrom =	GetCurrentDate($_POST['datepickerfrom']);
		// $dateto =	GetCurrentDate($_POST['datepickerto']);
			
		// $query = "SELECT s.*,w.*,p.*
		// FROM `tblsupport` s
		// INNER JOIN tblwing w ON s.wing = w.wingid
		// INNER JOIN tblproblem  p ON s.ProblemOccur = p.problemId  
		// where s.RequestedDAte >= '".$datefrom."' and s.RequestedDAte <= '".$dateto."' order by s.RequestedDAte desc ";

		// $resource =	mysql_query($query);
		// while($array = mysql_fetch_assoc($resource)) 
		// {
			// $viewarray[] = $array;
		// }
	
	// }
	else if($wing == "All")
	{
		$query = "SELECT s.*,w.*,p.*
		FROM `tblsupport` s
		INNER JOIN tblwing w ON s.wing = w.wingid
		INNER JOIN tblproblem  p ON s.ProblemOccur = p.problemId  
		order by s.RequestedDAte desc 
		limit 500";

		
		$resource =	mysql_query($query);
		while($array = mysql_fetch_assoc($resource)) 
		{
			$viewarray[] = $array;
		}
		
		
	}
	else if(!empty($wing))
	{
		
		$query = "SELECT s.*,w.*,p.*
		FROM `tblsupport` s
		INNER JOIN tblwing w ON s.wing = w.wingid
		INNER JOIN tblproblem  p ON s.ProblemOccur = p.problemId  
		where w.wingid = '".$_POST['ddlwing']."' order by s.RequestedDAte desc ";

		
		$resource =	mysql_query($query);
		while($array = mysql_fetch_assoc($resource)) 
		{
			$viewarray[] = $array;
		}
	}
}
else
{
	
$query = "SELECT s.*,w.*,p.*
FROM `tblsupport` s
INNER JOIN tblwing w ON s.wing = w.wingid
INNER JOIN tblproblem p ON s.ProblemOccur = p.problemId where s.RequestedDAte ='" . date('Y-m-d') ."'";
$resource =	mysql_query($query);
while($array = mysql_fetch_assoc($resource)) 
	{
		$viewarray[] = $array;
	}
	
}

	$query1 = "SELECT * FROM tblwing";
	$resource1 =	mysql_query($query1);
 	while($array1 = mysql_fetch_assoc($resource1)) 
	{
		$wings[] = $array1;
	}

	
}
}
else
{

		header('location:login.php');	
}
	/********* Get Current Date According to mysql *************/
function GetCurrentDate($date)
{
	$currentdate = "";
	if(!empty($date))
	{
		$arr = (explode("/",$date));
		$currentdate = $arr[2]."-".$arr[0]."-".$arr[1];
	}
	return $currentdate;
}
	
	
	

	?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" > <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Support Mangement System </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
		<script type= "text/javascript" src="jquery.js" ></script>
    <script type="text/javascript" src="js/datepicker/jquery-ui.js"></script> 
	<link rel="stylesheet" type="text/css" href="js/datepicker/jquery-ui.css" />
     
		
		
				<link rel="stylesheet" type="text/css" href="css/styletable.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link rel="stylesheet" type="text/css" href="css/popup12.css" />  

		<script type="text/javascript">
				$(function(){
					$('#txtdatepickerfrom').datepicker();
					$('#txtdatepickerto').datepicker();
					
				});
		
		</script>
		
		
		
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    <strong></strong>
                </a>
                <span class="right">
                    <a href=" http://tympanus.net/codrops/2012/03/27/login-and-registration-form-with-html5-and-css3/">
                        <strong></strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>
				Support Mangement System 
				
				
					<form  method = "post" action = "process.php" autocomplete="on"> 
						<p class="login button"> 
							<input type="submit" class="logout" value="Logout" name = "logout" /> 
			 
						</p>
					</form>
				</h1>
			
            </header>
			
            <section>				
                <div id="container_demo" >
				
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>	
                    <div id="wrapper">
                        <div id="login" class="">
						
						<form  method = "post" action = "view.php" autocomplete="on"> 
							
							<center><img src="images/nablogo.png" alt=""  > 
							
								<div>
								<p> 
								
								
                                  
										
                                    <label for="wing" class="youpasswd" >wing </label>
									<select id = "ddlwing"  name = "ddlwing" style="padding:2px;width:inherit;">
									<option value = "All"  >All</option>
									<?php foreach ($wings as $win) 
										{
									?>
									<option value = "<?= $win["wingid"]?>"  ><?= $win["wingname"]?></option>
									<?php }
									?>
									
									</select>
									
                                    <label for="username" class="uname"  > Date From </label>
                                    <input id="txtdatepickerfrom" name="datepickerfrom"  type="text" />
									    <label for="username" class="uname"  > Date To</label>
                                    <input id="txtdatepickerto" name="datepickerto"  type="text" />
									
									<input type ="submit" name="checkdate" value= "Go">
                                
                                </p>
								</div>
								</center>
								</form>
                            <form  method = "post" action = "process.php" autocomplete="on"> 
							
								<table id="tblcomplain" class="responstable">


  
  <tr>
  
    <th>Complaint No</th>
    <th>Requistion Date</th>
    <th data-th="Driver details"><span>Officer Name</span></th>
    <th>Wing</th>
    <th>Telephone</th>
    <th>Intercom</th>
    <th>P_Type</th>
    <th>Description</th>
	<th>Problem Status</th>
	<th>Remarks</th>
	
	
  </tr>
  
  <?php
  $complainstaus =1;
  if(!empty($viewarray)) {
  foreach($viewarray as $arr){ ?>
  
  <tr id = "complainstatus<?=  $complainstaus;?>">
	<td> <input id="stausid" type = "hidden"  value= "<?= $arr['supportId'] ?>" name= "support" /> <?= $arr['supportId'] ?></td>
    <td> <?= $arr['RequestedDAte'] ?></td>
    <td><?= $arr['ROName'] ?></td>
    <td><?= $arr['wingname'] ?></td>
    <td><?= $arr['TelNumber'] ?>  </td>
    <td><?= $arr['ExtNo'] ?> </td>
	<td><?= $arr['problemname'] ?> </td>
	<td><?= $arr['PrbDesc'] ?> </td>
	
	<!-- <td> //$arr['ProblemStatus']   </td> -->
	
	<td > <input id = "btnsubmit" type="submit"  name = "statusupdate" value = " <?php if($arr['ProblemStatus'] == 0) {echo "Pending";} else { echo "Resolved";}  ?>" style="width:100px;<?php echo ($arr['ProblemStatus'] ==1 ? 'background: chartreuse;' : 'background: red'); ?>"> </td>
 	<td > <?= $arr['Remarks'] ?></td>     

    <!-- 	<td style = "text-align: center;"><input  class = "viewform" type="checkbox" name="checked"  <php //echo ($arr['ProblemStatus'] ==1 ? 'checked' : ''); ?>  ></td>     -->	
    
    <!-- <td> <a id= "print" class="info_link" href="#"> Print </a> </td> -->	
	
  </tr>
  
  <?php  
		$complainstaus++;
	}
	$complainstaus =1;
  }
  ?>
  
  
</table>
  
                            
								
                                <p class="keeplogin"> 
									<!-- <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> -->
									<label for="loginkeeping">Tel: 071-9310066  Ext-109</label>
									
								</p>
								
                              <p class="change_link">
								<b>
									Copyrights © 2017 Nab Sukkur
									(Powerd By IT-Wing)
									</b>
								</p>
								
							<div id ="hiddenstatusofcomplain">
							</div>
                                <div id="myModal" class="modal">

								  <!-- Modal content -->
								  <div  class="modal-content">
									<span class="close">&times;</span>
									<br/>
									<p id="pendinguser"> Thanks For your Remarks <br />
										</p>
								  </div>

								</div>
                            </form>
                        </div>
						
		
						
<!-- 57575757--? -->
                </div>  
				
            </section>
			
        </div>
    </body>
</html>

<script type = "text/javascript" >

$(function ()
{
	var i =15;
	
	function countDown(){
		
		if(i <=0 )
		{
			window.location.href = 'view.php';
		 
			
		}
	
		
		if(i==10 )
		{
		
		var j =1;
		var k=1;
		 var array =new Array();	
			
		var table= $('#tblcomplain');
		var tableRows= $('#tblcomplain tr');
		
		 $(tableRows).each(function( event) {
			
			
			 if(tableRows.length >1  && j  < tableRows.length)
			 {
			 var complainstatus = table.find('#complainstatus'+j).find('#btnsubmit').val().trim();//html();
			 var complainantname = table.find('#complainstatus'+j).find('td:first').next().next().html();
			
			if(complainstatus == 'Pending')
			{
			
				array[k] =complainantname;
		
				
				//$('#hiddenstatusofcomplain').html('<span> '+complain+'  </span>')
				k++;
			}		
			
			}
			j++;
		});
		k=1;
		j=1;
		
		if (array != 'undefined')
		{
			var pendinguser  = $('#pendinguser');
			if()
			pendinguser.html('Users request are in pending <br /> '+array +'<br />');
			var modal = document.getElementById('myModal');
					modal.style.display = "block";
					var span = document.getElementsByClassName("close")[0];
					span.onclick = function() {
					modal.style.display = "none";
					}
					
					
					
			
		}
		
		
			
		
		}
		
		i= i-1;
		if(i < 0)
			i= 15;
		
	}
	setInterval(function(){ countDown();},1000);

	
//	$('.viewform').click(function() {
	
	//Function For Check Box it is not in use now
	$(document).on('change', 'input[type="checkbox"]', function(){	
	
		var status1 = 	$(this).closest('tr').find('td:last').prev().prev();//.find('input');
		var checkbox  = $(this).closest('tr').find('td:last').prev();
		
		 
		var status  = 0;
		if($(this). prop("checked") == true){
		status = 1;
	     //nth-child(1)
		 
		status1.html('<input id = "btnsubmit" type="submit"  name = "statusupdate" value = "Resolved" style="width:100px;background: chartreuse;">');
		//status1.val('Resolved');
		checkbox.checked = true;
		
		
		}
		else{
		
		checkbox.checked = false;	
		//status1.val('Pending');
		status1.html('<input id = "btnsubmit" type="submit"  name = "statusupdate" value = "Pending" style="width:100px;background: red;">');
		status = 0;
		
		}
	
		var supportid = $(this).closest('tr').find('td:nth-child(1)').text();
		var html ="";
        $.ajax({
            type :'post',
            url :'process.php',
            data :{
                'stauschange' :'stauschange'
				,'status':status
				,'supportid':supportid
            },
			success : function(response)
            {
				
			}
		
		
		
		
	
    });
		return false;
	});

	//Function For Print it is not in use now
		 $('.info_link').click(function(){
					
			var 	tablerow = $(this).closest('tr');
			var		str=document.getElementById('printtable').innerHTML;
			var		newwin=window.open('','printwin','left=100,top=100,width=800,height=400');
					newwin.document.write('<HTML>\n<HEAD>\n');
					newwin.document.write('<TITLE>NAB</TITLE>\n');
					newwin.document.write('<script>\n');
					newwin.document.write('function chkstate(){\n');
					newwin.document.write('if(document.readyState=="complete"){\n');
					newwin.document.write('window.close()\n');
					newwin.document.write('}\n');
					newwin.document.write('else{\n');
					newwin.document.write('setTimeout("chkstate()",2000)\n');
					newwin.document.write('}\n');
					newwin.document.write('}\n');
					newwin.document.write('function print_win(){\n');
					newwin.document.write('window.print();\n');
					newwin.document.write('chkstate();\n');
					newwin.document.write('}\n');
					newwin.document.write('<\/script>\n');
					newwin.document.write('</HEAD>\n');
					newwin.document.write('<BODY onload="print_win()">\n');
					
					newwin.document.write(str);
					newwin.document.write('</BODY>\n');
					newwin.document.write('</HTML>\n');
					newwin.document.close()
			
    
		});

	
});




	/*function request()
	{
		
		
	});
	}*/
</script>


