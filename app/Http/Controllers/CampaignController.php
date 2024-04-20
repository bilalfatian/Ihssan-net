<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function welcome()
    {
        $campaigns = Campaign::all();
        return view('welcome', ['campaigns' => $campaigns]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $search = request('search');
        $campaigns = Campaign::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('campaigns.index', compact('campaigns'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('campaigns.create', ['categories' => $categories] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'needed_money' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'nullable|image',
        ]);
    
        $campaign = new Campaign;
    
        if($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $campaign->image = $filename;
            $campaign->photo_url = $filename;
        }
    
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->needed_money = $request->needed_money;
        $campaign->category_id = $request->category_id;
        $campaign->publisher_id = Auth::id();
    
        $campaign->save();
    
        return redirect()->route('campaigns.my')
                         ->with('message', 'Campaign created successfully!');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Finding the campaign object
        $campaign = Campaign::findOrFail($id);
        $publisher_id = $campaign->publisher_id;
        $donations = Donation::where('campaign_id', $id)->get();
        $publisher = User::where('id', $publisher_id)->get();
        return view('campaigns.show', ['campaign' => $campaign , 'donations' => $donations, 'publisher' => $publisher ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // Finding the campaign object
    $campaign = Campaign::findOrFail($id);
    $categories = Category::all();
    // Check if the user is authorized to edit the campaign
    $this->authorize('update', $campaign);
    return view('campaigns.edit', ['campaign' => $campaign], ['categories' => $categories]);
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    // Finding the campaign object
    $campaign = Campaign::findOrFail($id);
    // Check if the user is authorized to update the campaign
    $this->authorize('update', $campaign);

    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'needed_money' => 'required|numeric',
        'category_id' => 'required|numeric',
        'image' => 'nullable|image',
    ]);

    if($request->hasFile('image')) {
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $filename, 'public');
        $campaign->image = $filename;
    }

    $campaign->title = $request->title;
    $campaign->description = $request->description;
    $campaign->category_id = $request->category_id;
    $campaign->needed_money = $request->needed_money;

    $campaign->save();

    return redirect()->route('campaigns.my', $campaign)
                     ->with('message', 'Campaign updated successfully!');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    // Finding the campaign object
    $campaign = Campaign::findOrFail($id);
    // Check if the user is authorized to delete the campaign
    $this->authorize('delete', $campaign);

    $campaign->delete();

    return redirect()->route('campaigns.my')
                     ->with('message', 'Campaign deleted successfully!');    
    }

    public function myCampaigns()
    {
        $campaigns = Campaign::where('publisher_id', auth()->id())->get();
        return view('campaigns.my', ['campaigns' => $campaigns]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
    
        $campaigns = Campaign::where('title', 'like', '%' . $search . '%')->get();
    
        return response()->json($campaigns);
    }
    
    

}
