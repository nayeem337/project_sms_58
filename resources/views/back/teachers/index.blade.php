@extends('back.master')

@section('title', 'Manage Teachers')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Teachers</h3>
                        </div>
                        <div class="card-body">
                            <table class="table baseDataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->user->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>{{ $teacher->address }}</td>
                                            <td>
                                                <img src="{{ asset($teacher->image) }}" alt="" style="height: 60px">
                                            </td>
                                            <td>{{ $teacher->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form onsubmit="return confirm('Are you sure to delete this teacher?')" action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
        </div>
    </section>
@endsection
