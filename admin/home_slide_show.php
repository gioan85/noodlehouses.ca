<?php
/*
   minhtri95@yahoo.com
  Code distribution prohibitted
*/

// These are required
require_once("includes/application_top.php");

$sts->read_template_file('main_template.php');
$sts->start_capture();
$sts->set_title('noodlehouses.ca');
$sts->set_description('');
$sts->set_keywords('');
// ****************************************	
// Content place below this line
// ****************************************
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>


<h1>Home slide show</h1>
<div class="space"></div>
<div>
    <h3>Upload imgaes</h3><br />
    Choose image:<input type="file" name="fileToUpload" id="fileToUpload"/>&nbsp;&nbsp;(Note: size 650 x 482px)<br />
    <div style="display:none;">Max width: <input type="text" name="max_width" id="upload_img_max_width" border="0" class="input" class="max_width" style="width:50px;" value="200" onclick="javascript:if(this.value=='200') this.value='';" onblur="javascript:if(this.value=='') this.value='200';" />  px</div>
    
    <button class="button" onClick="img_upload();">Upload</button>
    
</div>
<div class="space"></div>
<div class="img_list"></div>
<script language="javascript">
	function load_img(){
		var string ='action=load_img';
		$.ajax({
			url: "home_slide_show_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				$('.img_list').html(data);
			}
		});
	};
	
	load_img();
	
	function update_img(img,path,command){
		console.log(img);
		console.log(path);
		console.log(command);
		if(command == 'Delete')
		{
			var answer = confirm("Are you sure to delete this image?");
			if(!answer)
				return;
		}
		var string ='action=update_img';
		string += '&img='+ img;
		string += '&path='+ path;
		string += '&command='+ command;
		$.ajax({
			url: "home_slide_show_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				//alert(data);
				load_img();
			}
		});
	};
	
	
	function img_upload()
	{
		if(!document.getElementById("fileToUpload").value != '')
		{
			alert('Bạn chưa chọn hình ảnh');
			return;
		}
		$.ajaxFileUpload
		(
			{
				type: "GET",
				url:'upload_img.php?max_width=650&path=../images/home_slideshow/' ,
				secureuri:false,
				fileElementId:'fileToUpload',
				folder: 'folder',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.path !='')
						{
							load_img();
						}
						else
						{
							alert(data.error);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;
	}
	
	
</script>
<div class="space"></div>

<style>
.img_block{
	float:left; width:220px; height:198px;
	margin:10px 10px 20px 0px;
	overflow:hidden; 
}
.img_block:hover .img, .img_block.actived .img{
	opacity:1;
}
.img_block .img{
	padding:9px;
	margin-bottom:5px;
	border:1px solid #CCC;
	opacity:0.3;
	width:200px; height:148px;
	overflow:hidden;
}
.img_block img{
	
}
.img_block .control_bar{
	clear:both; width:100%;
}
.img_block .control_bar > div{
	width:33%; float:left;
	height:20px; font-size:14px; text-align:center; line-height:20px; color:#fff;
}
.img_block .control_bar .unused{
	background:#9ec386;
}
.img_block .control_bar .used{
	background:#72b34b;
}
.img_block .control_bar .delete{
	background:#B37070;
}


</style>

<script language="javascript">

	


</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>