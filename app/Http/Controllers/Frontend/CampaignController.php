<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        return view('frontend.campaign.index', [
            'campaigns' => Campaign::paginate(12)
        ]);
    }

    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();

        return view('frontend.campaign.detail', [
            'campaign'  => $campaign,
            'donations' => $campaign->donations()->latest()->limit(10)->get()
        ]);
    }
}
