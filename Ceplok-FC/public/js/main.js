function PopulateResult(results) {
	for (var i in results) {
		var result = results[i];
		$("#results").append("<li>" + result.Preview + "</li>");
		$("#results").append("<li>" + result.Path + "</li>");
	}
}

function RegisterHandler() {
	$("#query-form").submit(function() {
		var url = "/";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#query-form").serialize(),
			success: function (data) {
				console.log(data);
				console.log("HUHU");
			}
		});
		return false;
	});
	$("#menu-button").click(function() {
		$("#menu").animate({
			left: "+= 40px"
		}, 500);
	});

}

$(document).ready(function() {
	RegisterHandler();
});