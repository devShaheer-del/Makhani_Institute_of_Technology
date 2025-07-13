<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Enrollment Rejected</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <tr style="background: linear-gradient(to right, #ef4444, #f87171); color: #ffffff;">
                        <td style="padding: 20px; text-align: center;">
                            <img src="{{ asset('images/logo.png') }}" alt="Institute Logo" width="100" style="margin-bottom:10px;">
                            <h1 style="margin: 0; font-size: 24px;">Enrollment Rejected</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; color: #111827;">
                                Dear <strong>{{ $enroll->name }}</strong>,
                            </p>
                            <p style="font-size: 16px; color: #111827;">
                                We regret to inform you that your enrollment request for <strong>{{ $enroll->course }}</strong> has been <span style="color: #ef4444; font-weight:bold;">rejected</span>.
                            </p>
                            <p style="font-size: 16px; color: #111827;">
                                If you believe this is a mistake, please contact our support team. We would be happy to assist you further.
                            </p>
                            <div style="text-align: center; margin-top: 30px;">
                                <a href="mailto:support@example.com" style="background-color: #ef4444; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; display: inline-block;">Contact Support</a>
                            </div>
                            <p style="margin-top: 30px; font-size: 12px; color: #6b7280;">
                                Thank you for your interest in our courses.
                            </p>
                        </td>
                    </tr>
                    <tr style="background-color: #f9fafb;">
                        <td style="padding: 20px; text-align: center; font-size: 12px; color: #6b7280;">
                            &copy; {{ date('Y') }} Makhani Institue of Technology. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
