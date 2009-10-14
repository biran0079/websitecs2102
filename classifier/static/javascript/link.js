
function ajaxRequest(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 if (window.ActiveXObject){ 
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i]);
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest) // if Mozilla, Safari etc
  return new XMLHttpRequest();
 else
  return false;
}


function update_visit_times(){
	//alert("Click the link");
	var myajaxrequest=new ajaxRequest();
	if (!myajaxrequest){
		alert("error to create HttpRequest");
		return;
	}
	
	var self = this;
	this.myajaxrequest.onreadystatechange=function(){
		 if (self.myajaxrequest.readyState==4){
			 if (self.myajaxrequest.status==200 || window.location.href.indexOf("http")==-1){
				 //document.getElementById("result").innerHTML=myajaxrequest.responseText
			 }
		  else{
		   alert(self.myajaxrequest.status);	  
		   alert(window.location.href.indexOf("http")==-1)
		   alert("An error has occured making the request！");
		  }
		 }
		}
		//var namevalue=encodeURIComponent(document.getElementById("name").value);
		//var agevalue=encodeURIComponent(document.getElementById("age").value);
		
	alert("Going to send request");
	this.myajaxrequest.open("GET", "http://localhost/home.php", true);
	this.myajaxrequest.send(null);
}