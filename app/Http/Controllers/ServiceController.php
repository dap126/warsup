<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource (Public).
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $googlePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // File separated into uploads/services
            $folder = 'uploads/services';
            $googlePath = $folder . '/' . $nama_file;

            // Upload ke Google Drive (Original Only, No Optimization)
            Storage::disk('google')->putFileAs($folder, $file, $nama_file);
        }

        Service::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $googlePath,
        ]);

        return redirect()->route('dashboard.services')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        // Not implemented for dashboard usually, or just use edit
        // For public, we might want a show page, but sticking to index for now unless requested.
        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $googlePath = $service->image_path;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            // File separated into uploads/services
            $folder = 'uploads/services';
            $googlePath = $folder . '/' . $nama_file;

            // Upload new image (Original Only, No Optimization)
            Storage::disk('google')->putFileAs($folder, $file, $nama_file);



            // Delete old image if exists
            if ($service->image_path && Storage::disk('google')->exists($service->image_path)) {
                Storage::disk('google')->delete($service->image_path);
            }
        }

        $service->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $googlePath,
        ]);

        return redirect()->route('dashboard.services')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image from Drive if you want
        if ($service->image_path && Storage::disk('google')->exists($service->image_path)) {
            Storage::disk('google')->delete($service->image_path);
        }

        $service->delete();

        return redirect()->route('dashboard.services')->with('success', 'Service deleted successfully.');
    }
}
