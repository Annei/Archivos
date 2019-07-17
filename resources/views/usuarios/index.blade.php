@extends('layouts.master')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Lista de usuarios</div>

                  <div class="card-body">
                      @can('create user')
                          <div class="row justify-content-end pb-2">
                            <a href="{{ url('/usuarios/create') }}" class="btn btn-success"><i class='fas fa-user-plus'></i>  Nuevo usuario</a>
                        </div>
                     @endcan

                      <table class="table">
                        <thead>
                          <th>Nombre</th>
                          <th>Correo Electronico</th>
                          <th>Rol</th>
                          <th>Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $usuario)
                            <tr>
                              <td>{{ $usuario->name }}</td>
                              <td>{{ $usuario->email }}</td>
                              <td>{{ $usuario->roles->implode('name', ', ') }}</td>
                              <td>
                                @can('update user')
                                    <a href="{{ url('usuarios/'.$usuario->id.'/edit') }}" class="btn btn-primary">
                                      <i class='fas fa-edit'></i></a><!--Boton Editar-->
                                @endcan
                                @can('delete user')
                                    @include('usuarios.delete', ['usuario' => $usuario])
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
