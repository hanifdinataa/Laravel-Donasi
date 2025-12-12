@extends('admin.layouts.app')
@section('title','Edit Campaign')

@section('content')

<h1 class="page-title">Edit Campaign</h1>

<form action="{{ route('admin.campaigns.update', $campaign->id) }}" 
      method="POST" 
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- TITLE -->
    <div class="form-group">
        <label>Title</label>
        <input name="title" class="form-control" value="{{ $campaign->title }}" required>
    </div>

    <!-- SHORT DESC -->
    <div class="form-group">
        <label>Short Description</label>
        <input name="short_description" class="form-control" value="{{ $campaign->short_description }}">
    </div>

    <!-- FULL DESCRIPTION -->
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="5">{{ $campaign->description }}</textarea>
    </div>

    <!-- TARGET -->
    <div class="form-group">
        <label>Target Amount</label>
        <input name="target_amount" type="number" class="form-control" value="{{ $campaign->target_amount }}">
    </div>

    <!-- CATEGORY -->
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih --</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" 
                {{ $campaign->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- END DATE -->
    <div class="form-group">
        <label>End Date</label>
        <input name="end_date" type="date" class="form-control"
               value="{{ optional($campaign->end_date)->format('Y-m-d') }}">
    </div>

    <!-- IMAGE -->
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">

        @if($campaign->image)
        <div style="margin-top:8px;">
            <img src="{{ asset('storage/'.$campaign->image) }}" 
                 alt="Campaign Image"
                 style="width:150px;border:1px solid #ccc;border-radius:4px;">
        </div>
        @endif
    </div>

    <!-- STATUS -->
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="draft"  {{ $campaign->status=='draft'  ? 'selected':'' }}>Draft</option>
            <option value="active" {{ $campaign->status=='active' ? 'selected':'' }}>Active</option>
            <option value="closed" {{ $campaign->status=='closed' ? 'selected':'' }}>Closed</option>
        </select>
    </div>

    <!-- BUTTON -->
    <button class="btn">Update</button>

</form>

@endsection
