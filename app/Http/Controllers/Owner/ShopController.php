<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\YploadImageRequest;
use App\Models\Shop;
use App\Http\Service\imageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;




class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next){

            $id = $request->route()->parameter('shop');

            if(!is_null($id)){
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id();

                if($shopId !== $ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));

    }

    public function update(YploadImageRequest $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'information' => 'required|string|max:500',
            'is_selling' => 'required',
        ]);

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()){

            $a = imageService::upload($imageFile, 'shops');
        }

        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->information = $request->information;
        $shop->is_selling = $request->is_selling;
        if(!is_null($imageFile) && $imageFile->isValid()){
            dd($a);
            $shop->filename = $a;
        }

        $shop->save();

        return redirect()->route('owner.shops.index')
        ->with(['message' => 'successful', 'status' => 'info']);
    }
}
