<?php
class SBPageBanner extends CFormModel {
	
	/*deklarasi public variabel*/
	public $banner_title;
	public $banner_image;
	
	/**
	 * deklarasi validatasi
	 * yang menyatakan username dan password harus diisi.
	 */
	public function rules() {
		return array(
			// username dan password dibutuhkan
			array('banner_title, banner_image', 'required'),
			// password akan diauthenticated
		);
	}
	
	public function data($id){
		$DATA =  SBPage::model()->findByPk($id);
		if(!empty($DATA) && !empty($DATA->page_banners)){
			$Banner = json_decode($DATA->page_banners);
			$Banner = $Banner->banner;
			$this->banner_title = $Banner->banner_title;
			$this->banner_image = $Banner->banner_image;	
		}
		return;
	}
	public function update($id){
		$DATA =  SBPage::model()->findByPk($id);
		if(!empty($DATA)){
			$data = array(
				'banner'=>array(
					'banner_title'=>$this->banner_title,
					'banner_image'=>$this->banner_image,
				)
			);
			$DATA->page_banners = json_encode($data);
			if($DATA->save(FALSE)){
				return true;
			}
		}
	}
}