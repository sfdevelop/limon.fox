<table>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->created_at}}</td>
    </tr>
    А вот тут мы и сделаем исправление
    @endforeach
</table>
