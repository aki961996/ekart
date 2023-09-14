<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Member;
use Illuminate\Http\Request;
use DataTables;

class MemberController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            // $data = Member::latest()->get();
            $data = Member::all();
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct" onclick="editFunc(' . $row->id . ')">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct" onclick="deleteFunc(' . $row->id . ')">Delete</a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $memberDatas = Member::all();
        return view('member.index');
    }

    public function store(Request $request)
    {
        $memberId = request('id');


        $member = Member::updateOrCreate(
            [
                'id' => $memberId,
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
            ]
        );
        //dd($member);
        return response()->json($member);
    }

    //edit
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        //$member = Member::find($where);
        //dd($member);
        $member  = Member::where($where)->first();

        return Response()->json($member);
        // return response()->json([
        //     'message' => 'Member Fetch successfuly',
        //     'status' => 200,
        //     'res' => $member
        // ]);
    }

    //delete
    public function destroy(Request $request)
    {
        $where = array('id' => $request->id);
        $member = Member::where('id',  $where)->delete();

        return Response()->json($member);
    }
}
