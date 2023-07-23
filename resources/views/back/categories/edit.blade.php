@extends('back.master')

@section('title', 'Edit Category')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <label for="" class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" class="" {{ $category->status == 1 ? 'checked' : '' }} value="1" /> Published</label>
                                        <label for=""><input type="radio" name="status" class="" {{ $category->status == 0 ? 'checked' : '' }} value="0" /> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Update Category" />
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
