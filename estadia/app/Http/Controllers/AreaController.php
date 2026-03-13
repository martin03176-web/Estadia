<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\Area\AreaRequest;
use App\Services\Area\AreaService;
use App\Models\Area;

class AreaController extends Controller
{
    public function __construct(protected AreaService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$areas = Area::orderByRaw("FIELD(edificio, 'F', 'A', 'F1', 'B', 'F2','C','F3','D','F4','E','F5','G','H','I','J','Nave')")->get();
        $areas = $this->service->getAll();
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.form', ['area'=> new Area()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('areas.index')->with('message', 'Area creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $area = $this->service->find($id);
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = $this->service->find($id);
        return view('areas.form', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AreaRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('areas.index')->with('message', 'Area actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('areas.index')->with('message', 'Area eliminada correctamente');
    }
}
