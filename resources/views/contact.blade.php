<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Send us a Message</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    class="form-control"
                    value="{{ old('full_name') }}"
                >

                @error('full_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                >

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone') }}"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label>Subject</label>

                <select
                    name="subject"
                    class="form-control"
                >
                    <option value="">Select a subject</option>
                    <option>General Inquiry</option>
                    <option>Support</option>
                    <option>Feedback</option>
                    <option>Other</option>
                </select>

                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label>Message</label>

                <textarea
                    name="message"
                    rows="5"
                    class="form-control"
                >{{ old('message') }}</textarea>

                @error('message')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary">
                    Send Message
                </button>
            </div>

        </div>

    </form>

</div>

</body>
</html>
