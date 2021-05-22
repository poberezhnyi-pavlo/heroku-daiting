<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="custom-tabs-four-home-tab"
                            data-toggle="pill"
                            href="#custom-tabs-four-home"
                            role="tab"
                            aria-controls="custom-tabs-four-home"
                            aria-selected="true"
                        >
                            Main
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="custom-tabs-woman-profile-tab"
                            data-toggle="pill"
                            href="#custom-tabs-woman-profile"
                            role="tab"
                            aria-controls="custom-tabs-woman-profile"
                            aria-selected="false"
                        >
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{route('user.profile.store', $user)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="custom-tabs-four-home"
                            role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab"
                        >
                            @include('site.pages.profile.profile.edit-forms.common')
                        </div>
                        <div
                            class="tab-pane fade"
                            id="custom-tabs-woman-profile"
                            role="tabpanel"
                            aria-labelledby="custom-tabs-woman-profile-tab"
                        >
                            @include('site.pages.profile.profile.edit-forms.edit')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>