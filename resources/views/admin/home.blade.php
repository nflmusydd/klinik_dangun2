<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Page</title>
    @include('admin.css')
</head>
<body>
    @include('admin.sidebar')
    @include('admin.navbar')
    
    <div class="container" align="center" style="padding-top: 100px;">
        <h1>Test Page</h1>
        <p>This is a test to check CSS and layout consistency.</p>
    </div>

    @include('admin.script')
</body>
</html>