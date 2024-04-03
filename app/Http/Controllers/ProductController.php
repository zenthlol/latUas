<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(){
        return view('admin.product.createProduct');
    }

    public function viewProducts(){
        $products = Product::all();
        return view('admin.product.dashboardProducts', compact('products'));
    }

    public function storeProduct(Request $request){
        $request->validate([
            'item_name' => 'required',
            'item_desc' => 'required',
            'price' => 'required'
        ]);

        Product::create([
            'item_name' => $request->item_name,
            'item_desc' => $request->item_desc,
            'price' => $request->price
        ]);

        return redirect(route('viewProducts'));
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('admin.product.editProduct', compact('product'));
    }

    public function updateProduct($id, Request $request){
        $request->validate([
            'item_name' => 'required',
            'item_desc' => 'required',
            'price' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'item_name' => $request->item_name,
            'item_desc' => $request->item_desc,
            'price' => $request->price
        ]);

        return redirect(route('viewProducts'));
    }

    public function deleteProduct($id){
        Product::destroy($id);
        return redirect(route('viewProducts'));
    }

    public function viewProductById($id){
        $product = Product::findOrFail($id);
        return view('admin.product.viewProductById', compact('product'));
    }
}
