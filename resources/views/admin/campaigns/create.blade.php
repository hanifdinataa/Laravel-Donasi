@extends('admin.layouts.app')
@section('title','Tambah Campaign')

@section('content')

<h1 class="page-title">Tambah Campaign</h1>

<form method="POST" action="{{ route('admin.campaigns.store') }}" enctype="multipart/form-data">

@csrf

<div class="form-group">
    <label>Title</label>
    <input name="title" class="form-control" required>
</div>

<div class="form-group">
    <label>Short Description</label>
    <input name="short_description" class="form-control">
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" rows="5" class="form-control"></textarea>
</div>

<div class="form-group">
    <label>Target Amount</label>
    <input name="target_amount" type="number" class="form-control" value="1000000">
</div>

<div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>End Date</label>
    <input type="date" name="end_date" class="form-control">
</div>

<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="draft">Draft</option>
        <option value="active">Active</option>
        <option value="closed">Closed</option>
    </select>
</div>

<button class="btn">Simpan</button>

</form>

@endsection
