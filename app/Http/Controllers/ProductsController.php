<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('products.showAll', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        if (!$validator->fails()) {
            $product = new Products();
            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;

            if ($product->save()) {
                $name = $request->input('name');
                $price = $request->input('price');
                $quantity = $request->input('quantity');

                session()->flash('success', 'Produto cadastrado com sucesso: ' . $name);

                return redirect()->back();
            } else {

            }
        } else {
            $err = $validator->errors()->all();
            session()->flash('error', 'Erro ao cadastra o produto. Verifique todos os campos!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.showAll')->with('error', 'Produto não encontrado.');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.showAll')->with('error', 'Produto não encontrado');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.showAll')->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Produto deletado com sucesso.']);
        } else {
            return response()->json(['message' => 'Erro ao deletar o produto.']);
        }
    }

}
