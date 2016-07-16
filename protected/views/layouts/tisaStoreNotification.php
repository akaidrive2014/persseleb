<ul id="noty_topCenter_layout_container" class="i-am-new" style="display:none;top: 20px; position: fixed; width: 310px; height: auto; margin: 0px; padding: 0px; list-style-type: none; z-index: 10000000; left: 485px;">
    <li class="tisa_theme noty_container_type_alert" style="width: 310px;">
        <div class="noty_bar noty_type_alert" id="noty_653321758757014300">
            <div class="noty_message">
                <span class="noty_text">Notification position: topCenter</span><div class="noty_close"></div>
            </div>
        </div>
    </li>
</ul>

<div class="ui-ios-overlay success-x" style="display: none;"><span class="title">Success!</span><div class="icon-holder"><i class="fa fa-check"></i></div></div>
<!--ios-overlay-hide-->
<div class="ui-ios-overlay loading-x" style="display: none;"><span class="title">Loading</span><div class="icon-holder"><i class="fa fa-spinner fa-spin"></i></div></div>
<div class="ui-ios-overlay error-x" style="display: none;"><span class="title">Error</span><div class="icon-holder"><i class="fa fa-times"></i></div></div>


<script>
	$(function(){
		$(".noty_close").click(function(){
			$('.i-am-new').slideUp();
		});
	})
</script>