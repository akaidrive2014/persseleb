<?php
Class TimerController extends AdminController{
	public function actionSecond(){
		echo "<li>
						<a><span>".date('d')."</span>".date('F Y')."</a>
					</li>
					<li>
						<a><span>".date('H')."</span>".date('i:s')."</a>
					</li>";
	}
}
