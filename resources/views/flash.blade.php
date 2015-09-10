@if(session()->has('success'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning" style="text-align: center;">
        {{ session('warning') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" style="text-align: center;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif