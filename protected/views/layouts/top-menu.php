<?php
function getNewsByCategoryID($category_id) {
	/*criteria order by*/
	$criteria = new CDbCriteria( array('order' => 'news_date DESC', 'condition' => 'category_id LIKE :criteria', 'params' => array(':criteria' => "%{$category_id}%")));
	$model = SBNews::model() -> findAll($criteria);
	return $model;
	/*hitung jumlah data*/
}

function getCategoryNews() {
	$ParentCategories = SBNewsCategory::model() -> findAll(array('order' => 'category_name ASC'));
	if (!empty($ParentCategories)) {
		$menuCategory = "<ul class=\"nav navbar-nav navbar-left\">";
		foreach ($ParentCategories as $menuu) {
			$categoryID=getNewsByCategoryID($menuu -> category_id);	
			if (!empty($categoryID)) {

				$menuCategory .= "<li>";
				$menuCategory .= "<a href='" . $menuu -> url_link . "'>{$menuu->category_name}</a>";

				$menuCategory .= "</li>";
			}
		}
		$menuCategory .= "</ul>";
	}
	return empty($menuCategory) ? '' : $menuCategory;
}

function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat(" ", $i);
	if (!empty($data[$parent])) {
		if (empty($parent)) {
			$html = "$tab<ul class=\"nav navbar-nav navbar-left\">";
		} else {
			$html = "$tab<ul class=\"nav navbar-nav navbar-left\">";
		}
		$i++;
		$number = 1;
		foreach ($data[$parent] as $menu) {
			$home_icon = $menu->positions == 0 ? '<i class="fa fa-home"></i>' : '';
			$link = $menu -> link;
			$css = '';
			if ($menu -> link == Website::catchFullUrl()) {
				$css = 'active';
			}
			$blog = "";
			if ($menu -> action == 'link-to-module' && $menu -> module == 'blog') {
				$blog = getCategoryNews();
			}
			$child = get_menu($data, $menu -> menu_id);
			$html .= "$tab<li class=\"parent {$css}\">";
			$products = "";
			$html .= "<a href='{$link}' target='{$menu -> target}'>{$home_icon} {$menu -> menu_name} </a>{$blog}";
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "$tab";
			}
			$html .= '</li>';
			$number++;
		}
		$html .= "$tab</ul>";
		return $html;
	} else {
		return false;
	}
}
$MENU = SBMenu::model() -> findAll(array('order' => 'positions ASC'));
foreach ($MENU as $menu) {
	$data[$menu -> parent_id][] = $menu;
}
echo get_menu($data);
?>