<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contact;

class TestsController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function confirm(TestRequest $request)
    {
        $contents = $request->all();
        return view('confirm', ['contents' => $contents]);
    }

    public function send(Request $request)
    {
        if ($request->input('back') == 'back') {
            return redirect()->route('form')->withInput();
        }
        $contents = $request->all();
        Contact::create($contents);
        return view('send', ['contents' => $contents]);
    }

    public function system(Request $request)
    {
        $contents = Contact::paginate(5);
        $keyword = $request->keyword;

        $query = Contact::query();

        if (!empty($keyword)) {
            $query->where('fullname', 'like', "%$keyword%")
                ->where('gender', $keyword)
                ->where('email', 'like', "%$keyword%");
        }

        $contents = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('system', ['contents' => $contents])
            ->with('keyword', $keyword);
    }
}
