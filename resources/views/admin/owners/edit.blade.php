<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="mt-8">
                        <form method="POST" action="{{ route('admin.owners.update', ['owner' => $owner->id ])}}" class="w-10/12 mx-auto md:max-w-md">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-2">
                                <label for="name" class="text-sm block">お名前</label>
                                <input type="text" id="name" name="name" value="{{ $owner->name}}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="山田太郎">
                            </div>
                            <div class="mb-2">
                                <label for="email" class="text-sm block">Eメール</label>
                                <input type="email" id="email" name="email" value="{{ $owner->email}}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="Eメール">
                            </div>
                            <div class="mb-2">
                                <label for="email" class="text-sm block">店名</label>
                                <div class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">{{ $owner->shop->name}}</div>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="text-sm block">パスワード</label>
                                <input type="password" id="password" name="password" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                            </div>
                            <div class="mb-2">
                                <label for="password_confirmation" class="text-sm block">パスワード確認</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded mt-6">Update</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
