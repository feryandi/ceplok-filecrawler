function PopulateResult(result) {
	$("#results").append("<li>" + result.Preview + "</li>");
	$("#results").append("<li>" + result.Path + "</li>");
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

function RegisterHandler() {
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
				$("#result-nothing").hide();
				/*Showing Result*/
				var prevDiv = document.createElement("div");
				var pathDiv = document.createElement("div");

				pathDiv.innerHTML = result.Path;
				$(pathDiv).addClass('result-path');

				prevDiv.innerHTML = result.Preview;
				$(prevDiv).addClass('result');

	        	$("#result-list").append(prevDiv);
	        	$(prevDiv).append(pathDiv);
			}
		}
		eventSource.onerror = function(e) {
			eventSource.close();
		}
	}
}
$(document).ready(function() {
	RegisterHandler();
});