function all() 
{
	// Ajax config
	$.ajax({
        type: "GET", //we are using GET method to get all record from the server
        url: 'all.php', // get the route value
        success: function (response) {//once the request successfully process to the server side it will return result here
            
            // Parse the json result
        	response = JSON.parse(response);

            var html = "";
            // Check if there is available records
            if(response.length) {
            	html += '<div class="list-group">';
	            // Loop the parsed JSON

	            $.each(response, function(key,value) {
	            	// Our employee list template

	            	if(value.donator_or_requester == 2){donator = "Donator ";}
	            		else {donator = "Requester ";}
	            		if(value.blood_type == 2) b = "O+";
	            		if(value.blood_type == 3) b = "O-";
	            		if(value.blood_type == 4) b = "A+";
	            		if(value.blood_type == 5) b = "A-";
	            		if(value.blood_type == 6) b = "B+";
	            		if(value.blood_type == 7) b = "B-";
	            		if(value.blood_type == 8) b = "AB+";
	            		if(value.blood_type == 9) b = "AB-";

	            		if(value.organ_type == 2) og = "Liver";
	            		if(value.organ_type == 3) og = "Kidney";
	            		if(value.organ_type == 4) og = "Heart";
	            		if(value.organ_type == 5) og = "Cornea";
	            		if(value.organ_type == 6) og = "Lung";

					html += "<p>";
					html += '<b>'+donator+"name: "+value.name +'</b>'+"</br>";
					html += '<b>'+donator+"Blood type: "+b+'</b>'+"</br>";
					html += '<b>'+donator+"Place: "+value.city +'</b>'+"</br>";

					if (value.blood_or_organ == 2) {
						html += '<b>'+donator+"organ type: "+og+'</b>'+"</br>";

					}
					if (value.con_privacy == 1){
						html += '<b>'+donator+"contact email: "+value.email+'</b>'+"</br>";
						html += '<b>'+donator+"phone number: "+value.mobile+'</b>'+"</br>";
					}


					html += "</p>";

				
					
					

























					/*if(value.con_privacy == 1){
					html += '<a href="#" class="list-group-item list-group-item-action"';
					html += "<p>";
					html += '<b>'+value.name +'</b>'+ " has sent an application for you at "+ value.time +" you can contact this user in: ";
					html += '<b>'+ value.email +'</b>'+"</p>";
					html += "<p>"+"Other info:"+"</br>"

					html += "<p>" + '<img src='+ 'uploads/' +value.photo_url+ ' alt="profile" pic class="avatar">';
					html +="</p>";
					html += "<p class='list-address'>" + 'Birthday: ' + value.birthday + "</p>";
					html += "<p class='list-address'>" + 'Nationality: '+'<b>'+ value.nationality +'</b>'+", "+'Relegion: ' +'<b>'+ value.relegion +'</b>'+ "</p>";
				

					html += "</p>"

					}*/

				

	            });
	            html += '</div>';
            } else {
            	html += '<div class="alert alert-warning">';
				  html += 'No records found!';
				html += '</div>';
            }

            

            // Insert the HTML Template and display all employee records
			$("#nt-list").html(html);
        }
    });
}


function resetForm() 
{
	$('#form_nt')[0].reset();
}


$(document).ready(function() {

	all();	 
});