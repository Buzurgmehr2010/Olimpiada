<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Olympiad;
use Illuminate\Http\Request;

class OlympiadController extends Controller
{
    public function index()
    {
        $olympiads = Olympiad::latest()->paginate(10);
        return view('admin.olympiads.index', compact('olympiads'));
    }

    public function create()
    {
        return view('admin.olympiads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'cost' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Olympiad::create($validated);

        return redirect()->route('admin.olympiads.index')
            ->with('success', 'Олимпиада успешно создана');
    }

    public function show(Olympiad $olympiad)
    {
        return view('admin.olympiads.show', compact('olympiad'));
    }

    public function edit(Olympiad $olympiad)
    {
        return view('admin.olympiads.edit', compact('olympiad'));
    }

    public function update(Request $request, Olympiad $olympiad)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'cost' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $olympiad->update($validated);

        return redirect()->route('admin.olympiads.index')
            ->with('success', 'Олимпиада успешно обновлена');
    }

    public function destroy(Olympiad $olympiad)
    {
        $olympiad->delete();

        return redirect()->route('admin.olympiads.index')
            ->with('success', 'Олимпиада успешно удалена');
    }
}
