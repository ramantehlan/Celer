<div class="error_box">
		ERROR
	</div>

<div class="success_box">
	Successfully uploaded
</div>


<div class='form'>
		<div id="progress_bar">
				<div class="progress-label">0% uploaded</div>
		</div>

		<div class='form_heading'>
		Upload Program
		</div>
		<div class='form_body'>
			<form method="post" enctype="multipart/form-data" action="save_file.php" id="import_form">
				<input type='file' class='input' id='file'>

				<input type='submit' class='submit' id='submit_file'>
			</form>
		</div>
</div>


<script type="text/javascript">
	
	//this is to create a progressbar using jquery-ui.js
	$("#progress_bar").progressbar({
		value: 0
	});


	/******************************************************
	function to handle uploads
	******************************************************/

	//while data is still being uploaded
	//run the following function
	function progress_handler(event){

		//getting percent of data that has been uploaded
		var percent = Math.round( (event.loaded / event.total) * 100);

		//priting percent
		$(".progress-label").html(percent + "% Uploaded");

		//moving progress bar according to percent
		$("#progress_bar").progressbar({
				value: percent
		});

		var success_box = $(".success_box");

		//printing the action file data here
		success_box.show("drop" , {direction: "left"} , 300);

		success_box.html("Uploading File...")

	}

	//data has been uploaded successfully
	//run this function
	function complete_handler(event){
		var success_box = $(".success_box");

		//printing the action file data here
		success_box.show("drop" , {direction: "left"} , 300);
		
			success_box.html(event.target.responseText);

			setTimeout(function(){
					success_box.hide("drop" , {direction: "left"} , 300);
					$("#progress_bar").hide("drop" , {direction: "up"} , 300);
			},3000);
		

	}


	$("#submit_file").click(function(){

			//declaring variables
		btn = document.getElementById("submit_file");
		err = $(".error_box");
		pro = $("#progress_bar");

		//hide old errors
		err.hide("drop" , {direction: "right"} , 300);

		//to disable the button for a while
		btn.disabled = true;


		if( document.getElementById("file").value.length == 0){
			err.show("drop" , {direction : "right"} , 300);
			err.html("File Not attached!");

			btn.disabled = false;
		}else{
				var data_file = document.getElementById("file").files[0];
				//hide error box
				err.hide("drop" , {direction: "right"} , 300);

				//showing the progress_bar
				pro.show("drop" , {direction: "up"} , 200);

				var formdata = new FormData();
				formdata.append("program" , data_file);
				//create a XMLHttpRequest
				var request = new XMLHttpRequest();
				request.upload.addEventListener("progress" , progress_handler , false);
				request.addEventListener("load" , complete_handler , false),
				request.open("POST" , "save_file.php");

				request.send(formdata);

				btn.disabled = false;
				document.getElementById("file").value = "";
		}

		return false;


	});

</script>