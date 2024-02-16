<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Order Information</title>
</head>

<body style="">

    <div
        style="
        background-color: rgb(245, 255, 252);
        font-style: normal;
        padding: 10px;
        width: 100%;
        border-radius: 20px;
      ">
        <div style="
      font-style: 32px;
    ">

        </div>
        <div
            style="
          background-color: white;
          margin: 3rem auto;
          padding: 2rem;
          margin-top: 150;
          font-size: 1rem;
          border-radius: 20px;
        ">
            <p style="margin-top: 20px;">
                Your order
            <h2>
                {{ $mailData->order_id }}
            </h2>
            is
            <h2>
                {{ $mailData->order_status }}.
            </h2>
            Please do not reply to this e-mail. This is an auto-generated e-mail.
            {{-- If you have any queries please e-mailin ifn@investfornepal.com. --}}
            <br />
            Thank you.

            </p>

        </div>

    </div>
</body>

</html>
