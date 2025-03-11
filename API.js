const express = require('express');
const mysql = require('mysql');
const router = express.Router();

// Konfigurasi koneksi MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', 
    password: '', 
    database: 'customer_service6'
});

// Koneksi ke MySQL
db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('Connected to MySQL');
});

// Buat Ticket (Create)
router.post('/tickets', (req, res) => {
    const { ticket_id, status, user_id, employee_id, Priority } = req.body;
    const sql = `INSERT INTO ticket (ticket_id, DateCreated, status, user_id, employee_id, Priority) VALUES (?, NOW(), ?, ?, ?, ?)`;
    
    db.query(sql, [ticket_id, status, user_id, employee_id, Priority], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(201).send({ ticket_id, status, user_id, employee_id, Priority });
    });
});

// Lihat SEMUA ticket (Read)
router.get('/tickets', (req, res) => {
    const sql = `SELECT * FROM ticket`;
    db.query(sql, (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(200).send(results);
    });
});

// Cari Ticket By ID
router.get('/tickets/:ticket_id', (req, res) => {
    const sql = `SELECT * FROM ticket WHERE ticket_id = ?`;
    db.query(sql, [req.params.ticket_id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        if (result.length === 0) {
            return res.status(404).send({ message: 'Ticket not found' });
        }
        res.status(200).send(result[0]);
    });
});

// Assign Employee Ke Ticket
router.put('/tickets/:ticket_id', (req, res) => {
    const { status, employee_id } = req.body;
    const sql = `UPDATE ticket SET status = ?, employee_id = ? WHERE ticket_id = ?`;
    
    db.query(sql, [status, employee_id, req.params.ticket_id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        if (result.affectedRows === 0) {
            return res.status(404).send({ message: 'Ticket not found' });
        }
        res.status(200).send({ ticket_id: req.params.ticket_id, status, employee_id });
    });
});

//Hapus ticket jika false alarm
router.delete('/tickets/:ticket_id', (req, res) => {
    const sql = `DELETE FROM ticket WHERE ticket_id = ?`;
    db.query(sql, [req.params.ticket_id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        if (result.affectedRows === 0) {
            return res.status(404).send({ message: 'Ticket not found' });
        }
        res.status(200).send({ message: 'Ticket deleted successfully' });
    });
});

// Ubah Prioritas Ticket
router.put('/tickets/:id/priority', (req, res) => {
    const { Priority } = req.body;
    const sql = `UPDATE ticket SET Priority = ? WHERE ticket_id = ?`;
    db.query(sql, [Priority, req.params.id], (err, result) => {
        if (err) return res.status(500).send(err);
        res.status(200).send({ message: 'Priority updated successfully' });
    });
});

// Tutup ticket jika selesai
router.put('/tickets/:id/close', (req, res) => {
    const sql = `UPDATE ticket SET status = 'Closed' WHERE ticket_id = ?`;
    db.query(sql, [req.params.id], (err, result) => {
        if (err) return res.status(500).send(err);
        res.status(200).send({ message: 'Ticket closed successfully' });
    });
});

// Tampilkan semua pesan dari ticket tersebut
router.get('/messages/:ticket_id', (req, res) => {
    const sql = `SELECT * FROM messages WHERE ticket_id = ?`;
    db.query(sql, [req.params.ticket_id], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// Tampilkan files2 yang diupload pada chat ticket
router.get('/files/:ticket_id', (req, res) => {
    const sql = `SELECT * FROM file WHERE ticket_id = ?`;
    db.query(sql, [req.params.ticket_id], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// tampilkan report berdasarkan id ticket
router.get('/reports/:ticket_id', (req, res) => {
    const sql = `SELECT * FROM report WHERE ticket_id = ?`;
    db.query(sql, [req.params.ticket_id], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// Cari ticket berdasarkan keyword prioritas atau status
router.get('/tickets/search/:keyword', (req, res) => {
    const keyword = `%${req.params.keyword}%`;
    const sql = `SELECT * FROM ticket WHERE Priority LIKE ? OR status LIKE ?`;
    db.query(sql, [keyword, keyword], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// cari ticket berdasarkan user
router.get('/tickets/user/:user_id', (req, res) => {
    const sql = `SELECT * FROM ticket WHERE user_id = ?`;
    db.query(sql, [req.params.user_id], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// cari tiket yang di proses oleh employee
router.get('/tickets/employee/:employee_id', (req, res) => {
    const sql = `SELECT * FROM ticket WHERE employee_id = ?`;
    db.query(sql, [req.params.employee_id], (err, results) => {
        if (err) return res.status(500).send(err);
        res.status(200).send(results);
    });
});

// buat pesan
router.post('/messages', (req, res) => {
    const { ticket_id, Item, Message } = req.body;
    const sql = `INSERT INTO messages (ticket_id, Item, Message) VALUES (?, ?, ?)`;
    db.query(sql, [ticket_id, Item, Message], (err, result) => {
        if (err) return res.status(500).send(err);
        res.status(201).send({ message_id: result.insertId, ticket_id, Item, Message });
    });
});

// Menambahkan file ke pesan
router.post('/files', (req, res) => {
    const { message_id, File_name, File_location } = req.body;
    const sql = `INSERT INTO file (message_id, File_name, File_location, created_at) VALUES (?, ?, ?, NOW())`;
    db.query(sql, [message_id, File_name, File_location], (err, result) => {
        if (err) return res.status(500).send(err);
        res.status(201).send({ file_id: result.insertId, message_id, File_name, File_location });
    });
});
//Tampilkan Laporan Harian, mingguan dan bulanan
router.get('/report', (req, res) => {
    const sql = `
        SELECT 
            'Daily' AS ReportType,
            DATE(DateReport) AS ReportDate,
            SUM(TotalTicket) AS TotalTickets,
            SUM(TicketClosed) AS TicketsClosed
        FROM report
        GROUP BY DATE(DateReport)

        UNION ALL

        SELECT 
            'Weekly' AS ReportType,
            CONCAT(YEAR(DateReport), '-W', WEEK(DateReport)) AS ReportDate,
            SUM(TotalTicket) AS TotalTickets,
            SUM(TicketClosed) AS TicketsClosed
        FROM report
        GROUP BY YEAR(DateReport), WEEK(DateReport)

        UNION ALL

        SELECT 
            'Monthly' AS ReportType,
            CONCAT(YEAR(DateReport), '-', LPAD(MONTH(DateReport), 2, '0')) AS ReportDate,
            SUM(TotalTicket) AS TotalTickets,
            SUM(TicketClosed) AS TicketsClosed
        FROM report
        GROUP BY YEAR(DateReport), MONTH(DateReport);
    `;

    db.query(sql, (err, results) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(200).json(results);
    });
});

app.use('/api', router);

app.listen(3000, () => {
    console.log('Server running on port 3000');
});

module.exports = router;
