<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua menu makanan dan minuman',
            'data' => $restaurants
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'category'   => 'required',
            'price'   => 'required',
        ],
            [
                'name.required' => 'Masukkan name !',
                'category.required' => 'Masukkan Content category !',
                'price.required' => 'Masukkan Content price !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi data Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $restaurant = Restaurant::create([
                'name'     => $request->input('name'),
                'category'   => $request->input('category'),
                'price'   => $request->input('price')
            ]);


            if ($restaurant) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $restaurant = Restaurant::whereId($id)->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'message' => 'Detail menu!',
                'data'    => $restaurant
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'menu Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'message' => 'menu Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'menu Gagal Dihapus!',
            ], 500);
        }

    }
}
