<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('category')->orderByDesc('created_at')->paginate(15);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('admin.campaigns.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'short_description'=>'nullable|string',
            'description'=>'nullable|string',
            'target_amount'=>'required|numeric|min:0',
            'end_date'=>'nullable|date',
            'category_id'=>'nullable|exists:categories,id',
            'status'=>'required|in:draft,active,closed',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('campaigns','public');
            $data['image'] = $path;
        }

        $campaign = Campaign::create($data);
        return redirect()->route('admin.campaigns.index')->with('success','Campaign created');
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        $categories = Category::orderBy('priority')->get();
        return view('admin.campaigns.edit', compact('campaign','categories'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $data = $request->validate([
            'title'=>'required|string',
            'short_description'=>'nullable|string',
            'description'=>'nullable|string',
            'target_amount'=>'required|numeric|min:0',
            'end_date'=>'nullable|date',
            'category_id'=>'nullable|exists:categories,id',
            'status'=>'required|in:draft,active,closed',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('campaigns','public');
            $data['image'] = $path;
        }

        $campaign->update($data);

        // refresh collected amount (in case)
        $campaign->refreshCollected();

        return redirect()->route('admin.campaigns.index')->with('success','Campaign updated');
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return redirect()->route('admin.campaigns.index')->with('success','Campaign deleted');
    }
}
