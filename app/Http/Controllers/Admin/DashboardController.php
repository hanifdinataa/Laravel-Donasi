<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // total all donations (success)
        $totalDonations = Donation::where('status','success')->sum('amount');

        // campaigns summary: id, title, target, collected
        $campaigns = Campaign::withCount(['donations as success_count' => function($q){
            $q->where('status','success');
        }])->get()->map(function($c){
            $c->collected = $c->donations()->where('status','success')->sum('amount');
            return $c;
        });

        // latest donations
        $recentDonations = Donation::with('campaign')->orderByDesc('created_at')->limit(10)->get();

        return view('admin.dashboard.index', compact('totalDonations','campaigns','recentDonations'));
    }
}
