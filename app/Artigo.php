<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigo extends Model
{
    use SoftDeletes;

    protected $table = 'artigos';

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = 'U';
    protected $casts = [
        'data' => 'datetime:Y-m-d\TH:i'
    ];

    #region Accessors & Mutators
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = date('Y-m-d H:i:s', strtotime($value));
    }
    #endregion

    #region Relationships
    #endregion

    #region Queries
    public static function buscaParaTabela()
    {
        return static::select('id', 'titulo', 'descricao', 'data')
            ->get();
    }
    #endregion
}
