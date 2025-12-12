<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $q = Donation::with('campaign')->orderByDesc('created_at');

        if ($request->filled('campaign_id')) {
            $q->where('campaign_id', $request->campaign_id);
        }
        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }

        $donations = $q->paginate(20);
        $campaigns = Campaign::all();
        return view('admin.donations.index', compact('donations','campaigns'));
    }

    public function show($id)
    {
        $donation = Donation::with('campaign')->findOrFail($id);
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $request->validate(['status'=>'required|in:pending,success,failed']);
        $donation->status = $request->status;
        $donation->save();

        // refresh campaign collected if success
        if ($donation->status === 'success') {
            $donation->campaign->refreshCollected();
        }

        return redirect()->back()->with('success','Status updated');
    }

    public function finish($invoice)
{
    $donation = Donation::where('invoice', $invoice)->firstOrFail();

    // Ubah status
    $donation->status = 'success';
    $donation->save();

    // Tambahkan ke total campaign
    $campaign = $donation->campaign;
    if ($campaign) {
        $campaign->collected_amount += $donation->amount;
        $campaign->save();
    }

    return view('frontend.donation.completed', [
        'donation' => $donation
    ]);
}

}
