<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Requests\StoreUpdateFuncionario;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionario', compact('funcionarios'));
    }

    public function create()
    {
        return view('create_funcionario');
    }

    public function store(StoreUpdateFuncionario $request)
    {
        $funcionario = new Funcionario();
        $funcionario->nome = $request->nome;
        $funcionario->caminho_barbearia = $request->caminho_barbearia;
        $funcionario->frase_pessoal = $request->frase_pessoal;

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');

            try {
                $img = getimagesize($foto);
                $width = $img[0];
                $height = $img[1];
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                switch ($img['mime']) {
                    case 'image/jpeg':
                        $imageResource = imagecreatefromjpeg($foto);
                        break;
                    case 'image/png':
                        $imageResource = imagecreatefrompng($foto);
                        break;
                    case 'image/gif':
                        $imageResource = imagecreatefromgif($foto);
                        break;
                    default:
                        throw new \Exception('Formato de imagem não suportado.');
                }

                $newImageResource = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newImageResource, $imageResource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                $fotoPath = 'funcionarios/' . uniqid() . '.jpg';
                imagejpeg($newImageResource, storage_path('app/public/' . $fotoPath));

                imagedestroy($imageResource);
                imagedestroy($newImageResource);

                $funcionario->foto = $fotoPath;

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao processar a imagem: ' . $e->getMessage());
            }
        }

        $funcionario->save();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('edit_funcionario', compact('funcionario'));
    }

    public function update(StoreUpdateFuncionario $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->nome = $request->nome;
        $funcionario->caminho_barbearia = $request->caminho_barbearia;
        $funcionario->frase_pessoal = $request->frase_pessoal;

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($funcionario->foto) {
                Storage::disk('public')->delete($funcionario->foto);
            }

            $foto = $request->file('foto');

            try {
                $img = getimagesize($foto);
                $width = $img[0];
                $height = $img[1];
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                switch ($img['mime']) {
                    case 'image/jpeg':
                        $imageResource = imagecreatefromjpeg($foto);
                        break;
                    case 'image/png':
                        $imageResource = imagecreatefrompng($foto);
                        break;
                    case 'image/gif':
                        $imageResource = imagecreatefromgif($foto);
                        break;
                    default:
                        throw new \Exception('Formato de imagem não suportado.');
                }

                $newImageResource = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newImageResource, $imageResource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                $fotoPath = 'funcionarios/' . uniqid() . '.jpg';
                imagejpeg($newImageResource, storage_path('app/public/' . $fotoPath));

                imagedestroy($imageResource);
                imagedestroy($newImageResource);

                $funcionario->foto = $fotoPath;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao processar a imagem: ' . $e->getMessage());
            }
        }

        $funcionario->save();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        if ($funcionario->foto) {
            Storage::disk('public')->delete($funcionario->foto);
        }

        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}
