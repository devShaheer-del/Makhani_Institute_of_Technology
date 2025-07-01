<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .box {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 30px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .line {
            margin-top: 8px;
        }
    </style>
</head>

<body>

    {{-- Front Side --}}
    <div class="box">
        <h2 class="title"><strong> <u>Makhani Institute of Technology</u> </strong></h2>
        <div class="title">ADMISSION SLIP</div>
        <div class="line">Name: {{ $student->first_name }} {{ $student->last_name }}</div>
        <div class="line">Course Name:
            @php
                $courses = json_decode($student->courses, true);
                echo implode(', ', array_column($courses, 'course'));
            @endphp
        </div>
        <div class="line">Total Amount: ___________________________</div>
        <div class="line">Inwords: ___________________________</div>
        <div class="line" style="margin-top: 20px;">
            * KEEP THIS SLIP WITH YOURSELF UNTILL YOU RECEIVE YOUR CERTIFICATE.
        </div>
    </div>

    {{-- Back Side --}}
    <div class="box">
        <h2 class="title"> <strong> <u>Makhani Institute of Technology</u> </strong> </h2>
        <div class="title">STUDENT SLIP</div>
        <div class="line">Name: {{ $student->first_name }} {{ $student->last_name }}</div>
        <div class="line">Course Name:
            @php
                echo implode(', ', array_column($courses, 'course'));
            @endphp
        </div>
        <div class="line">Signature: ___________________________</div>
        <div class="line">Date: {{ $student->date }}</div>
        <div class="line" style="margin-top: 20px;">
            Note: The fee is not Refundable
        </div>
        <div class="line" style="margin-top: 20px;">
            Contact: 021-36944665
        </div>
    </div>

</body>

</html>
