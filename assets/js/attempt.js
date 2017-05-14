(function() {
  	'use strict';

  	////////////////////////////////////////
	// Text Editor
	///////////////////////////////////////
	var editor = ace.edit("editor-area");
	var mode = $('.lang select').val();

	editor.setTheme("ace/theme/monokai");
	editor.getSession().setMode("ace/mode/c_cpp");

	// Setting the mode of selected language
	$('.lang select').on('change', function(){
		var newMode = $('.lang select').val();
		editor.getSession().setMode("ace/mode/" + newMode);
	});


	var httpRequest = new XMLHttpRequest();

	var compileBtn = document.getElementById('compile');
	var submitBtn = document.getElementById('submit');
	var output = document.querySelector('#output');
	var reqPage = document.querySelector('.editor').dataset.reqpage;

	if(reqPage == 'practice') {
		// FETCH QUESTION ID
		var qid = document.querySelector('.editor').dataset.qid;

	}
	else if(reqPage == 'test') {
		// FETCH TEST AND QUESTION ID BOTH
		var tid = document.querySelector('.editor').dataset.tid;
		var qid = document.querySelector('.editor').dataset.qid;

	}


	compileBtn.onclick = () => {
		let code = editor.getSession().getValue();
		
		output.innerHTML = ' ';
		if (!httpRequest) {
	      alert('Error in making a ajax request');
	    }
	    else {
	    	httpRequest.onreadystatechange = compileCode;
	    	httpRequest.open('POST', 'compile.php');
	    	httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			httpRequest.send('reqPage='+reqPage+'&code='+code+'&qid='+qid);
		}
	}
	function compileCode() {
	   if (httpRequest.readyState === XMLHttpRequest.DONE) {
	    	if (httpRequest.status === 200) {
	        	output.innerHTML = httpRequest.responseText;
	 			
	 			if(output.innerHTML != "") {
					output.style.display = 'block';
					window.location = 'attempt.php#output';
		   		}
	     	} 
	     	else {
	      	output.innerHTML = "Can't able to compile the code";
	      }
	   }
	}

	submitBtn.onclick = () => {
		let code = editor.getSession().getValue();
		
		output.innerHTML = ' ';
		if (!httpRequest) {
	      alert('Error in making a ajax request');
	    }
	    else {
	    	httpRequest.onreadystatechange = submitCode;
	    	httpRequest.open('POST', 'submit.php');
	    	httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	    	if(reqPage == 'practice') {
				httpRequest.send('reqPage='+reqPage+'&code='+code+'&qid='+qid);
			}
			else if(reqPage == 'test') {
				httpRequest.send('reqPage='+reqPage+'&code='+code+'&tid='+tid+'&qid='+qid);
			}

		}
	}
	function submitCode() {
	   if (httpRequest.readyState === XMLHttpRequest.DONE) {
	    	if (httpRequest.status === 200) {
	        	output.innerHTML = httpRequest.responseText;
	 			
	 			if(output.innerHTML != "") {
					output.style.display = 'block';
					window.location = 'attempt.php#output';
		   	}
	     	} 
	     	else {
	      	output.innerHTML = "Can't able to compile the code";
	      }
	   }
	}

})();