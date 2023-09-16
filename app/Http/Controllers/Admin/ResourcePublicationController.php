<?php

namespace App\Http\Controllers\Admin;

use App\Constant\ReturnStatus;
use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ResourcePublicationController extends Controller
{
    public function index(Publication $publication)
    {
        $publication->load("media");

        return view("admin.publications.resource.index")->with(['publication'=>$publication]);
    }

    public function create(Publication $publication)
    {
        return view("admin.publications.resource.create")->with([
            'publication' => $publication
        ]);
    }

    public function store(Request $request,Publication $publication)
    {
        try {
            $reponse = $publication->addMedia($request->file("file"))
                ->toMediaCollection();
        } catch (FileDoesNotExist $e) {
        } catch (FileIsTooBig $e) {
            throw  ValidationException::withMessages([__("Le fichier de resource ne doit pas dépasse ".config('media-library.max_file_size'))]);
        }

        return back()->with(ReturnStatus::SUCCESS,updateResponse('resource'));

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
