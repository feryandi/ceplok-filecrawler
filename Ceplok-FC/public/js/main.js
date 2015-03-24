function PopulateResult(results) {
	for (var i in results) {
		var result = results[i];
		console.log(result.Title);
		console.log(result.Path);
		$("#results").append("<li><a href=\"file:///" + result.Path + "\">" + result.Title + "</a></li>");
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
				var obj = JSON.parse(data);
				PopulateResult(obj.Docs);
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