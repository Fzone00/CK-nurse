<form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="from-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is=invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
            @error('name')
            <span class="invslid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>