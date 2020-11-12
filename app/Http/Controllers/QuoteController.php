<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\Group;
use Validator;



class QuoteController extends Controller
{
    public function index(Request $request) {
        if(request('order') == 'popularity') {
            $quotes = Quote::where('group', request('group', 'none'))->orderBy('views', 'desc')->get();
        } else {
            $quotes = Quote::where('group', request('group', 'none'))->get()->reverse();
        }
        return view('quotes.index', [
            "quotes" => $quotes,
            "groups" => Group::all()
        ]);
    }

    public function show(Request $request, $uuid) {
        if(!$quote = Quote::firstWhere('uuid', $uuid)) {
            abort(404);
        }
        $quote->views +=1;
        $quote->save();
        return view('quotes.show', ["quote"=>$quote]);
    }

    public function create(Request $request) {
        return view('quotes.create', ["groups"=>Group::all()]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'group' => 'required',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $quote = Quote::create([
            'uuid' => Str::orderedUuid(),
            'group' => request('group'),
            'author' => request('author'),
            'content' => request('content'),
        ]);
        return redirect()->route('quote.show', $quote->uuid);
    }

    public function edit(Request $request, $uuid) {
        return view('quotes.edit', ["groups"=>Group::all(), "quote"=>Quote::firstWhere('uuid', $uuid)]);
    }

    public function update(Request $request, $uuid) {
        $validator = Validator::make($request->all(), [
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $quote = Quote::firstWhere('uuid', $uuid);
        $quote->author = request('author');
        $quote->content = request('content');
        $quote->touch();
        $quote->save();

        return redirect()->route('quote.show', $quote->uuid);
    }

    public function destroy(Request $request, $uuid) {
        $quote = Quote::firstWhere('uuid', $uuid);
        $quote->delete();

        return redirect()->route('home');
    }



    public function search(Request $request) {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $quotes = Quote::where('author', 'LIKE', "%$request->search%")
            ->orWhere('content', 'LIKE', "%$request->search%")
            ->get();
        return view('quotes.result', ['search'=>$request->search, 'quotes'=>$quotes]);
    }
}
