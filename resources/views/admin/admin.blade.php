@extends('../layout')
@section('title')
  Modulo de administrador (Solo personal autorizado)- Optica Ramirez
@endsection
@section('css')
    {!! Html::style('dynatable/jquery.dynatable.css')!!}
    {!! Html::style('css/menuadmin.css')!!}
@endsection
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="well">
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab" style="background-color:#fafafa; ">
                     <li class="active">
                     <a href="#cliente" data-toggle="tab" title="clientes">
                      <span class="round-tabs one">
                        <p><i class="glyphicon glyphicon-user"></i> Clientes</p>
                      </span>
                  </a></li>

                  <li><a href="#venta" data-toggle="tab" title="ventas">
                     <span class="round-tabs two">
                        <p> <i class="glyphicon glyphicon-usd"></i>Ventas</p>
                     </span>
           </a>
                 </li>
                 <li><a href="#arreglos" data-toggle="tab" title="Arreglos">
                     <span class="round-tabs three">
                       <p> <i class="glyphicon glyphicon-th-large"></i>Arreglos</p>
                     </span> </a>
                     </li>

                     <li><a href="#personal" data-toggle="tab" title="Personal">
                         <span class="round-tabs four">
                          <p> <i class="glyphicon glyphicon-lock"></i>Personal</p>
                         </span>
                     </a></li>

                     <li><a href="#gastos" data-toggle="tab" title="Gastos">
                         <span class="round-tabs five">
                          <p><i class="glyphicon glyphicon-shopping-cart"></i>Gastos</p>
                         </span> </a>
                     </li>
                     <li><a href="#deudas" data-toggle="tab" title="Deudas">
                         <span class="round-tabs six">
                          <p><i class="glyphicon glyphicon-exclamation-sign"></i>Deudas</p>
                         </span> </a>
                     </li>
                     <li><a href="#eventos" data-toggle="tab" title="eventos">
                         <span class="round-tabs seven">
                          <p><i class="glyphicon glyphicon-calendar"></i>Eventos</p>
                         </span> </a>
                     </li>

                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="cliente">
                          <p class="narrow text-center">
                            <div class="panel">
                              <!--desde aqui el codigo de la tabla!-->
                              <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#modcliente">Registro</button>
                              <!-- Modal -->
                          <div id="modcliente" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de clientes</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storeclient')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="" value="">
                                    <div class="form-group">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-3 control-label">Nombre: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="nom_clie" name="nam_cli"
                                               placeholder="Nombre">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="pat_adm" for="pat_cli" class="col-lg-3 control-label">Paterno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="pat_cli"  name="lpa_cli"
                                               placeholder="Paterno">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-3 control-label">Materno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="lma_cli"
                                               placeholder="Materno">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="dir_adm" for="ci_cli" class="col-lg-3 control-label">Edad: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="ci_cli"  name="old_cli"
                                               placeholder="Edad">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">C.I.:</label>
                                        <div class="col-lg-5">
                                          <input type="text" class="form-control" id="tel_cli"  name="ci_cli"
                                                 placeholder="Cedula">
                                        </div>
                                        <div class="col-xs-2 selectContainer">
                                            <select class="form-control" name="size">
                                              <option value="LP">LP</option>
                                              <option value="OR">OR</option>
                                              <option value="PT">PT</option>
                                              <option value="CB">CB</option>
                                              <option value="CH">CH</option>
                                              <option value="TJ">TJ</option>
                                              <option value="BE">BE</option>
                                              <option value="PA">PA</option>
                                              <option value="SC">SC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="dir_adm" for="ci_cli" class="col-lg-3 control-label">Direccion: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="ci_clie"  name="add_cli"
                                               placeholder="Direccion">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="ci_adm" for="tel_cli" class="col-lg-3 control-label">Telefono: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="tel_cli"  name="pho_cli"
                                               placeholder="Telefono">
                                      </div>
                                    </div>


                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#cliente">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <div id="modclientemodi" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de clientes</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.updateclient')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" id="idu" name="id" value="">
                                    <div class="form-group">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-3 control-label">Nombre: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="nom" name="nam_cli"
                                               placeholder="Nombre">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="pat_adm" for="pat_cli" class="col-lg-3 control-label">Paterno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="pat"  name="lpa_cli"
                                               placeholder="Paterno">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-3 control-label">Materno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat"  name="lma_cli"
                                               placeholder="Materno">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="dir_adm" for="ci_cli" class="col-lg-3 control-label">Edad: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="old"  name="old_cli"
                                               placeholder="Edad">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">C.I.:</label>
                                        <div class="col-lg-5">
                                          <input type="text" class="form-control" id="ci"  name="ci_cli"
                                                 placeholder="Cedula">
                                        </div>
                                        <div class="col-xs-2 selectContainer">
                                            <select class="form-control" name="size">
                                              <option value="LP">LP</option>
                                              <option value="OR">OR</option>
                                              <option value="PT">PT</option>
                                              <option value="CB">CB</option>
                                              <option value="CH">CH</option>
                                              <option value="TJ">TJ</option>
                                              <option value="BE">BE</option>
                                              <option value="PA">PA</option>
                                              <option value="SC">SC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="dir_adm" for="ci_cli" class="col-lg-3 control-label">Direccion: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="addres"  name="add_cli"
                                               placeholder="Direccion">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="ci_adm" for="tel_cli" class="col-lg-3 control-label">Telefono: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="pho"  name="pho_cli"
                                               placeholder="Telefono">
                                      </div>
                                    </div>


                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#cliente">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <!-- Modal -->
                          <div id="eliminamodclient" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <form class="" action="{{route('admin.deleteclient')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" name="id" id="id" value="">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">ELIMINAR CLIENTE</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Esta seguro de eliminar al cliente?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div
                          <!--fin del Modal content-->
                              <div class="table-responsive">
                                <table class="table" id="clients">
                                  <thead>
                                    <tr class="warning">
                                      <th>ID</th><th data-dynatable-column="nam_cli">NOMBRE</th>
                                      <th data-dynatable-column="lpa_cli">PATERNO</th>
                                      <th data-dynatable-column="lma_cli">MATERNO</th>
                                      <th data-dynatable-column="old_cli">DIRECCION</th>
                                      <th data-dynatable-column="ci_cli">C.I.</th>
                                      <th data-dynatable-column="add_cli">TELEFONO</th>
                                      <th data-dynatable-column="pho_cli">NIVEL</th>
                                      <th data-dynatable-column="boton">ACCIONES</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>

                                <!--hasta aqui las tablas!-->
                            </div>

                            </p>

                          <p class="text-center">
                </p>
                      </div>
                      <div class="tab-pane fade" id="venta">
                          <p class="narrow text-center">
                            <div class="panel">
                              <!--desde aqui el codigo de la tabla!-->
                              <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#modsale">Registro</button>

                              <!-- Modal -->
                          <div id="modsale" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de venta</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storesale')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha venta: </label>
                                      <div class="col-lg-8">
                                        <input type="date" name="fec_sale">
                                      </div>
                                    </div>
                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <div id="modsalemodi" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de venta</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.updatesale')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <input type="hidden" class="form-control" id="id_sale_up" name="id" value="">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha venta: </label>
                                      <div class="col-lg-8">
                                        <input type="date" id="fec_sale" name="fec_sale">
                                      </div>
                                    </div>
                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <!-- Modal -->
                          <div id="eliminaMod" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <form class="" action="{{route('admin.deletesale')}}" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" class="form-control" id="id_sale_del" name="id" value="">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">ELIMINAR VENTA</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Esta seguro de eliminar la venta?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              </form>

                            </div>
                          </div
                          <!--fin del Modal content-->
                              <div class="table-responsive">
                                <table class="table" id="sales">
                                  <thead>
                                    <tr class="warning">
                                      <td>ID</td><td data-dynatable-column="fec_sale">FECHA</td>
                                      <td data-dynatable-column="boton">ACCIONES</td>



                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                                <!--hasta aqui las tablas!-->
                            </div>
                          </p>

                          <p class="text-center">
                </p>

                      </div>
                      <div class="tab-pane fade" id="arreglos">

                          <p class="narrow text-center">
                            <div class="panel">
                              <!--desde aqui el codigo de la tabla!-->
                              <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#modarray">Registro</button>

                              <!-- Modal -->
                          <div id="modarray" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de arreglos</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storearray')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha recibo: </label>
                                      <div class="col-lg-8">
                                        <input type="date" class="form-control" id="nom_clie" name="dat_rec">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Fecha entrega: </label>
                                      <div class="col-lg-8">
                                        <input type="date" class="form-control" id="pat_cli"  name="dat_ent">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Descripcion: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="des_array"
                                               placeholder="descripcion">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Num bol: </label>
                                      <div class="col-lg-8">
                                        <input type="number" class="form-control" id="mat_cli"  name="num_bol"
                                               placeholder="num_bol">
                                      </div>
                                    </div>
                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <!-- Modal -->
                      <div id="modarraymodi" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Registro de arreglos</h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" role="form" method="POST" action="{{route('admin.updatearray')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="id_array_up" name="id" value="">
                                  <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Fecha recibo: </label>
                                  <div class="col-lg-8">
                                    <input type="datetime" class="form-control" id="datrec" name="dat_rec">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Fecha entrega: </label>
                                  <div class="col-lg-8">
                                    <input type="datetime" class="form-control" id="datent"  name="dat_ent">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Descripcion: </label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" id="des"  name="des_array"
                                           placeholder="descripcion">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Num bol: </label>
                                  <div class="col-lg-8">
                                    <input type="number" class="form-control" id="num"  name="num_bol"
                                           placeholder="num_bol">
                                  </div>
                                </div>
                                <div class="center-block">
                                  <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
                                </div>
                              </form>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!--fin del Modal content-->
                          <!-- Modal -->
                          <div id="eliminaModArray" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <form class="" action="{{route('admin.deletearray')}}" method="post">
                                    {{csrf_field()}}
                                  <input type="hidden" class="form-control" id="id_array_del" name="id" value="">
                                  <h4 class="modal-title">ELIMINAR ARREGLO</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Esta seguro de eliminar el arreglo?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                              </div>

                            </div>
                          </div
                          <!--fin del Modal content-->
                              <div class="table-responsive">
                                <table class="table" id="array">
                                  <thead>
                                    <tr class="warning">
                                      <th>ID</th><th data-dynatable-column="dat_rec">DAT_REC</th>
                                      <th data-dynatable-column="dat_ent">FECHA ENTREGA</th>
                                      <th data-dynatable-column="des_array">DESCRIPCION</th>
                                      <th data-dynatable-column="num_bol">NUM BOL</th>
                                      <th data-dynatable-column="boton">ACCIONES</th>


                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>

                                <!--hasta aqui las tablas!-->
                            </div>
                          </p>

                          <p class="text-center">
                </p>
                      </div>
                      <div class="tab-pane fade" id="personal">
                          <p class="narrow text-center">
                            <div class="panel">
                              <!--desde aqui el codigo de la tabla!-->
                              <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#moduser">Registro</button>

                              <!-- Modal -->
                          <div id="moduser" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registro de personal</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storeuser')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Nombre: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="nom_clie" name="nam_user"
                                               placeholder="Nombre de usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Paterno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="pat_cli"  name="lpa_user"
                                               placeholder="Apellido paterno Usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Materno: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="lma_user"
                                               placeholder="Apellido materno usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">C.I.: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="ci_user"
                                               placeholder="Cedula de identidad">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Direccion: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="add_user"
                                               placeholder="Direccion del usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Telefono: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="pho_user"
                                               placeholder="Telefono del usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Nombre de usuario: </label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="mat_cli"  name="nic_user"
                                               placeholder="Nombre de usuario">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Password: </label>
                                      <div class="col-lg-8">
                                        <input type="password" class="form-control" id="mat_cli"  name="password"
                                               placeholder="Contraseña">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Nivel: </label>
                                      <div class="col-lg-8">
                                        <select class="form-control" name="niv_user" required>
                                          <option value="">SELECCIONE</option>
                                          <option value="0">ADMINISTRADOR</option>
                                          <option value="1">USUARIO</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="center-block">
                                      <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#sale">Registrar</button>
                                    </div>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!--fin del Modal content-->
                          <!-- Modal -->
                          <div id="eliminamoduser" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <form class="" action="{{route('admin.deleteuser')}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" class="form-control" id="iduser" name="id" value="">
                                  <h4 class="modal-title">ELIMINAR USUARIO</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Esta seguro de eliminar al usuario?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div
                          <!--fin del Modal content-->
                              <div class="table-responsive">
                                <table class="table" id="users">
                                  <thead>
                                    <tr class="warning">
                                      <th>ID</th><th data-dynatable-column="nam_user">NOMBRE</th>
                                      <th data-dynatable-column="lpa_user">PATERNO</th>
                                      <th data-dynatable-column="lma_user">MATERNO</th>
                                      <th data-dynatable-column="ci_user">C.I.:</th>
                                      <th data-dynatable-column="add_user">DIRECCION:</th>
                                      <th data-dynatable-column="pho_user">TELEFONO:</th>
                                      <th data-dynatable-column="nic_user">NICK:</th>
                                      <th data-dynatable-column="boton">ACCIONES</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>

                                <!--hasta aqui las tablas!-->
                            </div>
                          </p>

                          <p class="text-center">
                </p>
                      </div>
                      <div class="tab-pane fade" id="gastos">
                        <div class="text-center">
                          <i class="img-intro icon-checkmark-circle"></i>
                        </div>
                        <p class="narrow text-center">
                          <div class="panel">
                            <!--desde aqui el codigo de la tabla!-->
                            <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#modexpense">Registro</button>

                                      <!-- Modal -->
                                  <div id="modexpense" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Registro de gasto</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storeexpense')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                              <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Descripcion: </label>
                                              <div class="col-lg-8">
                                                <input type="text" class="form-control" id="nom_clie" name="des_exp"
                                                       placeholder="descripcion">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Monto: </label>
                                              <div class="col-lg-8">
                                                <input type="text" class="form-control" id="pat_cli"  name="mon_exp"
                                                       placeholder="monto">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fecha: </label>
                                              <div class="col-lg-8">
                                                <input type="date" class="form-control" id="mat_cli"  name="fec_exp">
                                              </div>
                                            </div>
                                            <div class="center-block">
                                              <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                                            </div>
                                          </form>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  <!--fin del Modal content-->
                                  <!-- Modal -->
                              <div id="modexpensemodi" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Registro de gasto</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form class="form-horizontal" role="form" method="POST" action="{{route('admin.updateexpense')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" class="form-control" id="id_expense_up" name="id" value="">
                                        <div class="form-group">
                                          <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Descripcion: </label>
                                          <div class="col-lg-8">
                                            <input type="text" class="form-control" id="dess" name="des_exp"
                                                   placeholder="descripcion">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Monto: </label>
                                          <div class="col-lg-8">
                                            <input type="text" class="form-control" id="mon"  name="mon_exp"
                                                   placeholder="monto">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fecha: </label>
                                          <div class="col-lg-8">
                                            <input type="datetime" class="form-control" id="fech"  name="fec_exp">
                                          </div>
                                        </div>
                                        <div class="center-block">
                                          <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                                        </div>
                                      </form>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <!--fin del Modal content-->
                                  <!-- Modal -->
                                  <div id="eliminaModgasto" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">ELIMINAR GASTO</h4>
                                        </div>
                                        <form class="" action="{{route('admin.deletegasto')}}" method="post">
                                          {{csrf_field()}}
                                          <input type="hidden" class="form-control" id="id_expense_del" name="id" value="">
                                        <div class="modal-body">
                                          <p>Esta seguro de eliminar el gasto?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </form>

                                    </div>
                                  </div
                                  <!--fin del Modal content-->
                                      <div class="table-responsive">
                                        <table class="table" id="expenses">
                                          <thead>
                                            <tr class="warning">
                                              <th>ID</th><th data-dynatable-column="des_exp">DESCRIPCION</th>
                                              <th data-dynatable-column="mon_exp">MONTO</th>
                                              <th data-dynatable-column="fec_exp">FECHA</th>
                                              <th data-dynatable-column="boton">ACCIONES</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </div>

                              <!--hasta aqui las tablas!-->
                          </div>
                      </p>
                      </div>

                  <div class="tab-pane fade" id="deudas">
                <div class="text-center">
                  <i class="img-intro icon-checkmark-circle"></i>
                  </div>
                  <p class="narrow text-center">
                    <div class="panel">
                      <!--desde aqui el codigo de la tabla!-->
                      <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#moddeb">Registro</button>

                                <!-- Modal -->
                            <div id="moddeb" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Registro de deudas</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storedebt')}}">
                                      {{csrf_field()}}
                                      <div class="form-group">
                                        <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Nombre: </label>
                                        <div class="col-lg-8">
                                          <input type="text" class="form-control" id="nom_clie" name="nom_deb"
                                                 placeholder="descripcion">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Con_deb: </label>
                                        <div class="col-lg-8">
                                          <input type="text" class="form-control" id="pat_cli"  name="con_deb"
                                                 placeholder="monto">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Monto: </label>
                                        <div class="col-lg-8">
                                          <input type="text" class="form-control" id="mat_cli"  name="mon_deb"
                                                 placeholder="fecha">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fecha: </label>
                                        <div class="col-lg-8">
                                          <input type="date" class="form-control" id="mat_cli"  name="fec_deb">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fin_deb: </label>
                                        <div class="col-lg-8">
                                          <input type="date" class="form-control" id="mat_cli"  name="fin_deb">
                                        </div>
                                      </div>


                                      <div class="center-block">
                                        <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                                      </div>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!--fin del Modal content-->
                            <!-- Modal -->
                        <div id="moddebmodi" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Registro de deudas</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.updatedebt')}}">
                                  {{csrf_field()}}
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_debt_up" name="id" value="">
                                    <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Nombre: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="nom_deb" name="nom_deb"
                                             placeholder="descripcion">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Con_deb: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="con_deb"  name="con_deb"
                                             placeholder="monto">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Monto: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mon_deb"  name="mon_deb"
                                             placeholder="fecha">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fecha: </label>
                                    <div class="col-lg-8">
                                      <input type="datetime" class="form-control" id="fec_deb"  name="fec_deb">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fin_deb: </label>
                                    <div class="col-lg-8">
                                      <input type="date" class="form-control" id="fin_deb"  name="fin_deb">
                                    </div>
                                  </div>


                                  <div class="center-block">
                                    <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                                  </div>
                                </form>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!--fin del Modal content-->
                            <!-- Modal -->
                            <div id="eliminaModdebt" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <form class="" action="{{route('admin.deletedebt')}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" class="form-control" id="id_debt_del" name="id" value="">
                                    <h4 class="modal-title">ELIMINAR GASTO</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Esta seguro de eliminar el gasto?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div
                            <!--fin del Modal content-->
                                <div class="table-responsive">
                                  <table class="table" id="debts">
                                    <thead>
                                      <tr class="warning">
                                        <th>ID</th><th data-dynatable-column="nom_deb">NOMBRE</th>
                                        <th data-dynatable-column="con_deb">CON_DEB</th>
                                        <th data-dynatable-column="mon_deb">MONTO</th>
                                        <th data-dynatable-column="fec_deb">FECHA</th>
                                        <th data-dynatable-column="fin_deb">FIN_DEV</th>
                                        <th data-dynatable-column="boton">ACCIONES</th>


                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                      </tr>
                                    </tbody>
                                  </table>
                              </div>

                        <!--hasta aqui las tablas!-->
                    </div>
                  </p>
                  </div>

              <div class="tab-pane fade" id="eventos">
                <div class="text-center">
                  <i class="img-intro icon-checkmark-circle"></i>
              </div>
              <p class="narrow text-center">
                <div class="panel">
                  <button type="button" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#modevent">Registro</button>

                            <!-- Modal -->
                        <div id="modevent" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Registro de evento</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storeevent')}}">
                                  {{csrf_field()}}
                                  <div class="form-group">
                                    <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Titulo: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="nom_clie" name="title"
                                             placeholder="descripcion">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Tema: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="pat_cli"  name="body"
                                             placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">URL: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mat_cli"  name="url"
                                             placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Class: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mat_cli"  name="class"
                                             placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Inicio: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mat_cli"  name="start"
                                             placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fin: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mat_cli"  name="end"
                                             placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Color: </label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="mat_cli"  name="color"
                                             placeholder="fecha">
                                    </div>
                                  </div>
                                  <div class="center-block">
                                    <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!--fin del Modal content-->
                        <!-- Modal -->
                    <div id="modeventmodi" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Registro de evento</h4>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{route('admin.storeevent')}}">
                              {{csrf_field()}}
                              <input type="hidden" class="form-control" id="id_event_up" name="id" value="">
                              <div class="form-group">
                                <label name="nom_adm" for="nom_clie" class="col-lg-4 control-label">Titulo: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="title" name="title"
                                         placeholder="descripcion">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="pat_adm" for="pat_cli" class="col-lg-4 control-label">Tema: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="body"  name="body"
                                         placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">URL: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="url"  name="url"
                                         placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Class: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="classs"  name="class"
                                         placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Inicio: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="start"  name="start"
                                         placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Fin: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="end"  name="end"
                                         placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label name="mat_adm" for="mat_cli" class="col-lg-4 control-label">Color: </label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" id="color"  name="color"
                                         placeholder="fecha">
                                </div>
                              </div>
                              <div class="center-block">
                                <button type="submit" class="btn btn-warning btn-raised" data-toggle="modal" data-target="#expense">Registrar</button>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!--fin del Modal content-->
                        <!-- Modal -->
                        <div id="eliminaModevent" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <form class="" action="{{route('admin.deleteevent')}}" method="post">
                                    {{csrf_field()}}
                                <input type="hidden" class="form-control" id="id_event_del" name="id" value="">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ELIMINAR EVENTO</h4>
                              </div>
                              <div class="modal-body">
                                <p>Esta seguro de eliminar el evento?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            </form>

                          </div>
                        </div
                        <!-- fin del Modal content -->
                            <div class="table-responsive">
                              <table class="table" id="events">
                                <thead>
                                  <tr class="warning">
                                    <th>ID</th><th data-dynatable-column="title">TITULO</th>
                                    <th data-dynatable-column="body">TEMA</th>

                                    <th data-dynatable-column="class">CLASS</th>
                                    <th data-dynatable-column="start">INICIO</th>
                                    <th data-dynatable-column="end">FIN</th>
                                    <th data-dynatable-column="color">COLOR</th>
                                    <th data-dynatable-column="boton">ACCIONES</th>


                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                  </tr>
                                </tbody>
                              </table>
                          </div>

                    <!--hasta aqui las tablas!-->
                </div>
              </p>
              </div>


                  <div class="clearfix"></div>
                  </div>
                  </div>
                  </div>
                  </div>
@endsection
@section('scripts')
{!! Html::script('dynatable/jquery.dynatable.js')!!}
<script type="text/javascript">
    $(document).on('ready', function(){
      //var clientes
      var clients={!! json_encode($clients->toArray())!!};
      //var ventas
      var sales={!! json_encode($sales->toArray())!!};
      //var array
      var arrays={!! json_encode($arrays->toArray())!!};
      //var user
      var users={!! json_encode($users->toArray())!!};
      //var expense
      var expenses={!! json_encode($expenses->toArray())!!};
      //var debts
      var debts={!! json_encode($debts->toArray())!!};
      //var events
      var events={!! json_encode($events->toArray())!!};

      //for clientes
      for (var i = 0; i < clients.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=clients[i].id;
        var nom=clients[i].nam_cli;
        var pat=clients[i].lpa_cli;
        var mat=clients[i].lma_cli;
        var old=clients[i].old_cli;
        var ci=clients[i].ci_cli;
        var add=clients[i].add_cli;
        var pho=clients[i].pho_cli;
        var b="'"+id+"','"+nom+"','"+pat+"','"+mat+"','"+old+"','"+ci+"','"+add+"','"+pho+"'";

        clients[i].boton='<a onclick="javascript:envioclie('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminamodclient" style="background-color:#ed1414; color: #fff;"><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosclie('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modclientemodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';

      }
      //for sales
      for (var i = 0; i < sales.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=sales[i].id;
        var fec=sales[i].fec_sale;
        var b="'"+id+"','"+fec+"'";
        sales[i].boton='<a onclick="javascript:enviosale('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaMod" style="background-color:#ed1414; color: #fff;"><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatossale('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modsalemodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';
      }
      //for array
      for (var i = 0; i < arrays.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=arrays[i].id;
        var datrec=arrays[i].dat_rec;
        var datent=arrays[i].dat_ent;
        var des=arrays[i].des_array;
        var num=arrays[i].num_bol;
        var b="'"+id+"','"+datrec+"','"+datent+"','"+des+"','"+num+"'";
        arrays[i].boton='<a onclick="javascript:envioarray('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModArray" style="background-color:#ed1414; color: #fff;" ><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosarray('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modarraymodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';

      }
      //for user
      for (var i = 0; i < users.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=users[i].id;
        var datrec=users[i].dat_rec;
        var datent=users[i].dat_ent;
        users[i].boton='<a onclick="javascript:enviouser('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminamoduser" style="background-color:#ed1414; color: #fff;" ><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosuser('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modarraymodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';

      }
      //for expense
      for (var i = 0; i < expenses.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=expenses[i].id;
        var des=expenses[i].des_exp;
        var mon=expenses[i].mon_exp;
        var fec=expenses[i].fec_exp;
        var b="'"+id+"','"+des+"','"+mon+"','"+fec+"'";
        expenses[i].boton='<a onclick="javascript:envioexpense('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModgasto" style="background-color:#ed1414; color: #fff;"><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosexpense('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modexpensemodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';
      }
      //for debts
      for (var i = 0; i < debts.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=debts[i].id;
        var nom_deb=debts[i].nom_deb;
        var con_deb=debts[i].con_deb;
        var mon_deb=debts[i].mon_deb;
        var fec_deb=debts[i].fec_deb;
        var fin_deb=debts[i].fin_deb;
        var b="'"+id+"','"+nom_deb+"','"+con_deb+"','"+mon_deb+"','"+fec_deb+"','"+fin_deb+"'";
        debts[i].boton='<a onclick="javascript:enviodebts('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModdebt" style="background-color:#ed1414; color: #fff;"><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosdebts('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#moddebmodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';

      }
      //for events
      for (var i = 0; i < events.length; i++) {
        var a='{{route("admin.admin")}}';
        var id=events[i].id;
        var title=events[i].title;
        var body=events[i].body;
        var url=events[i].url;
        var classs=events[i].class;
        var start=events[i].start;
        var end_ev=events[i].end;
        var color=events[i].color;
        events[i].boton='<a onclick="javascript:envioevents('+id+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#eliminaModevent" style="background-color:#ed1414; color: #fff;" ><i class="glyphicon glyphicon-trash"></i></a><a onclick="javascript:enviodatosevents('+b+');" class="btn btn-warning btn-raised btn-lg active" role="button" data-toggle="modal" data-target="#modeventmodi" color: #fff;"><i class="material-icons">mode_edit</i></a>';
      }

      //console clientes
      console.log(clients);
      //console sales
      console.log(sales);
      //console array
      console.log(arrays);
      //console user
      console.log(users);
      //console expenses
      console.log(expenses);
      //console debts
      console.log(debts);
      //console events
      console.log(events);


      //dynatable clientes
      $('#clients').dynatable({
        dataset:{records:clients},
      });
      //dynatable sales
      $('#sales').dynatable({
        dataset:{records:sales},
      });
      //dynatable arrays
      $('#array').dynatable({
        dataset:{records:arrays},
      });
      //dynatable user
      $('#users').dynatable({
        dataset:{records:users},
      });
      //dynatable expenses
      $('#expenses').dynatable({
        dataset:{records:expenses},
      });
      //dynatable debts
      $('#debts').dynatable({
        dataset:{records:debts},
      });
      //dynatable events
      $('#events').dynatable({
        dataset:{records:events},
      });
    });
  </script>
<script type="text/javascript">
function enviouser(id){
    $('#iduser').val(id);
  }
function enviodatosuser(id,nom,pat,mat,old,ci,add,pho){
    $('#idu').val(id);
        $('#nom').val(nom);
        $('#pat').val(pat);
        $('#mat').val(mat);
        $('#old').val(old);
        $('#ci').val(ci);
        $('#addres').val(add);
        $('#pho').val(pho);
}
function envioclie(id){
    $('#id').val(id);
  }

function enviodatosclie(id,nom,pat,mat,old,ci,add,pho){
  $('#idu').val(id);
      $('#nom').val(nom);
      $('#pat').val(pat);
      $('#mat').val(mat);
      $('#old').val(old);
      $('#ci').val(ci);
      $('#addres').val(add);
      $('#pho').val(pho);
}
function enviosale(id){
    $('#id_sale_del').val(id);
  }
function enviodatossale(id,fec){
  $('#id_sale_up').val(id);
  $('#fec_sale').val(fec);
}
function envioarray(id){
    $('#id_array_del').val(id);
  }
function enviodatosarray(id,datrec,datent,des,num){
    $('#id_array_up').val(id);
    $('#datrec').val(datrec);
    $('#datent').val(datent);
    $('#des').val(des);
    $('#num').val(num);
  }
function envioexpense(id){
      $('#id_expense_del').val(id);
    }
function enviodatosexpense(id,des,mon,fec){
        $('#id_expense_up').val(id);
        $('#dess').val(des);
        $('#mon').val(mon);
        $('#fech').val(fec);

      }
function enviodebts(id){
    $('#id_debt_del').val(id);
}
function enviodatosdebts(id,nom_deb,con_deb,mon_deb,fec_deb,fin_deb){
        $('#id_debt_up').val(id);
        $('#nom_deb').val(nom_deb);
        $('#con_deb').val(con_deb);
        $('#mon_deb').val(mon_deb);
        $('#fec_deb').val(fec_deb);
        $('#fin_deb').val(fin_deb);

      }
function envioevents(id){
    $('#id_event_del').val(id);
}
function enviodatosevents(id,title,body,url,classs,start,end,color){
        $('#id_event_up').val(id);
        $('#title').val(title);
        $('#body').val(body);
        $('#url').val(url);
        $('#classs').val(classs);
        $('#start').val(start);
        $('#end_ev').val(end);
        $('#color').val(color);

      }
</script>
<script type="text/javascript">
$(function(){
$('a[title]').tooltip();
});
</script>

@endsection
