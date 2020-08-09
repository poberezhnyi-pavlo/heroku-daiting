    <div class="card-body">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">User name</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                    </div>
                    <input
                        type="text"
                        name="user[name]"
                        class="form-control"
                        id="inputName"
                        placeholder="Enter a name"
                        value="{{old('user.name')}}"
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">User last name</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                    <input
                        type="text"
                        name="user[last_name]"
                        class="form-control"
                        id="inputLastName"
                        placeholder="Enter a last name"
                        value="{{old('user.last_name')}}"
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input
                        type="email"
                        name="user[email]"
                        class="form-control"
                        id="inputEmail"
                        placeholder="Enter an E-mail"
                        value="{{old('user.email')}}"
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input
                        type="tel"
                        name="user[phone]"
                        class="form-control"
                        id="inputPhone"
                        placeholder="Enter an phone"
                        value="{{old('user.phone')}}"
                    >
                </div>

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Main photo</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                    </div>
                    <div class="custom-file">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="inputAvatar"
                            name="user[avatar]"
                            value="{{old('user.avatar')}}"
                        >
                        <label class="custom-file-label" for="inputAvatar">Choose main photo</label>
                    </div>
                </div>
            </div>
        </div>
        @if ($roles && ($type === 'admin'))
            <div class="form-group row">
                <label for="inputRole" class="col-sm-2 col-form-label">User role</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                        </div>
                        <select id="inputRole" class="custom-select" name="user[role]">
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role }}"
                                    @if (old('user.role') === $role)
                                        selected="selected"
                                    @endif
                                >
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif
        <div class="form-group row">
            <label for="inputPublished" class="col-sm-2 col-form-label">Published</label>
            <div class="col-sm-10">
                <input
                    type="checkbox"
                    id="inputPublished"
                    name="user[deleted_at]"
                    @if (old('user.deleted_at'))
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

