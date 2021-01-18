@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4 text-center font-weight-bold">ID </div>
            <div class="col-4 text-center font-weight-bold">Категория </div>
            <div class="col-4 text-center font-weight-bold">Родитель </div>
        </div>
        <div class="row">
            @foreach ($paginator as $item)
                @php /** @var \App\Modals\BlogCategory */ @endphp

                <div class="col-4 text-center py-2"> {{ $item->id }} </div>
                <div class="col-4 text-center py-2"> {{ $item->title }} </div>
                <div class="col-4 text-center py-2"> {{ $item->parent_id }} </div>

            @endforeach
        </div>
    </div>
    @if ($paginator->total() > $paginator->count())
        <div class="container">
            <div class="row mt-5">
                <div class="d-flex justify-content-center col-12">
                    {{ $paginator->links() }}
                </div>
            </div>
        </div>

    @endif

@endsection
