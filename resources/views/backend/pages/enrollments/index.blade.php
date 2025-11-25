@extends('backend.partials.master')

@section('title', 'Enrollments')

@section('content')
    <h1 class="mt-4">Enrollments</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Enrollments</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-graduate me-1"></i>
            All Enrollments
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Primary Contact</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Children</th>
                        <th>Emergency Contacts</th>
                        <th>Referrer</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables will populate this -->
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.enrollments.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'primary_contact',
                        name: 'primary_contact'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'children_count',
                        name: 'children_count',
                        orderable: false
                    },
                    {
                        data: 'contacts_count',
                        name: 'contacts_count',
                        orderable: false
                    },
                    {
                        data: 'referrer',
                        name: 'referrer'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@endpush

