<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('edit.css')}}">
    <title>Document</title>
</head>
<body>
<form action="{{Route('user.update')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="/assets/uploads/{{auth()->user()->avatar?auth()->user()->avatar:'avatar.png'}}" width="90">
                <span class="font-weight-bold">{{auth()->user()->last_name}} {{auth()->user()->first_name}}</span><span class="text-black-50">{{auth()->user()->email}}</span>
                    <span>United States</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <a href="{{Route('categories.index')}}"><h6>Back to home</h6></a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first_name" placeholder="first name" value="{{auth()->user()->first_name}}">
                            @error('first_name')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="last_name" value="{{auth()->user()->last_name}}" placeholder="last name">
                            @error('last_name')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                            @error('email')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone" value="{{auth()->user()->phone}}" placeholder="Phone number">
                            @error('phone')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Facebook" name="facebook" value="{{auth()->user()->facebook}}">
                            @error('facebook')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" value="{{auth()->user()->address}}" placeholder="Country">
                            @error('address')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="avatar">
                            @error('avatar')
										<p style="color: red">{{$message}}</p>
							@enderror
                        </div>
                        
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
   </form>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>