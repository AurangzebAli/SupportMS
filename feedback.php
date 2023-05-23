<?php
include_once('dbConnection.php');

$query = "SELECT supportid,ROName FROM `tblsupport`  WHERE ProblemStatus = 0 ";
 $resource =	mysql_query($query) or die("". mysql_error());
	while($array = mysql_fetch_assoc($resource)) 
	{
		$OfficerName[] = $array;
	}



$query1 = "SELECT * FROM tblwing";
$resource1 =	mysql_query($query1);
 	
	
 	while($array1 = mysql_fetch_assoc($resource1)) 
	{
		$wings[] = $array1;
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
        <title>Support Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
		<script type= "text/javascript" src="jquery.js" ></script>
    <script type="text/javascript" src="js/datepicker/jquery-ui.js"></script> 
	<link rel="stylesheet" type="text/css" href="js/datepicker/jquery-ui.css" />
     
		<script type="text/javascript">
				$(function(){
					$('#txtdatepicker').datepicker();
					
				});
		
		</script>
		
		
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link rel="stylesheet" type="text/css" href="css/popup12.css" />  
			<link rel="stylesheet" type="text/css" href="css/tab.css" />  
		
    </head>
    <body>
	
	
<button id= "index" class="tablink" >Request </button>
<button id="view" class="tablink" >View</button>
<br />
        <div class="container">
            <header  style="padding-bottom: 0px;">
                <h1>
				Support Mangement System </h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method = "post" action = "process.php" autocomplete="on"> 
							
							<center><img src="images/nablogo.png" alt=""  > 
							</center>
							
							
                                 <!-- <h1>Log in</h1> -->
								 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Requisition Officer Name <font color="red">*</font></label>
                                    <select id = "ddlSelect"  name = "ddlSelect">
										<option value = ""  ></option>
									<?php foreach ($OfficerName as $off) 
										{										
											
									?>
									<option value = "<?= $off["supportid"]?>"  ><?= $off["supportid"] . " - " . $off["ROName"]?></option>
									<?php }
									?>
									
								<!--	<option value = "2"  >PW  -   Prosecution wing</option>
									<option value = "3"  >I&S -   Intelligence & Security</option>
									<option value = "4"  >WHC -   Witness Handling Cell</option>
									<option value = "5"  >A&P -   Awareness and Prevention</option>
									<option value = "6"  >AD -    Admin </option>-->
									
									
									</select>
                                </p>
                                <p> 
                                    
									
                                </p>
								<p> 
                                    <label for="password" class="youpasswd" data-icon="p">Problem <font color="red">*</font></label>
                                    <input id="txtproblem" name="TelNo" required="required" type="text" placeholder="" /> 
                                </p>
								<p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Description<font color="red">*</font></label>
                                    <input id="txtdescription" name="ExtNo" required="required" type="text" placeholder="" /> 
                                </p>
								<p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Remarks<font color="red">*</font></label>
                                    <input id="txtRemarks" name="Remarks" required="required" type="text" placeholder="" /> 
                                </p>
                                <p class="keeplogin"> 
									<!-- <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> -->
									<label for="loginkeeping">Tel: 071-9310066  Ext-109</label>
									
								</p>
                                <p class="login button"> 
                                    <input type="submit"  value="Resoved"  name="Resolved"/> 
									<input id = "message" name= "message" type = "hidden" 
									value = "<?php
									@session_start();
									if ( isset( $_SESSION['ProblemResolved'] ) )
									{
										$messageRaiseRequest = $_SESSION['ProblemResolved'];
										echo $messageRaiseRequest;
										unset($_SESSION['ProblemResolved']);
										  // show error #5
									}
									
									?>" 
									/> 
								</p>
                                <p class="change_link">
								<b>
									Copyrights © 2017 Nab Sukkur
									(Powerd By IT-Wing)
									
									</b>
								</p>
								<div id="myModal" class="modal">

								  <!-- Modal content -->
								  <div class="modal-content">
									<span class="close">&times;</span>
									<p> Thanks For your Remarks <br />
										</p>
								  </div>

								</div>

								
								
                            </form>
                        </div>
						
						
					

		
					
                    </div>
                </div>  
            </section>
		
        </div>
		
    </body>
</html>
<script>
/***** For Using Session Value ************/
 $(document).ready(function() {



	 $('#index').click(function() {
					
					window.location.href = "index.php";
		
	});
		
		 $('#view').click(function() {
		
				window.location.href = "view.php";
		});

	
 

		$('#ddlSelect').on('change', function() {
		
		var supportidvalue = $(this).val();
			
		var html ="";
        $.ajax({
            type :'post',
            url :'process.php',
            data :{
                'DDLfeedbackData' :'feedbackData'
				,'supportiddd': supportidvalue
				
            },
			success : function(response)
            {
				
				var val = response.d;
				var feed = $.parseJSON(response);
				$('#txtproblem').val(feed[0].problemname);	
				$('#txtdescription').val(feed[0].PrbDesc);	
				
				
				
			}
		
		
		
		
	
	});
		return false;
	});

	 

		 		 
				
	
	//For Popup message after request raise		
	var message = "";
    message=	$("#message").val();
	if(message != null && message != "")
	{
		 			var modal = document.getElementById('myModal');
					modal.style.display = "block";
					var span = document.getElementsByClassName("close")[0];
					span.onclick = function() {
					modal.style.display = "none";
					}

	}
	 
	 
	 
	 
 
});
//$insert_id = mysql_insert_id();
//ALTER TABLE `tblsupport` ADD `Remarks` TEXT NOT NULL ;
</script>

