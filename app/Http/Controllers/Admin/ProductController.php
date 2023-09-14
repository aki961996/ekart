<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSaveRequest;
use App\Models\Category;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController
{




    public function products()
    {



        // $products = Product::all();
        // $categories = Category::all();
        // return $categories;
        $products = Product::latest()->paginate(15);
        //return $products;
        return view('admin.products.list', ['products' => $products]);
    }

    public function create()
    {
        //multiple data und ethil so variable name categories
        $categories = Category::all(); //select * from categorys
        //dd($categories);

        return view('admin.products.create', ['categories' => $categories]);
    }

    public function save(ProductSaveRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $fileName = Str::random(6) . "_" . time() . "product." . $extension;
            $request->image->storeAs('images', $fileName);
        }
        $input['image'] = $fileName;
        Product::create($input);
        return redirect()->route('admin.product.list')->with('message', 'Inserted Successfully');
        //return request()->all();
    }

    //delete
    public function delete($id)
    {
        $id = decrypt($id);
        $id = Product::find($id);
        // $image = $id->image;
        if (!empty($id->image)) {
            Storage::delete('images/' . $id->image);
        }
        $id->delete();
        return redirect()->route('admin.product.list')->with('message', 'Product deleted successfully');
    }
    //edit
    public function edit($id)
    {
        $id = decrypt($id);
        $product = Product::find($id);
        //return $product;
        $categories = Category::all();
        //return $categories;
        return view('admin.products.edit', ['product_all_details' => $product], ['categories_all_details' => $categories]);
    }

    //update 
    public function update(ProductSaveRequest $request)
    {
        $id = request('product_id');
        $id = decrypt($id);
        $id = Product::find($id);
        $input = $request->validated();

        if ($request->hasFile('image')) {
            //img undel delete then new one update
            Storage::delete('images/' . $id->image);
            //evide new img update avum
            $extension = $request->image->extension();
            $fileName = Str::random(6) . "_" . time() . "product." . $extension;
            $request->image->storeAs('images', $fileName);
        }
        $input['image'] = $fileName;
        $id->update($input);

        return redirect()->route('admin.product.list')->with('message', 'Product Updated successfully');
    }
}
