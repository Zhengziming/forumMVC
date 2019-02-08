window.addEventListener('load', function(){
	
	closeItem();

    
});


function closeItem()
{
	var UserID=document.getElementById('UserID').value;
	var blog=document.getElementById('blog');
	var register=document.getElementById('register');
	var login=document.getElementById('login');
	var logout=document.getElementById('logout');
	
	console.log('UserID=',UserID);

	if(UserID=="Bienvenu")
	{
		blog.style.display="none";
		logout.style.display="none";
		
		
	}
	else
	{
		blog.style.display="block";
		logout.style.display="block";
		register.style.display="none";
		login.style.display="none";
		
		
	}
	
	
}

