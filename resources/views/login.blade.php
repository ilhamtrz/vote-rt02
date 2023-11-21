@extends('app')

@section('konten')
<div class="CountainerIndex">
        <div class="CountainerLogin">
            <div class="TulisanLoginTop">Login</div>
            <div class="LabelLogin">Masukkan No KK </div>
            <form class="FormInputLogin" action="{{route("postlogin")}}" method="post">
                {{csrf_field()}}
                <div class="CountainerInputFormInputNoKK">
                    <input class="FormInputNoKK" type="text" name="NoKK" id="NoKK">
                </div>
                <div class="CountainerInputFormInputNoKK">
                    <button class="SubmitforLogin" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div> 
@endsection 