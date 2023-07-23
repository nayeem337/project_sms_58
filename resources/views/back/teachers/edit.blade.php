@extends('back.master')

@section('title', 'Edit Teacher')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Teacher</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('teachers.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <label for="" class="col-md-4">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" value="{{ $teacher->user->email }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <input type="number" name="phone" class="form-control" value="{{ $teacher->phone }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Subject</label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" class="form-control" value="{{ $teacher->subject }}" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <textarea name="address" class="form-control" id="" cols="30" rows="10">{{ $teacher->address }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" />
                                        <img src="{{ asset($teacher->image) }}" alt="" style="height: 80px">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" class="" {{ $teacher->status == 1 ? 'checked' : '' }} value="1" /> Published</label>
                                        <label for=""><input type="radio" name="status" class="" {{ $teacher->status == 0 ? 'checked' : '' }} value="0" /> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Update Teacher" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
