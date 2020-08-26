@extends('layouts.app')
@section('css')
<style>
    .table{
        padding-top: 10px;
    }
    .search{
        display: flex;
        float: right;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <div class="search">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-contorl form-control-sm" name="input" id="input">
                            </div>
                            <div class="col-md-4"><button class="btn btn-primary btn-sm" class="search" id="search">Search</button></div>
                        </div>
                    </div>
                </div>
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
<script>
$( document ).ready(function() {
    $("#search"). click(function(){
    var str = $("#input").val();
    //alert(str);
    var url = window.location.pathname+"?[author]="+str;
    alert(url);
    var str = $("#input").val();
    //var url = window.location.pathname."?[author]=".str;
    //alert(window.location.pathname);
    // $.ajax({
    //     type: "GET",
    //     url: window.location.pathname."?[author]=".str,
    //     data: str,
    //     cache: false,
    //     success: function(data){
    //         console.log(url);
    //     }
    //     });
    });
});
</script>
@endsection
