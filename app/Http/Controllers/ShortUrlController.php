<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateShortUrl;
use App\Http\Requests\PostDeleteShortUrl;
use App\Http\Requests\PostUpdateShortUrl;
use App\Http\Sanitizers\SanitizerShortUrl;

use \Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    protected $shortUrl;
    protected $sanitizerShortUrl;

    public function __construct()
    {
        $this->shortUrl= new ShortUrl;
        $this->sanitizerShortUrl= new SanitizerShortUrl;
    }

    public function index()
    {
        return view('urls.index');
    }

    public function postCreate(PostCreateShortUrl $request)
    {
        $this->shortUrl->create($this->sanitizerShortUrl->postCreate($request->all()));
    }

    public function getUrl($code)
    {
        $link = $this->shortUrl->where('code', $code)->first();
        return view('urls.redirect', compact('link'));
    }

    public function getEdit($id)
    {   
        $shortUrl = $this->shortUrl->findOrFail($id);
        return view('urls.update',compact('shortUrl'));
    }

    public function postEdit($id,PostUpdateShortUrl $request)
    {   
        $this->shortUrl->find($id)->update($this->sanitizerShortUrl->postEdit($request->all()));
        return redirect()->route('urls.index');
    }

    public function postDelete(PostDeleteShortUrl $request)
    {
        $this->shortUrl->find($request->id)->delete();
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
            $collection = $this->shortUrl->search($queryTerm)
                ->whereNull('deleted_at')
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
                    'code'          => $item->code,
                    'link'          => Str::limit($item->link, 40, '...'),//
                    'link_code'     => route('web.getUrl', $item->code),
                    'description'   => $item->description,
                    'script_header' => $item->script_header,
                    'script_body'   => $item->script_body,
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
                1 => ['column' => 'link',     'sort' => $order[0]['dir']],
                2 => ['column' => 'description',   'sort' => $order[0]['dir']],
            ];

        return (object) $orderFilter[$order[0]['column']];
    }
}
