// TO DO
// •	Kunde ej komma åt lösenord till ellasadmin databas så lånade eriks. Registrera en ny användare för att testa. Lösenord hashas på servern. Så to do: Fixa egen databas.

// •	Fixa sökfunktion och lägga in resultat i table - kunna söka på företagsnamn och filtrera på typ
// •	Knyta location-info till ikon (vilket rum i lokalen räcker med en popup)
// •	ladda info om företag som visas i companyview vid klick på företag
// •	populera table med företag - done
// •	lägga till/ta bort företag som favorit via stjärnikon i companyview.html
// •	Fixa login validering - done
// •	Fixa ny användare - done



var validate = function() {
	//Verifies user information
	//checks with database
	var username = document.getElementById("username").value;
	var password = document.getElementById("pwrd").value;
	$.ajax({
		url:"php/validate.php",
		type: "GET",
		data:{uname:username, pword:password},
		dataType: 'JSON',
		success: function(data) {
			if(data==1) {
				Cookies.set("uname", username);
				window.location.href="startview.html";
			} else {
				alert("Fel användarnamn eller lösenord!");
			}
			console.log(data);

		}
	})

}

var newUser = function() {
	//creates new user a.k.a. inserts new user info into database
	//and then continues in as specified user
	var username = document.getElementById("username").value;
	var password = document.getElementById("pwrd").value;
	console.log(username);
	if(username=="" || username=="Username") {
		alert("You must enter name and password");
	} else {
		
		$.ajax({
			url:"php/newuser.php",
			type: "POST",
			data: {uname: username, pword: password},
			dataType: 'JSON',
			success: function(data) {
				console.log(data);
				if(data) {
					Cookies.set("uname", username);
					window.location.href="startview.html";
				} else {
					alert("Username already taken.");
				}
				

			}
		})
	}
}


function setCurrentUser() {
	//sets current user in statusfield
	//implement as logout option?
	document.getElementById("currUser").innerHTML=Cookies.get("uname");
}

var goBack = function () {
	//Go back button	
	window.history.back();
}

var loadCompPage = function (companyname) {
	//when company in list or searchresult tapped
	//gets company info  and inserts it into page companyview.html
	//then loads that page
	var cname = companyname.innerHTML;
	console.log("compname "+ cname);
	// Jag tror det kan lösaas genom att sätta en &=<företagsnamn> här så att man senare kan hämta den med en GET
	// så kan php få ladda in företaget sen.
	window.location.href="companyview.html";
	console.log("COMPANY JAO");
}


var getFavorites = function () {
	populateTable();
}


var populateTable = function () {

	//var companies = Cookies.get("listcomp"); 	//.split(",");
	//console.log(companies);

	var table = document.getElementById("table");

	$.ajax({
		url:"php/getcompanies.php",
		type: "GET",
		dataType: 'JSON',
		success: function(data) {
			console.log(data);
			for(i=0; i<data.length; i++) {
				table.insertRow(i).insertCell(0).innerHTML="<p onclick='loadCompPage(this)'>"+data[i]+"</p>";
			}
		}
	})

}

var setFavorite = function () {
	//when bookmark icon clicked in companyview.html
	//inserts company information into favorites database

	var favIcon = document.getElementById("favCompView");

	if(favIcon.src.search("fav.png") != -1) {
		favIcon.src="css/images/favok.png";
		console.log("not fav.png")
		//alert(Cookies.get("cname")+" added to favorites!");
		//add favorite
	} else {
		//remove favorite
		//alert(Cookies.get("cname")+" removed from favorites!");
		favIcon.src="css/images/fav.png";
	}
	
	
	//alert("FAV SET JAO");

}


	//Sök företag
		//Vid klick laddas ny view
		//Sidan innehåller: Tillbakaknapp, filteralternativ, 
		//rensa filter
		//Searchbar
		//laddar resultat i form av en tabell
		//Inserta till tabellen med ajax?
	//Bokmärken
		//Vid klick laddas ny view
		//Sidan innehåller: Tillbakaknapp, lista med favoriter
		//Vid klick på favorit tas man till companyview
			//COmpanyview innehåller tillbakaknapp och favoritikon
			//möjlighet att ta lägga till/ta bort favorit
	//Företagslista
		//Vid klick laddas ny view
		//Innehåller: tillbakaknapp samt scrollbar lista med företag
		//Vid klick på favorit tas man till companyview
			//COmpanyview innehåller tillbakaknapp och favoritikon
			//möjlighet att ta lägga till/ta bort favorit
	//Karta
		//Vid klick laddas layoutkarta
		//Implementera som dummy?

	//Logga ut
	


