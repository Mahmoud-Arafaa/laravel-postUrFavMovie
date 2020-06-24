@if($errors->any()) 
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>
                    <h1>{{$error}}</h1>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
       <h2> {{session('status')}} </h2>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
       <h2> {{session('error')}} </h2>
    </div>
@endif