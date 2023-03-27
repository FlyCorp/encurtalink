<?php

namespace App\Http\Controllers;

use App\LinkConfiguration;
use Illuminate\Http\Request;
use App\Http\Requests\PostEditUrlConfig;
use App\Http\Requests\PostCreateUrlConfig;
use App\Http\Sanitizers\SanitizerUrlConfig;
use App\Composers\ComposerLinkConfig;

class LinkConfigurationController extends Controller{

    protected $linkConfiguration;
    protected $sanitizerUrlConfig;
    protected $composerLinkConfig;

    public function __construct()
    {
        $this->linkConfiguration  = new LinkConfiguration;
        $this->sanitizerUrlConfig = new SanitizerUrlConfig;
        $this->composerLinkConfig = new ComposerLinkConfig;
    }

    public function index()
    {
        return view('urls.configuration.index');
    }

    public function postCreate(PostCreateUrlConfig $request)
    {
        $this->linkConfiguration->create($this->sanitizerUrlConfig->postCreate($request->all()));
    }

    public function getEdit($id)
    {
        $linkConfiguration = $this->linkConfiguration->find($id);
        return view('urls.configuration.edit', compact('linkConfiguration'));
    }

    public function postEdit($id, PostEditUrlConfig $request)
    {
        $this->linkConfiguration->where('id',$id)->update($this->sanitizerUrlConfig->postEdit($request->all()));
        return redirect()->route('urls.config.index');
    }

    public function postDelete($id)
    {
        $this->linkConfiguration->find($id)->delete();
        return redirect()->route('urls.config.index');
    }

    public function getKeys()
    {
        return response()->json([
            'keys' => $this->composerLinkConfig->getKeyValues()
        ],200);
    }

    public function getSearch(Request $request)
    {
        $query = request()->all();

        $queryTerm      = $query['term'];
        $queryDraw      = $query['draw'];

        $queryOrder     = $this->getOrder($query['order']);
        $querySkip      = $query['start'];
        $queryLength    = $query['length'];
        $queryPage      = $querySkip == 0 ? 1 : ($querySkip / $queryLength + 1);

        if ($queryOrder->column) {
            $collection = $this->linkConfiguration->search($queryTerm)
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
                    'key'           => $item->key,
                    'description'   => $item->description,
                ];
        }

        $collectionFilter['data'] = $collectionData;

        return response()->json($collectionFilter);
    }

    public function getOrder(array $order)
    {
        $orderFilter =
            [
                0 => ['column' => 'id',      'sort' => $order[0]['dir']],
                1 => ['column' => 'key',     'sort' => $order[0]['dir']],
                2 => ['column' => 'description',   'sort' => $order[0]['dir']],
            ];

        return (object) $orderFilter[$order[0]['column']];
    }
}
