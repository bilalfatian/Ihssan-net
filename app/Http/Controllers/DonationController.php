<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Donation;

use Illuminate\Http\Request;


class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        return view('donations.create', ['campaign' => $campaign]);
    }



    public function store(Request $request, Campaign $campaign)
    {
    $validated = $request->validate([
        'amount' => 'required|numeric|min:1|max:' . Auth::user()->balance,
        'comment' => 'nullable|string',
    ]);

    $donation = new Donation($validated);
    $donation->user_id = Auth::user()->id;
    $donation->campaign_id = $campaign->id;
    $donation->comment = $validated['comment'];
    $donation->save();

    // Deduct the donated amount from the user's balance
    $user = Auth::user();
    $user->balance -= $validated['amount'];
    $user->save();

    // Add the Donated Amount to the campaign
    $campaign->raised_money += $validated['amount'];
    $campaign->save();


    return redirect()->route('campaigns.show', $campaign)->with('success', 'Donation made successfully!');
    }



    public function myDonations()
    {
        $donations = Donation::where('user_id', auth()->id())->get();
        return view('donations.my', ['donations' => $donations]);
    }

    //
}
