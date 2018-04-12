<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  protected $table='expenses';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'des_exp','mon_exp', 'fec_exp'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];
}
