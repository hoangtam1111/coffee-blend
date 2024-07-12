<h3>Book a Table</h3>
<form action="{{ route('addBooking') }}" method="POST" class="appointment-form">
    @csrf
    <div class="d-md-flex">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <div class="text-sm text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ml-md-4">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="last_name">
            @error('last_name')
                <div class="text-sm text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="d-md-flex">
        <div class="form-group">
            <div class="input-wrap">
                <div class="icon"><span class="ion-md-calendar"></span></div>
                <input type="text" class="form-control appointment_date" placeholder="Date" name="date" value="{{ old('date') }}">
                @error('date')
                    <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group ml-md-4">
            <div class="input-wrap">
                <div class="icon"><span class="ion-ios-clock"></span></div>
                <input type="text" class="form-control appointment_time" placeholder="Time" name="time" value="{{ old('time') }}">
                @error('time')
                    <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group ml-md-4">
            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <div class="text-sm text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="d-md-flex">
        <div class="form-group">
            <textarea id="" cols="30" rows="2" class="form-control" placeholder="Message" name="message">{{ old('message') }}</textarea>
            @error('message')
                <div class="text-sm text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ml-md-4">
            <input type="submit" value="Appointment" class="btn btn-white py-3 px-4">
        </div>
    </div>
</form>
