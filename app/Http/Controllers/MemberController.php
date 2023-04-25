<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::all();
        return view('members.index')->with('members', $members);
    }

    public function create(): View
    {
        return view('members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|max:255',
            'address' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'mobile' => 'required|max:15|regex:/^[0-9]+$/|unique:members,mobile',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Member::create($request->all());
        return redirect('member')->with('flash_message', 'Member added!');
    }

    public function show(string $id): View
    {
        $member = Member::find($id);
        return view('members.show')->with('members', $member);
    }

    public function edit(string $id): View
    {
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
    }


    public function update(Request $request, string $id): RedirectResponse
    {
        $member = Member::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|max:255',
            'address' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'mobile' => 'required|max:15|regex:/^[0-9]+$/|unique:members,mobile',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $member->update($request->all());
        return redirect('member')->with('flash_message', 'Member updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Member::destroy($id);
        return redirect('member')->with('flash_message', 'Member deleted!');
    }
}
