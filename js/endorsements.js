function Jfalse() {
	return 0;
}
function clear() {
	localStorage.removeItem("name");
	localStorage.removeItem("date");
	localStorage.removeItem("comment");
}
function saveName() {
	localStorage.name= document.getElementById("name").value;
}
function saveDate() {
	localStorage.date= document.getElementById("date").value;
}
function saveComment() {
	localStorage.comment= document.getElementById("comment").value;
}
function load() {
	if (localStorage.name) {
		localStorage.name= document.getElementById("name").value= localStorage.name;
	};
	if (localStorage.date) {
		localStorage.date= document.getElementById("date").value= localStorage.date;
	};
	if (localStorage.comment) {
		localStorage.comment= document.getElementById("comment").value= localStorage.comment;
	}
}
function display() {
	var initial = "";
	var toPrint = JSON.parse(localStorage.endorsements);
	for (var i = 0; i < toPrint.length; i++) {
		initial += toPrint[i].name + " " + toPrint[i].date + " " + toPrint[i].comment + "<br>";
	};
	document.getElementById("endorsements").innerHTML = initial;
}
function storeEndorsement() {
	var initialName;
	var initialdate = "00-00-0000";
	var initialComment;
	var name = document.getElementById("name").value;
	var date = document.getElementById("date").value;
	var comment = document.getElementById("comment").value;
	clear();
	initialName = "";
	initialdate = "";
	initialComment = "";
	document.getElementById("name").innerHTML = initialName;
	var myJson = [];
	if (localStorage.endorsements) {
		myJson = JSON.parse(localStorage.endorsements);
	};
	myJson.push({"name":name, "date":date, "comment":comment});
	var toStore = JSON.stringify(myJson);
	localStorage.endorsements = toStore;
	display();
}
function sortName() {
	if (localStorage.endorsements) {
		var allEndos = JSON.parse(localStorage.endorsements);
		allEndos.sort(function(a,b) {
			if (a.name < b.name) return -1;
			if (a.name > b.name) return 1;
			return 0;
		});
		localStorage.endorsements = JSON.stringify(allEndos);
	}
	display();
}
function sortDate() {
	if (localStorage.endorsements) {
		var allEndos = JSON.parse(localStorage.endorsements);
		allEndos.sort(function(a,b) {
			if (a.date < b.date) return -1;
			if (a.date > b.date) return 1;
			return 0;
		});
		localStorage.endorsements = JSON.stringify(allEndos);
	}
	display();
}

function AJAXdisplay() {
	console.log("ajaxDisplay");
	setInterval(function(){
		console.log("setInterval");
		$.ajax({
		cache: false,
		url: "endors.json",
		dataType: "json",
	})

	.done(function(table){
		var newTable = JSON.stringify(table);

		localStorage.endorsements = newTable;

		display();
	});
},5000);
	
}

/*function print(){ 
	if (localStorage.endorsements){
		var input="";
		var toprint = JSON.parse(localStorage.endorsements);
		input += "<table>";
		input += "<tr><th><h3><strong>Name</strong></h3></th><th><h3><strong>Date</strong></h3></th><th><h3><strong>Comment</strong></h3></th></tr>"
		for (var i = 0; i < toprint.length; i++) {
			input += "<tr><td>"+toprint[i].name+"</td><td>"+toprint[i].date+"</td><td>"+toprint[i].comment+"</td></tr>";
		}
		input += "</table>";
		document.getElementById("endorsements").innerHTML = input;
	}
}*/

function checktable (){
	AJAXdisplay();
	//setInterval(AJAXdisplay,1000);
}