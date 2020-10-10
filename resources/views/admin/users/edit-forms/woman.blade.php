<div class="card-body">
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
                        name="woman[birth_date]"
                        value="{{$user->user->birth_date}}"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputChildrenAmount" class="col-sm-2 col-form-label">Amount of children</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-baby-carriage"></i></span>
                </div>
                <input
                    type="number"
                    min="0"
                    value="{{$user->user->amount_of_children}}"
                    step="1"
                    name="woman[amount_of_children]"
                    class="form-control"
                    id="inputChildrenAmount"
                    placeholder="Amount of children"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputHeight" class="col-sm-2 col-form-label">Height</label>
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
                    name="woman[height]"
                    class="form-control"
                    id="inputHeight"
                >
                <div class="input-group-append">
                    <span class="input-group-text">Cm</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputWeight" class="col-sm-2 col-form-label">Weight</label>
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
                    name="woman[weight]"
                    class="form-control"
                    id="inputWeight"
                >
                <div class="input-group-append">
                    <span class="input-group-text">Kg</span>
                </div>
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
                <select id="inputEveColor" class="custom-select" name="woman[eye_color]">
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
                <select id="inputHairColor" class="custom-select" name="woman[hair_color]">
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
        <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <input
                    type="text"
                    name="woman[education]"
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
                    name="woman[job]"
                    class="form-control"
                    id="inputJob"
                    placeholder="Enter current job"
                    value="{{$user->user->job}}"
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
                        name="woman[langs][]"
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
        <label for="inputCountries" class="col-sm-2 col-form-label">Countries where you were</label>
        <div class="col-sm-10">
            <div class="input-group select2-wrap">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                </div>
                <div class="select2-purple" style="width: 100%">
                    <select
                        id="inputCountries"
                        class="select2"
                        multiple="multiple"
                        data-placeholder="Select countries"
                        name="woman[travel_countries][]"
                        style="width: 100%;"
                        data-dropdown-css-class="select2-purple"
                    >
                        @isset($countries)
                            @foreach($countries as $country)
                                <option
                                    value="{{$country->key}} - {{ $country->value }}"
                                    @isset($user->user->travel_countries)
                                        @foreach($user->user->travel_countries as $userCountry)
                                            @if ($userCountry === $country->key)
                                                selected="selected"
                                            @endif
                                        @endforeach
                                    @endisset
                                >
                                    {{$country->key}} - {{ $country->value }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputVises" class="col-sm-2 col-form-label">International passport vises </label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-passport"></i></span>
                </div>
                <input
                    type="text"
                    name="woman[vises]"
                    class="form-control"
                    id="inputVises"
                    placeholder="Enter your vises"
                    value="{{$user->user->vises}}"
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
                    name="woman[creed]"
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
                    name="woman[bad_habits]"
                    class="form-control"
                    id="inputBadHabits"
                    placeholder="Enter your bad habits"
                    value="{{$user->user->bad_habits}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputIdealMan" class="col-sm-2 col-form-label">Ideal man</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-file-word"></i></span>
                </div>
                <textarea
                    type="text"
                    name="woman[ideal_man]"
                    class="form-control"
                    id="inputIdealMan"
                    placeholder="Please describe your ideal man"
                >{{$user->user->ideal_man}}</textarea>
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
                    name="woman[about_myself]"
                    class="form-control"
                    id="inputAboutMyself"
                    placeholder="Describe about myself"
                >{{$user->user->about_myself}}</textarea>
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
                    name="woman[city]"
                    class="form-control"
                    id="inputCity"
                    placeholder="Enter city"
                    value="{{$user->user->city}}"
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputVideos" class="col-sm-2 col-form-label">Youtube videos</label>
        <div class="col-sm-10 sortable-list" id="dynamicAddVideos">
            @forelse($user->user->videos as $video)
                <div class="input-group sortable-item">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input
                        type="url"
                        name="woman[video][{{$video->order}}]"
                        class="form-control"
                        placeholder="Enter Youtube vide URL"
                        value="{{$video->youtube_video_id}}"
                    >
                    <div class="input-group-append">
                        @if($loop->first)
                            <button type="button" class="btn btn-info btn-flat" id="add-video-button">
                                <i class="fas fa-plus"></i>
                            </button>
                        @else
                            <button type="button" class="btn btn-danger btn-flat btn-remove">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                        @endif
                        <button type="button" class="btn btn-warning btn-flat sortable-button">
                            <i class="fas fa-arrows-alt"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="input-group sortable-item">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input
                        type="url"
                        name="woman[video][0]"
                        class="form-control"
                        placeholder="Enter Youtube vide URL"
                        value=""
                    >
                    <div class="input-group-append">
                        <button type="button" class="btn btn-info btn-flat" id="add-video-button">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-flat sortable-button">
                            <i class="fas fa-arrows-alt"></i>
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gallery images</label>
        <div class="col-sm-10 sortable-list" id="dynamicAddImages">
            <div class="input-group sortable-item">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-image"></i></span>
                    <img src="" class="img-preview"  alt=""/>
                </div>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        id="inputImages"
                        name="woman[image][0]"
                    >
                    <label class="custom-file-label" for="inputImages">Choose image...</label>
                </div>

                <div class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="add-image-button">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-flat sortable-button">
                        <i class="fas fa-arrows-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPromoted" class="col-sm-2 col-form-label">Show in frontpage gallery</label>
        <div class="col-sm-10">
            <input
                type="checkbox"
                id="inputPromoted"
                name="woman[is_show_in_gallery]"
                @if ($user->user->is_show_in_gallery))
                checked="checked"
                @endif
                data-bootstrap-switch
                data-off-color="danger"
                data-on-color="success"
            >
        </div>
    </div>
</div>
<!-- /.card-body -->

