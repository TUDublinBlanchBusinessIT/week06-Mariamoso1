<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Repositories\productRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;

class productController extends BaseController
{
    private $productRepository;

    public function __construct(productRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    public function additem($productid)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            if (isset($cart[$productid])) {
                $cart[$productid]=$cart[$productid]+1;
            }
            else {
                $cart[$productid]=1;
            }
        }
        else {
            $cart[$productid]=1;
        }
        Session::put('cart', $cart);
        return Response::json(['success'=>true,'total'=>array_sum($cart)],200);
    }

    public function displayGrid(Request $request)
{
    $products=\App\Models\Product::all();
    if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $product => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
    }
    else {
        $totalItems=0;
    }
    return view('products.displaygrid')->with('products',$products)->with('totalItems',$totalItems);
}

    public function create()
    {
        return view('products.create');
    }

    public function store(CreateproductRequest $request)
    {
        $input = $request->all();
        $product = $this->productRepository->create($input);
        Flash::success('Product saved successfully.');
        return redirect(route('products.index'));
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        return view('products.show')->with('product', $product);
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        return view('products.edit')->with('product', $product);
    }

    public function update($id, UpdateproductRequest $request)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        $product = $this->productRepository->update($request->all(), $id);
        Flash::success('Product updated successfully.');
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }
        $this->productRepository->delete($id);
        Flash::success('Product deleted successfully.');
        return redirect(route('products.index'));
    }

    public function emptycart()
{
    if (Session::has('cart')) {
        Session::forget('cart');
    }
    return Response::json(['success'=>true],200);
}
}