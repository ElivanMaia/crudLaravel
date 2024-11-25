<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Requests\StoreUpdateServico;
use Illuminate\Support\Facades\Storage;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('servico', compact('servicos'));
    }

    public function create()
    {
        return view('create_servico');
    }

    public function store(StoreUpdateServico $request)
    {
        $servico = new Servico();
        $servico->nome_servico = $request->nome_servico;
        $servico->preco = $request->preco;
        $servico->descricao = $request->descricao;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');

            try {
                $img = getimagesize($imagem);
                $width = $img[0];
                $height = $img[1];
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                switch ($img['mime']) {
                    case 'image/jpeg':
                        $imageResource = imagecreatefromjpeg($imagem);
                        break;
                    case 'image/png':
                        $imageResource = imagecreatefrompng($imagem);
                        break;
                    case 'image/gif':
                        $imageResource = imagecreatefromgif($imagem);
                        break;
                    default:
                        throw new \Exception('Formato de imagem não suportado.');
                }

                $newImageResource = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newImageResource, $imageResource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                $imagemPath = 'servicos/' . uniqid() . '.jpg';
                imagejpeg($newImageResource, storage_path('app/public/' . $imagemPath));

                imagedestroy($imageResource);
                imagedestroy($newImageResource);

                $servico->imagem = $imagemPath;

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao processar a imagem: ' . $e->getMessage());
            }
        }

        $servico->save();

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('edit_servico', compact('servico'));
    }

    public function update(StoreUpdateServico $request, $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->update([
            'nome_servico' => $request->nome_servico,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
        ]);

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            if ($servico->imagem) {
                Storage::disk('public')->delete($servico->imagem);
            }

            $imagem = $request->file('imagem');

            try {
                $img = getimagesize($imagem);
                $width = $img[0];
                $height = $img[1];
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                switch ($img['mime']) {
                    case 'image/jpeg':
                        $imageResource = imagecreatefromjpeg($imagem);
                        break;
                    case 'image/png':
                        $imageResource = imagecreatefrompng($imagem);
                        break;
                    case 'image/gif':
                        $imageResource = imagecreatefromgif($imagem);
                        break;
                    default:
                        throw new \Exception('Formato de imagem não suportado.');
                }

                $newImageResource = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newImageResource, $imageResource, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                $imagemPath = 'servicos/' . uniqid() . '.jpg';
                imagejpeg($newImageResource, storage_path('app/public/' . $imagemPath));

                imagedestroy($imageResource);
                imagedestroy($newImageResource);

                $servico->imagem = $imagemPath;
                $servico->save();

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao processar a imagem: ' . $e->getMessage());
            }
        }

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);

        if ($servico->imagem) {
            Storage::disk('public')->delete($servico->imagem);
        }

        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço deletado com sucesso!');
    }
}
