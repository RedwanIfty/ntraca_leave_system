<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function signatureUploadPost(Request $request)
    {
//        return $request;
        $id = auth()->user()->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('signature'), $imageName);

        $user=User::findOrFail($id);
        $user->signature=$imageName;
        $user->save();


        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
