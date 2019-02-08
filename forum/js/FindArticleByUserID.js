//@ sourceURL=FindArticleByUserID.js
	var UserID=document.getElementById('UserID').value;
    var table0 = document.getElementsByTagName("table")[0]; //first table   
	
	
	var rows = document.getElementsByTagName("tr");
	var UserID_change='<a href="../index.php?action=Welcome&amp;AuteurID='+UserID+'">'+UserID+'</a>'
	
    for(var i=0;i<table0.rows.length;i++)
	{  
		
		if(table0.rows[i].cells[2].innerHTML==UserID_change)
		{
			rows[i].cells[2].style.backgroundColor = "#ffc";
			
		} 
		
		
    }  
  