<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Os extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo','descricao','conteudo','data_inicio','data_final','user_id','image'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function listaOs($paginate,$user_id)
    {
        //verifica se esta passando user_id se nao tiver sera administrador
        if(!empty($user_id)){
            $listaOs = DB::table('os')
            ->join('users','users.id','=','os.user_id')
            ->select('os.id','os.titulo','os.descricao','users.name','os.data_inicio','os.data_final','image')
            ->where(function ($query) use ($user_id){
                $query->where('os.user_id','=',$user_id);
            })
            ->whereNull('deleted_at')
            ->paginate($paginate);
    
            return  $listaOs;
        }else{
            $listaOs = DB::table('os')
            ->join('users','users.id','=','os.user_id')
            ->select('os.id','os.titulo','os.descricao','users.name','os.data_inicio','os.data_final','image')
            ->whereNull('deleted_at')
            ->paginate($paginate);
                
            return  $listaOs;
        }
    }

    public static function listaOsSite($paginate, $busca = null)
    {
        
        if($busca) {
            $listaOs = DB::table('os')
            ->join('users','users.id','=','os.user_id')
            ->select('os.id','os.titulo','os.descricao','users.name','os.data_inicio','os.data_final','image')
            ->whereNull('deleted_at')
            ->whereDate('os.data_inicio','<=',date('Y-m-d'))
            ->where(function ($query) use ($busca){
                        $query->orWhere('titulo','like','%'.$busca.'%')
                        ->orWhere('descricao','like','%'.$busca.'%');
            })
            ->orderBy('os.data_inicio','DESC')
            ->paginate($paginate);
        }else{
            
            $listaOs = DB::table('os')
            ->join('users','users.id','=','os.user_id')
            ->select('os.id','os.titulo','os.descricao','users.name','os.data_inicio','os.data_final','image')
            ->whereNull('deleted_at')
            ->whereDate('os.data_inicio','<=',date('Y-m-d'))
            ->orderBy('os.data_inicio','DESC')
            ->paginate($paginate);
        }


        return  $listaOs;
    }

    
}
