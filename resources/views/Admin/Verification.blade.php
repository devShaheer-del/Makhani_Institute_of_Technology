<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enrollment Approved</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <tr style="background: linear-gradient(to right, #4f46e5, #06b6d4); color: #ffffff;">
                        <td style="padding: 20px; text-align: center;">
                            <img src="{{ asset('images/logo.png') }}" alt="Institute Logo" width="100" style="margin-bottom:10px;">
                            <h1 style="margin: 0; font-size: 24px;">Enrollment Approved</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; color: #111827;">
                                Hello <strong>{{ $enroll->name }}</strong>,
                            </p>
                            <p style="font-size: 16px; color: #111827;">
                                We are Invited you for meeting please visit our Institute about you admission structre and fee structre as well your enrollment request of <strong>{{ $enroll->course }}</strong> has been <span style="color: #22c55e; font-weight:bold;">approved</span>.
                            </p>
                            <p style="font-size: 16px; color: #111827;">
                                Our team will contact you soon with further details. We look forward to having you on board!
                            </p>
                            <div style="text-align: center; margin-top: 30px;">
                                <a href="{{ url('/') }}" style="background-color: #4f46e5; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; display: inline-block;">Visit Our Website</a>
                            </div>
                            <p style="margin-top: 30px; font-size: 12px; color: #6b7280;">
                                If you have any questions, feel free to reply to this email.
                            </p>
                        </td>
                    </tr>
                    <tr style="background-color: #f9fafb;">
                        <td style="padding: 20px; text-align: center; font-size: 12px; color: #6b7280;">
                            &copy; {{ date('Y') }}Makhani Institue of Technology. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
