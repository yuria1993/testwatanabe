<?php

namespace App\Http\Controllers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
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
        $searchParams = $request->all();


        $contents = Contact::query()
            ->when(!empty($searchParams), function (Builder $builder) use ($searchParams) {
                $builder->when(
                    !is_null(Arr::get($searchParams, 'fullname')),
                    fn (Builder $builder) => $builder->where('fullname', 'LIKE', "%" . $searchParams['fullname'] . "%")
                );
                $builder->when(
                    !is_null(Arr::get($searchParams, 'gender')),
                    fn (Builder $builder) => $builder->where('gender', $searchParams['gender'])
                );
                $builder->when(
                    !is_null(Arr::get($searchParams, 'created_at_from')),
                    fn (Builder $builder) => $builder->where(
                        'created_at',
                        '>=',
                        CarbonImmutable::parse(
                            $searchParams['created_at_from']
                        )->startOfDay()->toDateTimeString()
                    )
                );
                $builder->when(
                    !is_null(Arr::get($searchParams, 'created_at_to')),
                    fn (Builder $builder) => $builder->where(
                        'created_at',
                        '<=',
                        CarbonImmutable::parse(
                            $searchParams['created_at_to']
                        )->endOfDay()->toDateTimeString()
                    )
                );
                $builder->when(
                    !is_null(Arr::get($searchParams, 'email')),
                    fn (Builder $builder) => $builder->where('email', 'LIKE', '%' . $searchParams['email'] . '%')
                );
            })
            ->paginate(10);

        session()->flashInput($request->input());
        return view('system', ['contents' => $contents]);
    }

    public function destroy(int $id)
    {
        Contact::destroy($id);
        return redirect()->route('system');
    }
}
