<!-- resources/views/emails/thankyou-email.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Infiniti</title>
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
    </style>
</head>
<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:20px;background:#f9f7f6;">
                            {{-- <img src="https://bhusandeshwardev.alobhatech.com/baba-favicon.png" alt="Infiniti Logo" style="width:20%;display:block;height:auto;"> --}}
                        </td>
                    </tr>
                    <tr style="background-color:white;">
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0;">
                                        <p style="font-size:18px; font-weight:bold;">Dear {{ $mailArray['name'] ?? 'Valued Customer' }},</p>
                                        <p style="font-size:16px; margin:20px 0;">Thank you for reaching out to us at Infiniti. We have received your contact us and will get back to you as soon as possible.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Warm Regards,</strong></p>
                                        <p style="font-size:16px;margin-bottom:30px;">Team <span style="color: #008000;">Infiniti</span></p>
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
