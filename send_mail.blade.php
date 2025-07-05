<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Template Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f2f2f2;
      padding-top: 40px;
    }
    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .form-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 25px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="col-md-8 offset-md-2 form-container">
    <div class="form-title text-center">Email Form</div>
    <form action="{{ url('mail/' . $data->id) }}" method="post">
          @csrf
      <div class="mb-3">
        <label for="greeting" class="form-label">Greeting</label>
        <input type="text" class="form-control" id="greeting" name="greeting" placeholder="Enter Greeting" required>
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Mail Body</label>
        <textarea class="form-control" id="body" name="body" rows="4" placeholder="Enter the main message..." required></textarea>
      </div>

      <div class="mb-3">
        <label for="actionText" class="form-label">Action Text</label>
        <input type="text" class="form-control" id="actionText" name="actionText" placeholder="Enter Action Text" required>
      </div>

      <div class="mb-3">
        <label for="actionUrl" class="form-label">Action URL</label>
        <input type="url" class="form-control" id="actionUrl" name="actionUrl" placeholder="https://example.com/action" required>
      </div>

      <div class="mb-3">
        <label for="endline" class="form-label">End Line</label>
        <input type="text" class="form-control" id="endline" name="endline" placeholder="Enter Endline" required>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-4">Submit</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
