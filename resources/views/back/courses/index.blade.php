@extends('back.master')

@section('title', 'Manage Courses')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Courses</h3>
                        </div>
                        <div class="card-body">
                            <table class="table baseDataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>S. Description</th>
                                        <th>L. Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->category->name }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->price }}</td>
                                            <td>{{ $course->start_date.'-'.$course->end_date }}</td>
                                            <td>{{ $course->short_description }}</td>
                                            <td>{!! \Illuminate\Support\Str::words($course->long_description, 10, '....') !!}</td>
                                            <td>
                                                <img src="{{ asset($course->image) }}" alt="" style="height: 60px">
                                            </td>
                                            <td>{{ $course->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form onsubmit="return confirm('Are you sure to delete this teacher?')" action="{{ route('courses.destroy', $course->id) }}" method="post">
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
