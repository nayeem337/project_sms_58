@extends('back.master')

@section('title', 'Add Course')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Add Course</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="category_id" class="form-control select-tag">
                                            <option value="" disabled selected><--Select a Category --></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Price</label>
                                    <div class="col-md-8">
                                        <input type="number" name="price" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Starting Date</label>
                                    <div class="col-md-8">
                                        <input type="text" id="startDate" name="start_date" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Ending Date</label>
                                    <div class="col-md-8">
                                        <input type="text" id="endDate" name="end_date" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Short Description</label>
                                    <div class="col-md-8">
                                        <textarea name="short_description" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Long Description</label>
                                    <div class="col-md-8">
                                        <textarea name="long_description" class="form-control" id="editor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" class="" checked value="1" /> Published</label>
                                        <label for=""><input type="radio" name="status" class="" value="0" /> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Create Course" />
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
