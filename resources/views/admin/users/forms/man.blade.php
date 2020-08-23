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
                        name="country"
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
        <label for="inputCity" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                </div>
                <input
                    type="text"
                    name="city"
                    class="form-control"
                    id="inputCity"
                    placeholder="Enter city"
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
                    value="0"
                    step="1"
                    name="post_index"
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
                        name="birth_day"
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
                    value="0"
                    step="1"
                    name="height"
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
                    name="weight"
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
                <select id="inputEveColor" class="custom-select" name="eye_color">
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
                <select id="inputHairColor" class="custom-select" name="hair_color">
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
        <label for="inputAboutMyself" class="col-sm-2 col-form-label">About myself</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                </div>
                <textarea
                    type="text"
                    name="about_myself"
                    class="form-control"
                    id="inputAboutMyself"
                    placeholder="Describe about myself"
                ></textarea>
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
                    name="interests"
                    class="form-control"
                    id="inputInterests"
                    placeholder="Describe interests"
                ></textarea>
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
                    name="education"
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
                    name="job"
                    class="form-control"
                    id="inputJob"
                    placeholder="Enter current job"
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
                    name="creed"
                    class="form-control"
                    id="inputCreed"
                    placeholder="Enter your creed"
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
                        name="langs"
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
                    name="amount_of_children"
                    class="form-control"
                    id="inputChildrenAmount"
                    placeholder="Amount of children"
                >
            </div>
        </div>
    </div>
</div>
