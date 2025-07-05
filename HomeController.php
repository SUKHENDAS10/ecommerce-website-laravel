<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;


class HomeController extends Controller
{
    //
    public function index(){
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $del=Order::where('status','Delevired')->get()->count();
        return view('admin.index',compact('user','product','order','del'));
    }
     public function home(){
    $products = Product::all();
    return view('home.index', compact('products'));
}
public function product_details($id){
    $data=Product::find($id);
    return view('home.product_details',compact('data'));
}
    public function add_cart($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        return redirect()->back();
}
    public function mycart(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
            $cart=Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }
    public function delete_cart($id)
    {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function comfirm_order(Request $request){
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        $user=Auth::user();
        $userid=$user->id;
        $cart=Cart::where('user_id',$userid)->get();
        foreach($cart as $cart){
            $order=new Order;
            $order->name=$name;
            $order->address=$address;
            $order->phone=$phone;
            $order->user_id=$userid;
             $order->product_id=$cart->product_id;
             $order->save();
            
        }        
        
    }
public function shop(){
    $products = Product::all();
    return view('home.shop', compact('products'));
}
public function why(){
    $products = Product::all();
    return view('home.why', compact('products'));
}
public function testimonial(){
    $products = Product::all();
    return view('home.testimonial', compact('products'));
}

public function contact(){
    return view('home.contact');
}
public function contact_message(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();

    return redirect()->back()->with('success', 'Message sent successfully!');
}

public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'message' => 'required',
    ]);

    ContactMessage::create($validated);

    return back()->with('success', 'Message saved successfully!');
    
}
public function comfirm(Request $request)
{
    $user = Auth::user();
    $cart = Cart::where('user_id', $user->id)->get();

    $amount = $cart->count() * 100; // e.g., $100 per product

    return view('home.payment', [
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
        'amount' => $amount
    ]);
}
public function payment(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        Charge::create([
            'amount' => 100 * 100, // $100 USD as example
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Order Payment',
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $item) {
            Order::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'user_id' => $userid,
                'product_id' => $item->product_id,
            ]);
        }

        Cart::where('user_id', $userid)->delete();

        return redirect('/')->with('success', 'Payment and order placed successfully!');
    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage());
    }
}

public function stripe(){
    return view('home.stripe');
}
public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }

}
