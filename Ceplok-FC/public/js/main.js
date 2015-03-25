function PopulateResult(result) {
	$("#results").append("<li>" + result.Preview + "</li>");
	$("#results").append("<li>" + result.Path + "</li>");
}

function UpdateCounter(checked, total) {
	$("#counter").text(checked + '/' + total);
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
	var eventSource = new EventSource("index.php?" + $("#query-form").serialize());
	eventSource.onmessage = function(e) {
		var result = JSON.parse(e.data);
		if (result.OutputType == 0) {
			UpdateCounter(result.Checked, result.Total);
		}
		if (result.OutputType == 1) {
			
		}
	}
	eventSource.onerror = function(e) {
		eventSource.close();
	}
}
$(document).ready(function() {
	RegisterHandler();
});