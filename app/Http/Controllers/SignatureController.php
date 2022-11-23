<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Signature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSignatureRequest;
use App\Http\Requests\UpdateSignatureRequest;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signature.index', [
            'signature' => Signature::where('id_user', Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSignatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignatureRequest $request)
    {
        $validatedData = validator($request->all(), [
            'id_user' => 'required|integer',
            'receiver' => 'required|string|max:255',
            'subject' => 'required|string',
            'designation' => 'required|string|max:255',
        ])->validate();

        $signature = new Signature($validatedData);

        if ($request->file('document')) {
            $file = $request->file('document');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $signature['document'] = $filename;
        }

        $signature->save();

        return redirect(route('signature.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $id)
    {
        return view('signature.show', [
            'signature' => $id,
            'user' => User::findOrFail($id->id_user)
        ]);
    }

    public function download(Signature $id)
    {
        return response()->download(public_path('documents/' . $id->document));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function edit(Signature $id)
    {
        return view('signature.edit', [
            'signature' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignatureRequest  $request
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignatureRequest $request, Signature $id)
    {
        $validatedData = validator($request->all(), [
            'id_user' => 'required|integer',
            'receiver' => 'required|string|max:255',
            'subject' => 'required|string',
            'designation' => 'required|string|max:255',
        ])->validate();

        $id->update([
            'receiver' => $validatedData['receiver'],
            'subject' => $validatedData['subject'],
            'designation' => $validatedData['designation'],
        ]);

        if ($request->file('document')) {
            if (File::exists(public_path('documents/' . $id->document))) {
                File::delete(public_path('documents/' . $id->document));
            }
            
            $file = $request->file('document');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $id->update([
                'document' => $filename
            ]);
        }

        return redirect(route('signature.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $id)
    {
        $id->delete();
        if (File::exists(public_path('documents/' . $id->document))) {
            File::delete(public_path('documents/' . $id->document));
        }
        return redirect(route('signature.index'));
    }
}
