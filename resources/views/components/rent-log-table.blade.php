                <thead>
                  <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tgl Peminjaman</th>
                    <th>Batas Peminjaman</th>
                    <th>Tgl pengembalian</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rentlog as $index => $item)
                    <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'table-danger' : 'table-success') }}">
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->user->username }}</td>
                      <td>{{ $item->book->book_code }} {{ $item->book->title }}</td>
                      <td>{{ $item->rent_date }}</td>
                      <td>{{ $item->return_date }}</td>
                      <td>{{ $item->actual_return_date }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </div>
        </div>
    </div>
</div>
