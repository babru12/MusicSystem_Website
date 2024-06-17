<option value="" selected>--select song--</option>
@foreach($datas as $data)
<option value="{{$data->id}}">{{$data->title}}</option>
@endforeach