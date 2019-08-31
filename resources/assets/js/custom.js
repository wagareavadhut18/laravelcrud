
$(document).ready(function(){
	console.log("custom file");
	
	$(".editBtn").click(function(){
		var id = $(this).parents("tr").attr('post-id');
		var title = $(this).parents("tr").children().eq(1).text();
		var description = $(this).parents("tr").children().eq(2).text(); 
		
		$("#editModal").find("#pid").val(id);
		$("#editModal").find("#title").val(title);
		$("#editModal").find("#description").val(description);
	});

	var postValidator;
	postValidator = $("#PostsValidation").validate({

		submitHandler: function(form,event) {
			event.preventDefault();
			var ptitle = $(' #editModal #title').val();
			var pdescription = $(' #editModal #description').val();



			$.ajax({
				headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				type: 'POST',
				url: baseUrl + '/post/update',
				data: new FormData(form),
				contentType: false,
				cache: false,
				processData: false,
				success: function(response)
				{
					// alert("Record Updated Successfully");
					alert("Record Updated Successfully");
					var row = "#row_"+response.post.id;
					$(row).children().eq(1).text(response.post.title);
					$(row).children().eq(2).text(response.post.description);
					$('#editModal').modal('hide');
					
				},
				error:function(xhr) {
					postValidator.showErrors(xhr.responseJSON.errors);
				}
			});
		}
	});

});