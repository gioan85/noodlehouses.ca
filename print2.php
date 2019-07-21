<style type="text/css">
table{
	width:100%;
	margin:10px;
}
td{
	font-family:"Courier New", Courier, monospace;
	font-size:12px; color:#000; line-height:12px;
}
td:nth-child(1){ width:10%;}
td:nth-child(2){ width:80%;}
td:nth-child(3){ width:10%;}

</style>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MDN Example</title>
<script type="text/javascript">
function closePrint () {
  document.body.removeChild(this.__container__);
}

function setPrint () {
  this.contentWindow.__container__ = this;
  this.contentWindow.onbeforeunload = closePrint;
  this.contentWindow.onafterprint = closePrint;
  this.contentWindow.focus(); // Required for IE
  console.log(this.contentWindow);  
  this.contentWindow.print();
}

function printPage (sURL) {
  var oHiddFrame = document.createElement("iframe");
  oHiddFrame.onload = setPrint;
  oHiddFrame.style.visibility = "hidden";
  oHiddFrame.style.position = "fixed";
  oHiddFrame.style.right = "0";
  oHiddFrame.style.bottom = "0";
  oHiddFrame.src = sURL;
  document.body.appendChild(oHiddFrame);
}
</script>
</head>

<body>
    <button id="idPrint1" onclick="printPage('file.pdf')">Load and Print </button>  
</body>
</html>