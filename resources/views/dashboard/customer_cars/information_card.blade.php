<div class="col-md-6 col-12 ">
    <div class="card">
        <div class="card-header" style="padding-top: 7px;height: 37px;background: #f7941c;color: #fff;">
            <div class="card-title mb-2">المستخدم </div>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td class="font-weight-bold">الإسم : </td>
                    <td>
                        {{$row->customer->name}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">الجوال : </td>
                    <td>
                        {{$row->customer->phone ?? '-'}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">الإيميل : </td>
                    <td>
                        {{$row->customer->email ?? '-'}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">النوع : </td>
                    <td>
                        {{$row->customer->gender}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="col-md-6 col-12 ">
    <div class="card">
        <div class="card-header" style="padding-top: 7px;height: 37px;background: #f7941c;color: #fff;">
            <div class="card-title mb-2">السيارة</div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-6">
                    <table>
                        <tr>
                            <td class="font-weight-bold">display_name : </td>
                            <td>
                                {{$row->display_name}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">maker_name : </td>
                            <td>
                                {{$row->maker_name}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">maker_code : </td>
                            <td>
                                {{$row->maker_code}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">model_name : </td>
                            <td>
                                {{$row->model_name}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">model_code : </td>
                            <td>
                                {{$row->model_code}}
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="col-sm-6">
                    <table>
                        <tr>
                            <td class="font-weight-bold">year : </td>
                            <td>
                                {{$row->year}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">fuel_type : </td>
                            <td>
                                {{$row->fuel_type}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">displacement : </td>
                            <td>
                                {{$row->displacement}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">is_hybrid : </td>
                            <td>
                                {{$row->is_hybrid}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">is_current_active : </td>
                            <td>
                                {{$row->is_current_active}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">vin : </td>
                            <td>
                                {{$row->vin}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>