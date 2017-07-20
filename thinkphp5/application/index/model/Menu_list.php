<?php

	namespace app\index\model;
	use think\Db;
	use think\Model;

	class Menu_list extends Model
	{
		//查询商家对应的菜单-------商家缺失
		public function select_menu()
		{
			$menu = $this->field('menu_id,menu_name,menu_icon,menu_price')->select();
			return $menu;
		}
		//根据菜品id，查询菜品详情
		public function select_menu_detail($menu_id)
		{
			$menu = $this->field('menu_id,menu_name,menu_icon,menu_price,menu_info')->where('menu_id','=',$menu_id)->select();
			return $menu;
		}
		//商品加入购物车
		public function add_cart($data)
		{
			$cart = Db::name('shop_cart')->insert($data);
			return $cart;
		}
		//查询购物车----------(对应店铺暂缺)
		public function select_cart($user_id)
		{
			$cart_details = Db::name('shop_cart')->field('menu_id,menu_name,menu_price,menu_icon,menu_num')->where('user_id','=',$user_id)->select();
			return $cart_details;
		}
	}