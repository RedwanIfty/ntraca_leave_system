<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{-- <img class="rounded-circle header-profile-user" src="{{asset('assets\images\users\avatar-1.jpg')}}" alt="Header Avatar"> --}}
    <i style="color: red; hight:20px" class="fas fa-bell">{{$total}}</i>
</button>
<div class="dropdown-menu dropdown-menu-right">
    @foreach($applications as $app)

    <a class="dropdown-item" href="#">{{$app->first_name}} : {{$app->comment}}</a>
    <hr>

    @endforeach


    <a class="dropdown-item" href="{{ route('pending.application') }}">সব
        দেখুন</a>
</div>
