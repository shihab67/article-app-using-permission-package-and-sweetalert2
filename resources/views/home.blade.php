@extends('layouts.app')
@section('css')
<style>
    .table{
        padding-top: 10px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @can('add articles')
                            <a href="{{ route('add') }}" class="btn btn-primary btn-sm">Add Articles</a>
                            @endcan
                        </div>
                    </div>
                    <div class="row table">
                        <div class="col-md-12">
                            <table class="table table-striped" style=" text-align: center;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article as $art)
                                    <tr>
                                        <td>{{ $art->id }}</td>
                                        <td>{{ $art->title }}</td>
                                        <td>{{ $art->author }}</td>
                                        <td>{{ $art->description }}</td>
                                        <td>{{ $art->date }}</td>
                                        <td>
                                            @can('edit articles')
                                            <a href="{{ route('edit', $art->id) }}" class="btn btn-primary btn-sm">Edit Articles</a>
                                            @endcan
                                            @can('delete articles')
                                            <a href="{{ route('delete', $art->id) }}" class="btn btn-danger btn-sm">Delete Articles</a>
                                            @endcan
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
    </div>
</div>
@endsection
