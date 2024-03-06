<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaseRequest;
use App\Models\Kase;
use App\Models\Service;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.cases.index', [
            'kases' => SpladeTable::for(Kase::class)
                ->column('title', label: 'Название')
                ->column('description', label: 'Описание')
                ->column('price',label: 'Цена')
                ->column('date', label: 'Дата выполнения')
                ->column('image', 'Картинка')
                ->column('action', label: 'Действия', canBeHidden: false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CaseRequest $request)
    {
        $case = new Kase();

        $case-> title = $request -> input('title');
        $case-> description = $request -> input('description');
        $case -> price = $request -> input('price');
        $case -> date = $request -> input('date');
        $case->image = $request->file('image')->store('public/storage/cases');
        $case -> isActive = $request -> input('isActive');
        $case -> save();
        Toast::title('Кейс добавлен');


        return redirect() -> route('cases.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kase $case)
    {
        return view('admin.cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kase $case)
    {
        $case-> title = $request -> input('title');
        $case-> description = $request -> input('description');
        $case -> price = $request -> input('price');
        $case -> date = $request -> input('date');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/storage/cases', $filename);
            $case->image = $filename;
        }
        $case->save();
        Toast::title('Кейс добавленна');
        return redirect()->route('cases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kase $case)
    {
        $case->delete();
        Toast::title('Услуга удалена');
        return redirect()->route('cases.index');
    }
}
