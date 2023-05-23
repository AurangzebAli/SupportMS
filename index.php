<?php
include_once('dbConnection.php');

$query = "SELECT * FROM tblproblem";
 $resource =	mysql_query($query) or die("". mysql_error());
	while($array = mysql_fetch_assoc($resource)) 
	{
		$problem[] = $array;
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
 
<button id= "feedback" class="tablink" >Feedback</button>
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
                                    <label for="username" class="uname" data-icon="u" > Requested Date <font color="red">*</font></label>
                                    <input id="txtdatepicker" name="datepicker" required="required" type="text" />
                                </p>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Requisition Officer Name <font color="red">*</font></label>
                                    <input id="txtreqofficername" name="requestedOfname" required="required" type="text" placeholder="My Name"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Wing <font color="red">*</font></label>
                                    <select id = "ddlwing"  name = "ddlwing">
									<?php foreach ($wings as $win) 
										{
									?>
									<option value = "<?= $win["wingid"]?>"  ><?= $win["wingname"]?></option>
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
                                    <label for="password" class="youpasswd" data-icon="p"> Telephone No <font color="red">*</font></label>
                                    <input id="txtwing" name="TelNo" required="required" type="text" placeholder="" /> 
                                </p>
								<p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Intercom<font color="red">*</font></label>
                                    <input id="txtwing" name="ExtNo" required="required" type="text" placeholder="" /> 
                                </p>
								<p> 
										
                                    <label for="password" class="youpasswd" >Please Select any of the concerned problems . <font color="red">*</font></label>
									<select id = "ddlproblem"  name = "ddlproblem">
									<?php foreach ($problem as $prob) {?>
									<option value = "<?= $prob['problemId'] ?>"  ><?= $prob['problemname'] ?></option>
									<?php }?>
								<!--	<option value = "2"  >Software</option>
									<option value = "3"  >Network</option>
									<option value = "4"  >Printer</option>
									<option value = "5"  >NTC Telephone</option>
									<option value = "6"  >Intercom</option> -->
									
									</select>
                                </p>
								<p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Description<font color="red">*</font></label>
                                    <input id="txtdescription" name="Description" required="required" type="text" placeholder="" /> 
                                </p>
                                <p class="keeplogin"> 
									<!-- <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> -->
									<label for="loginkeeping">Tel: 071-9310066  Ext-109</label>
									
								</p>
                                <p class="login button"> 
                                    <input type="submit"  value="Raise Request"  name="save"/> 
									<input id = "message" name= "message" type = "hidden" 
									value = "<?php
									@session_start();
									if ( isset( $_SESSION['SaveSuccessfully'] ) )
									{
										$messageRaiseRequest = $_SESSION['SaveSuccessfully'];
										echo $messageRaiseRequest;
										unset($_SESSION['SaveSuccessfully']);
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
									<p> Your request has been forwaded to IT-CELL <br />
										your issue will be resolved soon..<p>
								  </div>

								</div>

								
								
                            </form>
                        </div>
						
						
					

		
						
<!-- 57575757--? -->
                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" >Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
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
	

	
	
	
	 $('#feedback').click(function() {
					
					window.location.href = "feedback.php";
		
	});
		
		 $('#view').click(function() {
		
				window.location.href = "view.php";
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

</script>