@extends ('layouts.backend')

@section ('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" data-dismiss="alert">
        <strong>SUCCESS! &nbsp;</strong> {{ Session::get('success') }}
    </div>
@endif


<h3>Mange Home Page Products</h3>

<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Furniture Section
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('saveHomepageFurnitureSection') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select id="FurnitureProduct1" name="FurnitureProduct1" class="form-control @error('FurnitureProduct1') is-invalid @enderror">
                                        @foreach ($productFurnitures as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $FurnitureProduct1 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('FurnitureProduct1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="FurnitureProduct2" name="FurnitureProduct2" class="form-control @error('FurnitureProduct2') is-invalid @enderror">
                                        @foreach ($productFurnitures as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $FurnitureProduct2 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('FurnitureProduct2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select id="FurnitureProduct3" name="FurnitureProduct3" class="form-control @error('FurnitureProduct3') is-invalid @enderror">
                                        @foreach ($productFurnitures as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $FurnitureProduct3 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('FurnitureProduct3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="FurnitureProduct4" name="FurnitureProduct4" class="form-control @error('FurnitureProduct4') is-invalid @enderror">
                                        @foreach ($productFurnitures as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $FurnitureProduct4 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('FurnitureProduct4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Consumables Section
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('saveHomepageConsumablesSection') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select id="ConsumablesProduct" name="ConsumablesProduct" class="form-control @error('ConsumablesProduct') is-invalid @enderror">

                                        @foreach ($productConsumable as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $ConsumablesProduct ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ConsumablesProduct')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Electricals Section
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('saveHomepageElectricalsSection') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select id="ElectricalsProduct1" name="ElectricalsProduct1" class="form-control @error('ElectricalsProduct1') is-invalid @enderror">

                                        @foreach ($productElectricals as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $ElectricalsProduct1 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ElectricalsProduct1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="ElectricalsProduct2" name="ElectricalsProduct2" class="form-control @error('ElectricalsProduct2') is-invalid @enderror">

                                        @foreach ($productElectricals as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $ElectricalsProduct2 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ElectricalsProduct2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <select id="ElectricalsProduct3" name="ElectricalsProduct3" class="form-control @error('ElectricalsProduct3') is-invalid @enderror">

                                        @foreach ($productElectricals as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $ElectricalsProduct3 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ElectricalsProduct3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="ElectricalsProduct4" name="ElectricalsProduct4" class="form-control @error('ElectricalsProduct4') is-invalid @enderror">

                                        @foreach ($productElectricals as $product)
                                            <option
                                                value="{{ $product->id }}"
                                                {{ ($product->id == $ElectricalsProduct4 ? "selected":"") }}> {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ElectricalsProduct4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection

