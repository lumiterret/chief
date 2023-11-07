<header class="p-3 text-bg-dark mb-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="navbar-brand d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h2>Chief</h2>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('recipes.index') }}" class="nav-link px-2 text-white"><i class="fa-solid fa-pizza-slice"></i>&nbsp;Рецепты</a></li>
                <li><a href="{{ route('ingredients.index') }}" class="nav-link px-2 text-white"><i class="fa-solid fa-carrot"></i>&nbsp;Ингредиенты</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">

            </form>

            <div class="text-end">
                @if(! Auth::user())
                    <a href="{{ route('login') }}" type="button" class="btn btn-outline-light me-2">Войти</a>
                @else
                    <a href="{{ route('logout') }}" type="button" class="btn btn-warning me-2">Выйти</a>
                @endif
            </div>
        </div>
    </div>
</header>
