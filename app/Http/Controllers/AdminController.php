<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Show the category view.
     *
     * @return \Illuminate\View\View
     */

     public function admin_index()
     {
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','Delivered')->get()->count();
         
         return view('admin.index',compact('user','product','order','delivered'));
     }

    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    /**
     * Handle adding a new category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_category(Request $request)
    {
        // Validate the input
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        // Create a new category
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->addSuccess('Category added successfully');
        
        
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();
        toastr()->addSuccess('Category deleted successfully');
        return redirect()->back();
    }


    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->addSuccess('Category updated successfully');
        return redirect('/view_category');
        
    }

    public function add_product()
    {
        $category=Category::all();
        return view('admin.add_product',compact('category'));
    }
    

    public function upload_product(Request $request)
    {
        // Create a new Product instance
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;
    
        // Handle image upload
        $image = $request->image;
        if ($image) {
            // Generate a unique name for the image using current time and file extension
            $imagename = time() . '.' . $image->getClientOriginalExtension();
    
            // Move the image to the 'product' directory
            $request->image->move('product', $imagename);
    
            // Save the image name in the database
            $data->image = $imagename;
        }
    
        // Save the product to the database
        $data->save();
    
        // Display success message
        toastr()->success('Product uploaded successfully'); // Corrected toastr method
        return redirect()->back();
    }
    



    public function view_product()
    {
        $product=Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }


    public function delete_product($id)
    {
        $data = Product::find($id);

        $data->delete();
        toastr()->addSuccess('Product deleted successfully');
        return redirect()->back();
    }

    public function search_product(Request $request)
{
    $search = $request->search;

    // Query the product database with the search term
    $product = Product::where('title', 'LIKE', "%{$search}%")->paginate(3);

    // Return the view with the search results
    return view('admin.view_product', compact('product'));
}


public function view_order()
{
    $data=Order::all();
    return view('admin.order',compact('data'));
}

public function on_the_way($id)
{
    $data=Order::find($id);
    $data->status='0n the way';
    $data->save();

    return redirect('/view_orders');
}

public function delivered($id)
{
    $data=Order::find($id);
    $data->status='Delivered';
    $data->save();

    return redirect('/view_orders');
}





}
