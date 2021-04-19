const response  = new XMLHttpRequest();

response.onreadystatechange = function () {
	if(response.readyState == 4){
		
		if(response.status == 200){
			const json = JSON.parse(response.responseText);
			//json.forEach((el)=>{});
		}
		
		if(response.status == 404){
			console.log("404 not found");
		}
	}
}

response.open('get','url_here',true)
response.send()