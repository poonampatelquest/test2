<div class="card-body table-responsive">
     <table class="table" id="paintingTable">
                        <thead>
                            <tr>
                                <th width="5%">S. No.</th>
                                <th width="8%">Image</th>
                                <th width="10%">Painting Name</th>
                                <th width="10%">Artist Name</th>
                                <th width="16%">Year of production</th>
                                <th width="7%">Size</th>
                                <th width="10%">Location</th>
                                <th width="10%">Category</th>
                                <th width="8%">For Sale</th>
                                <th width="8%">Basic Price</th>
                                <th width="8%">Status </th>
                                <th width="8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="normal-img">
                                        <img src="{{ $value->getFirstImage() }}">
                                    </div>
                                </td>
                                <td> {{ $value->painting_name }}</td>
                                <td> {{ $value->artist->name }}</td>
                                <td>{{ $value->year_of_production }}</td>
                                <td>{{ $value->height_width }}</td>
                                <td>{{ $value->location }}</td>
                                <td> {{ $value->paintingCategory->name }}</td>
                                <td>{{ $value->for_sale == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $value->basic_price }} </td>
                                <td>
                                    @if($value->is_approved == 1)
                                        @php($status = 'Approved')
                                    @elseif($value->is_approved == 2)
                                        @php($status = 'Rejected')
                                    @else
                                        @php($status = 'Pending')
                                    @endif
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <span id="status_current{{ $value->id }}"> {{ $status }} </span>
                                        </button>
                                        <div class="dropdown-menu">
                                             @if($value->is_approved == 0)
                                                <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $value->id }}" id="status_app{{ $value->id }}" href="javascript:void(0);">Approve</a>
                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $value->id }}" id="status_rej{{ $value->id }}" href="javascript:void(0);">Reject</a>
                                            @elseif($value->is_approved == 1)
                                                 <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $value->id }}" id="status_app{{ $value->id }}" href="javascript:void(0);" style="display: none;">Approve</a>

                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $value->id }}"id="status_rej{{ $value->id }}"  href="javascript:void(0);">Reject</a>
                                            @else
                                                <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $value->id }}" id="status_app{{ $value->id }}" href="javascript:void(0);">Approve</a>
                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $value->id }}" id="status_rej{{ $value->id }}" href="javascript:void(0);" style="display: none;" >Reject</a>
                                            @endif 
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="edit-icons">
                                        <a href="{{ route('admin.painting.view', [encrypt($value->id)]) }}" data-toggle="tooltip" data-placement="top" title="View"><i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('admin.painting.delete', [encrypt($value->id)]) }}" onclick="return deltePainting()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

    </div>
    {{  $data->links() }}