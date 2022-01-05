<?php

namespace App\Http\Controllers;

use App\list_orders;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    function showOrder(){
        $list_client = list_orders::paginate(10);
        return view('order.showOrder',compact('list_client'));
    }

    function detailOrder($id){
        $list_item = list_orders::find($id);
        return view('order.detailOrder',compact('list_item'));
    }

    function updateOrder(Request $request, $id){
        $order = list_orders::find($id);
        $order->status = $request->status;
        $order->save();
        $data = [
            'fullname' => $order->fullname,
            'gender' => $order->gender,
            'phone' => $order->phone,
            'email' => $order->email,
            'address' => $order->address,
            'city' => $order->city,
            'status' => $order->status,
            'username' => $order->username,
            'pay' => $order->pay,
            'bill_total' => $order->bill_total,
            'bill_count' => $order->bill_count,
            'bill_detail' => $order->bill_detail,
            'password' => Hash::make($order->password),
        ];
        Mail::to($order->email)->send(new OrderMail($data));
        return redirect()->route('order.detailOrder',$order->id)->with('status', 'Cập nhật đơn hàng thành công!');
    }

    function deleteOrder($id){
        list_orders::find($id)->delete();
        return redirect('order/showOrder')->with('status', 'Xóa đơn hàng thành công!');
    }
}
