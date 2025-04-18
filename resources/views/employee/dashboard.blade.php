<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/employee-styles.css') }}">
</head>
<body>
  <aside class="sidebar">
    <div class="logo">
      <img src="{{ asset('images/placeholder-logo.png') }}" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="#"><span class="icon">⚪</span>Profile</a></li>
        <li><a href="#"><span class="icon">⚪</span>History</a></li>
        <li><a href="#"><span class="icon">⚪</span>Settings</a></li>
        <li><a href="#"><span class="icon">⚪</span>Help</a></li>
        <li><a href="#"><span class="icon">⚪</span>Report</a></li>
        <li><a href="#"><span class="icon">⚪</span>More</a></li>
        <li><a href="#"><span class="icon">⚪</span>Offline</a></li>
        <li><a href="#"><span class="icon">⚪</span>Log Out</a></li>
      </ul>
    </nav>
  </aside>
  <main>
    <header class="topbar">
      <h1>Customer Service</h1>
    </header>
    <section class="content">
      <div class="illustration">
        <img src="{{ asset('images/employee-illustration.png') }}" alt="Illustration">
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
