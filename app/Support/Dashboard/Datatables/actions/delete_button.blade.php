
<form action="{{ $route }}" method="post" style="display: inline-block;">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$model->id}}">
    <button onclick="deleteRow(this);" class="btn btn-danger btn-sm delete" type="submit">  <i class="fa fa-trash"></i></button>
</form>
