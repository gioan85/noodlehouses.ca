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
<?php
$handle = fopen("PRN", "w");

fwrite($handle, '



<table cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td colspan="3">www.noodlehouses.ca</td>
    </tr>
    <tr>
    	<td colspan="3">941 LakeShore Mississauga On Toronto</td>
    </tr>
    <tr>
    	<td colspan="3">Phone number</td>
    </tr>
    <tr>
    	<td>Id</td>
        <td>food name</td>
        <td>price</td>
    </tr>
    <tr>
    	<td>Id</td>
        <td>food name</td>
        <td>price</td>
    </tr>
    <tr>
    	<td>Id</td>
        <td>food name</td>
        <td>price</td>
    </tr>
    <tr>
    	<td>Id</td>
        <td>food name</td>
        <td>price</td>
    </tr>
    <tr>
    	<td colspan="3">tax</td>
    </tr>
    <tr>
    	<td colspan="3">ship</td>
    </tr>
    <tr>
    	<td colspan="3">total</td>
    </tr>
    <tr>
    	<td colspan="3">Thank you! See you againt!</td>
    </tr>
</table>


');

fclose($handle);

?>

<script language="javascript">
	var divContents = $("#dvContainer").html();
	var printWindow = window.open('', '', 'height=400,width=800');
	printWindow.document.write('<html><head><title>DIV Contents</title>');
	printWindow.document.write('</head><body >');
	printWindow.document.write(divContents);
	printWindow.document.write('</body></html>');
	printWindow.document.close();
	printWindow.print();
</script>