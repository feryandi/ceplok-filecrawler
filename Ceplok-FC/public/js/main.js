function PopulateResult(results) {
	for (var i in results) {
		var result = results[i];
		console.log(result.Title);
		console.log(result.Path);
		$("#results").append("<li>" + result.Title + "</li>");
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
				var obj = JSON.parse(data);
				PopulateResult(obj.Docs);
			}
		});
		return false;
	});
}

$(document).ready(function() {
	Register();
});