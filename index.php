
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script language="javascript">
var timestamp = null;
function cargar_push() 
{  
	$.ajax({
	async:	true, 
    type: "POST",
    url: "httpush.php",
    data: "&timestamp="+timestamp,
	dataType:"html",
    success: function(data)
	{	
		var json    	   = eval("(" + data + ")");
		timestamp 		   = json.timestamp;
		mensaje     	   = json.mensaje;
		id        		   = json.id;
		status      	   = json.status;
		tipo      	   = json.tipo;
		
		if(timestamp == null)
		{
		
		}
		else
		{
			$.ajax({
			async:	true, 
			type: "POST",
			url: "mensajes.php",
			data: "&div="+tipo,
			dataType:"html",
			success: function(data)
			{	
				$('#div'+tipo).html(data);
			}
			});	
		}
		setTimeout('cargar_push()',1000);
		    	
    }
	});		
}

$(document).ready(function()
{
	cargar_push();
});	 

</script>

</head>

<body>
<div id="div1" style="width:200px; height:200px; float:left;">
div 1
</div>
<div id="div2" style="width:200px; height:200px; float:left;">
div 2
</div>



</body>
</html>