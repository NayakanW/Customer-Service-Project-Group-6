# 🎧 Customer Service
Project Customer Service is a project that me and my friends create with the purpose of learning and how to make an optimize Customer Service Application. This project is designed to enhance customer support efficiency. This system includes features such as ticket management, live chat and calls. Built with a focus on scalability and user-friendly interfaces, our solution aims to streamline support operations and improve customer satisfaction.

# Key Feature
## 🎫 Ticket System
a ticket system that makes it easier for user if their request has been process and in progress, also they have the option to close the ticket. The ticket system also make it easier for staff to organize, manage priority, also assigned it to other staff, and the ticket they see is depend on what department they are in

## 📴 Active and Off Status
a feature created for those who work as Customer Service so they can decide wether their status is active or not, when their active they can get a calls or a messages from user and when their off they will no longer receive calls or messages from user

## 📞 Call from Staff
the staff can also call user, and the user will receive a pop up if they want to accept the call or not

## 📱 Chat
User can chat Customer Service if they don't want to make a call

# Mockup and link
### User
![Customer_Service_Mockup_Main_Page](https://github.com/user-attachments/assets/c0326c5a-3d28-411e-8afd-7194b33e4295)

### Staff
![Customer_Service_Mockup_Main_Page_Staff](https://github.com/user-attachments/assets/bffd9874-5c05-4d4a-8e6b-2556216715a8)

https://www.figma.com/design/VKJSIXUnaQw4XzC1S3JnIJ/Mockup-Customer-Service---6?node-id=1-7611&t=S7xeOmVqRJ63iTen-1

# ERD
This is are database design, subject to change to follow user needs
For now :
### One-to-Many (1:M) Relationships:

    User → Ticket
    Employee → Ticket
    Ticket → Messages
    Messages → File
    Departement → Employee

### Many-to-One (M:1) Relationships:

    Ticket → User
    Ticket → Employee
    Messages → Ticket
    File → Messages
    Employee → Departement
    
![ERD Image](https://github.com/NayakanW/Customer-Service/blob/main/ERD%20CS.png?raw=true)
