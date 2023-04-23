@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">New Orders</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Customer Name</th>
                                            <th>Total</th>
                                            <th>Order On </th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="tac">
                                            <td>ORDB 68581</td>
                                            <td>RAM</td>
                                            <td><i class="fa fa-inr"></i> 15,363</td>
                                            <td>10-03-2023</td>
                                            <td>Chandigarh</td>
                                            <td>Processing</td>
                                            <td><a href="order-details.html" class="">View Details</a> </td>
                                        </tr>
                                        <tr class="tac">
                                            <td>ORDB 68581</td>
                                            <td>RAM</td>
                                            <td><i class="fa fa-inr"></i> 15,363</td>
                                            <td>10-03-2023</td>
                                            <td>Chandigarh</td>
                                            <td>Processing</td>
                                            <td><a href="order-details.html" class="">View Details</a> </td>
                                        </tr>

                                        <tr class="tac">
                                            <td>ORDB 68581</td>
                                            <td>RAM</td>
                                            <td><i class="fa fa-inr"></i> 15,363</td>
                                            <td>10-03-2023</td>
                                            <td>Chandigarh</td>
                                            <td>Processing</td>
                                            <td><a href="order-details.html" class="">View Details</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>

                        <a href="view-order.html" class="btn">View All</a>

                        <h3 class="card-title"></h3>
                        <hr>
                        <div class="table-responsive">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Ticket</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Status</th>
                                            <th>Ticket No</th>
                                            <th>On</th>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Email/Mobile</th>
                                            <th>Issue Title</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="tac">
                                            <td>1</td>
                                            <td><span class="text-danger">Open</span></td>
                                            <td>TKT6985214</td>
                                            <td>10-Apr-2023</td>
                                            <td><a href="order-details.html">ORD45545</a></td>
                                            <td>Rohan</td>
                                            <td>email@gmail.com / 981298123</td>
                                            <td>Missing Item</td>
                                            <td><a href="#" data-toggle="modal" data-target="#issue-details">View
                                                    Detail</a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#issue-details">Update</a>
                                            </td>
                                        </tr>

                                        <tr class="tac">
                                            <td>2</td>
                                            <td><span class="text-success">Closed</span></td>
                                            <td>TKT6985214</td>
                                            <td>10-Apr-2023</td>
                                            <td><a href="order-details.html">ORD45545</a></td>
                                            <td>Rohan</td>
                                            <td>email@gmail.com / 981298123</td>
                                            <td>Missing Item</td>
                                            <td><a href="#" data-toggle="modal" data-target="#issue-details">View
                                                    Detail</a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#issue-details">Update</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <br>
                        <br>
                        <a href="tickets.html" class="btn">View All</a>
                        <h3 class="card-title"></h3>
                        <hr>
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Reviews</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Status</th>
                                            <th>Rating</th>
                                            <th>On</th>
                                            <th>Order ID</th>
                                            <th colspan="2">Product</th>
                                            <th>Name</th>
                                            <th>Email/Mobile</th>
                                            <th>Review Title</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tac">
                                            <td>1</td>
                                            <td><span class="text-danger">Unapprove</span></td>
                                            <td>
                                                <div class="Stars" style="--rating: 4;" aria-label=""> </div>
                                            </td>
                                            <td>10-Apr-2023</td>
                                            <td><a href="order-details.html">ORD45545</a></td>
                                            <td><img src="../assets/img/product-1.jpg" width="50"></td>
                                            <td>Electric Lawn Mower 12 Inches</td>
                                            <td>Rohan</td>
                                            <td>email@gmail.com / 981298123</td>
                                            <td>Great! Value for money</td>
                                            <td><a href="#" data-toggle="modal" data-target="#review-details">View
                                                    Detail</a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#review-details">Update</a>
                                                / <a href="#">Delete</a></td>
                                        </tr>

                                        <tr class="tac">
                                            <td>2</td>
                                            <td><span class="text-success">Closed</span></td>
                                            <td>
                                                <div class="Stars" style="--rating: 5;" aria-label=""> </div>
                                            </td>
                                            <td>10-Apr-2023</td>
                                            <td><a href="order-details.html">ORD45545</a></td>
                                            <td><img src="../assets/img/product-1.jpg" width="50"></td>
                                            <td>Electric Lawn Mower 12 Inches</td>
                                            <td>Rohan</td>
                                            <td>email@gmail.com / 981298123</td>
                                            <td>Superb Product</td>
                                            <td><a href="#" data-toggle="modal" data-target="#review-details">View
                                                    Detail</a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#review-details">Update</a>
                                                / <a href="#">Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <a href="reviews.html" class="btn">View All</a>
                        <h3 class="card-title"></h3>
                        <hr>
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')