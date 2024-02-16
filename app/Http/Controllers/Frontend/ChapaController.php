<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PdfOrder;
use Chapa\Chapa\Facades\Chapa as Chapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize(Request $request)
    {
        //This generates a payment reference
        $reference = $this->reference;
        $amount= $request->input('course_amount');
        $course_id=$request->input('course_id');
        $order_type=$request->input('order_type');
        // dd($amount);

        $user=Auth::user();
        // dd($amount);

        // Enter the details of the payment
        $data = [

            'amount' =>$amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            "customization" => [
                "title" => 'Course',
                "description" => "payment"
            ]
        ];

        // dd($data);

        $payment = Chapa::initializePayment($data);

        // dd($payment);


        // if ($payment['status'] !== 'success') {

        //     Alert::toast('Something is wrong !','please try again');
        //     return redirect()->back();
        // }

        if($payment['status'] !== 'success'){

        if($order_type==="course"){
            $order=new Order();
            $order->user_id=$user->id;
            $order->course_id=$course_id;
            $order->payment_reference=$reference;
            $order->amount=$amount;
            $order->status="pending";
            $order->order_type=$order_type;
            $order->save();
        }
        if($order_type==="pdf"){
            $order=new PdfOrder();
            $order->user_id=$user->id;
            $order->pdf_id=$course_id;
            $order->payment_reference=$reference;
            $order->amount=$amount;
            $order->status="pending";
            $order->order_type=$order_type;
            $order->save();
        }
    }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {

        $data = Chapa::verifyTransaction($reference);
        dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {


        dd($data);
        }

        else{
            //oopsie something ain't right.
        }


    }
}
