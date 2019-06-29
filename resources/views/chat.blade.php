<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
    .list-group{
        overflow-y: scroll;
        max-height: 200px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div id="app" class="row">
            <div class="offset-4 col-4">
            <li class="list-group-item active">Chat Room <span class=" badge badge-pill">@{{numberOfUsers}}</span></li>
                <div class="badge badge-pill badge-primary">
                    @{{typing}}
                </div>
                <ul class="list-group " v-chat-scroll>
                    <message v-for="msg,index in chat.message" :key=msg.index :user=chat.user[index] :color=chat.color[index] :time=chat.time[index]>
                        @{{msg}}
                    </message>
                </ul>
                <input style="background-color: darkgrey" type="text" class="form-control" placeholder="Enter your message here..." v-model="message" @keyup.enter="send">
            </div>
        </div>
    </div>    
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>