@extends('layouts.app')
@section('css')
<style>
.row{
    padding: 5px 5px 5px 5px;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">Edit Articles</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Title:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Author:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="author" class="form-control" value="{{ $data->author }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Description:</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="description" id=""  rows="7" class="form-control">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Date:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date" class="form-control" value="{{ $data->date }}">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection