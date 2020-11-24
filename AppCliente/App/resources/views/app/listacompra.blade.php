@extends('app.plantilla')
@section('contenido')


         <form method="post" action="{{route('crearcompra')}}">
             @csrf
             <div class="row table-warning p-3 mb-3">
                 <div class="col-md-6">
                     <label>Seleccione El Producto</label>
                     <div class="form-group">
                         <select name="id" class="form-control selecionaproducto">
                             <option>Seleccione</option>
                         @foreach($listaproductos as $p)
                                 <option value="{{$p->id}}">{{$p->nombre}}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="inputproducto">

                     </div>
                     <label>Ingrese el precio por Unidad</label>
                     <div class="form-group">
                         <input type="text" class="form-control" name="precio_unidad">
                     </div>
                 </div>

                 <div class="col-md-6">
                     <label>Ingrese Cantidad</label>
                     <div class="form-group">
                         <input type="text" class="form-control" name="cantidad">
                     </div>

                 </div>
                 <button type="submit" class="btn btn-primary btn-block">Crear</button>
             </div>

         </form>

    <table class="table">
        <thead class="table-primary">
        <tr>
            <th>Numero de Compra</th>
            <th>producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total Venta</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listaCompras as $p)
            <tr>
                <td>
                    <small class="badge badge-danger">{{$loop->index+1}}</small>
                </td>
                <td>{{$p->producto}}</td>
                <td>{{$p->cantidad}}</td>
                <td>S./{{$p->precio_unidad}}</td>
                <td>S./{{$p->compra_total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $('.selecionaproducto').change(function(){
            $('.inputproducto').empty();
            $producto=$(".selecionaproducto option:selected").text();
            $input='<input type="hidden"  name="producto" value="'+$producto+' ">';
            $('.inputproducto').append($input);

        });
    </script>
@endsection
