<td class="product-action">
    <a class="action-edit"
     data-toggle="modal"
     data-target="#exampleModalScrollable"
     data-id="{{$id}}"
     data-code="{{$code}}"
     data-desc_ar="{{$desc_ar}}"
     data-desc_en="{{$desc_en}}"
     data-solution_ar="{{$solution_ar}}"
     data-solution_en="{{$solution_en}}"
    ><i class="feather icon-edit"></i></a>
    <a href="{{ route('malfunctions.delete',$id) }}" class="_delete"><i class="feather icon-trash"></i></a>
</td>