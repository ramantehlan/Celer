<?php 
	
	if(isset($_FILES['program'])){
		if($_FILES['program']['tmp_name']){
			if(move_uploaded_file($_FILES['program']['tmp_name'], "uploads/" . "" )){
     											
     									echo "done";
     		}else{
     			  echo "File not moved";
     		}
		}else{
			echo "Temp file not present";
		}
	}else{
		echo "File not sent";
	}

?>