 <div class="table-responsive">
    <table class="table table-bordered" id="artcashTable">
      <thead>
        <tr>
          <!-- <th> S. No. </th> -->
          <th> Date </th>
          <th> Particulers </th>
          <th class="text-success"> Eared </th>
          <th class="text-danger"> Spent </th>
          <th> Balance </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $value)
        <tr>
          <!-- <td> 1 </td> -->
          <td> {{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td>
          <td> {{ $value->art_cast_type }}</td>
          <td  class="text-success"> {{ $value->earn_spend == 'earn' ? '+'.$value->art_cash_amount : '' }} </td>
          <td class="text-danger"> {{ $value->earn_spend == 'spend' ? '-'.$value->art_cash_amount : '' }} </td>
          <td> $ {{ $value->balanceLeft($value->created_at, $value->artist_id) }} </td>
        </tr>
        @endforeach
      
      </tbody>
    </table>
</div>
 {{  $data->links() }}