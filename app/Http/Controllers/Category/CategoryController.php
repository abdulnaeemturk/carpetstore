<?php

namespace App\Http\Controllers\Category;


use App\RepositoryInterfaces\Category\CategoryRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryrepository;
    protected $perpage;
    /**
     * @param: LeaveTypeRepositoryInterface  $LeaveTypeRepository;
     */
    public function __construct(CategoryRepositoryInterface $categoryrepository)
    {
        $this->categoryrepository = $categoryrepository;
        $this->perpage = 2;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = $this->categoryrepository->all();
        return view('Category.index', [
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

        $data = $request->only($this->categoryrepository->fillables());
        
        $result = $this->categoryrepository->create($data);
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
        $result = $this->categoryrepository->show($id);
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
        
        $data = $request->only($this->categoryrepository->fillables());        
        $result = $this->categoryrepository->update($data, $id);
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
        $result = $this->categoryrepository->delete($id);
        return response()->json("Deleted");
    }
    
    public function fetchRecords($perpage = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {

        $data = $this->categoryrepository->recordsWithPagination($perpage, ['*'], 'page', $pagenumber);
        // return response()->json($data['links']);
        return response()->json(view('Category.partials.table',[
            'data' => $data
        ])->render());
        // return $this->Categoryrepository->recordsWithPagination($perpage, ['*'], 'page', $pagenumber);
    }

}
    