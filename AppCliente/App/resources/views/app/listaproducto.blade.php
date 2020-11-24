@extends('app.plantilla')
@section('contenido')
    <form method="post" action="{{route('crearproducto')}}">
        @csrf
        <div class="row table-warning p-3 mb-3">
            <div class="col-md-6">
                <label>Nombre</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre">
                </div>
            </div>

            <div class="col-md-6">
                <label>Ingrese Stock</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="stock">
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear</button>
        </div>

    </form>

    <table class="table">
       <thead class="table-primary">
       <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Stock</th>
       </tr>
       </thead>
        <tbody>
          @foreach($listaproductos as $p)
              <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->nombre}}</td>
                  <td>{{$p->stock}}</td>
              </tr>
          @endforeach
        </tbody>
    </table>
@endsection
