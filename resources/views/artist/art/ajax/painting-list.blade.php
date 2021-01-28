<div class="card-body table-responsive">
    <table class="table" id="paintingTable">
        <thead>
            <tr>
                <th width="5%">S. No.</th>
                <th width="8%">Image</th>
                <th width="10%">Painting Name</th>
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
                <td>{{ $value->year_of_production }}</td>
                <td>{{ $value->height_width }}</td>
                <td>{{ $value->location }}</td>
                <td> {{ $value->paintingCategory->name }}</td>
                <td>{{ $value->for_sale == 1 ? 'Yes' : 'No' }}</td>
                <td>{{ $value->basic_price }} </td>
                <td>@if($value->is_approved == 1)
                        Approved
                    @elseif($value->is_approved == 2)
                        Rejected
                    @else
                        Pending
                    @endif
                </td>
                <td>
                    <div class="edit-icons">
                        <a href="{{ route('artist.painting.edit', [encrypt($value->id)]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <a href="{{ route('artist.painting.delete', [encrypt($value->id)]) }}" onclick="return deltePainting()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>
                    </div>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{  $data->links() }}