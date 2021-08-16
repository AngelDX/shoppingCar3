<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Precio
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Cantidad
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Subtotal
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <?php $total = 0 ?>
            @if(session('cart'))
              @foreach(session('cart') as $id => $details)
              <?php $total += $details['precio'] * $details['cantidad'] ?>
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $details['nombre'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap">S/. {{ $details['precio'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ url('restar/'.$id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">-</a>
                    {{ $details['cantidad'] }}
                    <a href="{{ url('sumar/'.$id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">+</a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">S/. {{ $details['precio']*$details['cantidad'] }}</td>
              </tr>
              @endforeach
            @endif
            <tr class="visible-xs">
                <td colspan="3"><strong>Total</strong></td>
                <td class="text-center"><strong>S/. {{ $total }}</strong></td>
            </tr>
            <tr class="visible-xs">
              <td colspan="4" class="py-3"><a href="{{ url('registro_cliente',$total) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Ir a Comprar</a></td>
          </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>