<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Pos;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $pos = POS::create([
            'pro_id' => $product->id,
            'pro_name' => $product->product_name,
            'pro_quantity' => 1,
            'pro_price' => $product->selling_price,
            'sub_total' => $product->selling_price,
        ]);
        return response()->json(['message' => 'product Added successfully']);
    }
    public function allPos()
    {
        $pos = Pos::all();
        return response()->json($pos);
    }

    public function posremove($id)
    {
        $pos = Pos::findOrFail($id);
        $pos->delete();
        return response()->json(['message' => 'product Added successfully']);
    }
}
