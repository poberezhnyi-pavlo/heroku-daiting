<div class="card-body">
    <div class="form-group row">
        <label for="inputBirthDay" class="col-sm-2 col-form-label">Birth day</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group date input-date" id="reservationdate" data-target-input="nearest">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input
                        type="text"
                        class="form-control datetimepicker-input"
                        data-target="#reservationdate"
                        data-toggle="datetimepicker"
                        id="inputBirthDay"
                        name="woman[birth_day]"
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
                    value="0"
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
        <label for="inputHeight" class="col-sm-2 col-form-label">Height (Cm)</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrows-alt-v"></i></span>
                </div>
                <input
                    type="number"
                    min="0"
                    value="0"
                    step="1"
                    name="woman[height]"
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
                    value="0"
                    step="1"
                    name="woman[weight]"
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
                <select id="inputEveColor" class="custom-select" name="woman[eye_color]">
                    @foreach($eyeColors as $eyeColor)
                        <option value="{{ $eyeColor }}">
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
                        <option value="{{ $hairColor }}">
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
                        @foreach($langs as $lang)
                            <option value="{{ $lang->key }}">
                                {{$lang->key}} - {{ $lang->value }}
                            </option>
                        @endforeach
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
                        @foreach($countries as $country)
                            <option value="{{ $country->key }}">
                                {{$country->key}} - {{ $country->value }}
                            </option>
                        @endforeach
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
                ></textarea>
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
                ></textarea>
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
                >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputVideos" class="col-sm-2 col-form-label">Youtube videos</label>
        <div class="col-sm-10 sortable-list" id="dynamicAddVideos">
            <div class="input-group sortable-item">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                </div>
                <input
                    type="url"
                    name="woman[video][0]"
                    class="form-control"
                    id="inputVideos"
                    placeholder="Enter Youtube vide URL"
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
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gallery images</label>
        <div class="col-sm-10 sortable-list" id="dynamicAddImages">
            <div class="input-group sortable-item">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-image"></i></span>
                    <img src="" class="img-preview"  />
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
                data-bootstrap-switch
                data-off-color="danger"
                data-on-color="success"
            >
        </div>
    </div>
</div>
<!-- /.card-body -->

