function loginUser(username, password)
{
	$.ajax(
	{
		url: 'login_user.php',
		type: 'post',
		data: {username:username, password:password},
		dataType: 'json',
		success: function(response)
		{
			if(response.success === true)
			{
				window.location.href = "/dashboard.php";
			}
			else 
			{
				//error
			}
		},
		error: function(xhr)
		{
			console.log(xhr.responseText);
		}
	})
}

function verifyUser(username, password)
{
	$.ajax(
	{
		url: 'verify_user.php',
		type: 'post',
		data: {username:username, password:password},
		dataType: 'json',
		success: function(response)
		{
			if(response.does_exist > 0 )
				loginUser(username, password);
			else
				//error
				console.log("error");
		},
		error: function(xhr)
		{
			console.log(xhr.responseText);
		}
	})
}

$(document).on("click","#login_btn",function(event)
{
	let username = $("#username").val();
	let password = $("#password").val();
	verifyUser(username, password);
});