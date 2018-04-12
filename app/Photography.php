<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
  protected $table='photography';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'url_pho','des_pho'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id_hist'
  ];
}
