<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $table='ticket';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'cri_tic','arm_tic','med_tic','mat_tic','sal_tic','tot_tic','nro_tic','fec_tic','hor_tic','imp_tic','id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
