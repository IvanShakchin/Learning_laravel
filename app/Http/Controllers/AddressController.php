<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //отвечает за вывод всех элементов
        // https://laravel.local/addresses
        return view('addresses.index', ['addresses'=>Address::all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //выводит  форму на создание
        //https://laravel.local/addresses/create
        //return 'Показать форму для добавления адреса';
        return view('addresses.form', ['action'=>'create']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreAddressRequest $request)
    {
        //принимает данные из созданой в create формы Post запросы
        $validated = $request->safe();
        $address = new Address();
        $address->address = $validated->address;
        $address->save();
        return redirect()->route('addresses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //показывает запись которая передается в $address
        // https://laravel.local/addresses/1
        return view('addresses.show', ['address'=>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //выводит форму для запись которая передается в $address
        // https://laravel.local/addresses/1/edit
        //return 'Показать форму для редактирования адреса'.$address->id.'<br>'.$address->address;
        return view('addresses.form', ['action'=>'edit', 'address'=>$address]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //обновялет данный из формы edit запись которая передается в $address
        // PUT / PATCH запросы
        $validated = $request->safe();
        $address->address = $validated->address;
        $address->save();
        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //удаляет запись которая передается в $address
        // DELETE запросы
        $address->delete();
        return redirect()->route('addresses.index');
    }
}
