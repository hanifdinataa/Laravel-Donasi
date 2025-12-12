@extends('admin.layouts.app')
@section('title','Donations')

@section('content')

<h1 class="page-title">Donations</h1>

<table class="table">
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Donor</th>
            <th>Amount</th>
            <th>Campaign</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($donations as $d)
        <tr>
            <td>{{ $d->invoice }}</td>
            <td>{{ $d->donor_name ?? 'Anonim' }}</td>
            <td>Rp {{ number_format($d->amount) }}</td>
            <td>{{ $d->campaign->title ?? '-' }}</td>
            <td>{{ $d->status }}</td>
            <td>
                <a href="{{ route('admin.donations.show',$d->id) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $donations->links() }}

@endsection
