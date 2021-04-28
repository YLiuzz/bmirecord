<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = $this->getData();
        dump($data);
        // return response($data,200);
        // dump($request->all());
        
        // return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->getData();
        $newdata = $request->all();
        $data->push(collect($newdata));
        dump($data);
        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd 只會執行一行
        // dd($request->all());
        $form = $request->all();
        $data = $this->getData();
        $select = $data->where('id',$id)->first();
        $select = $select->merge(collect($form));
        return response($select);
        // dump($select);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->getData();
        $data = $data->filter(function($product) use($id){
            return $product['id'] != $id;
        });
        return response($data->values());
    }

    public function getData(){
        return collect([
            collect([
                'id'        => '1',
                'title'     => 'test1',
                'content'   => 'This is a great product',
                'price'     =>  '100', 
            ]),
            collect([
                'id'        =>  '2',
                'title'     => 'test2',
                'content'   => 'This is a great product',
                'price'     =>  '200', 
            ])
            
        ]);
    }
}
