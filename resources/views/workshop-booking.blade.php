<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SomeStore - Special Workshop for our Customers</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="main-form">
        <div class="panel panel-default">
            <div class="panel-heading">Please, fill out the form</div>
            <form id="book-form" class="form-horizontal" action="" method="post">
                {{ csrf_field() }}
                <div class="panel-body text-left">
                    <div class="customer-panel">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="customer-name">Customer Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="customer-name" name="customer-name"
                                       placeholder="Enter name" required>
                            </div>
                            <span class="glyphicon glyphicon-remove col-sm-2 text-center text-danger refresh refresh-customer"
                                  title="Refresh the form"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="phone">Phone</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Enter phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="workshop">Workshop Time</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="workshop" name="workshop-id">
                                    <option value="" disabled selected>Choose workshop</option>
                                    @foreach ($workshops as $workshop)
                                        <option value="{{$workshop['id']}}">
                                            {{$workshop['day']}} : {{$workshop['time']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 spots">Spots: <span class="spots-number"></span></div>
                        </div>
                    </div>
                    <hr>
                    <div class="guest-panel">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-bordered table-striped table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Guest Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="guest-name">Guest Name</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="guest-name" placeholder="Enter Guest Name">
                            </div>
                            <span class="glyphicon glyphicon-remove col-sm-2 text-center text-danger refresh refresh-guest"
                                  title="Refresh the form"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-primary add-guest">Add guest</button>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-primary book-workshop">Book Workshop</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="modal-text"></p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/js/booking.js"></script>
