@extends('admin.layouts.app')
@section('title','Campaigns')

@section('content')

<h1 class="page-title">Campaigns</h1>

<a href="{{ route('admin.campaigns.create') }}" class="btn">Tambah Campaign</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Target</th>
            <th>Collected</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($campaigns as $c)
        <tr>
            <td>{{ $c->title }}</td>
            <td>Rp {{ number_format($c->target_amount) }}</td>
            <td>Rp {{ number_format($c->collected_amount) }}</td>
            <td>{{ $c->status }}</td>
            <td>
                <a href="{{ route('admin.campaigns.edit', $c->id) }}">Edit</a>
                |
                <form action="{{ route('admin.campaigns.destroy', $c->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus data ini?')" class="btn" style="background:#cc0000;">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $campaigns->links() }}

@endsection
