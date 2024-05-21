<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NpsPostReason;
use App\NpsLink;
use App\Http\Sanitizers\SanitizerNps;
use App\Http\Requests\UUIDRequest;

class NpsController extends Controller
{
    protected $npsLink, $sanitizerNps;

    public function __construct()
    {
        $this->npsLink = new NpsLink;
        $this->sanitizerNps = new SanitizerNps;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("nps.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    private function decodeUuid($uuid)
    {
        return trim(urldecode(preg_replace('/\{\{[^}]*\}\}/', '', $uuid)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $nps = $this->npsLink->where("uuid", self::decodeUuid($uuid))->first();

        if($nps){

            if(!$nps->vote){
                return view("nps.vote", compact('nps'));
            }

            return view("nps.finish", compact('nps'));

        }
    }

    public function vote(UUIDRequest $form, $uuid, $vote)
    {
        $nps = $this->npsLink->where("uuid", self::decodeUuid($uuid))->first();

        $old = $nps->getOriginal();

        if(!isset($old) || ($old["vote"] != (int)$vote)){
            $nps->voted_at = now()->format("Y-m-d H:i");
            $nps->vote = $vote;
        }

        $nps->save();

        return view("nps.finish", compact('nps'));
    }

    public function reason(NpsPostReason $request, $uuid, $vote)
    {
        $nps = $this->npsLink->where("uuid", self::decodeUuid($uuid))->first();
        $nps->vote = $vote;
        //$nps->reason_channel = $request->validated()['reason_channel'];
        $nps->reason_description = $request->validated()['reason_description'];
        $nps->save();

        return redirect()->route("nps.feedback");
    }

    public function feedback()
    {
        return view("nps.feedback");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            $collection = $this->npsLink->search($queryTerm)
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
                    'id'                    => $item->id,
                    'campaign_name'         => $item->campaign_name,
                    'client_name'           => $item->client_name,
                    'client_document'       => $item->client_document,
                    'client_representant'   => $item->client_representant,
                    'client_uf'             => $item->client_uf,
                    'client_city'           => $item->client_city,
                    'order_company'         => $item->order_company,
                    'order_number'          => $item->order_number,
                    'order_value'           => $item->order_value,
                    'order_date'            => $item->order_date->format("d/m/Y"),
                    'config_process_in'     => $item->config_process_in->format("d/m/Y H:i"),
                    'config_greater'        => $item->config_process_in->gt(now()),
                    'config_gateway'        => $item->config_gateway,
                    'config_number'         => $item->config_number,
                    'vote'                  => $item->vote,
                    'voted_at'              => $item->voted_at ? $item->voted_at->format("d/m/Y H:i") : null,
                    'reason_channel'        => $item->reason_channel,
                    'reason_description'    => $item->reason_description,
                    'nps_link'              => route("nps.show", ["uuid" => $item->uuid]),
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
                1 => ['column' => 'campaign_name',     'sort' => $order[0]['dir']],
                2 => ['column' => 'client_name',   'sort' => $order[0]['dir']],
            ];

        return (object) $orderFilter[$order[0]['column']];
    }
}
