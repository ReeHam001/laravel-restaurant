<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-m-12 float-right">
        <a href="{{ route('admin.tables.create') }}" class="btn btn-success btn-icon-split flex-l">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Add Table</span>
        </a>
    </div>

    <div class="py-12">
        <!-- Categories Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Guest</th>
                                <th>Staus</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Guest</th>
                                <th>Staus</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <td>{{ $table->name }}</td>
                                <td>{{ $table->guest_number  }}</td>
                                <td>{{ $table->status->name }}</td>
                                <td>{{ $table->location->name }}</td>

                                <td>
                                    <a href="{{ route('admin.tables.edit', $table->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>

                                    <form
                                    class="btn btn-danger btn-circle btn-sm"
                                    method="POST"
                                    action="{{ route('admin.tables.destroy', $table->id) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>


