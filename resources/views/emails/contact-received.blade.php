<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You for Contacting Us</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; margin: 0; padding: 0; background-color: #f8fafc; }
        .container { max-width: 600px; margin: 0 auto; padding: 32px 24px; }
        .card { background: #ffffff; border-radius: 12px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 24px; }
        .header h1 { color: #1e293b; font-size: 24px; margin: 0 0 8px; }
        .header p { color: #64748b; margin: 0; }
        .footer { text-align: center; margin-top: 24px; color: #94a3b8; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Thank You for Contacting Us</h1>
                <p>We have received your message.</p>
            </div>
            <p style="color: #475569; line-height: 1.6;">Dear {{ $contact->name ?? 'Valued Guest' }},</p>
            <p style="color: #475569; line-height: 1.6;">Thank you for reaching out to us. We have received your message and someone from our team will respond to you as soon as possible.</p>
            <p style="color: #475569; line-height: 1.6;">If you have any urgent concerns, please feel free to contact us directly through the school office.</p>
            <div class="footer">
                <p>Best regards,<br>Kamrieng High School</p>
            </div>
        </div>
    </div>
</body>
</html>
