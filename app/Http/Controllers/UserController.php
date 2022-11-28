<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userMain;
    protected $shortUrl;
    protected $sanitizerShortUrl;

    public function __construct()
    {
        $this->shortUrl= new ShortUrl();
        $this->userMain= new User();
    }

    public function index()
    {
        return view('user.index');
    }

    public function postCreate(PostCreateShortUrl $request)
    {   
        $this->userMain->create($this->sanitizerShortUrl->postCreate($request->all()));
    }

    public function getUrl($code)
    {
        return redirect( $this->userMain->where('code', $code)->first()->link);
    }

    public function postEdit(PostUpdateShortUrl $request)
    {
        $this->userMain->find($request->id)->update($this->sanitizerShortUrl->postCreate($request->all()));
    }

    public function postDelete(PostDeleteShortUrl $request)
    {
        $this->userMain->find($request->id)->delete();
    }

    public function getSearch(Request $request)
    {   
        
        $query = request()->all();

        $queryTerm      = $query['term'];
        $queryDraw      = $query['draw'];
        //$queryStatus    = $query['status'];
        $queryOrder     = $this->getOrder($query['order']);
        $querySkip      = $query['start'];
        $queryLength    = $query['length'];
        $queryPage      = $querySkip == 0 ? 1 : ($querySkip / $queryLength + 1);

        if ($queryOrder->column) {
            $collection = $this->userMain->search($queryTerm)
                ->orderBy($queryOrder->column, $queryOrder->sort)
                ->paginate($queryLength, ['*'], 'page', $queryPage);
            $collectionTotal   = $collection->total();
        }

        $collectionData    = array();
        $collectionFilter  =
            [
                'draw'            => $queryDraw,
                'recordsTotal'    => $collection->count(),
                'recordsFiltered' => $collectionTotal,
            ];
        foreach ($collection as $item) {
            $collectionData[] =
                [
                    'id'            => $item->id,
                    'name'          => $item->name,
                    'email'         => $item->email,
                ];
        }

        $collectionFilter['data'] = $collectionData;


        return response()->json($collectionFilter);
    }

    public function getOrder(array $order)
    {
        $orderFilter =
            [
                0 => ['column' => 'id',       'sort' => $order[0]['dir']],
                1 => ['column' => 'name',     'sort' => $order[0]['dir']],
                2 => ['column' => 'email',   'sort' => $order[0]['dir']],
            ];

        return (object) $orderFilter[$order[0]['column']];
    }

}