@extends('admin.layouts.app')
@section('title','Detail Donasi')

@section('content')

<h1 class="page-title">Detail Donasi</h1>

<div class="list-item">
    <p><b>Donor:</b> {{ $donation->donor_name ?? 'Anonim' }}</p>
    <p><b>Email:</b> {{ $donation->donor_email }}</p>
    <p><b>Amount:</b> Rp {{ number_format($donation->amount) }}</p>
    <p><b>Status:</b> {{ $donation->status }}</p>
    <hr>

    <form method="POST" action="{{ route('admin.donations.updateStatus',$donation->id) }}">
        @csrf
        <select name="status" class="form-control">
            <option value="pending">Pending</option>
            <option value="success">Success</option>
            <option value="failed">Failed</option>
        </select>

        <button class="btn" style="margin-top:10px;">Update</button>
    </form>
</div>

@endsection
