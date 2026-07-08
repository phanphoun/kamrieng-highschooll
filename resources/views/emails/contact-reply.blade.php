<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reply to Your Inquiry</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; margin: 0; padding: 0; background-color: #f8fafc; }
        .container { max-width: 600px; margin: 0 auto; padding: 32px 24px; }
        .card { background: #ffffff; border-radius: 12px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 24px; }
        .header h1 { color: #1e293b; font-size: 24px; margin: 0 0 8px; }
        .header p { color: #64748b; margin: 0; }
        .reply-box { background: #f1f5f9; border-left: 4px solid #eab308; padding: 16px; margin: 24px 0; border-radius: 4px; }
        .reply-box p { margin: 0; color: #1e293b; line-height: 1.6; }
        .subject-line { color: #64748b; font-size: 14px; margin-bottom: 8px; }
        .footer { text-align: center; margin-top: 24px; color: #94a3b8; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Reply to Your Inquiry</h1>
                <p>A response has been provided regarding your message.</p>
            </div>
            <div class="subject-line">Subject: {{ $subject ?? 'Your Inquiry' }}</div>
            <div class="reply-box">
                <p>{{ $replyMessage ?? 'N/A' }}</p>
            </div>
            <p style="color: #475569; line-height: 1.6;">If you have any further questions, please do not hesitate to contact us again.</p>
            <div class="footer">
                <p>Best regards,<br>Kamrieng High School</p>
            </div>
        </div>
    </div>
</body>
</html>
