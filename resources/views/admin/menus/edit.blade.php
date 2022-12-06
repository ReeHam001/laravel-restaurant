<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-m-12 float-right">
        <a href="{{ route('admin.menus.index') }}" class="btn btn-info btn-icon-split">
            <span class="icon text-gray-600">
                <i class="fas fa-arrow-right text-white"></i>
            </span>
            <span class="text">Back to menus</span>
        </a>
    </div>

    <div class="col-lg-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="m-2 p-2 bg-slate-100 rounded">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ $menu->name }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </div>
                                @error('name')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 pt-2">
                                <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                                <div class="mt-1">
                                    <input type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" value="{{ $menu->price }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </div>
                                @error('price')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 pt-2">
                                <label for="categories" class="block text-sm font-medium text-gray-700"> Categories </label>
                                <div class="mt-1">
                                    <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1 border border-gray-400 rounded-md py-2 px-3"
                                    multiple>
                                     @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($menu->categories->contains($category)) >{{ $category->name }}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-6 pt-3">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" rows="3" name="description"
                                              class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror">
                                        {{ $menu->description }}
                                    </textarea>
                                </div>
                                @error('description')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 pt-3">
                                <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                                <div>
                                    <img class="w-50 h-50 py-3" src="{{ Storage::url($menu->image) }}">
                                </div>
                                <div class="mt-1">
                                    <input type="file" id="image" name="image"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </div>
                                @error('image')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-8">
                                <button type="submit"
                                        class="btn btn-outline-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Update</span>
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
   </div>

</x-admin-layout>
