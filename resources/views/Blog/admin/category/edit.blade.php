@extends('layouts.app')

@section('content')

    @php /** @var \App\Madals\BlogCategory */ @endphp




    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="container">

        @if ($item->exists)
            <form method="POST" action="  {{ route('blog.admin.categories.update', $item->id) }} ">
                @method('PATCH')

                @else

                <form method="POST" action="  {{ route('blog.admin.categories.store') }} ">

        @endif

        @csrf

        <div class="row">
            <div class="col-8">
                {!! Form::text('title', 'Заголовок')
                ->attrs(['id' => 'title', 'minlenght' => '3'])
                ->required()
                ->value($item->title) !!}

                {!! Form::text('Slug', 'Slug')
                ->attrs(['id' => 'slug'])
                ->value($item->slug) !!}

                {{-- {!! Form::select('category', 'Родитель2')
                ->options($categorylist, 'title')
                ->wrapperAttrs(['data-foo' => 'bar', 'id' => 'name-wrapper']) !!} --}}


                <label for="parent_id">Родитель</label>
                <select name="parent_id" id="parent_id" class="form-control" required>
                    @foreach ($categorylist as $categoryOptions)
                        <option value=" {{ $categoryOptions->id }}" @if ($categoryOptions->id == $item->parent_id) selected
                    @endif
                    >
                    {{ $categoryOptions->id . '-' . $categoryOptions->title }}
                    </option>
                    @endforeach
                </select>

                {!! Form::textarea('description', 'Description')
                ->name('description')
                ->id('description')
                ->attrs(['class' => 'ckeditor', 'row' => '15'])
                ->value(old('description', $item->description)) !!}

            </div>

            <div class="col-4">
                @if ($item->exists)
                    <div class="col">
                        ID:: {{ $item->id }}
                    </div>
                    <hr>
                    <div class="col">
                        {!! Form::text('Slug', 'Создано')
                        ->attrs(['id' => 'created_at'])
                        ->required()
                        ->value($item->created_at)
                        ->disabled() !!}
                    </div>
                    <div class="col">
                        {!! Form::text('updated_at', 'Изменено')
                        ->attrs(['id' => 'updated_at'])
                        ->required()
                        ->value($item->updated_at)
                        ->disabled() !!}
                    </div>
                    <div class="col">
                        {!! Form::text('deleted_at ', 'Удалено')
                        ->attrs(['id' => 'deleted_at '])
                        ->required()
                        ->value($item->deleted_at)
                        ->disabled() !!}
                    </div>

                @endif
                <div class="col">
                    {!! Form::submit('Сохранить')
                    ->id('my-btn')
                    ->primary() !!}
                </div>
            </div>
        </div>
        </form>

    </div>
@endsection
