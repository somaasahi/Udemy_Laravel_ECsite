<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('owner.shops.update', ['shop' => $shop->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="text-sm block">店名</label>
                            <input type="text" id="name" name="name" value="{{ $shop->name }}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="name" class="text-sm block">店舗情報</label>
                            <textarea type="text" id="name" name="information" rows="10" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">{{ $shop->information }}</textarea>
                        </div>
                        <div class="16">
                            <x-shop-thumbnail :filename="$shop->filename" />
                        </div>
                        <div class="-m-2">

                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                    <input type="file" id="image" name="image">
                                </div>

                        </div>
                        <div class="-m-2">
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative flex justify-around">
                                    <div><input type="radio" name="is_selling" value="1" @if($shop->is_selling === 1){ checked } @endif >販売中</div>
                                    <div><input type="radio" name="is_selling" value="1" @if($shop->is_selling === 0){ checked } @endif >停止中</div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded mt-6">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
