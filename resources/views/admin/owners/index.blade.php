<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">


                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">name</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">email</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">created_at</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">edit</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($owners as $owner)
                                <tr class="underline">
                                  <td class="px-4 py-3">{{ $owner->name }}</td>
                                  <td class="px-4 py-3">{{ $owner->email }}</td>
                                  <td class="px-4 py-3">{{ $owner->created_at->diffForHumans() }}</td>
                                  <td class="w-10 text-center">
                                    <button onclick="location.href='{{ route('admin.owners.edit',['owner' => $owner->id])}}'" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded mt-6">edit</button>
                                  </td>
                                  <form id="delete_{{ $owner->id }}" method="POST" action="{{ route('admin.owners.destroy', ['owner' => $owner->id])}}">
                                    @method('delete')
                                    @csrf
                                    <td class="w-10 text-center">
                                    <a href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mt-6">delete</button>
                                  </td>
                                  </form>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                            {{ $owners->links()}}
                          </div>

                        </div>
                        <div class="flex justify-center mb-4">
                            <button onclick="location.href='{{ route('admin.owners.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Create new owner</button>
                        </div>
                      </section>

                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e){
            'use strict';
            if(confirm('delete?')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
