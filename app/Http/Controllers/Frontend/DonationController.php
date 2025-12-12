<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function form($campaign_id)
    {
        $campaign = Campaign::findOrFail($campaign_id);
        return view('frontend.donation.form', compact('campaign'));
    }

    public function process(Request $request, $campaign_id)
    {
        $request->validate([
            "amount" => "required|numeric|min:1000",
            "payment_method" => "required"
        ]);

        $campaign = Campaign::findOrFail($campaign_id);

        $invoice = "INV-" . strtoupper(Str::random(10));

        $donation = Donation::create([
            "campaign_id" => $campaign->id,
            "invoice" => $invoice,
            "amount" => $request->amount,
            "donor_name" => $request->donor_name,
            "donor_email" => $request->donor_email,
            "message" => $request->message,
            "payment_method" => $request->payment_method,
            "status" => "pending"
        ]);

        return redirect()->route('donation.dummyPay', $donation->id);
    }

    public function dummyPay($donation_id)
    {
        $donation = Donation::findOrFail($donation_id);
        return view('frontend.donation.payment', compact('donation'));
    }

public function finish($invoice)
{
    $donation = Donation::where('invoice', $invoice)->firstOrFail();

    if ($donation->status !== 'success') {

        $donation->update(["status" => "success"]);

        $campaign = Campaign::find($donation->campaign_id);

        if ($campaign) {
            $campaign->collected_amount += $donation->amount;
            $campaign->save();
        }
    }

    return view('frontend.donation.success', compact('donation'));
}

}
