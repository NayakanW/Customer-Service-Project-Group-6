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

// CREATE Ticket
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

// READ all ticket
router.get('/tickets', (req, res) => {
    const sql = `SELECT * FROM ticket`;
    db.query(sql, (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(200).send(results);
    });
});

// READ single ticket by ID (GET)
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

// update ticket when the employee process the ticket
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

// DELETE ticket if supervisor decided to
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

module.exports = router;
