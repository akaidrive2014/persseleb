$(function() {
	//call function modal
	modal();
	modalClose();
	$("#myModal").draggable({
    	handle: ".modal-body"
	}); 
	time();
});
//buat function modal
function modal() {
	$(".btn-x").click(function() {
		$("#myModal").modal('show');
	});
}
function modalClose(){
	$('#myModal').on('hidden.bs.modal', function () {
    	$(".view-x").empty();
	});
}
function loading(action){
	if(action=='hide'){
		$('.loading-x').hide();
	}
	if(action=='show'){
		$('.loading-x').show();
	}
}
function success(action){
	if(action=='hide'){
		$('.success-x').hide();
	}
	if(action=='show'){
		$('.success-x').show();
	}
}
function error(action){
	if(action=='hide'){
		$('.error-x').hide();
	}
	if(action=='show'){
		$('.error-x').show();
	}
}

function time(){
	$("#theme_switch li").click(function(){
		$(".side_nav_hover").addClass($(this).attr('title'));
		$.post('<?php echo $this->baseUrl().'/'.$this->admin;?>/panel/settheme','theme='+$(this).attr('title'),function(data){
			//$('.TIMER').html(data);
		});
	});
	
	setInterval(function(){
		var month = new Array();
		month[0] = "January";
		month[1] = "February";
		month[2] = "March";
		month[3] = "April";
		month[4] = "May";
		month[5] = "June";
		month[6] = "July";
		month[7] = "August";
		month[8] = "September";
		month[9] = "October";
		month[10] = "November";
		month[11] = "December";
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		
		var date = today.getDate();
		var montH = today.getMonth();
		var year = today.getFullYear();
		var time = '';
		time += '<li><a><span>'+date+'</span>'+month[montH]+' '+year+'</a></li><li>';
		time +='<a><span>'+h+'</span>'+m+':'+s+'</a>';
		time +='</li>';
		$('.TIMER').html(time);
		/*$.post('php echo $this->baseUrl().'/'.$this->admin;?>/timer/second',function(data){
			$('.TIMER').html(data);
		});*/
	},1000);
}