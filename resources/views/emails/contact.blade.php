<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body>

<h2>New Contact Form Submission</h2>

<hr>

<p><strong>Full Name:</strong> {{ $data['full_name'] }}</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Phone Number:</strong> {{ $data['phone'] }}</p>

<p><strong>Subject:</strong> {{ $data['subject'] }}</p>

<p><strong>Message:</strong></p>

<p>{{ $data['message'] }}</p>

<hr>

<p>Sent from your website Contact Form.</p>

</body>
</html>