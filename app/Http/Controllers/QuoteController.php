<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\Group;
use Validator;
use Illuminate\Validation\Rule;
use App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConfigController;



class QuoteController extends ConfigController
{
    public function index(Request $request) {
        if(request('group', 'all') == 'all') {
            $quotes = Quote::orderBy( (request('order') == 'popularity'?'views':'id') , 'desc')->get();
        } else {
            $quotes = Quote::where('group', request('group', 'none'))->orderBy( (request('order') == 'popularity'?'views':'id') , 'desc')->get();
        }
        return view('quotes.index', [
            "quotes" => $quotes,
            "groups" => Group::all()
        ]);
    }

    public function show(Request $request, $hashid) {
        if(!$quote = Quote::firstWhere('id', decodeId($hashid))) {
            abort(404);
        }
        $quote->views +=1;
        $quote->save();
        return view('quotes.show', ["quote"=>$quote]);
    }

    public function daily(Request $request) {
        if(!$quote = Quote::firstWhere('id', $this->get('daily_quote'))) {
            abort(404);
        }
        return view('quotes.show', ["quote"=>$quote]);
    }

    public function create(Request $request) {
        return view('quotes.create', ["groups"=>Group::all()]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'group' => 'required',
            'author' => 'required|string|max:30',
            'content' => 'required|string|max:150|unique:quotes,content',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if ((!$group = Group::firstWhere('uuid', request('group'))) && request('group')!=="none") {
            abort('400');
        }

        $quote = Quote::create([
            'group' => request('group'),
            'author' => request('author'),
            'content' => request('content'),
            'user' => Auth::user()->hashid,
            'show' => $group?$group->canUserPost():true,
            'daily_count' => self::get('daily_step')
        ]);
        return redirect()->route('quote.show', ['hashid'=>$quote->hashid])
            ->with('status', $quote->show?'success':'warn')
            ->with('content', $quote->show?'Citation ajoutée et visible':'Citation ajoutée, en attente de validation');
    }

    public function edit(Request $request, $hashid) {
        if(!$quote = Quote::firstWhere('id', decodeId($hashid))) {
            abort('404');
        }

        if(!$quote->canUserTouch())
            abort('403');

        return view('quotes.edit', ["groups"=>Group::all(), "quote"=>$quote]);
    }

    public function update(Request $request, $hashid) {
        if(!$quote = Quote::firstWhere('id', decodeId($hashid))) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'author' => 'required|string|max:30',
            'content' => ['required','string', 'max:150', Rule::unique('quotes', 'content')->ignore($quote->id)]
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        

        if(!$quote->canUserTouch())
            abort('403');

        if ((!$group = Group::firstWhere('uuid', $quote->group)) && request('group')!=="none") {
            abort('400');
        }

        $quote->author = request('author');
        $quote->content = request('content');
        $quote->show = $group?$group->canUserPost():true;
        $quote->daily_count = self::get('daily_step');
        $quote->touch();
        $quote->save();

        return redirect()
            ->route('quote.show', ['hashid'=>$quote->hashid])
            ->with('status', $quote->show?'success':'warn')
            ->with('content', $quote->show?'Citation modifiée et visible':'Citation modifiée, en attente de validation');
    }

    public function destroy(Request $request, $hashid) {
        if(!$quote = Quote::firstWhere('id', decodeId($hashid))) {
            abort('403');
        }

        if(!$quote->canUserTouch())
            abort('403');

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

    public static function dailyRandom() {
        $step = self::get('daily_step');
        $quotes = Quote::verified()->where('daily_count', $step)->get();
        $l = $quotes->count();

        if($l==0) {
            self::set('daily_step', intval($step)+1);
            self::dailyRandom();
        } else {
            $n = rand(0, $l-1);
            $quote = $quotes->values()[$n];
            $quote->daily_count+=1;
            $quote->save();
            self::set('daily_quote', $quote->id);
        }
    }
}
