
  var txt = Array("1","2","3"); //array containing id's of all the textboxes
  var ansIndex=4;

     function checkFields(){

     	var z = document.getElementById("hidden_field");
     	var ansVal = z.value;
     	console.log(ansVal);
     	for (; ansIndex <= ansVal; ansIndex++) {
     		
     		txt.push(ansIndex.toString());
     		x = document.getElementById(ansIndex.toString());
     		x.onkeyup = checkFields;
     	};

		 var i, x, flag = false, count = 0, limit = txt.length;

         for(i = 0; i < limit; i++){
	     	x = document.getElementById(txt[i]);
	     	
            if(x.value != ''){
			 	count++;
			 	console.log(count);
		     }

          	if ( count == ansVal){
		 		flag = true;
                break;
	     	}
	 	}

		 x = document.getElementById('submit'); // s1 is the id of the submit button
			 if( flag) {
		        x.disabled = false;
			 }
		      else {
		         x.disabled = true;
			 }
	     }

	     window.onload = function(){
	         var submitB = document.getElementById('submit'); // s1 is the id of the submit button
	         submitB.disabled = true;
	         var i, x, limit = txt.length;
		 	for(i = 0; i < limit; i++){
		     x = document.getElementById(txt[i]);
	             x.onkeyup = checkFields;
		 	}
    }

