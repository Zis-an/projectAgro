@extends('adminlte::page')

@section('title', __('global.view_sale'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('global.view_sale')}}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('global.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.sales.index')}}">{{ __('global.sales')}}</a></li>
                <li class="breadcrumb-item active">{{ __('global.view_sale')}}</li>
            </ol>

        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="invoice_no">{{ __('global.invoice_no')}}<span class="text-danger">*</span></label>
                                            <input id="invoice_no" readonly name="invoice_no" value="{{$sale->invoice_no}}" class="form-control" placeholder="{{ __('global.invoice_no')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sale_date">{{ __('global.sale_date')}}<span class="text-danger">*</span></label>
                                            <input id="sale_date" readonly name="sale_date" value="{{$sale->sale_date}}" type="text" class="form-control" placeholder="{{ __('global.sale_date')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="party_id">{{ __('global.party')}}<span class="text-danger">*</span></label>
                                            <input name="party_id" readonly class=" form-control"  value="{{$sale->party->name}}">

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="farm_id">{{ __('global.farm')}}<span class="text-danger">*</span></label>
                                            <input name="farm_id" readonly class=" form-control"  value="{{$sale->farm->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="tax">{{ __('global.tax')}}<span class="text-danger">*</span></label>
                                            <input name="tax" id="tax" readonly class=" form-control"  value="{{$sale->tax}}">

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="paid_amount" class="form-label">{{__('global.paid_amount')}}</label>
                                            <input  id="paid_amount" readonly value="{{$sale->paid}}" type="number" step="any"  class="form-control" name="paid_amount" placeholder="{{__('global.paid_amount')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="discount" class="form-label">{{__('global.discount')}}</label>
                                            <input  id="discount" readonly value="{{$sale->discount}}" type="number" step="any"  class="form-control" name="discount" placeholder="{{__('global.discount')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="shipping_cost" class="form-label">{{__('global.shipping_cost')}}</label>
                                            <input  id="shipping_cost" readonly value="{{$sale->shipping_cost}}" type="number" step="any" class="form-control" name="shipping_cost" placeholder="{{__('global.shipping_cost')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="labor_cost" class="form-label">{{__('global.labor_cost')}}</label>
                                            <input  id="labor_cost" readonly value="{{$sale->labor_cost}}" type="number" step="any"  class="form-control" name="labor_cost" placeholder="{{__('global.labor_cost')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="other_cost" class="form-label">{{__('global.other_cost')}}</label>
                                            <input  id="other_cost" readonly value="{{$sale->other_cost}}" type="number" step="any" class="form-control" name="other_cost" placeholder="{{__('global.other_cost')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sale_note">{{ __('global.sale_note')}}</label>
                                            <textarea id="sale_note" readonly name="sale_note" class="form-control" placeholder="{{ __('global.enter_sale_note')}}">{{$sale->sale_note}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>{{__('global.image')}}</label>
                                        <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#previewModal">{{__('global.see_image')}} <i class="fas fa-eye"> </i> </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="previewModalLabel">{{__('global.see_image')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset('uploads/'.$sale->image)}}" class="img-fluid" >
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped"  id="selected-products">
                                        <thead>
                                        <tr>
                                            <th width="50px">{{__('global.image')}}</th>
                                            <th>{{__('global.product')}}</th>
                                            <th width="60px">{{__('global.qty')}}</th>
                                            <th width="80px">{{__('global.price')}}</th>
                                            <th width="70px">{{__('global.total')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.sub_total')}}</h5>
                                                <input type="text" class="form-control" disabled  id="sub_total" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.tax')}}</h5>
                                                <input type="text" class="form-control" disabled  id="vat" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.total_cost')}}</h5>
                                                <input type="text" class="form-control" disabled  id="cost" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.discount')}}</h5>
                                                <input type="text" class="form-control" disabled  id="dis" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.total')}}</h5>
                                                <input type="text" class="form-control" disabled  id="total" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.paid')}}</h5>
                                                <input type="text" class="form-control" disabled  id="paid" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <h5 class=" text-center">{{__('global.due_amount')}}</h5>
                                                <input type="text" class="form-control" disabled  id="due" value="0">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <a href="{{route('admin.sales.index')}}" class="btn btn-success mr-2" >Go Back</a>
                        @if($sale->status === 'pending')
                            @can('sale_delete')
                                <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST" id="deleteForm">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button id="deleteBtn" class="btn btn-danger mx-2"><i class="fa fa-trash"></i> Delete</button>
                            @endcan
                            @can('sale_update')
                                <a href="{{route('admin.sales.edit',['sale'=>$sale->id])}}" class="btn btn-warning mx-2"><i class="fa fa-pen"></i> Edit</a>
                            @endcan
                            @can('sale_approve')
                                <form action="{{route('admin.sales.approve',['sale'=>$sale->id])}}" method="post" id="approveForm">
                                    @csrf
                                    <button id="approveFormBtn" class="btn btn-primary mx-2"><i class="fa fa-ar"></i> Approve</button>
                                </form>
                            @endcan
                        @endif



                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <strong>{{__('global.developed_by')}} <a href="https://soft-itbd.com">{{__('global.soft_itbd')}}</a>.</strong>
    {{__('global.all_rights_reserved')}}.
    <div class="float-right d-none d-sm-inline-block">
        <b>{{__('global.version')}}</b> {{env('DEV_VERSION')}}
    </div>
@stop
@section('plugins.toastr',true)
@section('plugins.Sweetalert2',true)
@section('plugins.Select2',true)
@section('plugins.Summernote',true)
@section('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            color: black;
        }
        .select2{
            max-width: 100%!important;
        }
        .input-qty{
            width: 60px;
        }
        .input-price{
            width: 80px;
        }
    </style>
@stop

@section('js')

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                theme:'classic'
            });
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showButtonPanel: false
            });
            $('#approveFormBtn').click(function (){
                var form = $('#approveForm');
                Swal.fire({
                    title: '{{__('global.approveConfirmTitle')}}',
                    text: '{{__('global.approveConfirmText')}}',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: '{{__('global.approveConfirmButtonText') }}',
                    cancelButtonText: '{{__('global.approveCancelButton') }}',
                }).then((result) => {
                    console.log(result)
                    if (result.value) {
                        form.submit();
                    }
                });
            });
            $('#deleteBtn').click(function (){
                var form = $('#deleteForm');
                Swal.fire({
                    title: '{{__('global.deleteConfirmTitle')}}',
                    text: '{{__('global.deleteConfirmText')}}',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: '{{__('global.deleteConfirmButtonText') }}',
                    cancelButtonText: '{{__('global.deleteCancelButton') }}',
                }).then((result) => {
                    console.log(result)
                    if (result.value) {
                        form.submit();
                    }
                });
            });


            // Initialize an array to store selected products
            var selectedProducts = [];

            @foreach($sale->saleProducts as $product)
            var selectedProduct = {
                id: '{{$product->product->id}}',
                name: '{{$product->product->name}} - {{ __('global.'.$product->product->type) }} ',
                price: {{$product->unit_price}},
                img: '{{asset('uploads/'.$product->product->image)}}',
                unit: '{{$product->product->unit->code}}',
                quantity: {{$product->quantity}}, // Default quantity
                subtotal: {{$product->sub_total}} // Initial subtotal
            };
            // Add the selected product to the array
            selectedProducts.push(selectedProduct);
            // Add the selected product to the table
            addToTable(selectedProduct);
            // Update the total
            updateTotal();
            @endforeach





            // Function to add a selected product to the table
            function addToTable(product) {
                $('#selected-products tbody').append(`
            <tr data-product-id="${product.id}">
                <td><img src="${product.img}" class="img-thumbnail" style="max-width: 50px; max-height: 50px"></td>

                <td>${product.name} <input type="hidden" name="product_ids[]" value="${product.id}"></td>
                <td><input readonly type="number" step="any"  name="product_quantities[]"  class="input-qty product-quantity" value="${product.quantity}"> <sup>${product.unit}</sup></td>
                <td><input readonly class="input-price product-price"  type="number" step="any" name="product_prices[]" value="${product.price}" step="0.01"/> </td>
                <td class="product-subtotal">${product.subtotal}</td>
            </tr>
        `);
            }

            // Function to update a selected product in the table
            function updateTable(product) {
                var row = $(`#selected-products tr[data-product-id="${product.id}"]`);
                row.find('.product-quantity').val(product.quantity);
                row.find('.product-price').val(product.price);
                row.find('.product-subtotal').text(product.subtotal);
            }


            function updateTotal() {
                var $shippingCost = $('#shipping_cost');
                var $otherCost = $('#other_cost');
                var $tax = $('#tax');
                var $laborCost = $('#labor_cost');
                var $paidAmount = $('#paid_amount');
                var $discount = $('#discount');
                var $subTotal = $('#sub_total');
                var $cost = $('#cost');
                var $dis = $('#dis');
                var $paid = $('#paid');
                var $total = $('#total');
                var $due = $('#due');
                var $vat = $('#vat');

                var subTotal = selectedProducts.reduce((acc, product) => acc + product.subtotal, 0);
                $subTotal.val(subTotal);

                var shippingCostValue = parseFloat($shippingCost.val());
                var otherCostValue = parseFloat($otherCost.val());
                var taxValue = parseFloat($tax.val());
                var laborCostValue = parseFloat($laborCost.val());
                var discountValue = parseFloat($discount.val());
                var paidAmountValue = parseFloat($paidAmount.val());

                // Check if values are NaN and replace with 0 if necessary
                shippingCostValue = isNaN(shippingCostValue) ? 0 : shippingCostValue;
                otherCostValue = isNaN(otherCostValue) ? 0 : otherCostValue;
                taxValue = isNaN(taxValue) ? 0 : taxValue;
                laborCostValue = isNaN(laborCostValue) ? 0 : laborCostValue;
                discountValue = isNaN(discountValue) ? 0 : discountValue;
                paidAmountValue = isNaN(paidAmountValue) ? 0 : paidAmountValue;
                var taxAmount = subTotal*(taxValue/100);

                $cost.val(shippingCostValue + laborCostValue + otherCostValue);
                $dis.val(discountValue);
                $paid.val(paidAmountValue);

                var totalValue = subTotal + shippingCostValue + laborCostValue + otherCostValue + taxAmount - discountValue;
                $total.val(totalValue);

                var dueValue = totalValue - paidAmountValue;
                $due.val(dueValue);
                $vat.val(taxAmount);
            }
        });
    </script>

@stop
