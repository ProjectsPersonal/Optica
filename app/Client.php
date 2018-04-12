<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table='client';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nam_cli','lpa_cli', 'lma_cli','old_cli','ci_cli','add_cli','pho_cli'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id_user'
  ];
}
