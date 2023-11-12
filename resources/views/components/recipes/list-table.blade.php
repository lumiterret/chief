@props([
    'recipes'
])
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th class="text-end" scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($recipes) && count($recipes))
        @foreach($recipes as $recipe)
            <tr>
                <td>{{ $recipe->name}}</td>
                <td>
                    <div class="btn-group float-end" role="group">
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Показать</a>
                        @if(user())<a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-square"></i>&nbsp;Редактировать</a>
                        <a href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>&nbsp;</a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="2">
                Ничего не найдено
            </td>
        </tr>
    @endif
    </tbody>
</table>
