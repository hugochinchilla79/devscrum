function cargarHTTP(){
	var XMLHTTP;
	if(window.XMLHttpRequest){
		XMLHTTP = new XMLHttpRequest();
	}
	else{
		XMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return XMLHTTP;
}
function cargarBusqueda(seleccion,valor,pagina){
	ajax = cargarHTTP();
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status==200 && pagina=='RecursosInventario.php'){
			document.getElementById("contentInv").innerHTML=ajax.responseText;			
		}else{
			if(ajax.readyState==4 && ajax.status==200){
				document.getElementById("content").innerHTML=ajax.responseText;
			}			
		}
	}
	ajax.open("POST",pagina,true);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("seleccion="+seleccion+'&valor='+valor);
}
function guardar(clave,dir){
	var storage = localStorage;
	storage.setItem(clave,dir);
	alert('correcto');
}
function crear_directorio(ruta,base_url,param){
	var nombre = prompt('Ingresa el nombre de la carpeta');
	var ruta_completa = ruta;
	location.href=base_url+"upload/crear_directorio?n="+nombre+"&r="+ruta_completa+"&v="+param;
}
function eliminar_directorio(ruta,base_url,param){
	var con = confirm('Realmente desdeas eliminar esta carpeta?');
	var ruta_completa = ruta;
	if (con==true) {
		location.href=base_url+"upload/eliminar_directorio?r="+ruta+"&v="+param;
	}
}