<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Media;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    public function getAdd()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function postAdd(ProductRequest $request)
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->price       = empty($request->price) ? 0 : $request->price;
        $product->compare_price = $request->price;
        $product->quantity        = $request->quantity;
        $product->weight        = $request->weight;
        $product->summary = $request->summary;
        $product->description = html_entity_decode($request->description);
        $product->category_id = $request->category;
        $product->status      = $request->status;
//        if($request->featured == null)
//            $product->featured =0;
//
       $product->save();
        if ($request->hasFile('image')) {
            foreach($request->image as $image){
                    $product->addMedia($image)->toMediaLibrary('image');
            }
        }

        return Redirect::to('admin/product/list');
    }

    public function getList()
    {
        $products = Product::select('*')->orderBy('id', 'DESC')->get();
        return view('admin.products.list', compact('products'));
    }

    public function getDetail($id)
    {
        $product = Product::findOrFail($id);
        $product->category;
        $product->getMedia('image');
        return $product;
    }

    public function getEdit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('categories','product'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request, [
        'name' => 'required|min:3',
        'price' => 'required',
        'description'=>'required',
        'category'=>'required',
        'status'=>'required',

    ], [
        'name.required'=>'Vui lòng nhập tên sản phẩm', 
        'price.required'=>'Vui lòng nhập giá sản phẩm', 
        'description.required'=>'Vui lòng nhập mô tả sản phẩm', 
        'category.required'=>'Vui lòng chọn danh mục cho sản phẩm', 
        'status.required'=>'Vui lòng chọn trạng thái cho sản phẩm', 

    ]);
        $product              = Product::find($id);
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->compare_price = $request->compare_price;
        $product->description = htmlentities($request->description, ENT_QUOTES);
        $product->category_id = $request->category;
        $product->status      = $request->status;

        $product->save();
        if ($request->hasFile('image')) {
            foreach($request->image as $image){
                    $product->addMedia($image)->toMediaLibrary('image');
            }  
        }
        return Redirect::to('admin/product/list');
    }

    public function delete(Request $request)
    {
        $delete_product = Product::find($request->id);
        $delete_product->delete();
        return 1;
    }

    public function deleteImage(Request $request)
    {
        Media::findOrFail($request->id)->delete();
        return response()->json();
    }

    public function editStatus(Request $request, $id)
    {
        Product::where('id', $id)->update(['status' => $request->status]);
        return response()->json();
    }
}
