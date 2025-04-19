# 🎧 Customer Service
Project Customer Service adalah project yang dibuat dengan tujuan untuk belajar dan mengembangkan aplikasi Customer Service yang optimal. Project ini dirancang untuk meningkatkan efisiensi layanan pelanggan. Sistem ini mencakup fitur seperti manajemen sistem tiket, live chat, dan panggilan. Sistem ini dibuat dengan fokus pada skalabilitas dan antarmuka yang ramah pengguna, solusi kami adalah bertujuan untuk menyederhanakan operasional layanan dukungan dan meningkatkan kepuasan pelanggan.

# Fitur Utama
## 🎫 Sistem Tiket
Sistem tiket yang memudahkan pengguna dalam melacak status permintaan mereka, baik yang sedang diproses maupun yang masih dalam progres. Pengguna juga memiliki opsi untuk menutup tiket jika permasalahan telah terselesaikan. Bagi staf, sistem ini membantu dalam mengatur tiket dengan lebih efisien, mengelola prioritas, serta menetapkannya kepada staf lain yang bertanggung jawab. Selain itu, tiket yang ditampilkan kepada staf disesuaikan dengan departemen tempat mereka bekerja, sehingga setiap permintaan dapat ditangani oleh tim yang paling relevan.

## 📴 Status Aktif dan Nonaktif
Fitur ini dibuat untuk Customer Service agar mereka dapat menentukan status mereka, apakah sedang aktif atau tidak. Saat status aktif, mereka dapat menerima pesan dari pengguna. Namun, saat status nonaktif, mereka tidak akan menerima panggilan atau pesan dari pengguna.

## 📱 Chat
Pengguna dapat menghubungi Customer Service melalui chat jika mereka tidak ingin melakukan panggilan.

# Mockup and link
### User
![Main_User](https://github.com/user-attachments/assets/bf955bd8-9074-4971-903e-d6f5d80f6c3f)

### Staff
![Main_Staff](https://github.com/user-attachments/assets/d4549e14-ba9b-44eb-baff-1e8664f443fa)

https://www.figma.com/design/VKJSIXUnaQw4XzC1S3JnIJ/Mockup-Customer-Service---6?node-id=1-7611&t=S7xeOmVqRJ63iTen-1

# ERD
This is are database design, subject to change to follow user needs
For now :
### One-to-Many (1:M) Relationships:

    Users → comments
    Users → conversations
    Users → leads
    Users → leads_status_updates
    Users → memberships
    Users → tasks
    Users → tickets
    Users → ticket_events
    Users → user_settings
    teams → leads
    teams → memberships
    teams → tickets
    ticket_types → tickets
    conversations → messages
    tickets → comments
    tickets → ticket_events
    leads → tasks
    leads → lead_status_updates
    settings → (optional to) teams

### Many-to-One (M:1) Relationships:

    vice versa of One-to-Many (1:M) Relationships

### Many-to-Many (N:M) Relationships:

    users → memberships ← teams

![customer_service6](https://github.com/user-attachments/assets/fb6b6f06-0aeb-46dc-983a-44b33105ec73)

# Referensi Website
- [osTicket](https://osticket.com/) - An Open Source Supporting Ticket Software  
- [Open Support](https://github.com/opensupportapp/opensupport) - Simple Open Source Ticket System, made with React and Ruby  
- [Jira Service Management](https://www.atlassian.com/software/jira/service-management) - Automation for ticketing software  
