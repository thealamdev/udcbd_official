@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <x-backend.card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.auth.user.create')" :text="__('Create User')" />
            </x-slot>
        @endif

        <x-slot name="body">
            <div style="overflow-x:auto;">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Type</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Register For</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Union</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $union = App\Models\Union::find($user->union_id);
                            @endphp
                            <tr>
                                <td class="text-center">{{ $user->type ?? 'N/A' }}</td>
                                <td class="text-center">{{ $user->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <span class="badge badge-dark p-2" style="font-size: 100%;">
                                        {{ $user->register_for ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center">{{ $user->phone ?? 'N/A' }}</td>
                                <td class="text-center">{{ $user->email ?? 'N/A' }}</td>
                                <td class="text-center">{{ $union->bn_name ?? 'N/A' }}</td>
                                <td class="text-center">{!! $user->permissions_label !!}</td>
                                <td class="text-center">@include('backend.auth.user.includes.actions')</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-backend.card>
    <script>
        new DataTable('#example');
    </script>
@endsection
