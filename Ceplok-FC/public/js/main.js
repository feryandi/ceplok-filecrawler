function PopulateResult(results) {
	for (var i in results) {
		var result = results[i];
		$("#results").append("<li>" + result.Preview + "</li>");
		$("#results").append("<li>" + result.Path + "</li>");
	}
}

function RegisterHandler() {
	$("#query-form").submit(function() {
		Query();
		return false;
	});
	$("#menu-button").click(function() {
		$("#menu").animate({
			left: "+= 40px"
		}, 500);
	});

}

function Query() {
	var eventSource = new EventSource("index.php");
	eventSource.onmessage = function(e) {
		var result = JSON.parse(e.data);
		console.log(e.data);
	}
	eventSource.onerror = function(e) {
		eventSource.close();
	}
}

$(document).ready(function() {
	RegisterHandler();
});