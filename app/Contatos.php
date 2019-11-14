<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $fillable = [ 'nomeVendedor', 'nomeDaEmpresa', 'nomeDoContato', 'email', 'numero', 'dataContato', 'dataValidade'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'contatos';
}
