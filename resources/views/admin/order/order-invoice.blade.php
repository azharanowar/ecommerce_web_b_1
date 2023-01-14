@extends('admin.master')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="container-fluid px-4">

        <style>
            body {
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                text-align: center;
                color: #777;
            }

            body h1 {
                font-weight: 300;
                margin-bottom: 0px;
                padding-bottom: 0px;
                color: #000;
            }

            body h3 {
                font-weight: 300;
                margin-top: 10px;
                margin-bottom: 20px;
                font-style: italic;
                color: #555;
            }

            body a {
                color: #06f;
            }

            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
        </style>


        <div class="card my-4">
            <div class="card-header">
                Order Invoice
            </div>
            <div class="card-body">
                <div class="invoice-box">
                    <table>
                        <tr class="top">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td class="title">
                                            LOGO
                                        </td>

                                        <td>
                                            Invoice #: 00{{ $order->id}}<br />
                                            Order Date: {{ $order->order_date }}<br />
                                            Invoice Date: {{ date('Y-m-d') }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <h5>Billing Info</h5>
                                        <td>
                                            {{ $order->customer->name }}<br />
                                            {{ $order->customer->email }}<br />
                                            {{ $order->customer->address }}
                                        </td>

                                        <h5>Shipping Info</h5>
                                        <td>
                                            {{ $order->customer->name }}<br />
                                            {{ $order->customer->email }}<br />
                                            {{ $order->delivery_address }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="heading">
                            <td>Payment Method</td>
                            <td>{{ $order->payment_type == 1 ? 'Cash On Delivery' : '' }} {{ $order->payment_type == 2 ? 'bKash' : '' }}</td>
                        </tr>

                        <tr class="details">
                            <td>Check</td>

                            <td>1000</td>
                        </tr>

                        <tr class="heading">
                            <td>Item</td>

                            <td>Price</td>
                        </tr>

                        @foreach($order->orderDetails as $orderDetail)
                            <tr class="item">
                                <td>{{ $orderDetail->product_name }}</td>
                                <td>{{ $orderDetail->product_price * $orderDetail->product_quantity }}</td>
                            </tr>
                        @endforeach
                        <tr class="item">
                            <td>Tax Amount</td>

                            <td></td>
                        </tr>
                        <tr class="item">
                            <td>Shipping A Amount</td>

                            <td></td>
                        </tr>
                        <tr class="total">
                            <td></td>

                            <td>Total: $385.00</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


