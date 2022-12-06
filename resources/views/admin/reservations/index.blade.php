<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-m-12 float-right">
        <a href="{{ route('admin.reservations.create') }}" class="btn btn-success btn-icon-split flex-l">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">New Reservation</span>
        </a>
    </div>

    <div class="py-12">
        <!-- Reservation Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reservation Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Table</th>
                                <th>Guests</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Table</th>
                                <th>Guests</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                                <td>{{ $reservation->email  }}</td>
                                <td>{{ $reservation->res_date }}</td>
                                <td>{{ $reservation->table->name }}</td>
                                <td>{{ $reservation->guest_number }}</td>

                                <td>
                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>

                                    <form
                                    class="btn btn-danger btn-circle btn-sm"
                                    method="POST"
                                    action="{{ route('admin.reservations.destroy', $reservation->id) }}"
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


