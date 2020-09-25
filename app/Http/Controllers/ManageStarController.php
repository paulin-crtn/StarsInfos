<?php

namespace App\Http\Controllers;

use App\Http\Models\Star;
use App\Http\Requests\StarRequest;
use Illuminate\Support\Facades\Storage;


class ManageStarController extends Controller
{

    /** Delete a star record in the DB (SoftDelete enable in Star Model) **/

    public function delete(int $id)
    {
        $star = Star::find($id);

        // Delete file from storage
        if ($star->photo) {
            Storage::delete('public/'.$star->photo);
        }
        
        // Delete & Handling errors
        if(!$star->delete()) {
            return redirect('/')->with('error', 'Une erreur est survenue');
        }
        
        return redirect('/')->with('status', 'Fiche '.$star->firstname.' '.$star->lastname.' supprimée');
    }


    /** Display an empty value form to create a new star. **/

    public function index()
    {
        return view('back.update-star');
    }


    /** Update star record in the DB. **/

    public function update(StarRequest $request, int $id)
    {
        $validated = $request->validated();

        // Validation passed ? Script will continue...
        // DB update preparation
        $star = Star::find($id);
        $data = $this->prepareData($request);

        // Store file
        if ($request->has('photo')) {
            // Delete previous photo if exists (storage space optimisation)
            if ($star->photo) {
                Storage::delete('public/'.$star->photo);
            }
            // Store new photo and retrieve path
            $path = $request->file('photo')->store('public');
            $data['photo'] = substr($path, 7); // FIX to save only the new automatically generated filename (delete "public/" in $path string) | Not very clean
        }

        $star->fill($data);

        // Update & Handling errors
        if(!$star->update()) {
            return redirect('/')->with('error', 'Une erreur est survenue');
        }
        
        return redirect('/')->with('status', 'Fiche '.$star->firstname.' '.$star->lastname.' mise à jour');
    }


    /** Display a form with old values to update an existing star. **/
    public function show(int $id)
    {
        $star = Star::find($id);

        if (empty($star)) {
            return redirect('/')->with('error', 'Cette fiche n\'existe pas');
        }

        $data = ['star' => $star];
        return view('back.update-star', $data);
    }


    /** Create a new star in the DB. */

    public function store(StarRequest $request)
    {
        $validated = $request->validated();

        // Validation passed ? Script will continue...
        // DB save preparation
        $star = new Star;
        $data = $this->prepareData($request);

        // Store file
        if ($request->has('photo')) {
            // Store new photo and retrieve path
            $path = $request->file('photo')->store('public');
            $data['photo'] = substr($path, 7); // FIX to save only the new automatically generated filename (delete "public/" in $path string) | Not very clean
        }

        $star->fill($data);
        
        // Create & Handling errors
        if(!$star->save()) {
            return redirect('/')->with('error', 'Une erreur est survenue');
        }
        
        return redirect('/')->with('status', 'Fiche '.$star->firstname.' '.$star->lastname.' créée');
    }


    /** 
     * Prepares the data sent by the form before recording in the DB and returns them in the correct format for recording.
     * Remove empty fields and do the mapping at the level of the field names (DB/form). 
    **/

    public function prepareData(StarRequest $request)
    {
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'description' => $request->description,
        ];
        $data = array_filter($data, function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
        return $data;
    }
}
