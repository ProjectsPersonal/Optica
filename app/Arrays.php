<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Arrays extends Model
{
  protected $table='array';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'dat_rec','dat_ent', 'des_array','num_bol','id_user','id_cli'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id_user','id_cli'
  ];
}
