<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use App\Http\Requests\StoreSubMenuRequest;
use App\Http\Requests\UpdateSubMenuRequest;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.submenu.index', [
            'subMenus' => SubMenu::filter(request('filter'))->get(),
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
    public function store(StoreSubMenuRequest $request)
    {
        SubMenu::create([
            'menu_id' => $request->menu_id,
            'sub_menu_name' => $request->sub_menu_name,
            'sub_menu_icon' => $request->sub_menu_icon,
            'sub_menu_link' => $request->sub_menu_link,
        ]);

        return redirect(
            "/subMenu?filter=$request->menu_id&menu=$request->menu_name"
        )->with('success', "Sub Menu $request->sub_menu_name has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(SubMenu $subMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubMenu $subMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubMenuRequest $request, SubMenu $subMenu)
    {
        SubMenu::where('id', $subMenu->id)->update([
            'menu_id' => $request->menu_id,
            'sub_menu_name' => $request->sub_menu_name,
            'sub_menu_icon' => $request->sub_menu_icon,
            'sub_menu_link' => $request->sub_menu_link,
        ]);

        return redirect(
            "/subMenu?filter=$request->menu_id&menu=$request->menu_name"
        )->with('success', "Sub Menu $request->sub_menu_name has been update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubMenu $subMenu, UpdateSubMenuRequest $request)
    {
        $subMenu->delete();

        return redirect(
            "/subMenu?filter=$request->menu_id&menu=$request->menu_name"
        )->with('success', "Sub Menu $subMenu->sub_menu_name has been update");
    }
}
