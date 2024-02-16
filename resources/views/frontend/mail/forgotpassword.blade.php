<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email Received</title>
  </head>
  <body style="">
    <div
      style="
        background-color: rgb(245, 255, 252);
        font-style: normal;
        padding: 10px;
        width: 100%;
        border-radius: 20px;
      "
    >
      <div
        style="
          background-color: white;
          margin: 3rem auto;
          padding: 2rem;
          margin-top: 150;
          font-size: 1rem;
          border-radius: 20px;
        "
      >
        <img
          src="https://Zupish.com/demo/public/images/logo.png"
          width="150"
          alt="Zupish-logo"
          srcset=""
        />
        <p style="margin-top: 30px; font-size: 18px">Hi,</p>
        <p style="font-size: 18px; padding-top: 10px">

                Your unique and secure One-Time Password (OTP)
                <p style="color:#7065d4; font-weight: bold; font-size: x-large; ">

                    {{ $mailData }}
                </p>
                <p>To verify and authenticate your account, please enter the provided OTP accurately and promptly.</p>
                <p style="font-size: small;">
                    <i>
                       Note :
                    Don't share this code with anyone
                   </i>
                </p>
                Thank You
        </p>
        <span style="font-size: 18px; padding-top: 20px; color:black; ">Sincerely,</span><br/>
        <span style="font-size: 15px;color:#7065d4;padding-top: 0px; ">Zupish Team</span>
      </div>
      <br />


    </div>
  </body>
</html>
