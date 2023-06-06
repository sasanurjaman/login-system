<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.menu.index', [
            'menus' => Menu::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        Menu::create([
            'menu_name' => $request->menu_name,
            'menu_icon' => $request->menu_icon,
            'menu_link' => $request->menu_link,
        ]);

        return redirect('/menu')->with(
            'success',
            "Menu $request->menu_name has been added!"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        Menu::where('id', $menu->id)->update([
            'menu_name' => $request->menu_name,
            'menu_icon' => $request->menu_icon,
            'menu_link' => $request->menu_link,
        ]);

        return redirect('/menu')->with(
            'success',
            "Menu $request->menu_name has been upadted!"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('/menu')->with(
            'success',
            "menu $menu->menu_name has been deleted!"
        );
    }
}
