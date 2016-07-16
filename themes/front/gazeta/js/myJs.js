$(function(){
	/*paging auto ala facebook*/
	var i = 1;
	/*$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			i++;
			//$('.load-menu').load('?page='+i);
			var sumPage = parseInt($('#sumPageButtons').html());
			//console.log(i+"<="+sumPage);
			if(i<=sumPage){
				$('.loader').show();
				
				$.post('?page='+i,function(data){
					$('.related-posts ul').append(data);
					$('.loader').hide();
				});
			}
		}
	});*/
	$(".loadMore").click(function(){
		var sumPage = parseInt($('#sumPageButtons').html());
		i++;
		if(i<=sumPage){
			$('.loader').show();
			
			$.post('?page='+i,function(data){
				$('.related-posts ul').append(data);
				$('.loader').hide();
			});
			if(i==sumPage){
				$(".loadMore").hide();
			}
		}else{
			$(".loadMore").hide();
		}
		return false;
	});
	/*end paging ala facebook*/
	$('form.newsletter').on("keyup keypress", function(e) {
		var code = e.keyCode || e.which;
		if (code  == 13) {
			e.preventDefault();
			return false;
		}
	});
	$('#subscribe').click(function(){
		$("#subscribe").attr({
			'disabled':true
		}).val('Subscribing...');
		var form = $(".newsletter");
		$.post(form.attr('action'),form.serialize(),function(response){
			if(response.success==true){
				form[0].reset();
				$(".successMessage").html(response.message).fadeIn();
				$(".errorMessage").empty().hide();
			}else{
				$(".successMessage").empty();
				if(response.SBEmail_email){
					$(".errorMessage").html(response.SBEmail_email).fadeIn();
				}else{
					$(".errorMessage").empty().hide();
				}
			}
			$("#subscribe").attr({
				'disabled':false
			}).val('Subscribe');
		},'json');
	});
});
