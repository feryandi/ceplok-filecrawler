function PopulateResult(results) {
	for (var i in results) {
		var result = results[i];
		$("#results").append("<li>" + result.Preview + "</li>");
		$("#results").append("<li>" + result.Path + "</li>");
	}
}

function Register() {
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
}

$(document).ready(function() {
	Register();
});