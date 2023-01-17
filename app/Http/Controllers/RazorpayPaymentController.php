<?php
  
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        return view('paymentView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $user_data = json_decode($request->user_data);
        
        $user = User::firstOrNew(['email' => $user_data->email]);
        $user->name = $user_data->name;
        $user->email = $user_data->email;
        $user->password = Hash::make('123456');
        $user->is_admin = 0;
        $user->save();

        $order = new Order();
        $order->user_id = $user->id;
        $order->mobile = $user_data->mobile;
        $order->date = $user_data->date;
        $order->from_address = $user_data->from_address;
        $order->to_address = $user_data->to_address;
        $order->instruction = $user_data->instruction;
        $order->order_id = Str::random(10);
        $order->save();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect('/')->with('token',$order->order_id);
    }

    public function bookOrder(Request $request){
        return redirect('razorpay-payment');
    }
    
    public function checkCode(Request $request){
        $order = Order::where('order_id',$request->code)->first();

        if($order){
            $response = [
                'code' => 200,
                'success' => true
            ];
        }else{
            $response = [
                'code' => 200,
                'success' => false
            ];
        }

        return response()->json($response);

    }
}