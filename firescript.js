

function filterGender(){
	const db = firebase.database();


//firebase retrieval function
//.once gets all the data
db.ref("hackers").on("value", (snap)=>{
//here we will get data 
//email is the field name

var data = snap.val();


var count = 1;


var table = document.getElementById("datatablesSimple");

		for (let i in data)
		{
			
			institution = data[i].institution;
			count++;
			if(choosenInsti==institution){
			row = table.insertRow(count);
		
			id = data[i].id;
			email = data[i].email;
			department = data[i].department;
			gender = data[i].gender;
			age = data[i].age;
			
			level = data[i].level;
			names = data[i].name;
			role = data[i].role;
			studentNumber =data[i].studentNumber;
			surname = data[i].surname;
			verified = data[i].verified;
			
		  
			var nameCell = row.insertCell(0);
			var surnameCell = row.insertCell(1);
			var idCell = row.insertCell(2);
			var ageCell = row.insertCell(3);
			var genderCell = row.insertCell(4);
			var institutionCell = row.insertCell(5);
			var studCell = row.insertCell(6);
			var departmentCell = row.insertCell(7);
			var levelCell = row.insertCell(8);
			var RoleCell = row.insertCell(9);
			var emailCell = row.insertCell(10);
			var verifiedCell = row.insertCell(11);


			genderCell.innerHTML =    gender;
			institutionCell.innerHTML = institution;



		nameCell.innerHTML = names;
		idCell.innerHTML = id;
		emailCell.innerHTML = email;
		surnameCell.innerHTML = surname;
		RoleCell.innerHTML = role;
		studCell.innerHTML = studentNumber;
		departmentCell.innerHTML = department;
		verifiedCell.innerHTML = verified;
		ageCell.innerHTML = age;
		levelCell.innerHTML = level;

			}else{
				console.log("not found")
			}
		}
});

}






function filter(){
	const choosenInsti = document.getElementById("institution").value;
 	const choosenGender = document.getElementById("gender").value;
 	const empty = 'null';



	if(choosenInsti==empty && choosenGender==empty){
		console.log("all are empty");
	}else if(choosenGender==empty){
		window.location.href = "findByInst.html?"+choosenInsti;

	}else if(choosenInsti==empty){
		window.location.href = "findByGender.html?"+choosenGender;
	}
	else{
		console.log("both selected");
		window.location.href = "findByBoth.html?"+choosenGender+"|"+choosenInsti;
	}


}

function display(){
const db = firebase.database();
var members = 1;

//firebase retrieval function
//.once gets all the data
db.ref("hackers").on("value", (snap)=>{
//here we will get data 
//email is the field name

var data = snap.val();


var count = 1;
var members = 0;

var table = document.getElementById("datatablesSimple");

		for (let i in data)
		{
			count++;
			members++;
			
			console.log(members);
			row = table.insertRow(count);
		
			id = data[i].id;
			email = data[i].email;
			department = data[i].department;
			gender = data[i].gender;
			age = data[i].age;
			institution = data[i].institution;
			level = data[i].level;
			name = data[i].name;
			role = data[i].role;
			studentNumber =data[i].studentNumber;
			surname = data[i].surname;
			verified = data[i].verified;

			
			var nameCell = row.insertCell(0);
			var surnameCell = row.insertCell(1);
			var idCell = row.insertCell(2);
			var ageCell = row.insertCell(3);
			var genderCell = row.insertCell(4);
			var institutionCell = row.insertCell(5);
			var studCell = row.insertCell(6);
			var departmentCell = row.insertCell(7);
			var levelCell = row.insertCell(8);
			var RoleCell = row.insertCell(9);
			var emailCell = row.insertCell(10);
			var verifiedCell = row.insertCell(11);


			genderCell.innerHTML =    gender;
			institutionCell.innerHTML = institution;



		nameCell.innerHTML = name;
		idCell.innerHTML = id;
		emailCell.innerHTML = email;
		surnameCell.innerHTML = surname;
	  
		RoleCell.innerHTML = role;
		studCell.innerHTML = studentNumber;
		departmentCell.innerHTML = department;
		verifiedCell.innerHTML = verified;
		ageCell.innerHTML = age;
		levelCell.innerHTML = level;
		document.getElementById("report").innerHTML ="Number of registered students		: "+ members;



		}
		
});






}



function displayByInt(){
	const db = firebase.database();
var inst = location.search.substring(1);
var choosenInst = inst.replaceAll("%20"," ");

	//firebase retrieval function
	//.once gets all the data
	db.ref("hackers").on("value", (snap)=>{
	//here we will get data 
	//email is the field name
	
	var data = snap.val();
	
	
	var count = 1;
	var members = 1;


	var found = false;
	var table = document.getElementById("datatablesSimple");

			for (let i in data)
			{
				count++;
				
			
				institution = data[i].institution;
				if(choosenInst==institution){
					console.log("institution found");
					members++;
					found = true;
					row = table.insertRow(members);
			
					id = data[i].id;
					email = data[i].email;
					department = data[i].department;
					gender = data[i].gender;
					age = data[i].age;
					
					level = data[i].level;
					name = data[i].name;
					role = data[i].role;
					studentNumber =data[i].studentNumber;
					surname = data[i].surname;
					verified = data[i].verified;
					
				  
					var nameCell = row.insertCell(0);
					var surnameCell = row.insertCell(1);
					var idCell = row.insertCell(2);
					var ageCell = row.insertCell(3);
					var genderCell = row.insertCell(4);
					var institutionCell = row.insertCell(5);
					var studCell = row.insertCell(6);
					var departmentCell = row.insertCell(7);
					var levelCell = row.insertCell(8);
					var RoleCell = row.insertCell(9);
					var emailCell = row.insertCell(10);
					var verifiedCell = row.insertCell(11);
		
		
					genderCell.innerHTML =    gender;
					institutionCell.innerHTML = institution;
		
		
		
				nameCell.innerHTML = name;
				idCell.innerHTML = id;
				emailCell.innerHTML = email;
				surnameCell.innerHTML = surname;
			  
				RoleCell.innerHTML = role;
				studCell.innerHTML = studentNumber;
				departmentCell.innerHTML = department;
				verifiedCell.innerHTML = verified;
				ageCell.innerHTML = age;
				levelCell.innerHTML = level;

				}
				
				
	
			}

			if((members-1)>0){
				document.getElementById("report").innerHTML ="Number of registered students	at "+choosenInst+" :"+ (members-1);
			}else{
				document.getElementById("nostudents").innerHTML ="There are no students from "+ choosenInst ;
			}
	});
	
	
	
	
	
	
	}




function displayByGender(){
		const db = firebase.database();
	var inst = location.search.substring(1);
	var choosenGender = inst.replaceAll("%20"," ");
	
		//firebase retrieval function
		//.once gets all the data
		db.ref("hackers").on("value", (snap)=>{
		//here we will get data 
		//email is the field name
		
		var data = snap.val();
		
		
		var count = 1;
		var members = 1;
		var found = false;
		var table = document.getElementById("datatablesSimple");
	
				for (let i in data)
				{
					count++;
					

					//value we want to search for
					gender = data[i].gender;
					
					if(choosenGender.trim()==gender.trim()){
						
						members++;
						found = true;
						row = table.insertRow(members);
				
						id = data[i].id;
						email = data[i].email;
						department = data[i].department;
						institution = data[i].institution;
						age = data[i].age;
						
						level = data[i].level;
						name = data[i].name;
						role = data[i].role;
						studentNumber =data[i].studentNumber;
						surname = data[i].surname;
						verified = data[i].verified;
						
					  
						var nameCell = row.insertCell(0);
						var surnameCell = row.insertCell(1);
						var idCell = row.insertCell(2);
						var ageCell = row.insertCell(3);
						var genderCell = row.insertCell(4);
						var institutionCell = row.insertCell(5);
						var studCell = row.insertCell(6);
						var departmentCell = row.insertCell(7);
						var levelCell = row.insertCell(8);
						var RoleCell = row.insertCell(9);
						var emailCell = row.insertCell(10);
						var verifiedCell = row.insertCell(11);
			
			
						genderCell.innerHTML =    gender;
						institutionCell.innerHTML = institution;
			
			
			
					nameCell.innerHTML = name;
					idCell.innerHTML = id;
					emailCell.innerHTML = email;
					surnameCell.innerHTML = surname;
				  
					RoleCell.innerHTML = role;
					studCell.innerHTML = studentNumber;
					departmentCell.innerHTML = department;
					verifiedCell.innerHTML = verified;
					ageCell.innerHTML = age;
					levelCell.innerHTML = level;
	
					}
					
		
		
				}
	
				if((members-1)>0){
					document.getElementById("report").innerHTML ="Number of "+choosenGender+" students	:"+(members-1);
				}else{
					document.getElementById("nostudents").innerHTML ="There are no "+choosenGender+" students" ;
				}
		});

		}
		function logout() {
			// Your logout logic here, e.g., clearing session, redirecting, etc.
			console.log('User logged out');
			window.location.href = 'index.html'; // Redirect to index.html after logout
		}

function displayByBoth(){
			const db = firebase.database();
		var inst = location.search.substring(1);
		var combained = inst.split("|");
	   
		var choosenGender = combained[0];
		var choosenInst = combained[1].replaceAll("%20"," ");
		
		console.log(choosenGender," and ",choosenInst);

			//firebase retrieval function
			//.once gets all the data
			db.ref("hackers").on("value", (snap)=>{
			//here we will get data 
			//email is the field name
			
			var data = snap.val();
			
			
			var count = 1;
			var members = 1;

			var found = false;
			var table = document.getElementById("datatablesSimple");
		
					for (let i in data)
					{
						count++;
						
						//value we want to search for
						gender = data[i].gender;
						institution = data[i].institution;
						if(choosenGender.trim()==gender.trim()&&choosenInst.trim()==institution.trim()){
						
							members++;
							found = true;
							row = table.insertRow(members);
					
							id = data[i].id;
							email = data[i].email;
							department = data[i].department;
							
							age = data[i].age;
							
							level = data[i].level;
							name = data[i].name;
							role = data[i].role;
							studentNumber =data[i].studentNumber;
							surname = data[i].surname;
							verified = data[i].verified;
							
						  
							var nameCell = row.insertCell(0);
							var surnameCell = row.insertCell(1);
							var idCell = row.insertCell(2);
							var ageCell = row.insertCell(3);
							var genderCell = row.insertCell(4);
							var institutionCell = row.insertCell(5);
							var studCell = row.insertCell(6);
							var departmentCell = row.insertCell(7);
							var levelCell = row.insertCell(8);
							var RoleCell = row.insertCell(9);
							var emailCell = row.insertCell(10);
							var verifiedCell = row.insertCell(11);
				
				
							genderCell.innerHTML =    gender;
							institutionCell.innerHTML = institution;
				
				
				
						nameCell.innerHTML = name;
						idCell.innerHTML = id;
						emailCell.innerHTML = email;
						surnameCell.innerHTML = surname;
					  
						RoleCell.innerHTML = role;
						studCell.innerHTML = studentNumber;
						departmentCell.innerHTML = department;
						verifiedCell.innerHTML = verified;
						ageCell.innerHTML = age;
						levelCell.innerHTML = level;
		
						}
						
			
			
					}
		
					if((members-1)>0){

						document.getElementById("report").innerHTML ="Students registered  :"+(members-1)+"<br>Students Gender      :"+choosenGender+"<br>Students Institution : "+choosenInst ;
					}else{
						document.getElementById("nostudents").innerHTML ="There are no "+choosenGender+" students at "+choosenInst ;
					}
			});
	
			}