<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
  protected $table='debts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nom_deb','con_deb', 'mon_deb','fec_deb','fin_deb'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
