<?php
namespace app\index\model;
use think\DB;
use think\Model;

Class  Order  extends  Model
{
	//��ȡ�û������б���Ϣ
	public function userOrder($user_id)
	{
		
		$result = Db('online_user,online_order')
				 ->where("online_user.user_id =online_order.user_id")
				 ->select();
		
				return $result;
	}
	
	
	//�û������б���ѯ�û�����״̬��
	public function userOrderStatus($order_num)
	{
		
		$result = Db('online_order,order_status')
					->where("online_order.order_num=order_status.order_num")
					->select();
					
					return $result;
	}
	public function delUserOrder()
	{
		return Db::name('online_order')
					// ->where('order_id',input('order_id'))
					->where('order_num',input('order_num'))
					->where('user_id',session('user_id'))
					->delete();
	}
}
