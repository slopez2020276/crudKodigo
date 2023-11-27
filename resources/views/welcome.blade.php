<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/4796422898.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center p-3">crud</h1>
    @if (session("corrrecto")){
        <div class="alert alert-success " >{{session("corrrecto")}}</div>
    }
    @endif
    @if (session("incorrecto")){
        <div class="alert alert-danger " >{{session("incorrecto")}}</div>
    }
    @endif

  <script>
    var res = function(){
        var  alert=confirm("La accion de eliminar no podra ser revertida Esta seguro ?");
        return alert;
    }
  </script>



    <div class="modal fade" id="editarAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleados</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST" action="{{ route('crud.create') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Codio de emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCodigo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Apellido emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtApellido">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEdad">
                                        </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Registar</button>
                                </div>
                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>

    <div class="p-5 table-responsive table-striped  table-bordered table-hover">

        <table class="table">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarAgregar"  >Agregar Empleado</button>
            
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Edad</th>
                    <th></th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                <tr>
                    <th>{{$item->id_empleado}}</th>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido}}</td>
                    <td>{{$item->edad}}</td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#editarModal{{$item->id_empleado}}" class="btn btn-warnig btn-sm"><i class="fa-solid fa-file-pen"></i></a></td>
                    <td><a href="{{ route('crud.delete', $item->id_empleado) }}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>




                    <div class="modal fade" id="editarModal{{$item->id_empleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos del empleado </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST" action="{{ route('crud.update') }}">
                                    @csrf
                                    @method('PUT')

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Codio de emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCodigo"
                                             value="{{$item->id_empleado}}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre" value="{{$item->nombre}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Apellido emplado</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtApellido" value="{{$item->apellido}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad emplado</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEdad" value="{{$item->edad}}">
                                        </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>

</html>