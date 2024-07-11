@extends("layouts.apparthuradmin")

@section("title", "List Koi")

@section("css")

    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@endsection

@section("content")

    <div class="content">

        <table id="listkoi" class="display" style="width:100%">

            <thead>

                <tr>

                    <th>Name</th>

                    <th>Variety</th>

                    <th>Size</th>

                    <th>Setting</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>Tiger Nixon</td>

                    <td>

                        <div class="card">

                            <div class="well well-lg">

                                <div class="row">

                                    <div class="col-sm-12">sa</div>

                                    <div class="col-sm-6">sa</div>

                                </div>

                            </div>

                    </td>

                    <td>Edinburgh</td>

                    <td></td>

                </tr>

            </tbody>

        </table>

    </div>

@endsection

@section("script")

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        let table = new DataTable('#listkoi');
        $('#listkoi').DataTable({
            responsive: true
        });
    </script>

@endsection
