<ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
        <b>Birthday:</b> <span class="float-right">{{$user->user->birth_date}}</span>
    </li>
    <li class="list-group-item">
        <b>Children:</b> <span class="float-right">{{$user->user->amount_of_children}}</span>
    </li>
    <li class="list-group-item">
        <b>Weight:</b>
        <span class="float-right">{{$user->user->weight}}<span class="badge badge-pill">Kg</span></span>
    </li>
    <li class="list-group-item">
        <b>Height:</b>
        <span class="float-right">{{$user->user->height}}<span class="badge badge-pill">Cm</span></span>
    </li>
    <li class="list-group-item">
        <b>Eye color:</b> <span class="float-right">{{$user->user->eye_color}}</span>
    </li>
    <li class="list-group-item">
        <b>Hair color:</b> <span class="float-right">{{$user->user->hair_color}}</span>
    </li>
    <li class="list-group-item">
        <b>Job:</b> <span class="float-right">{{$user->user->job}}</span>
    </li>
    <li class="list-group-item">
        <b>Languages:</b> <span class="float-right">
            @isset($user->user->langs)
                @foreach(Languages::lookup($user->user->langs) as $lang)
                    <span class="badge badge-info">{{$lang}}</span>
                @endforeach
            @endisset
                            </span>
    </li>
    <li class="list-group-item">
        <b>Travel countries:</b> <span class="float-right">
            @isset($user->user->travel_countries)
                @foreach($user->user->travel_countries as $country)
                    <span class="badge badge-warning">{{$country}}</span>
                @endforeach
            @endisset
                            </span>
    </li>
    <li class="list-group-item">
        <b>Vises:</b> <span class="float-right">{{$user->user->vises}}</span>
    </li>
    <li class="list-group-item">
        <b>Creed:</b> <span class="float-right">{{$user->user->creed}}</span>
    </li>
    <li class="list-group-item">
        <b>City:</b> <span class="float-right">{{$user->user->city}}</span>
    </li>
    <li class="list-group-item">
        <b>Ideal man:</b> <span class="float-right">{{$user->user->ideal_man}}</span>
    </li>
    <li class="list-group-item">
        <b>Bad habits:</b> <span class="float-right">{{$user->user->bad_habits}}</span>
    </li>
    <li class="list-group-item">
        <b>Education:</b> <span class="float-right">{{$user->user->education}}</span>
    </li>
    <li class="list-group-item">
        <b>About myself:</b> <span class="float-right">{{$user->user->about_myself}}</span>
    </li>
</ul>
