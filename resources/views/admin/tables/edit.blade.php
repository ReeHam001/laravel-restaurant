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
            <span class="text">Back to tables</span>
        </a>
    </div>

    <div class="col-lg-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="m-2 p-2 bg-slate-100 rounded">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ $table->name }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </div>
                                @error('name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="sm:col-span-6 mt-2">
                                <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number </label>
                                <div class="mt-1">
                                    <input type="number" id="guest_number" name="guest_number" value="{{ $table->guest_number }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                </div>
                                @error('guest_number')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 mt-2">
                                <label for="status" class="block text-sm font-medium text-gray-700"> Status </label>
                                <div class="mt-1">
                                    <select id="status" name="status" class="form-multiselect block w-full mt-1 border border-gray-400 rounded-md py-2 px-3">
                                        @foreach (App\Enums\TableStatusEnum::cases() as $status)
                                         <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('status')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-6 mt-2">
                                <label for="location" class="block text-sm font-medium text-gray-700"> location </label>
                                <div class="mt-1">
                                    <select id="location" name="location" class="form-multiselect block w-full mt-1 border border-gray-400 rounded-md py-2 px-3">
                                        @foreach (App\Enums\TableLocationEnum::cases() as $location)
                                         <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('location')
                                <div class="text-sm text-red-400">{{ $message }}</div>
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
