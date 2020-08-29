@extends('layouts.app')
@section('css')
<style>
.row{
    padding: 5px 5px 5px 5px;
}

input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
</style>
@endsection
@section('content')
<div class="container">
   <div class="row justify-content-center">
    <div class="col-md-8">
        <a href="/home" class="btn btn-success btn-sm">All Articles</a>
    </div>
   </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">Add Articles</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Title:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Author:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Description:</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="description" id=""  rows="7" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Date:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Images:</label>
                            </div>
                            <div class="col-md-2">
                                <input type="button" value="Add" class="btn btn-primary btn-sm add" id="add" />
                            </div>
                            <div class="col-md-8" id="buildyourform">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $("#add").click(function() {
    	var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var div = $("<div class=\"custom-file\">");
        var fName = $("<input type=\"file\" class=\"fieldname\" /> name=\"file\"");
        var removeButton = $("<input type=\"button\" class=\"btn btn-danger btn-sm remove\" value=\"Remove\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
});
</script>
@endsection