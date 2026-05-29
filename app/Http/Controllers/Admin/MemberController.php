<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Member\CreateMemberRequest;
use App\Http\Requests\Admin\Member\EditMemberRequest;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
   public function index() {
    $members = Member::all();

    return view("Admin.Member.index", compact('members'));
   }

   public function create() { 
    return view("Admin.Member.create", );
   }

   public function store (CreateMemberRequest $request) {
    $validated = $request->validated();

    $validated['registered_at'] = now();
    $validated['expires_at'] = now()->addYear();

   DB::transaction(function () use ($validated) {
       $user = User::create([
        'name' => $validated['fullname'],
        'email'=> $validated['email'],
        'password' => Hash::make(str_replace(' ', '',$validated['fullname'])),
        'role_id' => 3,
       ]);

       $validated['user_id'] = $user->id;

       Member::create($validated);

   });

    return redirect()->route("member.index")->with("success","Berhasil menambahkan member");
   }

   public function edit(Member $member) {
    return view("Admin.Member.edit", compact("member"));
   }

   public function update(EditMemberRequest $request, Member $member) {
    $validated = $request->validated();

    DB::transaction(function () use($validated, $member) {
       $member->update($validated);

    //    Bisa seperti ini
    //    $member->user->update([
    //     "name"=> $validated["fullname"],
    //     "email"=> $validated["email"],
    //     'updated_at' => now(),
    //    ]);
    //    Atau
        User::where('id', $member->user_id)->update([
            "name"=> $validated["fullname"],
            "email"=> $validated["email"],
            'updated_at' => now(),
        ]);
    });
    return redirect()->route("member.index")->with("success","Berhasil mengupdate member");
   }

   public function destroy(Member $member) {
    $member->delete();

    return redirect()->route("member.index")->with("success","Berhasil Hapus data");
   }
}
