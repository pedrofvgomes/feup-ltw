PRAGMA foreign_keys = on;

DROP TABLE IF EXISTS TicketComment;
DROP TABLE IF EXISTS AgentDepartment;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Account;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS Priority;

CREATE TABLE IF NOT EXISTS Account (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password NVARCHAR(255) NOT NULL,
    name VARCHAR(255),
    role VARCHAR(255) DEFAULT 'Client'
);

CREATE TABLE IF NOT EXISTS Ticket (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    author INTEGER NOT NULL REFERENCES Account(id),
    agent INTEGER REFERENCES Account(id),
    subject VARCHAR(255),
    description VARCHAR(255),
    department INTEGER REFERENCES Department(id),
    priority INTEGER REFERENCES Priority(id),
    status INTEGER REFERENCES Status(id),
    datecreated TIMESTAMP DEFAULT (datetime('now', 'localtime'))
);

CREATE TABLE IF NOT EXISTS Department (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Priority (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Status (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS AgentDepartment (
    agentid INTEGER REFERENCES Account(id),
    departmentid INTEGER REFERENCES Department(id),
    PRIMARY KEY (agentid, departmentid)
);

CREATE TABLE IF NOT EXISTS TicketComment(
    ticketid INTEGER REFERENCES Ticket(id),
    authorid INTEGER REFERENCES Account(id),
    comment VARCHAR(255),
    datecreated TIMESTAMP DEFAULT (datetime('now', 'localtime'))
);

INSERT INTO Department (name) VALUES
    ('Marketing'),
    ('IT Support'),
    ('Human Resources'),
    ('Finance'),
    ('Administration');

INSERT INTO Status (name) VALUES
    ('Pending Agent'),
    ('Assigned'),
    ('In Progress'),
    ('Closed');

INSERT INTO Priority (name) VALUES
    ('Low'),
    ('Medium'),
    ('High'),
    ('Urgent');

INSERT INTO Account (username, email, password, name, role) VALUES
    ('johndoe', 'john.doe@example.com', 'password1', 'John Doe', 'Admin'),
    ('janedoe', 'jane.doe@example.com', 'password2', 'Jane Doe', 'Admin'),
    ('mikesmith', 'mike.smith@example.com', 'password3', 'Mike Smith', 'Admin'),
    ('emilyjones', 'emily.jones@example.com', 'password4', 'Emily Jones', 'Agent'),
    ('davidwilson', 'david.wilson@example.com', 'password5', 'David Wilson', 'Agent'),
    ('sarahthomas', 'sarah.thomas@example.com', 'password6', 'Sarah Thomas', 'Agent'),
    ('jasonbrown', 'jason.brown@example.com', 'password7', 'Jason Brown', 'Agent'),
    ('laurasmith', 'laura.smith@example.com', 'password8', 'Laura Smith', 'Agent'),
    ('michaeljohnson', 'michael.johnson@example.com', 'password9', 'Michael Johnson', 'Client'),
    ('amandawilliams', 'amanda.williams@example.com', 'password10', 'Amanda Williams', 'Client'),
    ('chrisdavis', 'chris.davis@example.com', 'password11', 'Chris Davis', 'Client'),
    ('jennymiller', 'jenny.miller@example.com', 'password12', 'Jenny Miller', 'Client'),
    ('robertwilson', 'robert.wilson@example.com', 'password13', 'Robert Wilson', 'Client'),
    ('kimberlyjones', 'kimberly.jones@example.com', 'password14', 'Kimberly Jones', 'Client'),
    ('markthompson', 'mark.thompson@example.com', 'password15', 'Mark Thompson', 'Client'),
    ('meganwhite', 'megan.white@example.com', 'password16', 'Megan White', 'Client'),
    ('peterdavis', 'peter.davis@example.com', 'password17', 'Peter Davis', 'Client'),
    ('lisawilson', 'lisa.wilson@example.com', 'password18', 'Lisa Wilson', 'Client'),
    ('briantaylor', 'brian.taylor@example.com', 'password19', 'Brian Taylor', 'Client');

INSERT INTO AgentDepartment (agentid, departmentid) VALUES
    (4, 1), -- Emily Jones - Marketing
    (4, 2), -- Emily Jones - IT Support
    (5, 2), -- David Wilson - IT Support
    (5, 3), -- David Wilson - Human Resources
    (6, 3), -- Sarah Thomas - Human Resources
    (6, 4), -- Sarah Thomas - Finance
    (7, 1), -- Jason Brown - Marketing
    (7, 3), -- Jason Brown - Human Resources
    (8, 2), -- Laura Smith - IT Support
    (8, 4); -- Laura Smith - Finance

INSERT INTO Ticket (author, agent, subject, description, department, priority, status) VALUES
    (9, 4, 'Website Login Issue', 'I am unable to log in to the website. It gives me an error message.', 2, 3, 1),
    (10, 5, 'Email Not Sending', 'I have been trying to send emails, but they are not going through. Please help.', 2, 2, 1),
    (11, 6, 'Employee Leave Request', 'One of our employees has submitted a leave request. Please review and approve it.', 3, 1, 1),
    (12, 7, 'Marketing Campaign Ideas', 'We are planning a new marketing campaign and need some creative ideas.', 1, 2, 1),
    (13, 8, 'Expense Reimbursement', 'I would like to request reimbursement for the expenses incurred during a business trip.', 4, 3, 1),
    (9, 4, 'Website Performance Issue', 'The website is running slow and taking a long time to load pages.', 2, 2, 1),
    (14, 5, 'New Employee Onboarding', 'We have a new employee joining next week. Please assist with the onboarding process.', 3, 3, 1),
    (15, 6, 'Network Connectivity Problem', 'There seems to be an issue with the network connectivity in our office.', 2, 2, 1),
    (10, 5, 'Software Installation Error', 'I am trying to install a software application, but it keeps showing an error during installation.', 2, 2, 1),
    (11, 6, 'Employee Performance Evaluation', 'We need to conduct a performance evaluation for one of our employees. Please schedule a meeting.', 3, 1, 1),
    (12, 7, 'Social Media Marketing Strategy', 'We are looking to revamp our social media marketing strategy. Any suggestions?', 1, 2, 1),
    (13, 8, 'Budget Approval Request', 'I need approval for a budget allocation request for an upcoming project.', 4, 3, 1),
    (14, 5, 'Hardware Malfunction', 'One of our office computers is not functioning properly. It might need a hardware repair.', 2, 3, 1),
    (15, 6, 'Employee Training Program', 'We would like to organize a training program for our employees. Please provide details and options.', 3, 2, 1),
    (10, 5, 'Database Backup Issue', 'We encountered an error while performing the database backup. It needs immediate attention.', 2, 4, 1),
    (11, 6, 'New Product Inquiry', 'I would like to know more about your new product and its features.', 1, 1, 1),
    (12, 7, 'Password Reset', 'I forgot my password and need assistance in resetting it.', 2, 3, 1),
    (13, 8, 'Request for Invoice', 'I need a copy of the invoice for my recent purchase.', 4, 3, 1);

INSERT INTO TicketComment (ticketid, authorid, comment) VALUES
    (16, 9, "Thank you for reaching out. Our new product offers advanced features and improved performance. I will provide you with more details shortly."),
    (16, 6, "You're welcome! I'm glad you're interested in our new product. I'll send you a brochure and answer any questions you may have."),
    (17, 10, "I've been locked out of my account. Can someone help me reset my password?"),
    (17, 5, "I apologize for the inconvenience. I will initiate the password reset process for your account. You'll receive an email with instructions."),
    (18, 11, "Could you please send me the invoice for my recent purchase? I need it for accounting purposes."),
    (18, 8, "Certainly! I'll locate the invoice and forward it to you via email.");
