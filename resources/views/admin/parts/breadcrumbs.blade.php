<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    @for($i = 2; $i < count(Request::segments()); $i++)
        <li class="breadcrumb-item">
            <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                {{ucfirst(Request::segment($i))}}
            </a>
        </li>
    @endfor
</ol>
