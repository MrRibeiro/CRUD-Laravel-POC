<?php

namespace App\Http\Controllers;

use App\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    private $colaborador;

    public function __construct(Colaborador $colaborador)
    {
        $this->colaborador = $colaborador;
    }

    public function index(){
        $colaboradores = $this->colaborador->all();

        return view('colaborador', compact('colaboradores'));
    }

    public function store(Request $request){
        $dataForm = $request->except('_token');
        try{
            $this->colaborador->insert($dataForm);
            return response()->json([
                'title' => __('Inserido'),
                'text' => __('Colaborador inserido com sucesso'),
                'status' => TRUE
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'title' => __('Error'),
                'text' => __('Erro ao inserir colaborador'),
                'status' => FALSE
            ]);
        }
    }

    public function delete($id){
        $colab = $this->colaborador->find($id);
        $colab->delete();
    }

    public function edit($id){
        $colab = $this->colaborador->find($id);
        return $colab;
    }

    public function update(Request $request){
        $id = $request->input('id');
        $colab = $this->colaborador->find($id);
        $colab->fristname = $request->input('fristname');
        $colab->lastname = $request->input('lastname');
        $colab->role = $request->input('role');
        $colab->empresa = $request->input('empresa');
        $update = $colab->save();

        if ($update) {
            return response()->json([
                'title' => __('Editado'),
                'text' => __('Colaborador editado com sucesso'),
                'status' => TRUE
            ]);
        }else{
            return response()->json([
                'title' => __('Error'),
                'text' => __('Erro ao editar colaborador'),
                'status' => FALSE
            ]);
        }
    }
}
