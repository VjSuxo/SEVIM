<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\TipoDenuncia;
use App\Models\TipoViolencia;
use App\Models\EstadoCivil;
use App\Models\Persona;
use App\Models\DenunciaViolencia;
use App\Models\Tiene;
use Carbon\Carbon;

class DenunciaController extends Controller
{

    public function index()  {
        $tipoViolencia = TipoViolencia::get();

        return view('/formulario',['tipoViolencias'=>$tipoViolencia]);
    }

    public function indexVic(DenunciaViolencia $denuncia) {
        $estadoCivil = EstadoCivil::get();
        return view('/formulariovictima',[ 'estadosCiviles'=> $estadoCivil,'denuncia' => $denuncia]);
    }

    public function indexDen(Tiene $tiene){
        $estadoCivil = EstadoCivil::get();
        return view('/formularioDenunciado',[ 'estadosCiviles'=> $estadoCivil,'tiene' => $tiene]);

    }

    public function createDH(Request $request){
       // return $request;
        $request->validate([
            'fechaD' => 'required|date',
            'fechaH' => 'required|date',
            'tipoV' => 'required|integer', // Asegúrate de que 'tipoV' sea un entero válido
            'relato' => 'required|string',
            'archivo' => 'file', // Puedes ajustar las reglas de validación del archivo según tus necesidades
        ]);

        $denuncia = new DenunciaViolencia();
        $denuncia->fechaHechoDenuncia = $request->input('fechaD');
        $denuncia->relato = $request->input('relato');
        $denuncia->tipo_violencia_id = $request->input('tipoV');
        $denuncia->tipo_denuncia_id =2;
        // Verifica si se ha subido un archivo y lo guarda
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('archivos_denuncias', 'public');
            $denuncia->urlArchivoPruebas = $rutaArchivo;
        }
        // Guarda la denuncia en la base de datos
        $denuncia->save();

        return redirect()->route('formularioVic',['denuncia'=>$denuncia->id]);
    }

    public function createDV(Request $request,DenunciaViolencia $denuncia) {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apPat' => 'required|string|max:255',
            'apMat' => 'required|string|max:255',
            'docIdentidad' => 'required|string|max:255',
            'fechaNac' => 'required|date',
            'nacionalidad' => 'required|string|max:255',
            'sexo' => 'required|in:Femenino,Masculino,Otro',
            'estadoCivil' => 'required|exists:estados_civiles,id', // Asegúrate de que 'estadoCivil' exista en la tabla estados_civiles
            'celular' => 'required|string|max:255',
        ]);

        $personaCreada = $this->createOrUpdatePersona($request);
        $fechaActual = Carbon::now();
        $tiene = new Tiene([
            'denunciante_id' => $personaCreada->id,
            'violencia_id' => $denuncia->id,
            'fechaDenuncia'=> $fechaActual,
        ]);
        $tiene->save();
        return redirect()->route('formularioDen',['tiene'=>$tiene->id]);
    }

    public function createDD(Request $request, Tiene $tiene){
        $persona = new Persona([
            'nombre' => $request['nombre'],
            'apPat' => $request['apPat'],
            'apMat' => $request['apMat'],
            'sexo' => $request['sexo'],
            'celular' => $request['celular'],
            'idEstado' => $request['estadoCivil'],
        ]);
        $persona->save();
        $tiene = Tiene::where('id',$tiene->id)->first();
        $fechaActual = Carbon::now();
        $tiene->denunciado_id  = $persona->id;
        $tiene->save();
        return redirect()->route('welcome');

    }

    function createOrUpdatePersona($userData) {
        // Verificar si la persona ya existe por su correo electrónico
        $persona = Persona::where('email', $userData['email'])->first();

        // Si la persona no existe, la creamos
        if (!$persona) {
            $persona = new Persona([
                'id' => $userData['id'],
                'nombre' => $userData['nombre'],
                'apPat' => $userData['apPat'],
                'apMat' => $userData['apMat'],
                'fechaNac' => $userData['fechaNac'],
                'sexo' => $userData['sexo'],
                'celular' => $userData['celular'],
                'email' => $userData['email'],
                'idEstado' => $userData['estadoCivil'],
            ]);

            $persona->save();
        }

        return $persona;
    }



}
