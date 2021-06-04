<?php

namespace App\Http\Controllers\Color;


use App\RepositoryInterfaces\Color\ColorRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    protected $colorrepository;
    protected $perpage;
    /**
     * @param: LeaveTypeRepositoryInterface  $LeaveTypeRepository;
     */
    public function __construct(ColorRepositoryInterface $colorrepository)
    {
        $this->colorrepository = $colorrepository;
        $this->perpage = 2;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = $this->colorrepository->all();
        return view('Color.index', [
            'data' => $data
        ]);
        
    
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public  function create()
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

        $data = $request->only($this->colorrepository->fillables());
        
        $result = $this->colorrepository->create($data);
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // abort("not working");
        $result = $this->colorrepository->show($id);
        return $result;
        
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
        
        $data = $request->only($this->colorrepository->fillables());        
        $result = $this->colorrepository->update($data, $id);
        return response()->json("Updated");
        return $result;
        
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
        $result = $this->colorrepository->delete($id);
        return response()->json("Deleted");
    }
    
    public function fetchRecords($perpage = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {

        $data = $this->colorrepository->recordsWithPagination($perpage, ['*'], 'page', $pagenumber);
        
        return response()->json(view('Color.partials.table',[
            'data' => $data
        ])->render());
       
    }

}
    