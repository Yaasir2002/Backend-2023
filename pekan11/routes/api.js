// import Student Controller
const StudentController = require = require('../controller/StudentController');

//import exports express
const express = require('express');

// buat objek router
const router = express.router();

//buat routing student
router.get('/students',StudentController.index);

router.post('/students',StudentController.store);

router.put('/students/:id',StudentController.update);

router.delete('/students/:id',StudentController.destroy);

module.exports = router;