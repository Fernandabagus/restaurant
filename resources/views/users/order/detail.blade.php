<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Wizard-v1</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('colorlib-wizard-21/colorlib-wizard-21/css/raleway-font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorlib-wizard-21/colorlib-wizard-21/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('colorlib-wizard-21/colorlib-wizard-21/css/style.css') }}" />

</head>

<body>
    <div class="page-content" style="background-image: url('{{ asset('colorlib-wizard-21/colorlib-wizard-21/images/wizard-v1.jpg') }}')">
        <div class="wizard-v1-content">
            <div class="wizard-form">
                <form class="form-register" id="form-register" action="{{ route('update-order', $food->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                            <span class="step-number">Langkah 1</span>
                            <span class="step-text">Detail Pesanan</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <input type="hidden" value="{{ $food->id }}" name="id_food">
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="username">Nama :</label>
                                        <input type="text" class="form-control" id="name" name="username" value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="username">Nama Makanan :</label>
                                        <input type="text" class="form-control" id="food-name" name="food" value="{{ $food->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="username">Harga :</label>
                                        <input type="text" class="form-control" id="food-price" name="price" value="@currency($food->price)" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="username">Deskripsi :</label>
                                        <input type="text" class="form-control" id="description" name="description" value="{{ $food->description }}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="username">Jumlah :</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                            <span class="step-number">Step 3</span>
                            <span class="step-text">Confirm Your Details</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <h3>Konfirmasi ?</h3>
                                <div class="form-row table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr class="space-row">
                                                <th>Nama:</th>
                                                <td id="name-val"></td>
                                            </tr>
                                            <tr class="space-row">
                                                <th>Nama Makanan:</th>
                                                <td id="food-name-val"></td>
                                            </tr>
                                            <tr class="space-row">
                                                <th>Harga Makanan:</th>
                                                <td id="food-price-val"></td>
                                            </tr>
                                            <tr class="space-row">
                                                <th>Description :</th>
                                                <td id="description-val"></td>
                                            </tr>
                                            <tr class="space-row">
                                                <th>Jumlah: </th>
                                                <td id="quantity-val"></td>
                                            </tr>
                                            <tr class="space-row">
                                                <th>Total Harga:</th>
                                                <td id="total-price-val"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('colorlib-wizard-21/colorlib-wizard-21/js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{ asset('colorlib-wizard-21/colorlib-wizard-21/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('colorlib-wizard-21/colorlib-wizard-21/js/main.js') }}"></script>
</body>

</html>
