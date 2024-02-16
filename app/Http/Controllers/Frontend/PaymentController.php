<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderAccept;
use App\Mail\OrderPlace;
use App\Models\Order;
use Illuminate\Support\Str;

use App\Models\PdfOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    //
    public function payment(Request $request){

        try{
        $amount= $request->input('course_amount');
        $course_id=$request->input('course_id');
        $order_type=$request->input('order_type');
        // dd($amount);

        $user=Auth::user();
        $order_reference = $this->generateOrderCode();

        // $order_id = DB::getPdo()->lastInsertId();

        if($order_type==="course"){
            $order=new Order();
            $order->user_id=$user->id;
            $order->course_id=$course_id;
            $order->payment_reference=$order_reference;
            $order->amount=$amount;
            $order->status="pending";
            $order->order_type=$order_type;
            $order->save();
            $order_id = $order->id;
            $orderDetails=Order::with('user','course')->where('id',$order_id)->first();
            $course_name=$orderDetails->course->title;

        }
        if($order_type==="pdf"){
            $order=new PdfOrder();
            $order->user_id=$user->id;
            $order->pdf_id=$course_id;
            $order->payment_reference=$order_reference;
            $order->amount=$amount;
            $order->status="pending";
            $order->order_type=$order_type;
            $order->save();
            $order_id = $order->id;
            $orderDetails=PdfOrder::with('user','pdf')->where('id',$order_id)->first();
            $course_name=$orderDetails->pdf->title;
        }

        // dd($orderDetails);

        $email=$user->email;
        // dd($email);
        $name=$user->first_name." ".$user->last_name;
        //    dd($name);

        $admin_email="atsbehateklu166@gmail.com";
        $admin_name="Tsafew";

        $messageData=[
        'email'=>$email,
        'name'=>$name,
        'course_name'=>$course_name,
        'order_type'=>$order_type,
        'order_id'=>$order_id,
        'orderDetails'=>$orderDetails,
        'admin_name'=>$admin_name,
        ];

        Mail::to($email)->send(new OrderPlace($messageData));

        Mail::to($admin_email)->send(new OrderAccept($messageData));

        Alert::toast('Your order has been placed','success');
        return redirect()->route('frontend');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Laravel's built-in validation exception
        return redirect()->back()->withErrors($e->validator->errors())->withInput();
    } catch (\Exception $e) {
        // Handle exceptions or errors
        Alert::toast('something is wrong!!', 'error');
        return redirect()->back();
    }

   }


   private function generateOrderCode()
    {
        // Generate a random 10-digit number
        $randomNumber = Str::random(20);

        return $randomNumber;
    }
}
