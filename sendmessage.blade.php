<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .contact-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .contact-form h4 {
            margin-bottom: 20px;
            color: #333;
        }
        .btn-send {
            background-color: #dc3545;
            color: white;
            width: 100%;
        }
        .btn-send:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <h4>Contact Us</h4>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-send">SEND</button>
        </form>
    </div>
</body>
</html>
