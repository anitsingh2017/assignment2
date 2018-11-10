var xhr = createRequest();

/*
	ajax function for assigning user. prints to the admin if a booking has been assigned or not
*/
function getUser(dataSource, divID, arefNum) {
 if(xhr) {
 var obj = document.getElementById(divID);
 var requestbody ="refNum="+encodeURIComponent(arefNum);
 xhr.open("POST", dataSource, true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

 xhr.onreadystatechange = function() {
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 } // end if
 } // end anonymous call-back function
 xhr.send(requestbody);
 } // end if
} // end function getData() 

/*
	ajax function to show all user booking to the admin
*/
function showUser(dataSource, divID) {
 if(xhr) {
 var obj = document.getElementById(divID);
 xhr.open("POST", dataSource, true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhr.onreadystatechange = function() {
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 } // end if
 }

 xhr.send(null);
 } // end if
}



