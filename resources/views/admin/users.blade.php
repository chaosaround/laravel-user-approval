@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><strong>User management</strong></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Approve / Unapprove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="">
                                @if (!$user->isAdmin())
                                    <div class="form-inline">
                                        <form method="POST" action="{{ route('admin.users.approve', $user) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                    class="btn btn-link btn-sm"
                                                    {{ $user->isApproved() ? 'disabled' : '' }}>
                                                Approve
                                            </button>
                                            <input type="hidden" name="page" value="{{ $users->currentPage() }}"/>
                                        </form>
                                        /
                                        <form method="POST" action="{{ route('admin.users.unapprove', $user) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                    class="btn btn-link btn-sm"
                                                    {{ $user->isApproved() ? '' : 'disabled' }}>
                                                Unapprove
                                            </button>
                                            <input type="hidden" name="page" value="{{ $users->currentPage() }}"/>
                                        </form>
                                    </div>
                                @else
                                    <strong class="p-5">Admin</strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>


    </div>
@endsection