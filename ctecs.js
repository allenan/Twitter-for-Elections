//search function//last.fm metros are static. Instead ofloading new metros every time, just load with the script.
var classes = [
{"name": "metaphysical dragon compilers",
"department": "eecs", "number": "841", "professor": "Robby Findler",
    "scores": {"amount learned": 6, "difficulty": 6, "time spent": 6},
    "comments":[
                {"text": "Everyone else got a fruit roll-up.  Why didn't I get a fruit roll-up?",
                 "score": 97},
                 {"text": "This class is impossible without orange arrows.",
                 "score": 72},
                 {"text": "lolwut compilers is hardddd!!!",
                 "score": -2}
                ]},
    
{"name": "metaphysical dragon compilers", "department": "eecs", "number": "841", "professor": "Tom Jones",
    "scores": {"amount learned": 3, "difficulty": 2, "time spent": 3},
    "comments":[
                {"text": "Is it unusual that I didn't learn anythoing?",
                 "score": 57},
                 {"text": "Professor Jones sure sings a lot",
                 "score": 22},
                 {"text": "BURNING DOWN THE HOUSE!!!",
                 "score": -21}
                ]},
    
{"name": "left-handed underwater basket-weaving", "department": "UBW", "number": "348", "professor": "Morton Shapiro",
    "scores": {"amount learned": 6, "difficulty": 6, "time spent": 6},
    "comments":[
                {"text": "Everyone else got a fruit roll-up.  Why didn't I get a fruit roll-up?",
                 "score": 97},
                 {"text": "This class is impossible without orange arrows.",
                 "score": 72},
                 {"text": "lolwut compilers is hardddd!!!",
                 "score": -2}
                ]},
    
{"name": "metaphysical dragon compilers", "department": "EECS", "number": "841", "professor": "Robby Findler",
    "scores": {"amount learned": 6, "difficulty": 6, "time spent": 6},
    "comments":[
                {"text": "Everyone else got a fruit roll-up.  Why didn't I get a fruit roll-up?",
                 "score": 97},
                 {"text": "This class is impossible without orange arrows.",
                 "score": 72},
                 {"text": "lolwut compilers is hardddd!!!",
                 "score": -2}
                ]},
    
{"name": "metaphysical dragon compilers", "department": "EECS", "number": "841", "professor": "Robby Findler",
    "scores": {"amount learned": 6, "difficulty": 6, "time spent": 6},
    "comments":[
                {"text": "Everyone else got a fruit roll-up.  Why didn't I get a fruit roll-up?",
                 "score": 97},
                 {"text": "This class is impossible without orange arrows.",
                 "score": 72},
                 {"text": "lolwut compilers is hardddd!!!",
                 "score": -2}
                ]},
    
{"name": "metaphysical dragon compilers", "department": "EECS", "number": "841", "professor": "Robby Findler",
    "scores": {"amount learned": 6, "difficulty": 6, "time spent": 6},
    "comments":[
                {"text": "Everyone else got a fruit roll-up.  Why didn't I get a fruit roll-up?",
                 "score": 97},
                 {"text": "This class is impossible without orange arrows.",
                 "score": 72},
                 {"text": "lolwut compilers is hardddd!!!",
                 "score": -2}
                ]}]

//basic search function for query box search
function search() {
	var query = $('#query_box').val().toLowerCase();
        console.out(query);
	for (c in classes){
            if (c["name"] == query){
                buildCard(c);
            };
        }
        //report no classes found here
}

function detectEnter(e){
	if (e.keyCode == 13) {
		search();
        }
}

function buildCard(course){
	//le function: accepts a course structure, displays its relevant information as a card.	
	var name=course['name'];
	var dept=course['department'];
	
	
}

function buildSlate(course){
	//le function: accepts a course structure, and builds its intermediate slate representation	
	
}

function buildPage(course){
	//le function: accepts a course structure, and builds its full-blown representation	
	
}

function incfComment(course, index){
	course["comments"][index]["score"]++;
}

function decfComment(course, index){
	course["comments"][index]["score"]--;	
}

function buildArtistRepresentation(dictionary) {
	var photo = dictionary.image[4]["#text"];
	return "<p><a href=" + dictionary.url +"><img src='" + photo +  "' alt=" + dictionary.name + " class = 'image' title=" + dictionary.name + "/></a><br/>" + dictionary.name + "</p>";
}

