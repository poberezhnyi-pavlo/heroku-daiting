@extends('site.pages.profile.show')

@section('profile')
    <table class="table">
        <thead>
            <tr>
                <td>Chat</td>
                <td>Name</td>
                <td>Count messages</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($threads as $thread)   
                @forelse($thread->participants as $participant)
                    @if ($participant->user->id !== Auth::id())
                        <tr>
                            <td><a href="#"> {{ $thread->subject }}</a></td>
                            <td>{{ $participant->user->name }}</td>
{{--                            TODO fix --}}
                            <td>count messages</td>
                        </tr>
                    @endif
                @empty
                    <h1>No Messages</h1>
                @endforelse
            @empty
                <br>
            @endforelse
        </tbody>
    </table>
@stop
