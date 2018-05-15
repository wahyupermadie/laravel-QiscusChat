<div class="list-group">
    @foreach($user as $value)
        <a id="userFriend" class="userFriend list-group-item" data-email="{{$value->email}}">{{$value->name}}</a>
    @endforeach
</div>