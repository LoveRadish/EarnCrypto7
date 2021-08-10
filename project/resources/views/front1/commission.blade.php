@extends('layouts.front')
@section('content')
    <section class="commission">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Tier Level</th>
                        <th scope="col">Commission</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>1231213</td>
                        <td>@mdo</td>
                        <td>10%</td>
                        <td>2021-7-5</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mark</td>
                        <td>1231213</td>
                        <td>@mdo</td>
                        <td>10%</td>
                        <td>2021-7-5</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Mark</td>
                        <td>1231213</td>
                        <td>@mdo</td>
                        <td>10%</td>
                        <td>2021-7-5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection