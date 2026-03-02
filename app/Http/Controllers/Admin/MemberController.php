<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('name')->get();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'nullable|string|unique:members,nim',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        Member::create($data);

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('admin.members.form', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'nim' => 'nullable|string|unique:members,nim,' . $member->id,
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member berhasil dihapus.');
    }
}
