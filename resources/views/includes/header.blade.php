<div class="col">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.index') }}">Задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daily_tasks.index') }}">Ежедневные задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('arterial_pressures.index') }}">Календарь АД</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
