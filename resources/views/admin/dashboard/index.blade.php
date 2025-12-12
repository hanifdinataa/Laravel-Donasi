@extends('admin.layouts.app')
@section('title','Dashboard')

@section('content')

<h1 class="page-title">Dashboard</h1>

<div class="dashboard-grid">
    <div class="dashboard-card">
        <div>Total Donasi Terkumpul</div>
        <h2>Rp {{ number_format($totalDonations) }}</h2>
    </div>

    <div class="dashboard-card" style="grid-column: span 2;">
        <h3>Ringkasan Campaign</h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Target</th>
                    <th>Collected</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $c)
                <tr>
                    <td>{{ $c->title }}</td>
                    <td>Rp {{ number_format($c->target_amount) }}</td>
                    <td>Rp {{ number_format($c->collected) }}</td>
                    <td>{{ $c->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<h3 class="page-title" style="margin-top:20px;">Donasi Terbaru</h3>

@foreach($recentDonations as $d)
<div class="list-item">
    <div><b>{{ $d->donor_name ?? 'seseorang' }}</b> - Rp {{ number_format($d->amount) }}</div>
    <div style="font-size:12px;color:#777;">
        {{ $d->campaign->title ?? '-' }} • {{ $d->created_at->diffForHumans() }}
    </div>
</div>
@endforeach

@endsection
