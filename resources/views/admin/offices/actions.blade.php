

<a href="{{ route('office.edit', $id)    }}" class="btn btn-info"> <i class="fa fa-edit"></i></a>

<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
    data-user_id="{{ $id }}" data-username="{{ $name }}"
    data-toggle="modal" href="#modaldemo8" title="حذف"><i
        class="fa fa-trash"></i></a>


<a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
data-user_id="{{ $id }}" data-username="{{ $name }}"
data-toggle="modal" href="#modaldemo" title="حذف"><i
    class="fa fa-pin"></i></a>






    <div class="modal" id="modaldemo">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">

                @inject('places', 'App\Models\Place')
                <div class="modal-header">
                    <h6 class="modal-title">البلاد التي يمكن السفر اليها من هذا المكتب </h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">



                    <table style="margin: 0 auto;">
                        <tr>
                          <th style="width: 100px">المدينة</th>
                          <th style="width: 100px">السعر</th>
                        </tr>
                    @foreach ($places->get() as $place)
                        <tr>
                          <td>{{$place->name}}</td>
                          <td row="">{{$place->price}}</td>
                        </tr>
                    @endforeach

                      </table>




                </div>

        </div>
    </div>
