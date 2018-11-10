// file simpleajax.js
// using POST method
var xhr = createRequest();

/*
	ajax function that prints the data to the user using the provided details


*/
function getBookingDetails(dataSource, divID, aName, aPhone,astreetnumber,astreetname,adestination,adate,atime) {
 if(xhr) {
 var obj = document.getElementById(divID);
 var requestbody ="customername="+encodeURIComponent(aName)+"&phone="+encodeURIComponent(aPhone)+"&streetnumber="+encodeURIComponent(astreetnumber)+"&streetname="+encodeURIComponent(astreetname)+"&destination="+encodeURIComponent(adestination)+"&date="+encodeURIComponent(adate)+"&time="+encodeURIComponent(atime);
 xhr.open("POST", dataSource, true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 xhr.onreadystatechange = function() {
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 } // end if
 }

 xhr.send(requestbody);
 } // end if
}

function inputValidate(source, div, data)
{
	var transfer = div + "=";
	var display = document.getElementById(div);
	
	if(data.trim() == "")
	{
		if(transfer.search("Unit") == -1)
		{
			display.innerHTML = "<font color='white'>Can not empty</font>";
		}
		else
		{
			display.innerHTML = "<font color='green'>OK</font>";
		}
	}
	
	else
	{
		xhr.open("POST", source, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function()
		{
			if ((xhr.readyState == 4) && (xhr.status == 200))
			{
				var message = xhr.responseText;
				display.innerHTML = message;
			}
		};
		
		xhr.send(transfer + data);
	}
	return display.innerHTML;
}