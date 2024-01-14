<td class="product-action">
    <a class="action-edit"
     data-toggle="modal"
     data-target="#exampleModalScrollable"
     data-id="{{$id}}"
     data-name="{{$name}}"
     data-email="{{$email}}"
     data-message="{{$message}}"
    ><i class="feather icon-eye"></i></a>
    <a href="{{ route('contacts.delete',$id) }}" class="_delete"><i class="feather icon-trash"></i></a>
</td>