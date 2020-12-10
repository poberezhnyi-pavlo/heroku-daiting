<div class="card-body">
    <div class="form-group row">
        <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-10">
            <div class="input-group select2-wrap">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                </div>
                <div class="select2-purple" style="width: 100%">
                    <select
                        id="inputCountry"
                        class="select2"
                        data-placeholder="Select country"
                        name="man[country]"
                        style="width: 100%;"
                        data-dropdown-css-class="select2-purple"
                    >
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->key }}"
                                @if ($user->user->country === $country->key)
                                    selected="selected"
                                @endif
                            >
                                {{$country->key}} - {{ $country->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCity" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                </div>
                <input
                    type="text"
                    name="man[city]"
                    class="form-control"
                    id="inputCity"
                    placeholder="Enter city"
                    value="{{$user->user->city}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input
                    type="text"
                    name="man[address]"
                    class="form-control"
                    id="inputAddress"
                    placeholder="Enter address"
                    value="{{$user->user->address}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPostIndex" class="col-sm-2 col-form-label">Post index</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                </div>
                <input
                    type="number"
                    min="0"
                    value="{{$user->user->post_index}}"
                    step="1"
                    name="man[post_index]"
                    class="form-control"
                    id="inputPostIndex"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBirthDay" class="col-sm-2 col-form-label">Birth day</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group date input-date" id="datePicker" data-target-input="nearest">
                    <div class="input-group-append" data-target="#datePicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input
                        type="text"
                        class="form-control datetimepicker-input"
                        data-target="#datePicker"
                        data-toggle="datetimepicker"
                        id="inputBirthDay"
                        name="man[birth_day]"
                        value="{{$user->user->birth_day}}"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputHeight" class="col-sm-2 col-form-label">Height (Cm)</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrows-alt-v"></i></span>
                </div>
                <input
                    type="number"
                    min="0"
                    value="{{$user->user->height}}"
                    step="1"
                    name="man[height]"
                    class="form-control"
                    id="inputHeight"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputWeight" class="col-sm-2 col-form-label">Weight (Kg)</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-weight"></i></span>
                </div>
                <input
                    type="number"
                    min="0"
                    value="{{$user->user->weight}}"
                    step="1"
                    name="man[weight]"
                    class="form-control"
                    id="inputWeight"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEveColor" class="col-sm-2 col-form-label">Eye color</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-eye"></i></span>
                </div>
                <select
                    id="inputEveColor"
                    class="custom-select"
                    name="man[eye_color]"
                >
                    @foreach($eyeColors as $eyeColor)
                        <option
                            value="{{ $eyeColor }}"
                            @if ($user->user->eye_color === $eyeColor)
                                selected="selected"
                            @endif
                        >
                            {{ $eyeColor }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputHairColor" class="col-sm-2 col-form-label">Hair color</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                </div>
                <select
                    id="inputHairColor"
                    class="custom-select"
                    name="man[hair_color]"
                >
                    @foreach($hairColors as $hairColor)
                        <option
                            value="{{ $hairColor }}"
                            @if ($user->user->hair_color === $hairColor)
                                selected="selected"
                            @endif
                        >
                            {{ $hairColor }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAboutMyself" class="col-sm-2 col-form-label">About myself</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                </div>
                <textarea
                    type="text"
                    name="man[about_myself]"
                    class="form-control"
                    id="inputAboutMyself"
                    placeholder="Describe about myself"
                >{{$user->user->about_myself}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputInterests" class="col-sm-2 col-form-label">Interests</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dog"></i></span>
                </div>
                <textarea
                    type="text"
                    name="man[interests]"
                    class="form-control"
                    id="inputInterests"
                    placeholder="Describe interests"
                >{{$user->user->interests}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <input
                    type="text"
                    name="man[education]"
                    class="form-control"
                    id="inputEducation"
                    placeholder="Enter education"
                    value="{{$user->user->education}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputJob" class="col-sm-2 col-form-label">Current job</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                </div>
                <input
                    type="text"
                    name="man[job]"
                    class="form-control"
                    id="inputJob"
                    placeholder="Enter current job"
                    value="{{$user->user->job}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCreed" class="col-sm-2 col-form-label">Creed</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-place-of-worship"></i></span>
                </div>
                <input
                    type="text"
                    name="man[creed]"
                    class="form-control"
                    id="inputCreed"
                    placeholder="Enter your creed"
                    value="{{$user->user->creed}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBadHabits" class="col-sm-2 col-form-label">Bad habits</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-smoking"></i></span>
                </div>
                <input
                    type="text"
                    name="man[bad_habits]"
                    class="form-control"
                    id="inputBadHabits"
                    placeholder="Enter your bad habits"
                    value="{{$user->user->bad_habits}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputLangs" class="col-sm-2 col-form-label">Languages</label>
        <div class="col-sm-10">
            <div class="input-group select2-wrap">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                </div>
                <div style="width: 100%">
                    <select
                        id="inputLangs"
                        class="select2"
                        multiple="multiple"
                        data-placeholder="Select languages"
                        name="man[langs][]"
                        style="width: 100%;"
                    >
                        @isset($langs)
                            @foreach($langs as $lang)
                                <option
                                    value="{{ $lang->key }}"
                                    @isset($user->user->langs)
                                        @foreach($user->user->langs as $userLang)
                                            @if ($userLang === $lang->key)
                                                selected="selected"
                                            @endif
                                        @endforeach
                                    @endisset
                                >
                                    {{$lang->key}} - {{ $lang->value }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="ageOfWoman" class="col-sm-2 col-form-label">Desired age of the woman</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
                </div>
                <input
                    type="number"
                    min="18"
                    value="{{$user->user->age_of_woman}}"
                    step="1"
                    name="man[age_of_woman]"
                    class="form-control"
                    id="ageOfWoman"
                    placeholder="Desired age of the woman"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAboutWoman" class="col-sm-2 col-form-label">Type of woman</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                </div>
                <input
                    type="text"
                    name="man[about_woman]"
                    class="form-control"
                    id="inputAboutWoman"
                    placeholder="Describe a woman"
                    value="{{$user->user->about_woman}}"
                >
            </div>
        </div>
    </div>
</div>
