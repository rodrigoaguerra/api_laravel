<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCepRequest;
use App\Http\Resources\CepResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use App\Models\Cep;

class CepController extends Controller
{
    public function index(string $cep)
    {
        // Consulta se o cep esta na base de dados
        $data = Cep::where('cep', $cep)->first();
        
        if($data) {
            return new CepResource($data);
        } 
        
        // busca cep na api do viacep
        $client = new Client();
        $cep = preg_replace("/[^0-9]/", "", $cep); // limpa string para ter apenas números
        $response = $client->request('GET', 'https://viacep.com.br/ws/'.$cep.'/json/');
        $body = $response->getBody();
        $cepData = json_decode($body, true);

        // Verificar se o CEP foi encontrado
        if (isset($cepData['cep'])) {
            
            // salva o novo cep na base de dados
            $cep = Cep::create([
                'cep' => $cepData['cep'],
                'logradouro' => $cepData['logradouro'],
                'bairro' => $cepData['bairro'],
                'localidade' => $cepData['localidade'],
                'uf' => $cepData['uf'],
            ]);

            return new CepResource($cep);
        } else {
            return response()->json(['message' => 'CEP não encontrado.'], 404);
        }
    }

    public function store(StoreUpdateCepRequest $request) {
        // Consulta se o cep esta na base de dados
        $data = Cep::where('cep', $request->cep)->first();
        
        // retorna o cep ja cadastrado
        if($data) {
            return new CepResource($data);
        } 

        $data = $request->validated();
        
        $cep = Cep::create($data);

        return new CepResource($cep);
    }

    public function update(StoreUpdateCepRequest $request, string $cep) {
        $cepData = Cep::where('cep', $cep)->first();
        
        if ($cepData) {
            $data = $request->validated();        
            
            $cepData->update($data);

            return new CepResource($cepData);
        } else {
            return response()->json(['message' => 'CEP não encontrado.'], 404);
        }
    }

    public function destroy(string $cep) {
        $cepData = Cep::where('cep', $cep)->first();
        
        if ($cepData) {
            $cepData->delete();
            return response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'CEP não encontrado.'], 404);
        }
    }

    /**
     * Executa a consulta difusa usando o método 'like' 
     * para corresponder parcialmente ao termo de pesquisa
     * @param string $searchTerm
     * @return void
     */
    public function fuzzySearch(string $searchTerm){

        $cepData = Cep::where('cep', 'like', "%$searchTerm%")
                      ->orWhere('logradouro', 'like', "%$searchTerm%")
                      ->orWhere('bairro', 'like', "%$searchTerm%")
                      ->orWhere('localidade', 'like', "%$searchTerm%")
                      ->orWhere('uf', 'like', "%$searchTerm%")
                      ->get();
        
        
        if ($cepData) {
            return response()->json($cepData);
        } else {
            return response()->json(['message' => 'CEP não encontrado.'], 404);
        }
    }
}
