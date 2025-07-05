<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));

    }
    public function addcategory(Request $request)
    {
        $cat=new Category;
        $cat->categoryname=$request->category;
        $cat->save();
        toastr()->addSuccess('Created added successfully');
        return redirect()->back();
    }
    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function edit_category($id)
    {
        $data=Category::find($id);
       return view('admin.edit_category', compact('data'));
    }
    public function update_category(Request $request, $id)
    {
        $data=Category::find($id);
       $data->categoryname=$request->category;
       $data->save();
       return redirect('view_category');
    }
    public function addproduct()
    {
        return view('admin.addproduct');
    }
    public function uploadproduct(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string',
        'image' => 'required|image|max:2048',
    ]);
    
     $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

    $pro = new Product;
    $pro->title = $request->name;
    $pro->description = $request->description;
    $pro->price = $request->price;
    $pro->quantity = $request->quantity;
    $pro->category = $request->category;
    $pro->image = $imageName;

    $pro->save();

    toastr()->addSuccess('Product added successfully');
    return redirect()->back();
}
    public function view_product()
    {
        $product=Product::paginate(2);
        return view('admin.view_product',compact('product'));
    }
    public function delete_product($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function edit_product($id)
    {
        $data=Product::find($id);
       return view('admin.edit_product', compact('data'));
    }
    public function view_order(){
        $data=Order::all();
        return view('admin.order',compact('data'));
    }
    public function way($id){
        $data=Order::find($id);
        $data->status='on the way';
        $data->save();
       return redirect('/view_order');
    }
    public function delevired($id){
        $data=Order::find($id);
        $data->status='Delevired';
        $data->save();
       return redirect('/view_order');
    }
    public function print($id){
            $data=Order::find($id);
            $pdf = Pdf::loadView('admin.invoice',compact('data'));
            return $pdf->download('invoice.pdf');
    }
    public function view_message(){
        $data=Contact::all();
        return view('admin.view_message',compact('data'));
    }
    public function send_mail($id){
        $data=Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }
   public function mail(Request $request, $id){
    $data = Contact::find($id);

    $details = [
        'greeting'    => $request->greeting,
        'body'        => $request->body,
        'action_text' => $request->action_text,
        'action_url'  => $request->action_url,
        'endline'     => $request->endline,
    ];

    Notification::send($data, new SendEmailNotification($details));

    return redirect()->back()->with('success', 'Email sent successfully!');
}
}
