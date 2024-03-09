<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatus;
use App\Models\PdfOrder;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BookOrderController extends Controller
{
       //
       public function index(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view order')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $all_order=PdfOrder::with('user','pdf')->get();
        // dd($all_order);
       return view('order.book_order.index',compact('all_order'));
    }


    public function delete($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('delete order')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $Order = PdfOrder::find($id);
            $Order->delete();
            Alert::toast('Pdf order has been deleted successfully!', 'error');
            return redirect()->route('all-pdf-orders');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }


    public function update_payment(Request $request){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit order')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $order=PdfOrder::find($request->input('id'));
        // dd($order->status);
        $user_id=$request->input('user_id');
        $user=User::where('id',$user_id)->first();
        $course_name= $order->pdf->title;
        $email= $order->user->email;

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



            Alert::toast('your pdf order payment status changed to pending','info');
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


            Alert::toast('Your pdf order payment status changed to paid','success');
            return  redirect()->back();
        }
    }

    public function detail($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view order')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $order=PdfOrder::with('user','pdf')->where('id',$id)->first();
     return view('order.book_order.detail',compact('order'));
    }

}
