@extends('layouts.master')

@section('content')
<div class="container">

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row justify-content-center bg-white ">
        <div class="col-md-4 p-4">
            <div class="form-group">
                <label for="name">Product Name</label>
                <select name="name" id="name" class="form-control">
                    <option value="" active>Choose Prorduct</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}"> {{$product->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total_products">Quantity</label>
                <input type="number" name="qty_products" id="qty_products" class="form-control" required>
            </div>
            <button class="btn btn-block btn-primary" id="show-product">Add Product</button>
        </div>
        <div class="col-md-8 p-4">
            <h5>Product List</h5>
            <form action="{{ route('transactions.store') }}" method="post" class="mt-4">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total Product</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="list-product">
                        <tr id="null">
                            <td colspan="3">Data is not found!</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="Customer name">Customer Name</label>
                    <input type="text" name="cust_name" id="" class="form-control w-50" >
                </div>
                <div class="form-group">
                    <label for="total payment">Total Price</label>
                    <input type="number" name="total_payment" id="total_payment" class="form-control w-25" >
                </div>
                <div class="form-group">
                    <label for="payment">Payment</label>
                    <input type="number" name="payment" id="payment" class="form-control w-25" required>
                </div>
                <div class="form-group">
                    <label for="change">Change</label>
                    <p id="label-change">₱ </p>
                    <input type="hidden" name="change" id="change" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="order_qty" id="order_qty" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Add Transactional</button>
            </form>
        </div>
    </div>


    <!--Transaction Details Start-->
    <div class="row justify-content-center bg-white py-5">
        <div class="col-md-12">
        <div class="card card-primary card-outline"><br>
        <h5>Transaction List</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Purchase Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->cust_name }}</td>
                        <td>
                            <ul>
                                @foreach($transaction->product as $item)
                                <li>{{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $transaction->total_price }}</td>
                        <td>{{ $transaction->pay }}</td>
                        <td>{{ $transaction->change }}</td>
                        <td>{{ $transaction->created_at }}</td>

                        <td>
                              <a  class="btn btn-sm btn-danger sa-delete" href="javascript:;" data-form-id="transaction-delete{{ $transaction->id}}">
                                <i class="fa fa-trash"></i> Delete
                              </a>

                              <form id="transaction-delete{{ $transaction->id}}" action="{{ route('transactions.destroy', $transaction->id)}}" method="post">
                              @csrf
                              @method('DELETE')

                              </form>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Transactio Details End-->
    


@endsection
