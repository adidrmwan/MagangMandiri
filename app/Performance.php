<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $table = 'performance';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atm','bulan','lokasi','area','pengelola','jenis_lokasi','jenis_mesin','denom','item','volume','feebased','kuadran',];
}
