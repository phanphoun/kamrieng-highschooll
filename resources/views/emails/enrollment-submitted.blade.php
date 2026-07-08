<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enrollment Submitted</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; margin: 0; padding: 0; background-color: #f8fafc; }
        .container { max-width: 600px; margin: 0 auto; padding: 32px 24px; }
        .card { background: #ffffff; border-radius: 12px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 24px; }
        .header h1 { color: #1e293b; font-size: 24px; margin: 0 0 8px; }
        .header p { color: #64748b; margin: 0; }
        .details { margin: 24px 0; }
        .details table { width: 100%; border-collapse: collapse; }
        .details td { padding: 10px 0; border-bottom: 1px solid #e2e8f0; }
        .details td:first-child { color: #64748b; width: 40%; }
        .details td:last-child { color: #1e293b; font-weight: 600; }
        .footer { text-align: center; margin-top: 24px; color: #94a3b8; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Enrollment Application Received</h1>
                <p>Thank you for applying to our school.</p>
            </div>
            <div class="details">
                <table>
                    <tr><td>Student Name</td><td>{{ $enrollment->student_name ?? 'N/A' }}</td></tr>
                    <tr><td>Tracking Code</td><td>{{ $enrollment->tracking_code ?? 'N/A' }}</td></tr>
                    <tr><td>Grade</td><td>{{ $enrollment->grade ?? 'N/A' }}</td></tr>
                    <tr><td>Academic Year</td><td>{{ $enrollment->academic_year ?? 'N/A' }}</td></tr>
                </table>
            </div>
            <p style="color: #475569; line-height: 1.6;">We have received your application and it is currently being reviewed. You can track the status of your application using the tracking code provided above. We will notify you once a decision has been made.</p>
            <div class="footer">
                <p>If you have any questions, please contact the school office.</p>
            </div>
        </div>
    </div>
</body>
</html>
