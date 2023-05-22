<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/receipt_index.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Show</title>
</head>
<body>

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #{{$student->id}}
                </small>
            </h1>

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Export
                    </a>
                </div>
            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                <span class="text-default-d3">Ciko Akadimi</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Name:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{$student->student_name}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    Guardin Name: {{$student->guardian_name}}
                                </div>
                                <div class="my-1">
                                    State, Country
                                </div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">111-111-111</b></div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>
                                @php
                                    $randomNumber = mt_rand(100000, 999999); // Generate a random 6-digit number
                                    $formattedNumber = substr_replace($randomNumber, '-', 3, 0);
                                @endphp
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$formattedNumber}}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$student->created_at}}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            <div class="d-none d-sm-block col-1">#</div>
                            <div class="d-none d-sm-block col-sm-2">Course Name</div>
                            <div class="col-5 col-sm-5">Description</div>
                            <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        </div>
                        @foreach ($courses as $course)
                        <div class="text-95 text-secondary-d3">
                            <div class="row mb-2 mb-sm-0 py-25">
                                <div class="d-none d-sm-block col-1">1</div>
                                <div class="d-none d-sm-block col-2">{{$course->course_name}}</div>
                                <div class="col-5 col-sm-5">{{$course->description_of_course}}</div>
                                <div class="d-none d-sm-block col-2 text-95">${{$course->price}}</div>
                            </div>
                        </div>
                        @endforeach

                        <!-- ... existing code ... -->

                        @if ($student->installment_number != 1)
                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="d-none d-sm-block col-2 col-sm-2">Price before</div>
                                <div class="d-none d-sm-block col-sm-2">Course Name</div>
                                <div class="d-none d-sm-block col-sm-4">Number of installment</div>
                                <div class="d-none d-sm-block col-sm-3">Single installment price</div>
                            </div>
                            <?php
                                $totalPrice = 0; // Initialize the total price variable
                                $singlePrice = $totalPrice / $student->installment_number;
                                $loopCount = 0;
                                $totalInstallment = 0;
                                $courseCount = count($courses);
                            ?>
                            @foreach ($courses as $course)
                            @php
                            $loopCount++;
                            $totalPrice += $course->price;
                            $totalInstallment += $student->installment_number;
                            $singlePrice = $course->price / $student->installment_number;
                            @endphp

                            <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">{{$loopCount}}</div>
                                    <div class="d-none d-sm-block col-2 col-sm-2">${{$course->price}}</div>
                                    <div class="d-none d-sm-block col-sm-2">{{$course->course_name}}</div>
                                    <div class="d-none d-sm-block col-sm-4">{{$student->installment_number}}</div>
                                    <div class="d-none d-sm-block col-sm-3 text-95">${{$singlePrice}}</div>
                                </div>
                            </div>

                            @endforeach


                            @php
                            $singlePriceTwo = $totalPrice / $student->installment_number;
                            @endphp

                            @else

                            @php
                            $totalPrice = 0; // Initialize the total price variable
                            $singlePriceTwo = $totalPrice;
                            @endphp

                            @endif

                            <!-- ... rest of the code ... -->

                            {{-- Discount --}}


                            <div class="row border-b-2 brc-default-l2"></div>


                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    Extra note such as company or payment information...
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <?php
                                        $subTotal = $singlePriceTwo;
                                        $tax = $subTotal * 0.1;

                                        $total = $subTotal + $tax;
                                        
                                    ?>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">${{$subTotal}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Tax (10%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">${{$tax}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">${{$total}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div>
                                <span class="text-secondary-d1 text-105">Thank you for your business</span>
                                <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
