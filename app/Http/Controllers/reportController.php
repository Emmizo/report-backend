<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Validator;
class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Report::where('status',0)->get();
        return response()->json(['message'=>'success','data'=>$all,'status'=>200],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $status=$request->status;
        $block= Report::where('id',$request->id)->update([
            'status'=>$status
        ]);
        return response()->json(['message'=>'success','data'=>'changed','status'=>200],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source_report' => 'required',
            'report_type' => 'required',
            'message'=>'required',
            ]);
    
            if ($validator->fails()) {
    
                $data ['status'] = 404;
                $data ['data'] = 'Validation Error.';
                $data ['message'] = $validator->errors()->first();
                return response()->json($data);
            }

            $save= Report::create([
                'source_report'=>$request->source_report,
                'report_type'=>$request->report_type,
                'message'=>$request->message,
            ]);
            return response()->json(['message'=>'success','status'=>200],200);
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
}
