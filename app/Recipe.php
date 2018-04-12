<?php

namespace optica;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $table='recipe';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'dat_rec','lde_rec','ldc_rec','ldj_rec','lda_rec','lie_rec','lic_rec','lij_rec','lia_rec','dip_rec','add_rec','cde_rec','cdc_rec','cdj_rec','cda_rec','cie_rec','cic_rec','cij_rec','cia_rec','tip_rec','use_rec','con_rec','obs_rec','imp_rec'

  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'id','id_cli', 'id_user',
  ];
}
