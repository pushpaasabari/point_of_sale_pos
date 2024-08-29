<div class="col-12">
    {{-- @include('suadmin::layouts.alert') --}}
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>GSTIN</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($vendor_list->count() > 0)
                    @foreach($vendor_list as $value)
                    <tr>
                        {{-- <td>{{$value->user_type}}</td> --}}
                        <td>{{$value->vendor_name}}</td>
                        <td>{{$value->vendor_mobile}}</td>
                        <td>{{$value->vendor_gstin}}</td>
                        <td>{{$value->vendor_email}}</td>
                        <td>{{$value->vendor_address}}</td>
                        @if($value->vendor_status == 1)

                        <td>
                            <a href="vendor_status_change/{{$value->vendor_sno}}/{{$value->vendor_status}}"
                                class="btn btn-success btn-sm toastsDefaultSuccess">Active</a>
                        </td>
                        @elseif($value->vendor_status == 0)
                        <td>
                            <a href="vendor_status_change/{{$value->vendor_sno}}/{{$value->vendor_status}}"
                                class="btn btn-danger btn-sm toastsDefaultSuccess">Suspended</a>
                        </td>
                        @else
                        <td>
                            <a href="vendor_status_change/{{$value->vendor_sno}}/{{$value->vendor_status}}"
                                class="btn btn-warning btn-sm toastsDefaultSuccess">Unknown</a>
                        </td>
                        @endif
                        <td>
                            <a href="vendor.edit/{{$value->vendor_sno}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="vendor.delete/{{$value->vendor_sno}}/{{$value->vendor_name}}"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure to delete {{$value->vendor_name}}?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach @else
                    <tr>
                        <td colspan="7">No Records Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>