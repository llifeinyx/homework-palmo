@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item active">List users:</li>
                    @foreach($users as $user)
                        <li class="list-group-item list-group-item-action">
                            <div class="row border-bottom">
                                <div class="col-4">
                                    User name: {{$user->name}}
                                </div>
                                <div class="col">
                                    Registered at: {{$user->created_at}}
                                </div>
                            </div>
                            <div class="row mt-3 border-bottom">
                                <div class="col-4">
                                    Amount items: {{$user->item->count()}}
                                </div>
                                <div class="col">
                                    Selected items: {{$user->selectedItem->count()}}
                                </div>
                                <div class="col">
                                    <form method="POST" action="{{route('admin.userBan', ['user' => $user->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">
                                            @if($user->ban_status === 'yes')
                                                Deban
                                            @elseif($user->ban_status === 'no')
                                                Ban
                                            @endif
                                        </button>
                                        <input type="text" hidden name="ban_action" value="@if($user->ban_status === 'yes'){{'deban'}}@else{{'ban'}}@endif">
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="POST" action="{{route('admin.userVip', ['user' => $user->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">
                                            @if($user->vip_status === 0)
                                                Vip
                                            @elseif($user->vip_status === 1)
                                                Unvip
                                            @endif
                                        </button>
                                        <input type="text" hidden name="vip_action" value="@if($user->vip_status === 0){{'vip'}}@else{{'unvip'}}@endif">
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li class="list-group-item">{{$users->links()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
