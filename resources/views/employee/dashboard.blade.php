<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Employee</title>
  <link rel="stylesheet" href="{{ asset('css/employee-styles.css') }}">
</head>
<body>
  <aside class="sidebar">
    <div class="logo">
      <img src="{{ asset('images/placeholder-logo.png') }}" alt="Logo" style="margin-bottom: 12px">
    </div>
    <nav>
      <ul>
        <li>
          <a href="{{ route('profile') }}">
            <img src="{{ asset('images/profile.png') }}" alt="Profile Icon" class="icon" style="width: 24px; height: 24px;">
            Profile
          </a>  
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/report.png') }}" alt="Report Icon" class="icon" style="width: 28px; height: 28px;">
            Report
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/history.png') }}" alt="History Icon" class="icon" style="width: 28px; height: 28px;">
            History
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/settings.png') }}" alt="Settings Icon" class="icon" style="width: 28px; height: 28px;">
            Settings
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/help.png') }}" alt="Help Icon" class="icon" style="width: 28px; height: 28px;">
            Help
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/more.png') }}" alt="More Icon" class="icon" style="width: 28px; height: 28px;">
            More
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/status.png') }}" alt="Status Icon" class="icon" style="width: 36px; height: 28px;">
            Off/Active
          </a>
        </li>
        <li>
          <a href="#">
            <img src="{{ asset('images/logout.png') }}" alt="Logout Icon" class="icon" style="width: 28px; height: 28px; margin-right: 5px;">
            Log Out
          </a>
        </li>
      </ul>
    </nav>    
  </aside>
  <main>
    <header class="topbar">
      <h1>Customer Service</h1>
    </header>
    <section class="content">
      <div class="illustration">
        <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
      </div>
      <div class="buttons">
        <button class="ticket-btn">🎟 Ticket</button>
        <button class="message-btn">✉ Message</button>
        <button class="phone-btn">📞 Phone</button>
      </div>
    </section>
  </main>
</body>
</html>
