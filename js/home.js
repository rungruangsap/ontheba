function loadJSON(str) {
     if (str.length == 0) { 
         document.getElementById("myDiv").innerHTML = "";
         return;
     } else {
		 if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 
				 document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
				 }
             }
         
         xmlhttp.open("GET", "./getMenu.php?name="+str, true);
         xmlhttp.send();
     }
}
function loadJSON2(str) {
     if (str.length == 0) { 
         document.getElementById("myDiv2").innerHTML = "";
         return;
     } else {
		 if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 
				 document.getElementById("myDiv2").innerHTML = xmlhttp.responseText;
				 }
             }
         
         xmlhttp.open("GET", "./getMenu.php?name="+str, true);
         xmlhttp.send();
     }
}
function loadJSON3(str) {
     if (str.length == 0) { 
         document.getElementById("myDiv3").innerHTML = "";
         return;
     } else {
		 if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 
				 document.getElementById("myDiv3").innerHTML = xmlhttp.responseText;
				 }
             }
         
         xmlhttp.open("GET", "./getMenu.php?name="+str, true);
         xmlhttp.send();
     }
}
function loadJSON4(str) {
     if (str.length == 0) { 
         document.getElementById("myDiv4").innerHTML = "";
         return;
     } else {
		 if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 
				 document.getElementById("myDiv4").innerHTML = xmlhttp.responseText;
				 }
             }
         
         xmlhttp.open("GET", "./getMenu.php?name="+str, true);
         xmlhttp.send();
     }
}	
function addCart(name,price)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status==200){
			$("#list").html (xmlhttp.responseText);
		}
	}
xmlhttp.open("GET","./cart.php?fname="+name+"&money="+price,true);
xmlhttp.send();
}

function removeCart()
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status==200){
			$("#list").html (xmlhttp.responseText);
		}
	}
xmlhttp.open("GET","./removecart.php",true);
xmlhttp.send();
}

function delCart(num)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		 var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status==200){
			$("#list").html (xmlhttp.responseText);
		}
	}
xmlhttp.open("GET","./delcart.php?Line="+num,true);
xmlhttp.send();
}
function loadStatus() {
   	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		var xhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		 var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            $("#myDiv").html (xhttp.responseText);
        }
    };
    xhttp.open("GET", "./sub/status.php", true);
    xhttp.send();
}

function loadJSON_Search(str)
{
	var txt = "<br/>";
	if (str.trim()=="")
	{
		document.getElementById('stdInfo').innerHTML="<br/>กรอกชื่ออัลบั้มหรือชื่อวงที่ต้องการจะค้นหา<br/><br/><br/><br/><br/><br/>";
		return;
	} 
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState == 4 && xmlhttp.status==200)
    {
	  var obj = JSON.parse(xmlhttp.responseText);
	  if(obj.success && obj.num >0) {
		for (i=0;i<obj.results.length;i++)
		{ 
		  txt=txt+"<h3> ["+obj.results[i].id+"] ";
		  txt=txt+obj.results[i].name+"</h3><br/><div class=\"w3-row\">";
		  txt=txt+"<div class=\"w3-container w3-half\"><img src=\"./images/"+obj.results[i].images+"\" width=\"50%\"></div>";
		  if(obj.results[i].price=="" ){
			txt=txt+"<div class=\"w3-container w3-half\"><br/>";
		  }else{
			txt=txt+"<div class=\"w3-container w3-half\"><br/>ราคา  "+obj.results[i].price+" บาท <br/><br/>";
		  }
		  
		  txt=txt+"<a href=\"./sub/delete_order_goods.php?id="+obj.results[i].id+"&submit=DEL\" OnClick=\"return chkdel();\"><button type=\"button\" class=\"btn btn-danger \">&nbsp;&nbsp;&nbsp;&nbsp;ลบ&nbsp;&nbsp;&nbsp;&nbsp;</button></a> <a href=\"./edit.php?edit="+obj.results[i].id+"\"  target=\"_blank\"><button type=\"button\" class=\"btn btn-info\">&nbsp;&nbsp;&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;&nbsp;&nbsp;</button></a>";
		  txt = txt + "</div>"+"</div>"+"<a class=\"up-arrow\" href=\"#myPage\" data-toggle=\"tooltip\" title=\"TO TOP\"><span class=\"glyphicon glyphicon-chevron-up\" style=\"float:right;\"></span></a><br/>"+"<hr/><br/>";
		}
		
		}
		else if (obj.success && obj.num == 0) {
			txt = "<br/>ไม่พบข้อมูล<br/><br/><br/><br/><br/><br/>";
		}
		else {
			txt = txt + obj.message;
		}
		document.getElementById('stdInfo').innerHTML=txt;
    }
  }
xmlhttp.open("GET",".search.php?fname="+str,true);
xmlhttp.send();
}