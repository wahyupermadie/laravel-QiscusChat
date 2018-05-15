@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @foreach($user as $value)
                        <a id="userFriend" class="friend list-group-item" data-email="{{$value->email}}">{{$value->name}}</a>
                    @endforeach
                    <div class="sdk-wrapper">
                        <div id="qiscus-widget"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" async>
    $(document).ready(function(){
        $('.friend').click(function(){
            var email=$(this).attr('data-email');
            var url = 'getCurrentUser';
            $.ajax({
                type:'get',
                url:url,
                success: function(data){
                    QiscusSDK.core.init({
                    AppId: 'mcachat-ngbmssmnohydp',
                        options: {
                            loginSuccessCallback() {
                            // chat user 'guest@qiscus.com' when successfully logged in
                            QiscusUI.chatTarget(email);
                            },
                        },
                    });
                    QiscusSDK.core.setUser(data.email,'123456',data.email, null);
                    QiscusSDK.render();
                    console.log(data);
                },
                error: function(){
                    alert("error collecting user Login");
                }
            });
        })

        // var url = 'getCurrentUser';
		// $.ajax({
		// 	type:'get',
		// 	url:url,
		// 	success: function(data){
        //         QiscusSDK.core.init({
        //         AppId: 'mcachat-ngbmssmnohydp',
        //             options: {
        //                 loginSuccessCallback() {
        //                 // chat user 'guest@qiscus.com' when successfully logged in
        //                 // QiscusUI.chatTarget('oka@gmail.com');
        //                 },
        //             },
        //         });
        //         QiscusSDK.core.setUser(data.email,'123456',data.email, null);
        //         QiscusSDK.render();
        //         console.log(data);
		// 	},
		// 	error: function(){
		// 		alert("error collecting user Login");
		// 	}
        // });
        
    })
   
</script>
@endsection
