<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateUser;
use App\Http\Requests\PostDeleteUser;
use App\Http\Requests\PostUpdateUser;
use App\Http\Sanitizers\SanitizerUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userMain;
    protected $sanitizerUser;

    public function __construct()
    {
        $this->userMain= new User;
        $this->sanitizerUser= new SanitizerUser;
    }

    public function index()
    {
        return view('user.index');
    }

    public function postCreate(PostCreateUser $request)
    {
        $this->userMain->create($this->sanitizerUser->postCreate($request->all()));
    }

    public function getUrl($code)
    {
        return redirect( $this->userMain->where('code', $code)->first()->link);
    }

    public function postEdit(PostUpdateUser $request)
    {   
        try {
            //code...  
            $objects=[
                'name'=>$request->name,
                'email'=>$request->email,
            ];

            if(!empty($request->file('avatar'))){
                $image =  base64_encode(file_get_contents($request->file('avatar')));
                $objects['avatar_name'] = $image;
            }

            $sanitizer = $this->sanitizerUser->postEdit($objects);

            $this->userMain->findorFail($request->id)->update($sanitizer);

            return  [
                'code'      => 200,
                'message'   => 'Usuario alterado com sucesso',
                'data'      => null
            ];

        } catch (\Throwable $th) {
            //throw $th;

            return [
                'code'      => $th->getCode(),
                'message'   => $th->getMessage(),
                'data'      => null
            ];
        }
    }

    public function postDelete(PostDeleteUser $request)
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
                    'name'          => $item->name,
                    'email'         => $item->email,
                    'avatar'        => $item->avatar ? sprintf( "data:image/png;base64,%s", base64_encode($item->avatar)) : null
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
