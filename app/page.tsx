import React from "react";
import "./globals.css";

const Page: React.FC = () => {
  return (
    <div className="container">
      {/* Sidebar */}
      <aside className="sidebar">
        <div className="logo">
          <img src="placeholder-logo.png" alt="Logo" />
        </div>
        <nav>
          <ul>
            <li><a href="#"><span className="icon">⚪</span> Profile</a></li>
            <li><a href="#"><span className="icon">⚪</span> Progress</a></li>
            <li><a href="#"><span className="icon">⚪</span> History</a></li>
            <li><a href="#"><span className="icon">⚪</span> Settings</a></li>
            <li><a href="#"><span className="icon">⚪</span> Help</a></li>
            <li><a href="#"><span className="icon">⚪</span> More</a></li>
            <li><a href="#"><span className="icon">⚪</span> Log Out</a></li>
          </ul>
        </nav>
      </aside>

      {/* Main Content */}
      <main>
        <header className="topbar">
          <h1>Customer Service</h1>
        </header>
        <section className="content">
          <div className="illustration">
            <img src="illustration.png" alt="Illustration" />
          </div>
          <div className="buttons">
            <button className="ticket-btn">🎟 Ticket</button>
            <button className="message-btn">✉ Message</button>
          </div>
        </section>
      </main>
    </div>
  );
};

export default Page;
