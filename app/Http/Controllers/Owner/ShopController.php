<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Http\Requests\YploadImageRequest;
use App\Models\Shop;
use App\Http\Service\imageService;
=======
use App\Models\Shop;
>>>>>>> origin/sec06_owner
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;


<<<<<<< HEAD


=======
>>>>>>> origin/sec06_owner
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

<<<<<<< HEAD
    public function update(YploadImageRequest $request, $id)
=======
   
>>>>>>> origin/sec06_owner
    {
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()){

<<<<<<< HEAD
            $a = imageService::upload($imageFile, 'shops');
=======
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName.'.' . $extension;
            $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            // dd($imageFile,$resizedImage);

            Storage::put('public/shops/' . $fileNameToStore, $resizedImage);
>>>>>>> origin/sec06_owner
        }

        return redirect()->route('owner.shops.index');
    }
}
