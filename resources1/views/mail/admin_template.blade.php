<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>Infiniti</title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr >
            <td align="center" style="padding:20px 0 20px 0; background: #f9f7f6 !important; background-repeat: no-repeat !important; background-size: cover !important;">
              {{-- <img src="https://bhusandeshwardev.alobhatech.com/baba-favicon.png" alt="" style="height:auto;display:block;width: 20%;" /> --}}
            </td>
          </tr>
          <tr style="background-color:white;">
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:50%;padding:20px;vertical-align:top">
                          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="font-weight:600;font-size:14px;">Name:</span> {{$mailArray['name'] ?? ''}} </p>
                          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="font-weight:600;font-size:14px;">Email:</span> {{$mailArray['email'] ?? ''}}</p>

                         @if($mailArray['contact'])
                           <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="font-weight:600;font-size:14px;">Mobile Number:</span> {{$mailArray['contact'] ?? ''}}</p>
                           @endif

                           <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="font-weight:600;font-size:14px;">Message:</span> {{$mailArray['message'] ?? ''}}</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p><b>Thanks & Regards,</b></p>
                    <p style="font-size:16px;margin-bottom:30px;">Team <span style="color: #008000;"> Infiniti </span></p>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
