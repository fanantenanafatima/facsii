<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier un topic | Faculté des sciences Fianarantsoa</title>
	<style type="text/css">
		body{
			background-color: rgba(240, 240, 240, 1.0);
		}

		@media only screen and (max-width :500px){
			body{
				margin: 5px;
				height: 100vh;
			}

			.form_field{
				width: 100%;
				margin-top: 10px;
				background-color: white;
				border-radius: 20px;
				padding-top: 0px;
			}
			form{
				display: flex;
				justify-content: center;
				flex-direction: column;
				margin: 0px;
				padding: 0px;
			}
			
			input[type=text]{
				border-radius: 10px;
				height: 25px;
				font-size: inherit;
				padding-left: 10px;
				margin-bottom: 10px;
				border: 1px solid darkgray ;
			}

			textarea{
				border-radius: 10px;
				font-size: inherit;
				padding-left: 10px;
				padding-top: 10px;
				border: 1px solid darkgray ;
			}

			textarea:focus, input[type=text]:focus{
				border: 1px solid #1E90FF ;
				outline: none;
			}

			.upload_img{
				background-color: blue;

			}

			.img_field{
				margin-top: 10px;
				padding-left:2px;
				background-color: rgba(240, 240, 240, 1.0);
				border-radius: 0px;
				
			}

			.lbl_bt{
				background-color: #e3362c;
				color: #fff;
				width: 100%;
				text-align: center;
				border-radius: 5px;
				cursor: pointer;
				font-weight: bold;
				font-size: 16px;
				padding-top: 5px;
				padding-bottom: 7px;
			}

			img{
				margin-top: 0px;
				width: 50px;
				height: 50px;
			}

			.btn_submit{
				width: 70%;
				margin-left: 15%;
				margin-top: 10px;
				background-color: #1E90FF ;
				color: white;
				height: 30px;
				font-size: 17px;
				border-radius: 10px;
				margin-bottom: 30px;
			}

			.ttl{
				font-family: "cooper black", serif;
				margin-top: 10px;
				text-align: center;
				font-size: 20px;
				margin-bottom: 20px;
				color: #1E90FF;
				background-color:  rgba(240, 240, 240, 1.0);
				border-radius: 100%;
				/*margin-left: 20px;*/
			}
		}
		
		@media only screen and (min-width :500px){
			.form_field{
				width: 500px;
				margin-top: 100px;
				margin-left: calc((100vw - 500px) / 2);
				background-color: white;
				border-radius: 20px;
				padding-top: 0px;
			}
			form{
				display: flex;
				justify-content: center;
				flex-direction: column;
				margin: 20px;
				padding: 0px;
			}
			
			input[type=text]{
				border-radius: 10px;
				height: 40px;
				font-size: inherit;
				padding-left: 10px;
				margin-bottom: 15px;
				border: 1px solid darkgray ;
			}

			textarea{
				border-radius: 10px;
				resize: none;
				font-size: inherit;
				padding-left: 10px;
				padding-top: 10px;
				border: 1px solid darkgray ;
			}

			textarea:focus, input[type=text]:focus{
				border: 1px solid #1E90FF ;
				outline: none;
			}

			.upload_img{
				background-color: blue;

			}

			.img_field{
				margin-top: 20px;
				padding-left:10px;
				background-color: rgba(240, 240, 240, 1.0);
				border-radius: 10px;
				
			}

			.lbl_bt{
				margin-left: 100px;
				margin-top: 10px;
				background-color: #e3362c;
				color: #fff;
				width: 200px;
				padding: 10px 10px;
				text-align: center;
				border-radius: 5px;
				cursor: pointer;
				font-weight: bold;
				font-size: 18px;
			}

			img{
				margin-top: 10px;
				width: 100px;
				height: 80px;
			}

			.btn_submit{
				width: 150px;
				margin-left: 130px;
				margin-top: 40px;
				background-color: #1E90FF ;
				color: white;
				height: 40px;
				font-size: 20px;
				border-radius: 10px;
				margin-bottom: 30px;
			}

			.ttl{
				font-family: "cooper black", serif;
				margin-top: 20px;
				text-align: center;
				font-size: 30px;
				margin-bottom: 20px;
				color: #1E90FF;
				background-color:  rgba(240, 240, 240, 1.0);
				border-radius: 100%;
				/*margin-left: 20px;*/
			}
		}
	</style>
</head>
<body>
	<div class="form_field">
		
		<form action="<?php echo base_url('Topics/insert_topic');?>" enctype="multipart/form-data" method="post">
			<div class="ttl">Nouvelle publication</div>
			<input type="text" name="title_topic" id="title_topic" placeholder="Titre de topic">
			<textarea name="topic_body"  id="topic_body" placeholder="Corps de topic"></textarea>
			<div class="img_field" id="preview" style=""></div>
			<label for="upload_image" class="lbl_bt">Inserer des images</label>
			<input type="file" name="images[]" multiple onchange="get_image_preview()" accept="image/jpeg, image/png, image/jpg" id="upload_image" style="display: none; width:0; height: 0; margin:0; padding: 0;">
			<input type="submit" value="Publier" class="btn_submit">
		</form>
	</div>

	<script type="text/javascript">
		function get_image_preview(){
			var imagediv = document.getElementById ('preview');
			imagediv.innerHTML = "";
			
			for(var i = 0; i < event.target.files.length; i++){
				var image = URL.createObjectURL(event.target.files[i]);
				
				var newimage = document.createElement('img');
				newimage.src = image;
				imagediv.appendChild(newimage);
			}
		}

	</script>

	
</body>
</html>