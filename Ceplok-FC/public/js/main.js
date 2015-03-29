function PopulateResult(result) {
	$("#result-nothing").hide();
	var prevDiv = document.createElement("div");
	var link = document.createElement("a");
	var pathDiv = document.createElement("div");

	link.innerHTML = result.Path;
	link.href = "open.php?path=" + result.Path;
	link.target = "_blank";
	$(pathDiv).append(link);
	$(pathDiv).addClass('result-path');

	prevDiv.innerHTML = result.Preview;
	$(prevDiv).addClass('result');

	$("#result-list").append(prevDiv);
	$(prevDiv).append(pathDiv);;
}
/*
function UpdateCounter(checked, total) {
	$("#counter").text(checked + '/' + total);
}*/

function UpdateCounter(checked, total) {
	$("#counter").text(checked + '/' + total);
	$("#loader").css('width', ( ( checked / total ) * 100 + '%') ) ;
	if ( checked >= total ) {
		$("#loader").css('width', ( '0%') ) ;
		/*$('html, body').animate({
	        scrollTop: $("#result-list").offset().top
	    }, 500);*/

		  var e = document.getElementById('result-slide');

		  e.style.animation = 'goOut 0.5s 0s linear forwards';
		  e.style.webkitAnimation = 'goOut 0.5s 0s linear forwards';
		  e.style.mozAnimation = 'goOut 0.5s 0s linear forwards';		
	}

}


var eventSource = null;

function Query() {
	if (eventSource === null || eventSource.readyState == EventSource.CLOSED) {
		eventSource = new EventSource("index.php?" + $("#query-form").serialize());
		eventSource.onmessage = function(e) {
			var result = JSON.parse(e.data);
			if (result.OutputType == 0) {
				UpdateCounter(result.Checked, result.Total);
			}
			if (result.OutputType == 1) {
				PopulateResult(result);
			}
			
		}
		eventSource.onerror = function(e) {
			eventSource.close();
		}
	}
}

function RegisterHandler() {
	$(window).unload(function() {
		if (eventSource != null)
			eventSource.close();
	});
	$("#query-form").submit(function() {
		$(".result").remove();
		$("#result-nothing").show();
		$("#result-list").show();
		Query();
		return false;
	});
	$("#menu-button").click(function() {
		$("#menu").animate({
			left: "+= 40px"
		}, 500);
	});
	var queryclick = 0;
	$("#query-textbox").click(function(){
		if (queryclick == 0) {
			$("#query-textbox").val("");
			++queryclick;
		}
	});
<<<<<<< HEAD
}

var eventSource = null;

function Query() {
	if (eventSource === null || eventSource.readyState == EventSource.CLOSED) {
		eventSource = new EventSource("index.php?" + $("#query-form").serialize());
	
		eventSource.onmessage = function(e) {
			console.log("xxxa");
			var result = JSON.parse(e.data);
			if (result.OutputType == 0) {
				UpdateCounter(result.Checked, result.Total);
			}
			if (result.OutputType == 1) {
				console.log("aaaaaa");

				$("#result-nothing").hide();
				var prevDiv = document.createElement("div");
				var pathDiv = document.createElement("div");

				pathDiv.innerHTML = result.Path;
				$(pathDiv).addClass('result-path');

				prevDiv.innerHTML = result.Preview;
				$(prevDiv).addClass('result');

	        	$("#result-list").append(prevDiv);
	        	$(prevDiv).append(pathDiv);
			}
			
=======
	var sdirclick = 0;
	$("#sdir").click(function(){
		if (sdirclick == 0) {
			$("#sdir").val("");
			++sdirclick;
>>>>>>> d95d7f0b455548359275bc9e33f8e18d70fd8120
		}
	});
}

$(document).ready(function() {
	RegisterHandler();
});