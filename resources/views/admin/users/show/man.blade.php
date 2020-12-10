<ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
        <b>Credits:</b> <span class="float-right">{{$user->user->credits}}</span>
    </li>
    <li class="list-group-item">
        <b>Country:</b> <span class="float-right">{{$user->user->country}}</span>
    </li>
    <li class="list-group-item">
        <b>City:</b> <span class="float-right">{{$user->user->city}}</span>
    </li>
    <li class="list-group-item">
        <b>Address:</b> <span class="float-right">{{$user->user->address}}</span>
    </li>
    <li class="list-group-item">
        <b>Post index:</b> <span class="float-right">{{$user->user->post_index}}</span>
    </li>
    <li class="list-group-item">
        <b>Birthday:</b> <span class="float-right">{{$user->user->birth_day}}</span>
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
        <b>About myself:</b> <span class="float-right">{{$user->user->about_myself}}</span>
    </li>
    <li class="list-group-item">
        <b>Interests:</b> <span class="float-right">{{$user->user->interests}}</span>
    </li>
    <li class="list-group-item">
        <b>Education:</b> <span class="float-right">{{$user->user->education}}</span>
    </li>
    <li class="list-group-item">
        <b>Job:</b> <span class="float-right">{{$user->user->job}}</span>
    </li>
    <li class="list-group-item">
        <b>Creed:</b> <span class="float-right">{{$user->user->creed}}</span>
    </li>
    <li class="list-group-item">
        <b>Bad habits:</b> <span class="float-right">{{$user->user->bad_habits}}</span>
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
        <b>Age of woman:</b> <span class="float-right">{{$user->user->age_of_woman}}</span>
    </li>
    <li class="list-group-item">
        <b>About woman:</b> <span class="float-right">{{$user->user->about_woman}}</span>
    </li>
</ul>
