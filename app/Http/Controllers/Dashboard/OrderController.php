<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatus;
use App\Models\Order;
use App\Models\PdfOrder;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    //
    public function index(){
        $all_order=Order::with('user','course')->get();
        // dd($all_order);
       return view('order.course_order.index',compact('all_order'));
    }


    public function delete($id)
    {
        try {

            $Order = Order::find($id);
            $Order->delete();
            Alert::toast('Order has been deleted successfully!', 'error');
            return redirect()->route('all-orders');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }


    public function update_payment(Request $request){

        $order=Order::find($request->input('id'));

        $user_id=$request->input('user_id');
        $user=User::where('id',$user_id)->first();
        $course_name= $order->course->title;
        $email= $order->user->email;
        // dd($order->status);

        if($order->status=="paid"){
            // dd($order->status);
            $order->status="pending";
            $order->update();

            $email=$user->email;
            // dd($email);
            $name=$user->first_name." ".$user->last_name;
            //    dd($name);
            $messageData=[
            'email'=>$email,
            'name'=>$name,
            'course_name'=>$course_name,
            'order_type'=>$order->order_type,
            'order_id'=>$order->id,
            'status'=>$order->status,
            'amount'=>$order->amount,
            ];

            try{
                Mail::to($email)->send(new OrderStatus($messageData));
            }catch(Exception $e){
                    Alert::toast("something is wrong",'success');
                    return redirect()->back();
            }


            Alert::toast('your order payment status changed to pending','info');
            return  redirect()->back();
        }
        if($order->status=="pending"){
            // dd($order->status);
            $order->status="paid";
            $order->update();

            $email=$user->email;
            // dd($email);
            $name=$user->first_name." ".$user->last_name;
            //    dd($name);
            $messageData=[
            'email'=>$email,
            'name'=>$name,
            'course_name'=>$course_name,
            'order_type'=>$order->order_type,
            'order_id'=>$order->id,
            'status'=>$order->status,
            'amount'=>$order->amount,
            ];

            try{
                Mail::to($email)->send(new OrderStatus($messageData));
            }catch(Exception $e){
                    Alert::toast("something is wrong",'success');
                    return redirect()->back();
            }



            Alert::toast('Your order payment status changed to paid','success');
            return  redirect()->back();
        }
    }

    public function view($id){

        $order=Order::where('id',$id)->first();

        return view('order.course_order.image',compact('order'));
    }

    public function view_pdf($id){
        $pdforder=PdfOrder::where('id',$id)->first();

        return view('order.book_order.image',compact('pdforder'));
    }

    public function detail($id){
        $order=Order::with('user','course')->where('id',$id)->first();
     return view('order.course_order.detail',compact('order'));
    }

}
